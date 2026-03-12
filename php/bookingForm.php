<?php

session_start();

require_once "../php/connection.php";
include_once "../php/alert.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
// check if all required fileds are on point before storing them
if(empty($_POST['name1']) || empty($_POST['email']) || empty($_POST['check-in']) || empty($_POST['check-out']) || empty($_POST['services'] ) ){
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Please fill in all required fields!'
        ];
    header("Location:../html/booking.php");
    exit();
}

// store the data from html form 
$review_name1 = clean($_POST['name1']);
$review_name2 = clean($_POST['name2']);
$review_email = clean($_POST['email']);
$review_phone = clean($_POST['phone']);
$review_check_in = clean($_POST['check-in']);
$review_check_out = clean($_POST['check-out']);
$review_services = clean($_POST['services']);
$review_text = clean($_POST['text']);

  

// add to the booking table
$sql = "INSERT INTO booking(booking_id, idNo, number_of_people, start_Date, duration, full_catering, photographer, lodging, wedding_preference) VALUES (?, ?, ?, ?, ?,?,?,?,?)";

//bind parameters
if($stmt = $conn->prepare($sql)){
$stmt->bind_param("sssssssss",
    $review_name1,
    $review_name2,
    $review_email,
    $review_phone,
    $review_check_in ,
    $review_check_out,
    $review_services,
    $review_text

    );
}

 $_SESSION['alert'] = [
    'type' => 'success',
    'message' => 'Booking is submitted successfully!'
    ];
    header("Location:../html/booking.php");
    exit();

// $_SESSION['feedback'] = $feedback_message;
 // test whatever typed in the form is what the backend receives
// var_dump($_POST);
// header("Location:../html/reviews.php");
// exit();


}

?>