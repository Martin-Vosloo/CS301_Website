<?php

session_start();

require_once "../php/connection.php";
include_once "../php/alert.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
// check if all required fileds are on point before storing them
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['start-date']) || empty($_POST['end-date']) || empty($_POST['services'] ) || empty($_POST['preferences'])){
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Please fill in all required fields!'
        ];
    header("Location:../html/booking.php");
    exit();
}

// store the data from html form 
$review_name = clean($_POST['name']);
$review_name = clean($_POST['email']);
$review_name = clean($_POST['phone']);
$review_name = clean($_POST['start-date']);
$review_text = clean($_POST['end-date']);
$review_email = clean($_POST['services']);
$review_insta = clean($_POST['preferences']);


// if(empty($feedback_message)){
     $_SESSION['alert'] = [
        'type' => 'success',
        'message' => 'Review submitted successfully!'
        ];
        header("Location:../html/reviews.php");
        exit();
// }


// add to the reviews table
$sql = "INSERT INTO reviews(id, user_id, text_review, image) VALUES (?, ?, ?, ?, ?)";

//bind parameters
$stmt->bind_param("sssss",
    $review_name,
    $review_text,
    $review_email,
    $insta,
    $review_image
);
$stmt->execute();

// $_SESSION['feedback'] = $feedback_message;
 // test whatever typed in the form is what the backend receives
// var_dump($_POST);
// header("Location:../html/reviews.php");
// exit();


}

?>