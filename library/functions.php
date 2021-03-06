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

   //Build a navigation bar usin the $classifications array
   function buildNavigation($classifications){
      $navList = '';
      $navList .= "<div><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></div>";
      foreach ($classifications as $classification) {
      $navList .= "<div><a href='/phpmotors/vehicles/?action=classification&classificationName="
      .urlencode($classification['classificationName']).
      "' title='View our $classification[classificationName] lineup of vehicles'>$classification[classificationName]</a></div>";
      }
      $navList .= '';
      // $navList = '';
      // $navList .= "<div><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></div>";
      // foreach ($classifications as $classification) {
      //  $navList .= "<div><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></div>";
      // }
      // $navList .= '';
      return $navList;
   }
// this function will build a display of vehicles within an unordered list, it will return back to the index.php inside the "vehicles" folder
function buildVehiclesDisplay($vehicles) {
    $dv = '<div class="vehicle-display">';
    $dv .= '<ul id="inv-display">';
    foreach ($vehicles as $vehicle) {
        $dv .= '<li>';
        $dv .= "<a href='/phpmotors/vehicles?action=vehicleinfo&invId=" . urlencode($vehicle['invId']) . "'><img src='$vehicle[imgPath]' class='vehicle-image' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'>";
        $dv .= '<hr>';
        $dv .= "<h2>$vehicle[invMake] $vehicle[invModel]</h2></a>";
        $formattedPrice = number_format($vehicle['invPrice'], 2);
        $dv .= "<span>$formattedPrice</span>";
        $dv .= '</li>';
    }
    $dv .= '</ul>';
    $dv .= '</div>';
    return $dv;
}

function buildVehicleDetailDisplay($vehicle,$vehicleImages) {
  $dv = "<h2>$vehicle[invMake] $vehicle[invModel]</h2>";

  $dv .= '<div class="vehicle-detail">';
  $dv .= '<div>';
foreach ($vehicleImages as $thumbnails) {
  $dv .= "<img class='secondary-image' src='$thumbnails[imgPath]' alt='Image of $vehicle[invMake] $vehicle[invModel]'>";
}
  $dv .= "<img class='vehicle-large-image' src='$vehicle[invImage]' alt='Image of $vehicle[invMake] $vehicle[invModel]'>";
  $dv .= '</div>';

  $dv .= '<div class="vehicle-data">';
  $dv .= "<h2>$vehicle[invMake] $vehicle[invModel] Details</h2>";
  $dv .= "<p class='gray'>$vehicle[invDescription]</p>";
  $dv .= "<p>Color:$vehicle[invColor]</p>";
  $dv .= "<p class='gray'># in Stock:$vehicle[invStock]</p>";
  $formattedPrice = number_format($vehicle['invPrice'],2);
  $dv .= "<p>Price: $ $formattedPrice</p>";
  $dv .= '  <h4>Vehicle reviews can be seen at the bottom of the page</h4>';
  $dv .= '</div></div>';

  return $dv;
}

function buildReviewForm($screenName, $invId, $clientId) {

   $reviewForm = '<form action="/phpmotors/reviews/index.php" method="post">';
   $reviewForm .= '<fieldset>';
   $reviewForm .= '<legend>Review:</legend>';
   $reviewForm .= '<label for="screenName">Screen Name</label><br>';
   $reviewForm .= "<input type='text' id='screenName' name='screenName' value='$screenName' required readonly><br>";
   $reviewForm .= '<label for="reviewText">Review</label><br>';
   $reviewForm .= '<textarea id="reviewText" name="reviewText" required></textarea><br>';
   $reviewForm .= '<input type="submit" name="submit" value="Submit Review" id="signInButton"><br>';
   $reviewForm .= "<input type='hidden' name='invId' value='$invId'>";
   $reviewForm .= "<input type='hidden' name='clientId' value='$clientId'>";
   $reviewForm .= '<input type="hidden" name="action" value="new-review">';
   $reviewForm .= '</fieldset>';
   $reviewForm .= '</form>';

   return $reviewForm;
}

function buildDeleteForm($reviewData, $reviewId) {
   $deleteForm = '';
   $deleteForm .= '<div id="review-text">';
   $deleteForm .= "$reviewData[reviewText]";
   $deleteForm .= '</div>';
   $deleteForm .= '<div>';
   $deleteForm .= "<a href='/phpmotors/reviews/index.php?action=delete-review&reviewId=$reviewId'>Delete Review</a>";
   $deleteForm .= '</div>';

   return $deleteForm;
}

function buildEditForm($reviewData, $reviewId) {
   $editForm = '';
   $editForm .= '<div class="review-box">';
   $editForm .= "<form action='/phpmotors/reviews/index.php' method='POST'>";
   $editForm .= "<TEXTarea name='updateReviewText'>$reviewData[reviewText]</TEXTarea>";
   $editForm .= "<input type='submit' value='Update Review'>";
   $editForm .= "<input type='hidden' name='action' value='update-review'>";
   $editForm .= "<input type='hidden' name='reviewId' value='$reviewId'>";
   $editForm .= "</form>";
   $editForm .= "</div>";

   return $editForm;
}

function createReviewList($specificVehicleReviewData) {
    $reviewList = '<div>';

    foreach ($specificVehicleReviewData as $eachReview) {
        $clientFullname = substr($eachReview['clientFirstname'], 0, 1) . $eachReview['clientLastname'];
        $reviewList .= '<div>';
        $reviewList .= "<p>$clientFullname wrote on $eachReview[reviewDate] </p>";
        $reviewList .= "<h2>Review: $eachReview[reviewText] </h2>";
        $reviewList .= '</div>';
    }

    $reviewList .= '</div>';

    return $reviewList;
}

/* * ********************************
*  Functions for working with images
* ********************************* */

// Adds "-tn" designation to file name
function makeThumbnailName($image) {
   $i = strrpos($image, '.');
   $image_name = substr($image, 0, $i);
   $ext = substr($image, $i);
   $image = $image_name . '-tn' . $ext;
   return $image;
}

// Build images display for image management view
function buildImageDisplay($imageArray) {
   $id = '<ul id="image-display">';
   foreach ($imageArray as $image) {
    $id .= '<li>';
    $id .= "<img src='$image[imgPath]' title='$image[invMake] $image[invModel] image on PHP Motors.com' alt='$image[invMake] $image[invModel] image on PHP Motors.com'>";
    $id .= "<p><a href='/phpmotors/uploads?action=delete&imgId=$image[imgId]&filename=$image[imgName]' title='Delete the image'>Delete $image[imgName]</a></p>";
    $id .= '</li>';
  }
   $id .= '</ul>';
   return $id;
}


// Build the vehicles select list
function buildVehiclesSelect($vehicles) {
   $prodList = '<select name="invId" id="invId">';
   $prodList .= "<option>Choose a Vehicle</option>";
   foreach ($vehicles as $vehicle) {
    $prodList .= "<option value='$vehicle[invId]'>$vehicle[invMake] $vehicle[invModel]</option>";
   }
   $prodList .= '</select>';
   return $prodList;
}

function buildCarsDisplay($cars) {
   $price = number_format($cars['invPrice'], 0);

   $dc = '<div id="car-display">';
   $dc .= "<div>";

   foreach($cars["images"] as $car_image){
       $dc .= "<img src='".$car_image['imgPath']."' alt='Image of $cars[invMake] $cars[invModel] on phpmotors.com'>";
   }

   $dc .= "<h1>Price : $ $price</h1>";

   $dc .= "</div>";
   $dc .= "<div>";
   $dc .= "<h2>$cars[invMake] - $cars[invModel] Details</h2>";
   $dc .= "<p>$cars[invDescription]</p>";
   $dc .= "<p><b>Color:</b> $cars[invColor]</p>";
   $dc .= "<p><b># in stock:</b> Only $cars[invStock] more left!</p>";
   $dc .= "</div>";
   $dc .= '</div>';
   return $dc;
} 

// build client review list
function createClientReviewList($clientReviews)
{
    $clientReviewList = '<div class="clientReivew-display">';
    $clientReviewList .= '<ul>';
    foreach ($clientReviews as $eachReview) {
        
        $clientReviewList .= "<li>$eachReview[invMake] $eachReview[invModel]";
        $clientReviewList .= "<span> (Reviewed On $eachReview[reviewDate]): </span>";
        $clientReviewList .= "<a href='../reviews/index.php?action=edit-review&reviewId=$eachReview[reviewId]'>Edit</a>";
        $clientReviewList .= "<span> | </span>";
        $clientReviewList .= "<a href='../reviews/index.php?action=delete-review-confirm&reviewId=$eachReview[reviewId]'>Delete</a>";
        $clientReviewList .= '</li>';
    }
    $clientReviewList .= '</ul>';
    $clientReviewList .= '</div>';

    return $clientReviewList;
}

// Handles the file upload process and returns the path
// The file path is stored into the database
function uploadFile($name) {
   // Gets the paths, full and local directory
   global $image_dir, $image_dir_path;
   if (isset($_FILES[$name])) {
    // Gets the actual file name
    $filename = $_FILES[$name]['name'];
    if (empty($filename)) {
     return;
    }
   // Get the file from the temp folder on the server
   $source = $_FILES[$name]['tmp_name'];
   // Sets the new path - images folder in this directory
   $target = $image_dir_path . '/' . $filename;
   // Moves the file to the target folder
   move_uploaded_file($source, $target);
   // Send file for further processing
   processImage($image_dir_path, $filename);
   // Sets the path for the image for Database storage
   $filepath = $image_dir . '/' . $filename;
   // Returns the path where the file is stored
   return $filepath;
   }
  }

  // Processes images by getting paths and 
// creating smaller versions of the image
function processImage($dir, $filename) {
   // Set up the variables
   $dir = $dir . '/';
  
   // Set up the image path
   $image_path = $dir . $filename;
  
   // Set up the thumbnail image path
   $image_path_tn = $dir.makeThumbnailName($filename);
  
   // Create a thumbnail image that's a maximum of 200 pixels square
   resizeImage($image_path, $image_path_tn, 200, 200);
  
   // Resize original to a maximum of 500 pixels square
   resizeImage($image_path, $image_path, 500, 500);
}

// Checks and Resizes image
function resizeImage($old_image_path, $new_image_path, $max_width, $max_height) {
     
   // Get image type
   $image_info = getimagesize($old_image_path);
   $image_type = $image_info[2];
  
   // Set up the function names
   switch ($image_type) {
   case IMAGETYPE_JPEG:
    $image_from_file = 'imagecreatefromjpeg';
    $image_to_file = 'imagejpeg';
   break;
   case IMAGETYPE_GIF:
    $image_from_file = 'imagecreatefromgif';
    $image_to_file = 'imagegif';
   break;
   case IMAGETYPE_PNG:
    $image_from_file = 'imagecreatefrompng';
    $image_to_file = 'imagepng';
   break;
   default:
    return;
  } // ends the swith
  
   // Get the old image and its height and width
   $old_image = $image_from_file($old_image_path);
   $old_width = imagesx($old_image);
   $old_height = imagesy($old_image);
  
   // Calculate height and width ratios
   $width_ratio = $old_width / $max_width;
   $height_ratio = $old_height / $max_height;
  
   // If image is larger than specified ratio, create the new image
   if ($width_ratio > 1 || $height_ratio > 1) {
  
    // Calculate height and width for the new image
    $ratio = max($width_ratio, $height_ratio);
    $new_height = round($old_height / $ratio);
    $new_width = round($old_width / $ratio);
  
    // Create the new image
    $new_image = imagecreatetruecolor($new_width, $new_height);
  
    // Set transparency according to image type
    if ($image_type == IMAGETYPE_GIF) {
     $alpha = imagecolorallocatealpha($new_image, 0, 0, 0, 127);
     imagecolortransparent($new_image, $alpha);
    }
  
    if ($image_type == IMAGETYPE_PNG || $image_type == IMAGETYPE_GIF) {
     imagealphablending($new_image, false);
     imagesavealpha($new_image, true);
    }
  
    // Copy old image to new image - this resizes the image
    $new_x = 0;
    $new_y = 0;
    $old_x = 0;
    $old_y = 0;
    imagecopyresampled($new_image, $old_image, $new_x, $new_y, $old_x, $old_y, $new_width, $new_height, $old_width, $old_height);
  
    // Write the new image to a new file
    $image_to_file($new_image, $new_image_path);
    // Free any memory associated with the new image
    imagedestroy($new_image);
    } else {
    // Write the old image to a new file
    $image_to_file($old_image, $new_image_path);
    }
    // Free any memory associated with the old image
    imagedestroy($old_image);
  } // ends resizeImage function

?>