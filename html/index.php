<?php
session_start();
include_once "../php/alert.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Kampvuur en Konfetti</title>

  <!-- LINKS TO ALL EXTERNAL CSS LINKS USED, WHETHER IN FOLDER OR THE WEB-->
   
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;1,300;1,400&family=Jost:wght@300;400&display=swap" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="../css/popups.css" />
  <script src="../JavaScript/popups.js" defer></script>
  <link rel="stylesheet" href="../css/style.css"/>

</head>
<body>

  <!-- ═══ HERO SLIDESHOW ═══ -->
  <section class="hero">

    <div class="slide active">
      <img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=1600&q=85" alt="Wedding ceremony"/>
    </div>
    <div class="slide">
      <img src="https://images.unsplash.com/photo-1606800052052-a08af7148866?w=1600&q=85" alt="Wedding couple"/>
    </div>
    <div class="slide">
      <img src="https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=1600&q=85" alt="Bride and groom"/>
    </div>
    <div class="slide">
      <img src="https://images.unsplash.com/photo-1529636798458-92182e662485?w=1600&q=85" alt="Evening celebration"/>
    </div>
    <div class="slide">
      <img src="https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=1600&q=85" alt="Wedding reception"/>
    </div>

    <div class="hero-overlay"></div>

    <div class="hero-name">
      <p class="venue-pre">Wedding Venue · South Africa</p>
      <h1 class="venue-title">
        Kampvuur
        <em>en Konfetti</em>
      </h1>
      <div class="venue-rule"></div>
      <p class="venue-tagline">Where fireside warmth meets confetti joy</p>
      <div class="hero-book"><a href="../html/booking.html">Book Your Date</a></div>
    </div>

    <button class="arrow arrow-prev" onclick="prevSlide()">&#8249;</button>
    <button class="arrow arrow-next" onclick="nextSlide()">&#8250;</button>

    <div class="dots" id="dots"></div>

  </section>

  <!-- ═══ NAVIGATION BAR ═══ -->
  
<body class="home-body">
  
<!-- NAVBAR contained in external file -->
  <?php include 'navbar.php' ?>

  <!-- ═══ ABOUT ═══ -->
<section class="about rv">
  <p class="eyebrow">What we offer</p>
  <h2>A setting as special as<br><em>your love story</em></h2>
  <div class="thin-rule"></div>
  
</section>

  <!-- ═══ WHAT WE OFFER ═══ -->

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


  <!-- ═══ BOOKING ═══ -->
  <section class="booking" id="book">
    <div class="booking-inner rv">
      <p class="eyebrow">Enquire Now</p>
      <h2>Let's plan your perfect day</h2>
      <p>Send us a message and we'll get back to you within 24 hours.</p>

      <div id="bFormWrap">
        <form class="bform" onsubmit="formDone(event)">
          <div>
            <label>Your Name</label>
            <input type="text" placeholder="Anné" required/>
          </div>
          <div>
            <label>Partner's Name</label>
            <input type="text" placeholder="Pieter"/>
          </div>
          <div>
            <label>Email</label>
            <input type="email" placeholder="you@email.com" required/>
          </div>
          <div>
            <label>Phone</label>
            <input type="tel" placeholder="+27 00 000 0000"/>
          </div>
          <div>
            <label>Wedding Date</label>
            <input type="date" required/>
          </div>
          <div>
            <label>Number of Guests</label>
            <select required>
              <option value="" disabled selected>Select</option>
              <option>Under 50</option>
              <option>50 – 100</option>
              <option>100 – 150</option>
              <option>150 – 200</option>
              <option>200+</option>
            </select>
          </div>
          <div class="full">
            <label>Tell us about your vision</label>
            <textarea placeholder="Describe your dream day…"></textarea>
          </div>
          <div class="full center">
            <button type="submit" class="btn-submit">Send Enquiry</button>
          </div>
        </form>
      </div>
      <p id="form-thanks">Thank you! We can't wait to hear more about your day. ✦</p>
    </div>
  </section>

  <!-- ═══ FOOTER ═══ -->

  <!-- FOOTER contained in external file -->
  <?php include 'footer.php' ?>

  <!-- END OF THE FOOTER-->
  <!--<script src="../JavaScript/new_index.js"></script>-->

  <script src="../JavaScript/new_index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>

</body>
</html>