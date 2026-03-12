<?php

session_start();

require_once "../php/connection.php";
include_once "../php/alert.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
// check if all required fileds are on point before storing them
if(empty($_POST['checkin']) || empty($_POST['checkout']) ){
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Please fill in all required fields!'
        ];
    header("Location:../html/booking.php");
    exit();
}

if(empty($_POST['catering1']) &&  empty($_POST['catering2'])){
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Please select atleast one field on the required services!'
        ];
    header("Location:../html/booking.php");
    exit();


}

// store the data from html form 
$review_check_in = clean($_POST['checkin']);
$review_check_out = clean($_POST['checkout']);
$review_full_catering = clean($_POST['catering']);
$review_photographer = clean($_POST['photography']);
$review_lodging = clean($_POST['accommodation']);
$review_text = clean($_POST['preferences']);

  

// add to the booking table
$sql = "INSERT INTO booking( user_id, start_Date, end_date, catering, accommodation, photography, text) VALUES (?, ?, ?, ?, ?,?,?,?,?)";

//bind parameters
if($stmt = $conn->prepare($sql)){
$stmt->bind_param("sssssssss",
     $_SESSION['myid']
    $review_check_in ,
    $review_check_out,
    $review_full_catering,
    $review_lodging 
    $review_photographer,
    $review_text

    );
}
$stmt->execute();
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