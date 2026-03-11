  <?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  session_start();

  require '../php/connection.php';

  $error = '';

  // function clean($text)
  // {
  //   return htmlspecialchars(stripslashes(trim($text)));
  // }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = clean($_POST['fname']);
    $lname = clean($_POST['lname']);
    $email_address = clean($_POST['email_address']);
    $password = clean($_POST['password']);  // match the input name
    $password_conf = clean($_POST['password_conf']);

    // Check passwords match
    if ($password !== $password_conf) {
      $error = 'Passwords do not match';
    } else {
      $password_hashed = hash('sha1', $password);
      $role = 'user';

      // Insert user into DB (id auto-increment)
      $query = 'insert into users (fname, lname, email_address, password, role) VALUES (?, ?, ?, ?, ?)';
      $stm = $conn->prepare($query);

      if ($stm) {
        $stm->bind_param('sssss', $fname, $lname, $email_address, $password_hashed, $role);

        if ($stm->execute()) {
          header('Location: ../html/index.php');
          exit;
        } else {
          $error = 'Could not save to database: ' . $conn->error;
        }
      } else {
        $error = 'Database error: ' . $conn->error;
      }
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
        <br>
        <a href="signIn.php">If you already have an account, sign in here.</a>
      </p>
    </form>
  </main>

  <!-- FOOTER contained in external file -->
  <?php include 'footer.php' ?>

  
</body>
</html>

<!-- create table users(
    id varchar(20) primary key auto increment,
    fname varchar(50),
    lname varchar(50),
    email_address varchar(40),
    password varchar(20),
    role varchar(20),
    alive bit default true,
    constraint fname_format check (fname REGEXP '^[A-Za-z]+([ -]?[A-Za-z]+)*$'),
    constraint lname_format check (lname REGEXP '^[A-Za-z]+([ -]?[A-Za-z]+)*$'),
    constraint email_format check (email_address REGEXP '^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$'),
    constraint password_length check (char_length(password) between 8 and 20)
); -->