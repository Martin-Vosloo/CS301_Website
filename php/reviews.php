<?php

session_start();

require_once "../php/connection.php";
include_once "../php/alert.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
// check if all required fileds are on point before storing them
if(empty($_POST['name']) /* || empty($_POST['rating']) */|| empty($_POST['review'])){
    $_SESSION[alert] = [
        'type' => 'error',
        'message' => 'Please fill in all required fields!'
        ];
    header("Location:../html/index.php");
    exit();
}

// make sure the file size is not too large and the user uploads the specified types
if(!empty($_FILES['image']['name'])){
    // get temporal location of the image and its size
    $review_image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $image_max_size = 2 * 1024 * 1024;
    $review_image_size = $_FILES['image']['size'];
    $review_imagetype = $_FILES['image']['type'];

    // store types of images
    $image_allowed_types = ["image/png", "image/jpeg"];

    if(!in_array($review_imagetype, $image_allowed_types)){
        // $feedback_message = "Only .png, .jpg, .jpeg types are allowed";
        $_SESSION[alert] = [
        'type' => 'error',
        'message' => 'Only .png, .jpg, .jpeg types are allowed!'
        ];
        header("Location:../html/index.php");
        exit();
    }

    if($review_image_size > $image_max_size){
        // $feedback_message = 'Image is too large';
        $_SESSION[alert] = [
        'type' => 'error',
        'message' => 'Image is too large!'
        ];
        header("Location:../html/index.php");
        exit();
    }

    // move image from the tempo location to the right folder(image folder) 
    // and report back to the user 
    $image_path = "../images/reviews images/" . $review_image;
    if(move_uploaded_file($tmp_name, $image_path)){
        // $feedback_message = "Image uploaded successfully";
        $_SESSION[alert] = [
        'type' => 'success',
        'message' => 'Image uploaded successfully!'
        ];
    
    
    }else{
        $_SESSION[alert] = [
        'type' => 'error',
        'message' => 'Failed to upload image!'
        ];
        header("Location:../html/index.php");
        exit();
    }
    
}


// store the data from html form 
$review_name = clean($_POST['name']);
//$review_rating = $_POST['rating'];
$review_text = clean($_POST['review']);
$review_email = clean($_POST['email']);
$review_insta = clean($_POST['insta']);


// if(empty($feedback_message)){
     $_SESSION['alert'] = [
        'type' => 'success',
        'message' => 'Review submitted successfully!'
        ];
        header("Location:../html/index.php");
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