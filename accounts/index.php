<?php
// Create or access a Session
session_start();

//Accounts controller

// Get the database connection file
 require_once '../library/connections.php';
 // Get the PHP Motors model for use as needed
 require_once '../model/main-model.php';
 //add accounts model
 require_once '../model/accounts-model.php';
 // Get the functions library
 require_once '../library/functions.php';

// Get the array of classifications
$classifications = getClassifications();

// Build a navigation bar using the $classifications array
$navList = '';
$navList .= "<div><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></div>";
foreach ($classifications as $classification) {
 $navList .= "<div><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></div>";
}
$navList .= '';
 
//----------------testing------------------
 //echo $navList;
 //exit;

$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }



 switch ($action) {
    case 'myaccount':
        include '../view/login.php';
    break;

    case 'register':
        include '../view/register.php';
    break;

    case 'updateAccount': // from admin.php view
        include '../view/client-update.php';
        exit;
    break;

    case 'Login':
        
        // get client email and password
        $clientEmail = TRIM(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
        $clientPassword = TRIM(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING));


        //server side valadation
        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);

        //check for missing data
        if(empty($clientEmail) || empty($checkPassword)){
            $message = '<p class = password-error>Please provide information for all empty fields.</p>';
            include '../view/login.php';
            exit; 
        }

        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClient($clientEmail);
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
        // If the hashes don't match create an error
        // and return to the login view
        if(!$hashCheck) {
        $message = '<p class="notice">Please check your password and try again.</p>';
        include '../view/login.php';
        exit;
        }

        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
        // Send them to the admin view

        // Store client level in session veriable
        $_SESSION['clientLevel'] = $clientData['clientLevel'];

        // store first and last name with html tags to session veriable
        $_SESSION['bannerName'] = "<h1 id = 'banner-name'><a href = '/phpmotors/accounts/index.php?action=admin' >Welcome " . $_SESSION['clientData']['clientFirstname'] . "</a></h1>";

        // display client full name in H1 Tag
        $_SESSION['clientName'] = "<h1 id = 'client-fullName'>" . "Logged in as: " . $_SESSION['clientData']['clientFirstname'] . " " . $_SESSION['clientData']['clientLastname'] . "</h1>";

        // display client data in UL tag
        $_SESSION['clientLogin'] = "<ul id = 'client-data'>"
        . "<li> First Name: " . $_SESSION['clientData']['clientFirstname'] . "</li>" 
        . "<li> Last Name: " . $_SESSION['clientData']['clientLastname'] . "</li>" 
        . "<li> Email: " . $_SESSION['clientData']['clientEmail'] . "</li>" 
        . "</ul>";
        header('Location: /phpmotors/accounts/index.php');
        exit;

    break;

    case 'signUp':
        // Filter and store the data
        $clientFirstname = TRIM(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING));
        $clientLastname = TRIM(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING));
        $clientEmail = TRIM(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
        $clientPassword = TRIM(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING));

        // check for existing account(email)
        $existingEmail = checkExistingEmail($clientEmail);

        // Check for existing email address in the table
        if($existingEmail){
        $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
        header('Location: /phpmotors/accounts/index.php');
        exit;
        }


        //call the checkEmail function (more email valadation)
        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);

        // Check for missing data
        if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){
            $message = '<p class = password-error>Please provide information for all empty form fields.</p>';
            header('Location: /phpmotors/accounts/index.php');
            exit; 
        }

        // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

        // Send the data to the model
        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

        // Check and report the result
        if($regOutcome === 1){
            setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
            $_SESSION['message'] = "Thanks for registering $clientFirstname. Please use your email and password to login.";
            header('Location: /phpmotors/accounts/?action=Login');
            exit;
        } else {
            $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
            include '../view/login.php';
            exit;
        }

    break;

    case 'sign-out';
        session_unset();
        session_destroy();
        header('Location: /phpmotors');
    break;

    case 'update-account':

        $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING));
        $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING));
        $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
        
        // Check for missing data
        if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)){
            $accountMessage = '<p class="error-notice">Please provide information for all empty form fields.</p>';
            include '../view/client-update.php';
            exit; 
        }

        if ($clientEmail == $_SESSION['clientData']['clientEmail']) {
            $accountMessage = '<p>This is the same email.</p>';
        }

        //Check for existing email only if the client is trying to change the current email
        $checkNewEmail = checkNewEmail($clientEmail, $clientId);
        if($checkNewEmail){
            // Check for an existing email
            $existingEmail = checkExistingEmail($clientEmail);

            // Check for existing email address in the table
            if($existingEmail){
                $message = "<p class='error-notice'>That email address is already being used by another account.</p>";
                include '../view/client-update.php';
                exit;
            }
        }

        //Send the data to the model
        $updateOutcome = updateClient($clientFirstname, $clientLastname, $clientEmail, $clientId);

        //Check and report the result
        if($updateOutcome === 1){
            setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
            
            //Update session
            $clientData = getClientData($clientId);

            // Store the array into the session
            $_SESSION['clientData'] = $clientData;

            $message = "<p class='notice'>$clientFirstname, your info has been updated.</p>";   
            $_SESSION['message'] = $message;
            header('Location: /phpmotors/accounts/');
            exit;
        } 
        else {
            $message = "<p class='error-notice'>No information was updated.</p>";   
            $_SESSION['message'] = $message;
            header('Location: /phpmotors/accounts/');
            exit;
        }

        include '../view/client-update.php';
    break;

    case 'update-password':
        // Filter and store the data
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING));
        $checkPassword = checkPassword($clientPassword);

        // Check for missing data
        if(empty($checkPassword)){
            $passMessage = '<p class="error-notice">Please make sure your password matches the requirements.</p>';
            include '../view/client-update.php';
            exit; 
        }

        // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

        //Send the data to the model
        $changeOutcome = changePassword($hashedPassword, $clientId);
        
        //Check and report the result
        if($changeOutcome === 1){
            $passMessage = "<p class='notice'>Your password has been updated.</p>";   
            $_SESSION['message'] = $passMessage;
            header('Location: /phpmotors/accounts/index.php');
            exit;
        } 
        else {
            $message = "<p class='error-notice'>Error: Password wasn't updated. Please try again.</p>";   
            $_SESSION['message'] = $message;
            header('Location: /phpmotors/accounts/index.php');
            exit;
        }
    break; 


    default:
        include '../view/admin.php';
 };

 ?>