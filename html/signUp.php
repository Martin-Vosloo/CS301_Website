<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up | Kampvuur en Konfetti</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="../css/style.css" />
  <link href="https://cdn.boxicons.com/3.0.8/fonts/basic/boxicons.min.css" rel="stylesheet" />
  <link href="https://cdn.boxicons.com/3.0.8/fonts/filled/boxicons-filled.min.css" rel="stylesheet" />
  <link href="https://cdn.boxicons.com/3.0.8/fonts/brands/boxicons-brands.min.css" rel="stylesheet" />
</head>
<body>
  <!-- NAVBAR contained in external file -->
  <?php
  include 'navbar.php';
  require "connection.php";

    $error = "";
    private function create_userid()
    {
        $length = rand(4, 20);
        $number = "";
        for($i=0; $i < $length; $i++){
            $new_rand = rand(0, 9);
            $number = $number . $new_rand;
        }
        return $number;
    }
    
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        if (!$DB = new PDO("mysql:host=localhost;dbname=XXXX", "root", ""))
        {
            die ("Could not connect to database");
        }

        $arr['user_id'] = create_userid();
        
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
                    $arr['userid'] = create_userid();
                    continue;
                }
            }
        }

        $arr['fname'] = $_POST['fname'];
        $arr['lname'] = $_POST['name'];
        $arr['email_address'] = $_POST['email_address'];
        $arr['passwrd'] = hash('sha1', $POST['passwrd']);
        $arr['user_role'] = "user ";
        
        $query = "insert into users (user_id, fname, lname, email_address, passwrd, user_role) values (:user_id, :fname, :lname, :email_address, :passwrd, :user_role)";
        
        $stm = $DB->prepare($query)
        
        if ($stm)
        {
            $check = $stm->execute($arr);
            if (!$check)
            {
                $error = "Could not save to database";
            }
            if ($error = "")
             {
                header("Location: login.php")
            }
        }
    }
    if ($error != '')
    {
      echo "<br><span style='color:red'>$error</span><br><br>";
    }


  ?>

  <main class="sign-main">
    <form action="#" method="post">
      <h1>Sign Up</h1>

      <label for="name">First Name</label>
      <div class="input_box">
        <i class="bx bx-user"></i>
        <input type="text" name="full_name" id="name" required placeholder="first name" />
      </div>
      
      <label for="name">Last Name</label>
      <div class="input_box">
        <i class="bx bx-user"></i>
        <input type="text" name="full_name" id="name" required placeholder="last name" />
      </div>

      <label for="email">Email Address</label>
      <div class="input_box">
        <i class="bx bx-envelope-open"></i>
        <input type="text" name="email" id="email" required placeholder="email address" />
      </div>

      <label for="password">Password</label>
      <div class="input_box">
        <i class="bx bx-lock-keyhole-open"></i>
        <input type="password" name="password" id="password" required placeholder="password" />
      </div>

      <label for="password_conf">Confirm password</label>
      <div class="input_box">
        <i class="bx bx-lock-keyhole"></i>
        <input type="password" name="password_conf" id="password_conf" required placeholder="confirm your password" />
      </div>

      <div class="formButtons">
        <button type="submit" id="signUp">Sign Up</button>
        <button type="button" onclick="location.href='index.html'" id="back">Back</button>
      </div>

      <p>
        <a href="signIn.html">If you already have an account, sign in here.</a>
      </p>
    </form>
  </main>

  <!-- FOOTER contained in external file -->
  <?php include 'footer.php' ?>

  <script src="../JavaScript/validation.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
</body>
</html>
