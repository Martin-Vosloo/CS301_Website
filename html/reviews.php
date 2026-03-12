<?php
session_start();
include_once '../php/alert.php';
$loggedIn = isset($_SESSION['myid']);
$displayName = $_SESSION['name'] ?? 'Guest';
?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Reviews | Kampvuur en Konfetti</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/reviews.css" />
</head>
<body class="reviews-page">
  
  <!-- NAVBAR contained in external file -->
  <?php include 'navbar.php' ?>

  <div class="page-content">
    <section class="hero-section">
      <div class="hero-image-side">
        <img src="../images/reviews/rev7.png" alt="Wedding couple" class="hero-image" />
      </div>
      <div class="hero-text-side">
        <h1>Do not <br> just say <br> I do</h1>
        <p class="tagline">Tell us what you think</p>
        <a href="#reviewForm" class="review-btn">Write a Review</a>
      </div>
    </section>

    <section class="services-section">
      <p class="section-small-title">What we offer</p>
      <h2>Every love story deserves to be told beautifully.</h2>
    </section>

    <section class="container">
      <article class="card">
        <div class="left">
          <h1>Bethany Jones</h1>
          <p>Absolutely amazing service. Everything was perfect!</p>
          <div class="stars">
            <span class="star filled">&#9733;</span><span class="star">&#9733;</span><span class="star">&#9733;</span><span class="star">&#9733;</span><span class="star">&#9733;</span>
          </div>
          <p class="handle">@reallygreatsite</p>
          <div class="social-icons">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-tiktok"></i></a>
          </div>
        </div>
        <div class="right"><img src="../images/reviews/rev4.png" alt="Couple walking" /></div>
      </article>
    </section>

    <section class="container">
      <article class="card">
        <div class="left">
          <h1>Christopher P.</h1>
          <p>Ek was die hele tyd in trane. Ek kon my oe nie glo nie! Alles was wonderlik en die kos was uitstekend. Ek sal nooit my ware dankbaarheid kan uitdruk nie!</p>
          <div class="stars">
            <span class="star filled">&#9733;</span><span class="star">&#9733;</span><span class="star">&#9733;</span><span class="star">&#9733;</span><span class="star">&#9733;</span>
          </div>
          <p class="handle">@therealChris</p>
          <div class="social-icons">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-x"></i></a>
            <a href="#"><i class="fab fa-tiktok"></i></a>
            <a href="#"><i class="fab fa-pinterest"></i></a>
          </div>
        </div>
        <div class="right"><img src="../images/reviews/rev1.png" alt="Couple walking" /></div>
      </article>
    </section>

    <section class="container">
      <article class="card">
        <div class="left">
          <h1>Dr Stones C.</h1>
          <p>Never thought this day would be as wonderful as it was! Best <i>Relationship advice</i> ever.</p>
          <div class="stars">
            <span class="star filled">&#9733;</span><span class="star">&#9733;</span><span class="star">&#9733;</span><span class="star">&#9733;</span>
          </div>
          <p class="handle">@theCS3lecturer</p>
          <div class="social-icons">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
          </div>
        </div>
        <div class="right"><img src="../images/reviews/rev2.png" alt="Couple walking" /></div>
      </article>
    </section>

    <section class="container">
      <article class="card">
        <div class="left">
          <h1>Felicia G.</h1>
          <p>Ek onthou dit soos gister! Ek is so gelukkig en ek is steeds!</p>
          <p>Die natuur, die uitsig... Beste plek om te trou!</p>
          <div class="stars">
            <span class="star filled">&#9733;</span><span class="star">&#9733;</span><span class="star">&#9733;</span>
          </div>
          <p class="handle">@theHotFelicia</p>
          <div class="social-icons">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-tiktok"></i></a>
          </div>
        </div>
        <div class="right"><img src="../images/reviews/rev3.png" alt="Couple walking" /></div>
      </article>
    </section>

    <section class="review-form-section" id="reviewForm">
      <p class="section-small-title">Share your experience</p>
      <h2>Leave Us a Review</h2>
      <?php if ($loggedIn): ?>
        <p class="mt-2">Signed in as <?php echo htmlspecialchars($displayName); ?>.</p>
      <?php else: ?>
        <p class="mt-2">
          Please <a href="signIn.php?redirect=../html/reviews.php">sign in</a> to submit a review.
        </p>
      <?php endif; ?>

      <form class="review-form" action="../php/reviews.php" method="post" enctype="multipart/form-data">
        <textarea placeholder="Tell us about your experience..." rows="5" name="review" required></textarea>
        <div class="rating" id="ratingStars">
          <span>Rating:</span>
          <button type="button" class="star-rev" data-value="1">&#9733;</button>
          <button type="button" class="star-rev" data-value="2">&#9733;</button>
          <button type="button" class="star-rev" data-value="3">&#9733;</button>
          <button type="button" class="star-rev" data-value="4">&#9733;</button>
          <button type="button" class="star-rev" data-value="5">&#9733;</button>
          <input type="hidden" name="rating" id="rating-value" value="0" required />
        </div>

        <label for="image">Upload Image</label>
        <input type="file" name="image" accept="image/png,image/jpeg" />

        <button type="submit" class="submit-review" <?php echo $loggedIn ? '' : 'disabled'; ?>>
          Submit Review
        </button>
      </form>
    </section>
  </div>

  <!-- FOOTER contained in external file -->
  <?php include 'footer.php' ?>

  <script>
    (function () {
      const stars = Array.from(document.querySelectorAll('.star-rev'));
      const ratingInput = document.getElementById('rating-value');
      if (!stars.length || !ratingInput) return;

      function setRating(value) {
        ratingInput.value = value;
        stars.forEach((star, index) => {
          star.classList.toggle('selected', index < value);
        });
      }

      stars.forEach((star) => {
        star.addEventListener('click', () => {
          const value = parseInt(star.getAttribute('data-value'), 10);
          if (!Number.isNaN(value)) {
            setRating(value);
          }
        });
      });
    })();
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
</body>
</html>
