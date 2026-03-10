<?php
session_start();


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $feedback_message = "";
// check if all required fileds are on point before storing them
if(empty($_POST['name']) || empty($_POST['rating']) || empty($_POST['review'])){
    $feedback_message = 'Please fill in all required fields';

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
        $feedback_message = "Only .png, .jpg, .jpeg types are allowed";
    }

    if($review_image_size > $image_max_size){
        $feedback_message = 'Image is too large';
    }

    // move image from the tempo location to the right folder(image folder) 
    // and report back to the user 
    $image_path = "../images/reviews images/" . $review_image;
    if(move_uploaded_file($tmp_name, $image_path)){
        $feedback_message = "Image uploaded successfully";
    
    }else{
        $feedback_message = "Failed to upload image";
    }
    
}

// store the data from html form 
$review_name = $_POST['name'];
$review_rating = $_POST['rating'];
$review_text = $_POST['review'];

if(empty($feedback_message)){
    $feedback_message = "Review submitted successfully!";
}
$_SESSION['feedback'] = $feedback_message;
 // test whatever typed in the form is what the backend receives
// var_dump($_POST);
header("Location:../html/reviews.php");
exit();


}

?>