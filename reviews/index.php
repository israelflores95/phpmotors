<?php
// Start of reviews controller

session_start();

/*
* reviews controller 
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
    case 'new-review': // Add a new review.
        $screenName = filter_input(INPUT_POST, 'screenName', FILTER_SANITIZE_STRING);
        $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
        date_default_timezone_set("America/Denver");
        $d = strtotime("now");
        $reviewDate = date("Y-m-d H:i:s", $d);

        $reviewForm = buildReviewForm($screenName, $invId, $clientId);


        //data checks
        if (empty($screenName) || empty($reviewText)) {

            $specificVehicleReviewData = getVehicleReviews($invId); // check if the vehicle has any data or not, display the "Be the first to write..." if it is empty
            $submitMessage = '<p>Please provide information for the review text field.</p>';
            include '../view/vehicle-detail.php';
            exit;
        }

        $submitReviewOutcome = insertReview($reviewText, $reviewDate, $invId, $clientId);

        if ($submitReviewOutcome === 1) {
            $submitMessage = "<p'>Thanks for the review. It is displayed below!</p>";

            // grab all the vehicle's data based on the id
            $specificVehicleReviewData = getVehicleReviews($invId);
            $reviewList = createReviewList($specificVehicleReviewData);
            $_SESSION['reviewList'] =  $reviewList;

            include '../view/admin.php';
            exit;
        } else {
            $submitMessage  = "<p'>Sorry, the review submission failed. Please try again.</p>";
            include '../view/vehicle-detail.php';
            exit;
        }

        include '../view/vehicle-detail.php';
    break;

    case 'edit-review': // Deliver a view to edit a review.
        $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_SANITIZE_NUMBER_INT); // get the reviewId from functions.php
        $reviewData = getSpecificReview($reviewId);

        $editReview = buildEditForm($reviewData, $reviewId); 

        include '../view/review-update.php';
    break;

    
    case 'update-review': // Handle the review update.
        $reviewText = filter_input(INPUT_POST, 'updateReviewText', FILTER_SANITIZE_STRING);
        $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);

                // Check for missing data
                if (empty($reviewText)) {
                    $message = '<p class="notice-bad">Please provide missing information for the review text.</p>';
                    include '../view/review-update.php';
                    exit;
                }
        
                // Send the data to the model, will return the rowsChanged
                $updateReview = updateReview($reviewId, $reviewText);

                //var_dump($reviewTex, $reviewId);
        
                // Check and report the result
                if ($updateReview === 1) {
                    $message = "<p class='notice-good'>Congratulations, the review was successfully updated.</p>";
            
                    include '../view/admin.php';
                    exit;
                } else {
                    $message = "<p class='notice-bad'>Sorry, the review wasn't updated successfully. Please try again.</p>";
                    include '../view/review-update.php';
                    exit;
                }

        include '../view/review-update.php';
    break;

    case 'delete-review': // Handle the review deletion.
        $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
        $deleteStatus = deleteReview($reviewId);

        if ($deleteStatus === 1) {
            $message = '<h3 class="notice-good">*Review has been deleted</h3>';
        } else {
            $message = '<h3 class="notice-bad">*There was an error and your review was not deleted, please try again.</h3>';
        }

        include '../view/review-delete.php';
    break;

    case 'delete-review-confirm': // Deliver a view to confirm deletion of a review.
        $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_SANITIZE_NUMBER_INT); // get the reviewId from functions.php
        $reviewData = getSpecificReview($reviewId);

        $deleteReview = buildDeleteForm($reviewData, $reviewId);         

        include '../view/review-delete.php';
    break;

    default:  // A default that will deliver the "admin" view if the client is logged in or the php motors home view if not.
        include '../view/admin.php';
 };
?>