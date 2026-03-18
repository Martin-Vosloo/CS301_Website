<?php
require_once "connection.php";

/*
  Validation helpers for form input.
*/

function validate_name($value, $field_name)
{
    if (strlen(clean($value)) === 0) {
        return "Please enter your $field_name";
    }
    return '';
}

function validate_email($email)
{
    $emailRegex = "/^\S+@\S+\.\S+$/";

    if (strlen(trim($email)) === 0) {
        return "Email address cannot be left blank.";
    }
    if (!preg_match($emailRegex, $email)) {
        return "Please enter a valid email address.";
    }
    return '';
}

function validate_phone($phone)
{
    $digitsOnly = preg_replace("/\D/", "", $phone); // remove non-digits

    if (strlen(trim($phone)) === 0) {
        return "Phone number cannot be left blank.";
    }
    if (strlen($digitsOnly) !== 10) {
        return "The phone number must be exactly 10 digits.";
    }
    return '';
}
?>
