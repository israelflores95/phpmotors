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

// Get the array of classifications
$classifications = getClassifications();

// get array for classificationId
$classificationid = getClassificationList();

// Build a navigation bar using the $classifications array
$navList = '';
$navList .= "<div><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></div>";
foreach ($classifications as $classification) {
 $navList .= "<div><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></div>";
}
$navList .= '';

// // Build dynamic classification dropdown list
// $classList = '';
// foreach ($classificationid as $classification) {
//  $classList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>";
// }

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

//    var_dump($invImage);
//    exit;

    // check for empty fields and report message
    if(empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor) || empty($classificationId)){
        $message = '<p class = "server-valadation">Please provide information for all empty form fields.</p>';
        // include '../view/add-vehicle.php';
        header('Location: /phpmotors/view/add-vehicle.php');
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
        header('Location: /phpmotors/vehicles/index.php');
        exit;
    }

    // send data to model
    $addClassificationOutcome = addClassification ($classificationName);

        // include '../view/vehicle-management.php';
        header('Location: /phpmotors/vehicles/index.php');
    break;

    default:
        include '../view/vehicle-management.php';
 };

 ?>