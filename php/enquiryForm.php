<?php

session_start();

require_once "../php/connection.php";
include_once "../php/alert.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
// check if all required fileds are on point before storing them
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['date']) || empty($_POST['services'] ) || empty($_POST['preferences'])){
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Please fill in all required fields!'
        ];
    header("Location:../html/index.php");
    exit();
}

// store the data from html form 
$review_name = clean($_POST['name']);
$review_email = clean($_POST['email']);
$review_phone = clean($_POST['phone']);
$review_date = clean($_POST['date']);
$review_services = clean($_POST['services']);
$review_preferences = clean($_POST['preferences']);



// add to the reviews table
$sql = "INSERT INTO reviews(booking_id, idNo, text_review, image) VALUES (?, ?, ?, ?, ?)";

//bind parameters
if($stmt = $conn->prepare($sql)){
$stmt->bind_param("sssss",
    $review_name,
    $review_email,
    $review_phone,
    $review_date ,
    $review_end_date,

    );
}
 $_SESSION['alert'] = [
    'type' => 'success',
    'message' => 'Booking is submitted successfully!'
    ];
    header("Location:../html/index.php");
    exit();

// $_SESSION['feedback'] = $feedback_message;
 // test whatever typed in the form is what the backend receives
// var_dump($_POST);
// header("Location:../html/reviews.php");
// exit();


}

?>