<?php // Creation of a PHP Document

/* This document will contain all function that validate the input of the users
   validate_name()- checks whether the input is empty and sends a message if left empty
   This function is applicable for Names, email, preferneces and Phone numbers
    */

function validate_name($value, $field_name) {
    if (strlen(trim($value)) == 0) {
        echo "Please enter your $field_name";
    } else {
        echo "Accepted";
    }

} // validates input section is not left empty by user


function validate_email($email) {

    $emailRegex = "/^\S+@\S+\.\S+$/";

    if (strlen(trim($email)) == 0) {
        return "Email address cannot be left blank.";
    } 
    elseif (!preg_match($emailRegex, $email)) {
        return "Please enter a valid email address.";
    } 
    else {
        return "";
    }

}// checking if the email is valid

$email = $_POST["email"];

$error = validate_email($email);

if ($error != "") {
    echo $error;
} else {
    echo "Valid email";
}

function validate_catering() {

}

function validate_phone($phone) {

    $digitsOnly = preg_replace("/\D/", "", $phone); // remove non-digits

    if (strlen(trim($phone)) == 0) {
        return "Phone number cannot be left blank.";
    } 
    elseif (strlen($digitsOnly) != 10) {
        return "The phone number must be exactly 10 digits.";
    } 
    else {
        return "Valid phone number.";
    }
}

?>