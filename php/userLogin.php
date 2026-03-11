<?php
    session_start();
    
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
    $stm = $DB->prepare($query)

    if ($stm) {
        $check = $stm->execute($arr);
        if ($check) {
            $data = $stm->fetchAll(PDO::FETCH_ASSOC);
            if (is_array($data) && count($data) > 0) {
                
            }
            # code...
        }
    }

    $arr['email_address'] = $_POST['email_address'];
    $arr['passwrd'] = hash('sha1', $POST['passwrd']);
    
    $query = "select * from users where email_address = :email_address && passwrd = :passwrd limit 1";
    $stm = $DB->prepare($query)
    
    if ($stm)
    {
        $check = $stm->execute($arr);
        if ($check)
        {
            $data = $stm->fetchAll(PDO::FETCH_ASSOC);
            if (is_array($data) && count($data) > 0) 
            {
                $_SESSION['myid'] = $data[0]['user_id'];
                continue;   
            }
        }

        if (!$check) 
        {
            $error = "Wrong username or password";
        }

        if ($error = "")
        {
            header("Location: index.php")
        }
    }
}
?>