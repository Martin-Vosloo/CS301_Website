  <?php

  require '../php/connection.php';

  $error = '';

  function create_userid()
  {
    $length = rand(9, 10);
    $number = '';
    for ($i = 0; $i < $length; $i++) {
      $new_rand = rand(0, 9);
      $number = $number . $new_rand;
    }
    return $number;
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $arr['identityNumber'] = create_userid();

    $query = 'select * from users where identityNumber = ?';
    $stm = $conn->prepare($query);
    $stm->bind_param('s', $arr['identityNumber']);

    if ($stm) {
      $check = $stm->execute();
      if ($check) {
        $result = $stm->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        if (is_array($data) && count($data) > 0) {
          $arr['userid'] = create_userid();
        }
      }
      // $check->close();
    }

    $arr['fname'] = clean($_POST['fname']);

    $arr['lname'] = clean($_POST['lname']);

    $arr['email_address'] = clean($_POST['email_address']);

    $arr['passwrd'] = hash('sha1', clean($_POST['passwrd']));

    // $arr['salt'] = XXXXXXXXXXXXXXXx

    $arr['role'] = 'user';

    $query = 'insert into users (identityNumber, fname, lname, email_address, passwrd, role) values (?, ?, ?, ?, ?, ?)';
    // $query = 'insert into users (identityNumber, fname, lname, email_address, passwrd) values (?, ?, ?, ?, ?)';
    $stm = $conn->prepare($query);

    $stm->bind_param('ssssss', $arr['identityNumber'], $arr['fname'], $arr['lname'], $arr['email_address'], $arr['passwrd'], $arr['role']);

    if ($stm) {
      $check = $stm->execute();
      if (!$check) {
        $error = 'Could not save to database';
      } else {
        header('Location: ../html/index.php');
        exit;
      }
    }
    if ($error != '') {
      echo "<br><span style='color:red'>$error</span><br><br>";
    }
  }

  ?>
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
  <script src="../JavaScript/validation.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
</head>
<body>
  <!-- NAVBAR contained in external file -->
<?php include 'navbar.php' ?>;

  <main class="sign-main">
    <form action="" method="post">
      <h1>Sign Up</h1>

      <label for="name">First Name</label>
      <div class="input_box">
        <i class="bx bx-user"></i>
        <input type="text" name="fname" id="fname" required placeholder="first name" />
      </div>
      
      <label for="name">Last Name</label>
      <div class="input_box">
        <i class="bx bx-user"></i>
        <input type="text" name="lname" id="lname" required placeholder="last name" />
      </div>

      <label for="email">Email Address</label>
      <div class="input_box">
        <i class="bx bx-envelope-open"></i>
        <input type="text" name="email_address" id="email_address" required placeholder="email address" />
      </div>

      <label for="password">Password</label>
      <div class="input_box">
        <i class="bx bx-lock-keyhole-open"></i>
        <input type="password" name="passwrd" id="passwrd" required placeholder="password" />
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
        <br>
        <a href="signIn.php">If you already have an account, sign in here.</a>
      </p>
    </form>
  </main>

  <!-- FOOTER contained in external file -->
  <?php include 'footer.php' ?>

  
</body>
</html>
