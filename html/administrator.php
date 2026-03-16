<?php
session_start();
$role = $_SESSION['role'] ?? null;
if ($role !== 'admin') {
  header('Location: index.php');
  exit;
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Panel | Kampvuur en Konfetti</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/admin.css" />
  <script src="../JavaScript/tables.js" defer></script>
</head>
<body onload="initialTable_onload();>
  <nav class="navigation-bar">
    <article class="logo-image">
      <a href="index.html"><img src="../images/logo/logo1.png" alt="Relationship Advice logo" /></a>
    </article>

  <body>
    <!-- NAVBAR contained in external file -->
    <?php include 'navbar.php'; ?>

      <label for="menu-toggle" class="hamburger">
        <span></span><span></span><span></span>
      </label> -->

  <section class="containsTable" id="currrentBookings" onclick="overlay('currrentBookings')">
    <div class="heading">
      <h2>Current Bookings</h2>
    </div>
    <table class="admin-table" id="curbooking" onload= >
        <!--php will add the table here -->
    </table>

    <input type="text" name="searchString">

  </section>

  <table class="admin-table admin-tools">
    <tr>
      <td><button id="orderDate">Order by date</button></td>
      <td><button id="orderName">Order by name</button></td>
      <td><button id="search">Search</button></td>
    </tr>
  </table>


  <section id="changes">
    <div class="heading">
      <h2>Modify a booking</h2>
    </div>

    <aside class="left">
      <p>
        <b>For:</b> Samuel Onako<br />
        <b>On:</b> <time datetime="2026-04-12">12-04-2026</time><br />
        <b>Extra services:</b> C, P, ...<br />
        <b>Amount paid:</b> None
      </p>
    </aside>

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
        include '../php/connection.php';
        $sql = 'SELECT fname, lname, start_date, duration FROM users inner join booking on users.identityNumber=booking.idNo where start_date > NOW()';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['fname'] . $row['lname'] . '</td>';
            echo '<td>' . $row['start_date'] . '</td>';
            echo '<td>' . $row['duration'];
            echo '<tr>';
          }
        } else {
          echo '<p>nothing in the database yet</p>';
        }
        ?>
      </table>
    </aside>
  </section>

  <section class="containsTable" id="past_Bookings" onclick="overlay('past_Bookings')">
    <div class="heading">
      <h2>Successful Bookings</h2>
    </div>
    <?php
    require_once __DIR__ . '/../php/reporting.php';
    $bookings = fetchBookingReportRows();
    $reviews = fetchReviewReportRows();
    $enquiries = fetchEnquiryReportRows();

    function safeText($value)
    {
      return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }

    function formatBool($value)
    {
      return ((int) $value) === 1 ? 'Yes' : 'No';
    }
    ?>

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
        <h2>Current Bookings</h2>
      </div>

      <table class="admin-table" id="curbooking">
        <tr>
          <th>First name</th>
          <th>Last name</th>
          <th>Email</th>
          <th>Start date</th>
          <th>Duration (days)</th>
          <th>Package</th>
          <th>Preferences</th>
        </tr>

        <?php if (empty($bookings)): ?>
          <tr>
            <td colspan="9">No bookings found.</td>
          </tr>
        <?php else: ?>
          <?php foreach ($bookings as $booking): ?>
            <tr>
              <td><?php echo safeText($booking['fname']); ?></td>
              <td><?php echo safeText($booking['lname']); ?></td>
              <td><?php echo safeText($booking['email_address']); ?></td>
              <td>
                <time datetime="<?php echo safeText($booking['start_date']); ?>">
                  <?php echo safeText($booking['start_date']); ?>
                </time>
              </td>
              <td><?php echo safeText($booking['duration']); ?></td>
              <td><?php echo safeText($booking['package_id']); ?></td>
              <td>
                <button type="button" onclick="showText('<?php echo safeText($booking['preferences']); ?>')">View</button>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </table>
    </section>

    <section class="containsTable" id="reviewTable">
      <div class="heading">
        <h2>Reviews</h2>
      </div>

      <table class="admin-table">
        <tr>
          <th>Review ID</th>
          <th>First name</th>
          <th>Last name</th>
          <th>Email</th>
          <th>Rating</th>
          <th>Date</th>
          <th>Review</th>
          <th>Image</th>
        </tr>

        <?php if (empty($reviews)): ?>
          <tr>
            <td colspan="8">No reviews found.</td>
          </tr>
        <?php else: ?>
          <?php foreach ($reviews as $review): ?>
            <tr>
              <td><?php echo safeText($review['review_id']); ?></td>
              <td><?php echo safeText($review['fname']); ?></td>
              <td><?php echo safeText($review['lname']); ?></td>
              <td><?php echo safeText($review['email_address']); ?></td>
              <td><?php echo safeText($review['rating']); ?></td>
              <td>
                <time datetime="<?php echo safeText($review['date_of_review']); ?>">
                  <?php echo safeText($review['date_of_review']); ?>
                </time>
              </td>
              <td>
                <button type="button" onclick="showText('<?php echo safeText($review['text_review']); ?>')">View</button>
              </td>
              <td><?php echo safeText($review['image']); ?></td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </table>
    </section>

    <section class="containsTable" id="enquiryTable">
      <div class="heading">
        <h2>Enquiries</h2>
      </div>

      <table class="admin-table">
        <tr>
          <th>Enquiry ID</th>
          <th>Name</th>
          <th>Partner</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Wedding date</th>
          <th>Guests</th>
          <th>Vision</th>
        </tr>

        <?php if (empty($enquiries)): ?>
          <tr>
            <td colspan="8">No enquiries found.</td>
          </tr>
        <?php else: ?>
          <?php foreach ($enquiries as $enquiry): ?>
            <tr>
              <td><?php echo safeText($enquiry['enquiry_id']); ?></td>
              <td><?php echo safeText($enquiry['name1']); ?></td>
              <td><?php echo safeText($enquiry['name2']); ?></td>
              <td><?php echo safeText($enquiry['email_address']); ?></td>
              <td><?php echo safeText($enquiry['phone_number']); ?></td>
              <td>
                <time datetime="<?php echo safeText($enquiry['wedding_date']); ?>">
                  <?php echo safeText($enquiry['wedding_date']); ?>
                </time>
              </td>
              <td><?php echo safeText($enquiry['number_of_guests']); ?></td>
              <td>
                <button type="button" onclick="showText('<?php echo safeText($enquiry['vision_description']); ?>')">View</button>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </table>
    </section>

    <script>
      function showText(text) {
        var message = text && text.trim() ? text : 'No details provided.';
        alert(message);
      }
    </script>
  </body>
</html>

