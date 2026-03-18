<?php
session_start()
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
          <th>First name</th>
          <th>Last name</th>
          <th>Email</th>
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
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </table>
    </section>
  </body>
</html>

