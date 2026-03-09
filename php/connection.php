<?php
private $server = "localhost";
private $user = "username";
private $password = "******";
private $conn;
$this->conn = new mysqli($this->server, $this->user, $this->password);
if($conn->connect_erorr){
    die("Connection failed ". $conn->connect_erorr);
}
echo "Connected";
