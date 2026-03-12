<?php
    session_start();
    
    $error = "";

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        if (!$DB = new PDO("mysql:host=localhost;dbname=XXXX", "root", ""))
        {
            die ("Could not connect to database");
        }

        $arr['email'] = clean($_POST['email']);
        $arr['password'] = hash('sha1', clean($_POST['password']));
        
        $query = "select * from users where user_id = :user_id limit 1";
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
                }
                else
                {
                    $error = "Wrong username or password";
                }
                
            }
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
?>