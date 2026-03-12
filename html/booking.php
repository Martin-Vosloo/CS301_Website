<?php
session_start();  // make sure session is started
$role = $_SESSION['role'] ?? null;
$name = $_SESSION['name'] ?? null;

if (!$role) {
  $currentPage = urlencode($_SERVER['REQUEST_URI']);
  header("Location: ../html/signIn.php?redirect=$currentPage");
  exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Book a Wedding Venue</title>

    <link rel="stylesheet" href="../css/bookings.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="../css/style.css"/>
  </head>
  <body class="booking-body" >
    
    <!-- NAVBAR contained in external file -->

    <?php include "../html/navbar.php" ?>

    <div class="wrap">

  <!-- introduction heading to the booking page -->
  <div class="header">
    <div class="eyebrow">Reservation</div>
    <h1>Book Your<br/><em>wedding venue</em></h1>
    <p class="sub">Fill in the details below and we'll confirm<br/>your booking within 24 hours.</p>
  </div>

<!-- BEGINNING OF BOOKING FORM -->
  <form id="form" action="../php/bookingForm.php" method="post" enctype="multipart/form-data">

    <div class="section">
      <div class="section-title">Your Dates</div>
      <div class="date-pair">
        <div class="field">
          <label for="checkin">Check-in</label>
          <input type="date" id="checkin" name="checkin" required />
        </div>
        <div class="field">
          <label for="checkout">Check-out</label>
          <input type="date" id="checkout" name="checkout" required />
        </div>
      </div>
    </div>

    <div class="section">
      <div class="section-title">Guests</div>
      <div class="field">
        <label for="number_of_people">Number of people</label>
        <input type="number" id="number_of_people" name="number_of_people" min="1" max="500" required />
      </div>
    </div>

    <!-- Mandatory section section for the user to click the catering selection. -->
    <div class="section">
      <div class="section-title">Catering</div>
      <div class="radio-group">
        <label class="radio-row">
          <input type="radio" name="catering" value="1" required />
          <span class="radio-label">Full Catering</span>
          <span class="radio-note">All meals included (R15 000)</span>
        </label>
        <label class="radio-row">
          <input type="radio" name="catering" value="0" />
          <span class="radio-label">No Catering</span>
          <span class="radio-note">Self-catered</span>
        </label>
      </div>
    </div>

    <!-- additional add-ons which are not neccessary to click -->
    <div class="section">
      <div class="section-title">Optional Add-ons</div>
      <div class="check-group">
        <label class="check-row">
          <input type="checkbox" name="photography" value="1" />
          <span class="check-label">Photography</span>
          <span class="check-tag">R10 000</span>
        </label>
        <label class="check-row">
          <input type="checkbox" name="accommodation" value="1" />
          <span class="check-label">Accommodation</span>
          <span class="check-tag">R5 000 /room/day</span>
        </label>
      </div>
    </div>

    <!-- asks the user to add a short answer of their preferences -->
    <div class="section">
      <div class="section-title">Preferences</div>
      <div class="field">
        <label for="prefs">Notes &amp; special requests</label>
        <textarea id="prefs" name="preferences" placeholder="Dietary needs, accessibility, or anything else..."></textarea>
      </div>
    </div>

    <div class="submit-area">
      <p class="submit-note">By submitting you agree to our booking terms.<br/>A confirmation will be sent to your email.</p>
      <button type="submit" class="btn">Submit Reservation</button>
    </div>

  </form>
  <!-- END OF BOOKING FORM -->

  <!-- BEGINNING OF BCONFIRMATION OF BOOKING -->
  <div class="success" id="success">
    <div class="success-mark">&#10003;</div>
    <h2>Reservation Received</h2>
    <p>Thank you. Our team will be in touch<br/>within 24 hours to confirm your booking.</p>
  </div>

</div>

    <!-- FOOTER contained in external file -->
    <?php include '../html/footer.php' ?>

    <!--External JS files being called to be used in the HTML file-->
    <script src="../JavaScript/booking.js" defer></script>
    <script src="../JavaScript/validation.js" defer></script>
  </body>
</html>

