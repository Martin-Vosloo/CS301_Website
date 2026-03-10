<?php
//this is to bve used once and alter to be for reference for the restrictions of the table

require_once "connection.php";
//this is the structure of the databse, explanations are at the top
/*
Note:
    # CHECK(CHAR_LENGTH(identityNumber) in (9,11,12,13,15,18) ), means that the length of the characters in the identityNumber feild is one the array values
    #constraints are restrictions for the datatypes for each feild and are enclosed in the constraint paranthesis
the password and usersa table are seperate
*/
$sql = "
    ";

if($conn ->query($sql)===TRUE){
    echo " done";
}else{
    echo " there's an error" . $conn->error;
}