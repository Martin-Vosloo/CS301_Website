<?php

session_start();

require_once "../php/connection.php";
include_once "../php/alert.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
// check if all required fileds are on point before storing them
if(empty($_POST['name1']) || empty($_POST['name2']) || empty($_POST['email']) || empty($_POST['date']) || empty($_POST['guests'] ) || empty($_POST['text'])){
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Please fill in all required fields!'
        ];
    header("Location:../html/index.php");
    exit();
}

// store the data from html form 
$enquiry_name1 = clean($_POST['name1']);
$enquiry_name2 = clean($_POST['name2']);
$enquiry_email = clean($_POST['email']);
$enquiry_phone = clean($_POST['phone']);
$enquiry_date = clean($_POST['date']);
$enquiry_guests = clean($_POST['guests']);
$enquiry_text = clean($_POST['text']);



// add values to the enquiry table
$sql = "INSERT INTO enquiry( name, partner_s_name, email_address,phone_number, wedding_date, number_of_guests, vission_description) VALUES (?, ?, ?, ?, ?,?,?)";

//bind parameters
if($stmt = $conn->prepare($sql)){
$stmt->bind_param("sssssss",
    $enquiry_name1,
    $enquiry_name2,
    $enquiry_email,
    $enquiry_phone,
    $enquiry_date ,
    $enquiry_guests,
    $enquiry_text
    );
}
$stmt->execute();
$_SESSION['alert'] = [
        'type' => 'success',
        'message' => 'Thank you! We cant wait to hear more about your day!'
    ];
    header("Location:../html/index.php");
    exit();

// $_SESSION['feedback'] = $feedback_message;
 // test whatever typed in the form is what the backend receives
// var_dump($_POST);
// header("Location:../html/enquirys.php");
// exit();


}

?>