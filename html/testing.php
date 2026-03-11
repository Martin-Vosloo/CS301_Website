<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Us | Kampvuur en Konfetti</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="../css/style.css" />
</head>
<body class="about-body">
  <nav class="navigation-bar">
    <article class="logo-image">
      <a href="index.html"><img src="../images/logo/logo1.png" alt="Relationship Advice logo" /></a>
    </article>

    <article class="navigation-links">
      <a href="index.html">Home</a>
      <a href="reviews.html">Reviews</a>
      <a href="about.html">About</a>
      <a href="booking.html">Book</a>
      <a href="contact.html">Contact</a>
      <a href="administrator.html">Admin</a>
      <?php include_once '../php/databaseCreation.php'?> 
    </article>

    <article class="navigation-btns">
      <a href="signIn.html" class="nav-btn">Sign In</a>
      <a href="signUp.html" class="nav-btn">Sign Up</a>
    </article>
  </nav>

  <main class="about-main">
    <section class="container">
      <article>
        <img src="../images/venue/reception_table5.jpg" alt="Image of venue" />
      </article>

      <article class="about-paragraph-container">
        <h1 class="about-heading">Visit Us</h1>
        <p class="about-paragraph">
          Founded in 2026, our wedding venue was created with a clear vision to provide an elegant space where meaningful celebration comes to life.
          With attention to detail and a commitment to excellence, we strive to make every wedding seamless, meaningful, and truly memorable.
        </p>
        <button class="about-btn">Get Directions</button>
      </article>
    </section>

    <h1 class="about-heading mt-4">Our Team</h1>
    <hr />

    <section class="team-container">
      <section class="row-one">
        <section>
          <article>
            <img src="../images/authors/dylan1.jpg" alt="Photo of Dylan" class="team-photo" />
          </article>
          <article>
            <p>
              <b>Dylan McDonogh</b><br />Full-Stack Contributor<br />
              Email: <a href="mailto:dcmcdonogh@gmail.com">dcmcdonogh@gmail.com</a>
            </p>
          </article>
        </section>

        <section>
          <article>
            <img src="../images/authors/kago1.jpg" alt="Photo of Kago" class="team-photo" />
          </article>
          <article>
            <p>
              <b>Kago Songo</b><br />Full-Stack Contributor<br />
              Email: <a href="mailto:kagonsongo@gmail.com">kagonsongo@gmail.com</a>
            </p>
          </article>
        </section>

        <section>
          <article>
            <img src="../images/authors/martin1.jpg" alt="Photo of Martin" class="team-photo" />
          </article>
          <article>
            <p>
              <b>Martin Vosloo</b><br />Full-Stack Contributor<br />
              Email: <a href="mailto:martin.vos.1994@gmail.com">martin.vos.1994@gmail.com</a>
            </p>
          </article>
        </section>
      </section>

      <section class="row-two">
        <section>
          <article>
            <img src="../images/authors/chuma1.jpg" alt="Photo of Chuma" class="team-photo" />
          </article>
          <article>
            <p>
              <b>Chuma Modze</b><br />Full-Stack Contributor<br />
              Email: <a href="mailto:mrcmodze@gmail.com">mrcmodze@gmail.com</a>
            </p>
          </article>
        </section>

        <section>
          <article>
            <img src="../images/authors/nwabisa1.jpg" alt="Photo of Nwabisa" class="team-photo" />
          </article>
          <article>
            <p>
              <b>Nwabisa Malawu</b><br />Full-Stack Contributor<br />
              Email: <a href="mailto:malawunwabisa535@gmail.com">malawunwabisa535@gmail.com</a>
            </p>
          </article>
        </section>
      </section>
    </section>
  </main>

  <h1 class="about-heading mt-4">Contact Us</h1>
  <hr />

  <article>
    <p class="contactPageHeading"><b>General Enquiries</b></p>
    <a class="contactLink" href="tel:0123456789">Tel: 012 345 6789<br /></a>
    <a class="contactLink" href="tel:0987654321">Cel: 098 765 4321<br /></a>
  </article>
  <article>
    <p class="contactPageHeading"><b>General Email:</b></p>
    <a class="contactLink" href="mailto:generalmail@gmail.com">generalmail@gmail.com</a>
    <p class="contactPageHeading"><b>Accounts Email:</b></p>
    <a class="contactLink" href="mailto:accountsmail@gmail.com">accountsmail@gmail.com</a>
  </article>

  <footer>
    <p>
      <small>&#169; Copyright 2026 <i>Relationship-Advice</i>&trade;</small><br />
      <small>
        Authors: Dylan McDonogh, Kago Songo, Martin Vosloo, Chuma Modze, Nwabisa Malawu<br />
        Authors: <a href="about.html">Contact Details</a>
      </small>
    </p>
    <nav>
      <a href="index.html">Home</a>
      <a href="about.html">About Us</a>
      <a href="contact.html">Contact Us</a>
      <a href="reviews.html">Write a Review</a>
      <a href="booking.html">Book</a>
      <a href="administrator.html">Admin</a>
    </nav>
    <div class="social-icons">
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-youtube"></i></a>
      <a href="tel:+27123456789" class="contact-icon"><i class="fa-solid fa-phone"></i></a>
    </div>
  </footer>

  <script src="../JavaScript/slideshow.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
</body>
</html>