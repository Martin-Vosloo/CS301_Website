<?php
$server = 'CS3-DEV.ICT.RU.AC.ZA';
$user = 'G21M4333';
$password = 'ModChu21';
$dbname = 'group3';
$conn;
$conn = new mysqli($server, $user);
if ($conn->connect_error) {
    header('HTTP/1.1 404 Not Found');
    die();
}
// echo 'Connected';

function clean($text){
    //using cleaner class and the usual stuff for the forms
    // $conf = HTMLPurifier_Config::createDefault();
    // $purifier = new HTMLPurifier($conf);
    return htmlspecialchars(stripslashes(trim(/*$purifier->purify(*/$text)));
}
