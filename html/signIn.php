<?php
session_start();
require '../php/connection.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email_address'];
  $password = hash('sha1', $_POST['passwrd']);

  $query = 'select * from users where email_address = ? AND passwrd = ? LIMIT 1';

  $stm = $conn->prepare($query);

  if ($stm) {
    $stm->bind_param('ss', $email, $password);
    $check = $stm->execute();

    if ($check) {
      $result = $stm->get_result();
      $user = $result->fetch_assoc();

      if ($user) {
        session_regenerate_id(true);

        $_SESSION['myid'] = $user['id'];
        $_SESSION['name'] = $user['fname'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] ==)
        header('Location: ../html/index.php');
        exit;
      } else {
        $error = 'Wrong username or password';
      }
    }
  }
}

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign In | Kampvuur en Konfetti</title>
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
<?php include 'navbar.php'; ?>

  <main class="sign-main">
    <form method="POST">
      <h1>Sign In</h1>

 <?php
if ($error) {
  echo "<br><span style='color:red'>$error</span><br><br>";
}
?>
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

      <div class="formButtons">
        <button type="submit" id="done">Sign In</button>
        <button type="button" onclick="location.href='index.html'" id="back">Back</button>
      </div>
      <br><br>

      <button type="button">Forgot password</button>
      <br><br>
      <a href="signUp.php">If you don't have an account, sign up here.</a>
    </form>
  </main>

  <!-- FOOTER contained in external file -->
  <?php include 'footer.php' ?>
</body>
</html>
