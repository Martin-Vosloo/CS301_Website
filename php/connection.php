<?php
// Point tot the vendor folder in your root
require_once  dirname(__DIR__) . '/vendor/autoload.php';

// load the .env file from the root
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$server = 'CS3-DEV.ICT.RU.AC.ZA';
$user = 'G21M4333';
$password = 'ModChu21';
$dbname = 'group3';
$conn = new mysqli($server, $user, $password, $dbname);
if ($conn->connect_error) {
    header('HTTP/1.1 404 Not Found');
    die();
}
// echo 'Connected';

function clean($text)
{
    return htmlspecialchars(stripslashes(trim($text)), ENT_QUOTES, 'UTF-8');
}


?>
