<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Book a Wedding</title>
    <link rel="stylesheet" href="../css/style.css" />
    <!-- <link rel="stylesheet" href="../css/bookings.css" /> -->
  </head>
  <body class="booking-body" >
    
    <!-- NAVBAR contained in external file -->
    <?php include 'navbar.php' ?>

    <main class="booking-main">
      <!-- <h1>Book our venue</h1> -->
      <section class="container">




      <!-- FORM 


        <form class="glass-form" action="../php/bookingForm.php" method="post" enctype="multipart/form-data">
          <section>
            <h2>Contact Information</h2>
            <div class="input-group">
              <label for="couple-names">Couple Names</label>
              <input
                type="text"
                id="couple-names"
                name="name"
                required
                placeholder="e.g. Alex & Sam"
              />
            </div>

            <div class="input-group">
              <label for="email">Email Address</label>
              <input
                type="email"
                id="email"
                name="email"
                required
                placeholder="email@example.com"
              />
            </div>

            <div class="input-group">
              <label for="phone">Phone Number</label>
              <input
                type="tel"
                id="phone"
                name="phone"
                required
                placeholder="+27..."
              />
            </div>
          </section>

          <section>
            <h2>Booking Dates</h2>
            <div class="date-row">
              <div class="input-group">
                <label for="start-date">Check-in</label>
                <input type="date" id="start-date" name="start-date" required />
              </div>

              <div class="input-group">
                <label for="end-date">Check-out</label>
                <input type="date" id="end-date" name="end-date" required />
              </div>
            </div>
          </section>

          <section class="checkbox-section">
            <h2>Services Required</h2>
            <div class="checkbox-grid">
              <label class="custom-check">
                <input type="checkbox" name="services[]" value="catering-full" />
                <span>Full Catering</span>
              </label>

              <label class="custom-check">
                <input type="checkbox" name="services[]" value="catering-self" />
                <span>Self-Catering</span>
              </label>

              <label class="custom-check">
                <input type="checkbox" name="services[]" value="photographer" />
                <span>Photographer</span>
              </label>

              <label class="custom-check">
                <input type="checkbox" name="services[]" value="lodging" />
                <span>Lodging</span>
              </label>
            </div>
          </section>

          <section>
            <h2>Wedding Preferences</h2>
            <textarea
              id="preferences"
              name="preferences"
              rows="4"
              placeholder="Tell us about your vision..."
            ></textarea>
          </section>

          <button type="submit" class="submit-btn">
            Submit Booking Request
          </button>
        </form>
      </section> -->

                    <!-- OLD FORM FROM INDEX THAT WILL BE REPLICATED-->
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
            <label>Check-in Date </label>
            <input type="date" required/>
          </div>


          <div>
            <label>Check-out Date</label>
            <input type="date" required/>
          </div>
          <div class="full">
            <label>Tell us about your preferences</label>
            <textarea placeholder="Describe your dream day…"></textarea>
          </div>
          

          <section class="checkbox-section">
            <h2>Services Required</h2>
            <div class="checkbox-grid">
              <label class="custom-check">
                <input type="checkbox" name="services[]" value="catering-full" />
                <span>Full Catering</span>
              </label>

              <label class="custom-check">
                <input type="checkbox" name="services[]" value="catering-self" />
                <span>Self-Catering</span>
              </label>

              <label class="custom-check">
                <input type="checkbox" name="services[]" value="photographer" />
                <span>Photographer</span>
              </label>

              <label class="custom-check">
                <input type="checkbox" name="services[]" value="lodging" />
                <span>Lodging</span>
              </label>
            </div>
          </section>

          <div class="full center">
            <button type="submit" class="btn-submit">Send Enquiry</button>
          </div>

        </form>
      </div>
      <p id="form-thanks">Thank you! We can't wait to hear more about your day. ✦</p>
    </div>

  </section>
    </main>

    <!-- FOOTER contained in external file -->
    <?php include 'footer.php' ?>

    <!--External JS files being called to be used in the HTML file-->
    <script src="../JavaScript/slideshow.js" defer></script>
    <script src="../JavaScript/validation.js" defer></script>
  </body>
</html>
