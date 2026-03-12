<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/admin.css" />
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/style.css" />
  </head>

  <body>
    <!-- NAVBAR contained in external file -->
    <?php include 'navbar.php'; ?>

    <?php
      require_once __DIR__ . '/../php/reporting.php';
      $bookings = fetchBookingReportRows();

      function safeText($value)
      {
          return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
      }
    ?>

    <section class="containsTable" id="currentBookings">
      <div class="heading">
        <h2>Current Bookings</h2>
      </div>

      <table class="admin-table" id="curbooking">
        <tr>
          <th>Booking ID</th>
          <th>First name</th>
          <th>Last name</th>
          <th>Email</th>
          <th>People</th>
          <th>Start date</th>
          <th>Duration (days)</th>
          <th>Package</th>
        </tr>

        <?php if (empty($bookings)): ?>
          <tr>
            <td colspan="8">No bookings found.</td>
          </tr>
        <?php else: ?>
          <?php foreach ($bookings as $booking): ?>
            <tr>
              <td><?php echo safeText($booking['booking_id']); ?></td>
              <td><?php echo safeText($booking['fname'] ?: 'Guest'); ?></td>
              <td><?php echo safeText($booking['lname']); ?></td>
              <td><?php echo safeText($booking['email_address']); ?></td>
              <td><?php echo safeText($booking['number_of_people']); ?></td>
              <td>
                <time datetime="<?php echo safeText($booking['start_date']); ?>">
                  <?php echo safeText($booking['start_date']); ?>
                </time>
              </td>
              <td><?php echo safeText($booking['duration']); ?></td>
              <td><?php echo safeText($booking['package_id']); ?></td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </table>
    </section>
  </body>
</html>
