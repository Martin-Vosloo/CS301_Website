<!-- Remove navbar from each html/php page to remove code redundancies & improve efficiency -->

<?php
// Start browser session
// session_start();

// retrieve role & name from stored session info
$role = $_SESSION['role'] ?? null;
$name = $_SESSION['name'] ?? null;
?>

<!-- NAVBAR -->
<nav class="navigation-bar" id="navigation-bar">
  <!-- Logo -->
    <article class="logo-image">
      <a href="index.php"><img src="../images/logo/logo1.png" alt="Relationship Advice logo" /></a>
    </article>

    <!-- Navbar buttons/links -->
    <article class="navigation-links">
      <a href="index.php">Home</a>
      <a href="reviews.php">Reviews</a>
      <a href="about.php">About</a>
      <a href="booking.php">Book</a>
      <a href="gallery.php">Gallery</a>
      <!-- Show admin button if role = admin -->
      <?php if ($role === 'admin'): ?>
      <a href="administrator.php">Admin</a>
      <?php endif; ?>
    </article>

    <!-- logged in & profile buttons || Sign-in/up buttons -->
    <article class="navigation-btns">
      <!-- Buttons shown if logged in -->
  <?php if ($role): ?>
    <a href="profile.php" class="nav-btn">Hello, <?= htmlspecialchars($name) ?></a>
    <a href="../php/logout.php" class="nav-btn">Logout</a>
  <?php else: ?>
    <!-- Buttons shown if not logged in-->
    <a href="signIn.php" class="nav-btn">Sign In</a>
    <a href="signUp.php" class="nav-btn">Sign Up</a>
  <?php endif; ?>
</article>
</nav>
