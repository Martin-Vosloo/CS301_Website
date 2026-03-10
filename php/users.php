<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (!$DB = new PDO("mysql:host=localhost;dbname=XXXX", "root", "")) {
        die ("Could not connect to database");
    }

    private function create_userid(){
        $length = rand(4, 20);
        $number = "";
        for($i=0; $i < $length; $i++){
            $new_rand = rand(0, 9);
            $number = $number . $new_rand;
        }
        return $number;
    }

    $arr['fname'] = $_POST['name'];
    $arr['lname'] = $_POST['name'];
    $arr['email_address'] = $_POST['email_address'];
    $arr['passwrd'] = hash('sha1', $POST['passwrd']);
    $arr['admin'] = 0;
}

?>