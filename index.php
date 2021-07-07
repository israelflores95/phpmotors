<?php
// Create or access a Session
session_start();

// Get the database connection file
 require_once 'library/connections.php';
// Get the PHP Motors model for use as needed
 require_once 'model/main-model.php';
// get accounts model
 require_once 'model/accounts-model.php';

 require_once 'library/functions.php';

// Get the array of classifications
$classifications = getClassifications();

// Build a navigation bar using the $classifications array
$navList = buildNavigation($classifications);
// $navList = '';
// $navList .= "<div><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></div>";
// foreach ($classifications as $classification) {
//  $navList .= "<div><a href='/phpmotors/vehicles/?action=classification&classificationName="
// .urlencode($classification['classificationName']).
//  "' title='View our $classification[classificationName] lineup of vehicles'>$classification[classificationName]</a></div>";
// }
// $navList .= '';
 
//----------------testing------------------
 //echo $navList;
 //exit;


//main controller
$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }

 // Check if the firstname cookie exists, get its value


 switch ($action){
    case 'template':
      include 'view/template.php';
     break;
    
    case 'login':
      include 'view/login.php';
    break;
    
    case 'home':
      include 'view/home.php';
    break;
    
    default:
     include 'view/home.php';
   }

 ?>