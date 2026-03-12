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
      $reviews = fetchReviewReportRows();
      $enquiries = fetchEnquiryReportRows();

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
          <th>Preferences</th>
        </tr>

        <?php if (empty($bookings)): ?>
          <tr>
            <td colspan="9">No bookings found.</td>
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
