<?php

function checkEmail($clientEmail){
 $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
 return $valEmail;
}

// Check the password for a minimum of 8 characters,
 // at least one 1 capital letter, at least 1 number and
 // at least 1 special character
function checkPassword($clientPassword){
   $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';
   return preg_match($pattern, $clientPassword);
   }

// Build the classifications select list 
function buildClassificationList($classifications){ 
   $classificationList = '<select name="classificationId" id="classificationList">'; 
   $classificationList .= "<option>Choose a Classification</option>"; 
   foreach ($classifications as $classification) { 
    $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>"; 
   } 
   $classificationList .= '</select>'; 
   return $classificationList; 
}

function buildVehiclesDisplay($vehicles){

   $dv = '<ul id="inv-display">';
   foreach ($vehicles as $vehicle) {
    $dv .= '<li class = vehicle-list-items>';
    $dv .= "<a href='/phpmotors/vehicles?action=vehicleinfo&invMake=" . urlencode($vehicle['invMake']) . "&invModel=" . urlencode($vehicle['invModel']) . "'>";
    $dv .= "<div class='thumb-images'><img src='$vehicle[invThumbnail]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'></div>";
    $dv .= '</a>';
    $dv .= '<hr>';
    $dv .= "<a href='/phpmotors/vehicles?action=vehicleinfo&invMake=" . urlencode($vehicle['invMake']) . "&invModel=" . urlencode($vehicle['invModel']) . "'>";
    $dv .= "<h2>$vehicle[invMake] $vehicle[invModel]</h2>";
    $dv .= '</a>';
    $formattedPrice = number_format($vehicle['invPrice'],2);
    $dv .= "<span class=vehicle-price>$ $formattedPrice</span>";
    $dv .= '</li>';
   }
   $dv .= '</ul>';
   return $dv;
}

?>