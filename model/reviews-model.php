<?php
// start of reviews model

// add a new review
function insertReview($reviewText, $reviewDate, $invId, $clientId) {
    //DB connection and sql to insert new review
    $db = phpmotorsConnect();
    $sql = 'INSERT INTO reviews (reviewText, reviewDate, invId, clientId)
    VALUES (:reviewText, :reviewDate, :invId, :clientId)';
    $stmt = $db->prepare($sql);

    //binding peramters into sql
    $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
    $stmt->bindValue(':reviewDate', $reviewDate, PDO::PARAM_STR);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);

    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged; // repeat back rows changed
}

// Get reviews for a specific inventory item
function getVehicleReviews($invId) {
    // DB connection and sql to get a specific vehicle reviews and by descending order
    $db = phpmotorsConnect();
    $sql = 'SELECT reviews.reviewText, reviews.reviewDate, clients.clientFirstname, clients.clientLastname FROM reviews LEFT JOIN clients ON reviews.clientId = clients.clientId WHERE invId = :invId 
    ORDER BY reviewDate DESC';
    $stmt = $db->prepare($sql);
    
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $vehicleReviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    return $vehicleReviews; // array with vehicle reviews
}

// Get reviews written by a specific client
function getClientReviews($clientId) {
    // DB connection and sql to all reviews by a specific client
    $db = phpmotorsConnect();
    $sql = 'SELECT reviews.reviewDate, reviews.reviewId, inventory.invMake, inventory.invModel FROM reviews LEFT JOIN inventory ON reviews.invId = inventory.invId WHERE clientId = :clientId 
    ORDER BY reviewDate DESC';
    $stmt = $db->prepare($sql);
    
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $clientReviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    return $clientReviews; //array with all client reviews
}

// Get a specific review
function getSpecificReview($reviewId) {
    // DB connection and sql for 1 specific review
    $db = phpmotorsConnect();
    $sql = 'SELECT reviews.reviewDate, reviews.reviewText, inventory.invMake, inventory.invModel FROM reviews LEFT JOIN inventory ON reviews.invId = inventory.invId WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $oneReviewData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    return $oneReviewData; // array with a single review data
}

// Update a specific review
function updateReview($reviewId, $reviewText) {
    // DB connection and sql to update a single review
    $db = phpmotorsConnect();
    $sql = 'UPDATE reviews SET reviewText = :reviewText WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);

    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();

    return $rowsChanged; // result can be a 0 or 1
}

// Delete a specific review
function deleteReview($reviewId) {
    $db = phpmotorsConnect();
    $sql = 'DELETE FROM reviews WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    
    return $rowsChanged;
}

?>