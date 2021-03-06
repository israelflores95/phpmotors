<?php
// Create or access a Session
session_start();

/*
* Vehicles controller 
*/
 
// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
//add accounts model
require_once '../model/accounts-model.php';
//  add vehicles model
require_once '../model/vehicles-model.php';
//  add vehicles model
require_once '../library/functions.php';
// add reviews model
require_once '../model/reviews-model.php';

// Get the array of classifications
$classifications = getClassifications();

// Build a navigation bar using the $classifications array
$navList = buildNavigation($classifications);

// get array for classificationId
$classificationid = getClassificationList();


$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }



 switch ($action) {
    case 'addClassification';
        include '../view/add-classification.php';
    break;

    case 'addVehicle';
        include '../view/add-vehicle.php';
    break;

    case 'add-vehicle';

        // get info from html form and into php variables
        $invMake = TRIM(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING));
        $invModel = TRIM(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING));
        $invDescription = TRIM(filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING));
        $invImage = TRIM(filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING));
        $invThumbnail = TRIM(filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING));
        $invPrice = TRIM(filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
        $invStock = TRIM(filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_FLOAT));
        $invColor = TRIM(filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING));
        $classificationId = TRIM(filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT));

        // check for empty fields and report message
        if(empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor) || empty($classificationId)){
            $message = '<p class = "server-valadation">Please provide information for all empty form fields.</p>';
             include '../view/add-vehicle.php';
            //header('Location: /phpmotors/view/add-vehicle.php');
            exit;
        }

        // send data to model
        $addVehicleOutcome = addVehicle ($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId);
        
        if($addVehicleOutcome === 1){
            $message = "<p>Vehicle added</p>";
            include '../view/vehicle-management.php';
            exit;
        } else {
            $message = "<p>Adding vehicle failed! please try again.</p>";
            header('Location: /phpmotors/view/add-vehicle.php');
            exit;
        }
    break;

    case 'add-classification';

        // get info from html form and into php variables
        $classificationName = filter_input(INPUT_POST, 'classificationName');

        // check for empty fields and report message
        if(empty($classificationName)){
            $message = '<p class = "server-valadation">*Please provide information for the empty field.</p>';
            include '../view/add-classification.php';
            exit;
        }

        // send data to model
        $addClassificationOutcome = addClassification ($classificationName);

            // include '../view/vehicle-management.php';
            header('Location: /phpmotors/vehicles/index.php');
    break;

    case 'getInventoryItems': 
        // Get the classificationId 
        $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT); 
        // Fetch the vehicles by classificationId from the DB 
        $inventoryArray = getInventoryByClassification($classificationId); 
        // Convert the array to a JSON object and send it back 
        echo json_encode($inventoryArray); 
    break;

    case 'mod':
        $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $invInfo = getInvItemInfo($invId);

        if(count($invInfo)<1){
            $message = 'Sorry, no vehicle information could be found.';
           }

        include '../view/vehicle-update.php';
        exit;
    break;

    case 'updateVehicle':
        // get info from html form and into php variables
        $invMake = TRIM(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING));
        $invModel = TRIM(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING));
        $invDescription = TRIM(filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING));
        $invImage = TRIM(filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING));
        $invThumbnail = TRIM(filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING));
        $invPrice = TRIM(filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
        $invStock = TRIM(filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_FLOAT));
        $invColor = TRIM(filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING));
        $classificationId = TRIM(filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT));

        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

        // check for empty fields and report message
        if(empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor) || empty($classificationId)){
            $message = '<p class = "server-valadation">Please provide information for all empty form fields.</p>';
            // include '../view/add-vehicle.php';
            header('Location: /phpmotors/view/vehicle-update.php');
            exit;
        }

        // send data to model
        $updateResult = updateVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId, $invId);
        
        if($updateResult){
            $message = "<p>Vehicle updated</p>";
            $_SESSION['message'] = $message;
            header( 'location: /phpmotors/vehicles/');
            exit;
        } else {
            $message = "<p>Update vehicle failed! please try again.</p>";
            header('Location: /phpmotors/view/vehicle-update.php');
            exit;
        }
    
    break;    
    
    case 'del':
        $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $invInfo = getInvItemInfo($invId);

        if(count($invInfo)<1){
            $message = 'Sorry, no vehicle information could be found.';
           }

        include '../view/vehicle-delete.php';
        exit;
    break;
    
    case 'deleteVehicle':
         // get info from html form and into php variables
         $invMake = TRIM(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING));
         $invModel = TRIM(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING));
         $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
 
         // send data to model
         $deleteResult = deleteVehicle($invId);
         
         if($deleteResult){
             $message = "<p>Vehicle Deleted</p>";
             $_SESSION['message'] = $message;
             header( 'location: /phpmotors/vehicles/');
             exit;
         } else {
             $message = "<p>Delete vehicle failed! please try again.</p>";
             header('Location: /phpmotors/view/vehicle-update.php');
             exit;
         }
    break;

    case 'classification':
        $classificationName = filter_input(INPUT_GET, 'classificationName', FILTER_SANITIZE_STRING);

        $vehicles = getVehiclesByClassification($classificationName);

        if(!count($vehicles)){
            $message = "<p class='notice'>Sorry, no $classificationName vehicles could be found.</p>";
          } else {
            $vehicleDisplay = buildVehiclesDisplay($vehicles);
          }

        //   echo $vehicleDisplay;
        //   exit;
      include '../view/classification.php';
    break;

    case 'vehicleinfo':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_NUMBER_INT);

        $vehicle = getVehicle($invId);
        $vehicleImages = getThumbnails($invId);

        // if the user is logged in get the clientId
        if (isset($_SESSION['loggedin'])) {
            $clientId = $_SESSION['clientData']['clientId'];
            $screeName = substr($_SESSION['clientData']['clientFirstname'], 0, 1) . $_SESSION['clientData']['clientLastname'];
            $_SESSION['screenName'] = $screeName;

            $reviewForm = buildReviewForm($screeName, $invId, $clientId);
        }


        if (!count($vehicle)) {
          $message = "<p class='notice'>Sorry, no vehicle $invMake $invModel could be found.</p>";
        } else {
          $vehicleDetailDisplay = buildVehicleDetailDisplay($vehicle, $vehicleImages);

        //   var_dump($vehicleImages);
        //   exit;
        }

        $specificVehicleReviewData = getVehicleReviews($invId);
        $reviewList = createReviewList($specificVehicleReviewData);
        $_SESSION['reviewList'] =  $reviewList;

        include '../view/vehicle-detail.php';
    break;

        default:
    $classificationList = buildClassificationList($classifications);
        include '../view/vehicle-management.php';
 };

 ?>