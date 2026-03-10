<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kampvuur en Konfetti | Wedding Venue</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/popups.css" />
  <script src="../JavaScript/popups.js" defer></script>
</head>
<body class="home-body">
  
<!-- NAVBAR contained in external file -->
  <?php include 'navbar.php' ?>

  <section class="bc-img">
    <section class="popups">
      <div id="language-container">
        <p>This website's default language is English</p>
        <button id="accept-language-btn">Continue</button>
      </div>

      <div id="cookies-container">
        <p>This website uses cookies to improve your experience</p>
        <button id="accept-cookies-btn">Accept</button>
        <button id="reject-cookies-btn">Reject</button>
      </div>
    </section>

    <main>
      <h1 class="welcome-head"> <b>Welcome to Kampvuur en Konfetti </b></h1>
      <p class="landing-greet">
        <br><br><br><br>
        <!--A modern garden wedding and function venue designed for couples who seek something truly distinctive.<br />
        Create unforgettable memories in a peaceful and elegant outdoor setting.<br />
        Our venue blends natural beauty with modern comfort, making your special day unique.-->
      </p>

      <article class="cont-btns">
        <button class="about-btn1" onclick="location.href='contact.html'">Contact Us</button>
        <button class="about-btn2" onclick="location.href='about.html'">See Venue</button>
      </article>
    </main>
  </section>

  <section class="enga-text">
    <p class="enga-paragraph">
      Congratulations on your engagement. Celebrate your special day with us.<br />
      Here is what we offer.
    </p>
  </section>

  <section class="cards">
    <section class="card">
      <img src="../images/venue/catering2.jpeg" alt="Catering service" />
      <h3 class="card-heading">Catering</h3>
      <p class="card-text">Enjoy a delicious selection of meals prepared with fresh ingredients.</p>
      <a href="booking.html" class="book-btn-link">Book now</a>
    </section>

    <section class="card">
      <img src="../images/venue/photography.jpeg" alt="Wedding photography" />
      <h3 class="card-heading">Photography</h3>
      <p class="card-text">Capture every beautiful moment of your wedding day with us.</p>
      <a href="booking.html" class="book-btn-link">Book now</a>
    </section>

    <section class="card">
      <img src="../images/venue/reception_table5.jpg" alt="Wedding decor" />
      <h3 class="card-heading">Venue Decoration</h3>
      <p class="card-text">Elegant decorations designed to match your wedding vision.</p>
      <a href="booking.html" class="book-btn-link">Book now</a>
    </section>

    <section class="card">
      <img src="../images/venue/outside_chairs.jpg" alt="Accommodation" />
      <h3 class="card-heading">Accommodation</h3>
      <p class="card-text">Comfortable accommodation is available for you and your guests.</p>
      <a href="booking.html" class="book-btn-link">Book now</a>
    </section>
  </section>

  <article class="scrolltop">
    <button id="top-btn" title="go top">&uarr;</button>
  </article>

  <!-- FOOTER contained in external file -->
  <?php include 'footer.php' ?>

  <script src="../JavaScript/slideshow.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
</body>
</html>