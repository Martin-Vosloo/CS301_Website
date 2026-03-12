<footer>
    <p>
      <small>&#169; Copyright 2026 <i>Relationship-Advice</i>&trade;</small><br />
      <small>
        Authors: Dylan McDonogh, Kago Songo, Martin Vosloo, Chuma Modze, Nwabisa Malawu<br />
        Authors: <a href="about.php">Contact Details</a>
      </small>
    </p>
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
    </div>
  </footer>
