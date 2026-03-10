<?php
$server = 'CS3-DEV.ICT.RU.AC.ZA';
$user = "G21M4333";
$password = "ModChu21";
$dbname = 'group3';
$conn;
$conn = new mysqli($server, $user, $password, $dbname);
if($conn->connect_error){
    die("Connection failed ". $conn->connect_erorr);
}
echo "Connected";


function clean($text){
    return htmlspecialchars(stripslashes(trim($data)));
}
