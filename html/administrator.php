<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/admin.css" />
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/style_ab.css" />
    <script src="/JavaScript/tables.js"></script>
  </head>

  <body>
    
    <nav class="navigation-bar">
      <article class="logo-image">
        <a href="index.html"><img src="../images/logo/logo1.png" alt="Logo" /></a>
      </article>

      <article class="navigation-links">
        <a href="index.html">Home</a>
        <a href="reviews.html">Reviews</a>
        <a href="about.html">About</a>
        <a href="booking.html">Book</a>
        <a href="administrator.html">Admin</a>

      </article>
        
      <article class="navigation-btns">
        <a href="signIn.html" class="nav-btn">Sign in</a>
        <a href="signUp.html" class="nav-btn">Sign Up</a>
      </article>
    </nav>
      <!-- <input type="checkbox" id="menu-toggle" class="menu-toggle" />

      <label for="menu-toggle" class="hamburger">
        <span></span><span></span><span></span>
      </label> -->



    <section
      class="containsTable"
      id="currrentBookings"
      onclick="overlay('currrentBookings')"
    
      <div class="heading">
        <h2>Current Bookings</h2>
      </div>
      
      <table class="admin-table" id="smt">
        <tr>
          <th>Full name</th>
          <th>Date</th>
          <th>Duration in days</th>
        </tr>

        <!-- php will begin with these as they are not headers-->
        <?php
          include "../php/connection.php";
          $sql = "SELECT fname, lname, start_date, duration FROM users inner join booking on users.identityNumber=booking.idNo where start_date > NOW()";
          $result = $conn->query($sql);
          if($result->num_rows>0){
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
                echo "<td>".$row['fname']. $row['lname']. "</td>";
                echo "<td>".$row['start_date']. "</td>";
                echo "<td>".$row['duration'];
              echo "<tr>";
            }
          }else{
            echo "<p>nothing in the database yet</p>";
          }
        ?>
      </table>
      <!--this table must include in it the packages the person took along with because right now it is too narrow-->
    </section>

    <table class="admin-table">
      <tr>
        <td><button>Order by date</button></td>
        <td><button>Order by name</button></td>
        <td><button>Search</button></td>
      </tr>
    </table>

    <section id="changes">
      <div class="heading">
        <h2>Modify a booking</h2>
      </div>

      <aside class="left">
        <p>
          <b>For: </b>Samuel Onako<br />
          <b>On: </b><time datetime="2026-04-12">12-04-2026</time><br />
          <b>Extra services: </b>C, P, ...<br />
          <b>Amount paid: </b>None
        </p>
      </aside>

      <aside class="right">
        <table class="admin-table-narrow">
          <tr>
            <td><button>Change Date</button></td>
          </tr>

          <tr>
            <td><button>Cancel Booking</button></td>
          </tr>

          <tr>
            <td><button>...</button></td>
          </tr>
        </table>
      </aside>
    </section>

    <section
      class="containsTable"
      id="past_Bookings"
      onclick="overlay('past_Bookings')"
    >
      <div class="heading">
        <h2>Successful Bookings</h2>
      </div>

      <table class="admin-table">
        <?php
          $sql = "SELECT fname, lname, start_date, duration FROM users inner join booking on users.identityNumber=booking.idNo where start_date < NOW()";
          $result = $conn->query($sql);
          if($result->num_rows>0){
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
                echo "<td>". substr($row['fname'], 0, 1) . $row['lname']. "</td>";
                echo "<td>".$row['start_date']. "</td>";
                echo "<td>".$row['duration'];
              echo "<tr>";
            }
          }else{
            echo "<p>nothing in the database yet</p>";
          }
        ?>
      </table>
      </table>
    </section>

    <div class="buttons">
      <table class="admin-table">
        <tr>
          <td><button>Totals</button></td>
          <td><button>120 bookings</button></td>
          <td><button>R129 000 000</button></td>
        </tr>

        <tr>
          <td><button>Filter Dates</button></td>
          <td><button>Filter Amounts</button></td>
          <td><button>Search</button></td>
        </tr>
      </table>
    </div>

    <footer>
      <p>
        <small>&#169; Copyright 2026 <i>Relationship-Advice</i>&trade;</small
        ><br />

        <small>
          Authors: Dylan McDonogh, Kago Songo, Martin Vosloo, Chuma Modze,
          Nwabisa Malawu<br />
          Authors: <a href="about.html">Contact Details</a>
        </small>
      </p>

      <nav>
        <a href="index.html">Home</a>
        <a href="about.html">About Us</a>
        <a href="about.html">Contact Us</a>
        <a href="reviews.html">Write a Review</a>
        <a href="booking.html">Book</a>
        <a href="administrator.html">Admin</a>
      </nav>

      <div class="social-icons">
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
        <a href="tel:+27123456789" class="contact-icon"
          ><i class="fa-solid fa-phone"></i
        ></a>
      </div>
    </footer>
  </body>
</html>
