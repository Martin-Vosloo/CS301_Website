<?php
    $error = "";

    private function create_userid(){
        $length = rand(4, 20);
        $number = "";
        for($i=0; $i < $length; $i++){
            $new_rand = rand(0, 9);
            $number = $number . $new_rand;
        }
        return $number;
    }
    
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (!$DB = new PDO("mysql:host=localhost;dbname=XXXX", "root", "")) {
        die ("Could not connect to database");
    }
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    $arr['user_id'] = create_userid();
    
    $query = "select * from users where user_id = :user_id limit 1";
    $stm = $DB->prepare($query);

    if ($stm) {
        $check = $stm->execute($arr);
        if ($check) {
            $data = $stm->fetchAll(PDO::FETCH_ASSOC);
            if (is_array($data) && count($data) > 0) {
                $arr['user_id'] = create_userid();
                continue;   
            }
        }
    }

    $arr['fname'] = $_POST['name'];
    $arr['lname'] = $_POST['name'];
    $arr['email_address'] = $_POST['email_address'];
    $arr['passwrd'] = hash('sha1', $POST['passwrd']);
    $arr['user_role'] = 0;
    
    $query = "insert into users (user_id, fname, lname, email_address, passwrd, user_role) values (:user_id, :fname, :lname, :email_address, :passwrd, :user_role)";
    $stm = $DB->prepare($query);
    
    if ($stm) {
        $check = $stm->execute($arr);
        if (!$check) {
            $error = "Could not save to database";
        }
        if ($error = ""){
            header("Location: login.php");
        }
    }
    if ($error != '') {
        echo "<br><span style='color:red'>$error</span><br><br>";
    }
}
?>