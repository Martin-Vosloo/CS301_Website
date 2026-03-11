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
    
    <!-- NAVBAR contained in external file -->
    <?php include 'navbar.php' ?>
      <!-- <input type="checkbox" id="menu-toggle" class="menu-toggle" />

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
    >
      <div class="heading">
        <h2>Current Bookings</h2>
      </div>
      <table class="admin-table" id="smt">
        <tr>
          <th>Full name</th>
          <th>Date</th>
        </tr>

        <tr>
          <td>John Smith</td>
          <td><time datetime="2026-09-12">12-09-2026</time></td>
        </tr>

        <tr>
          <td>Samuel Ntlonti</td>
          <td><time datetime="2026-04-12">12-04-2026</time></td>
        </tr>

        <tr>
          <td>Onalo Maliwa</td>
          <td><time datetime="2026-09-13">13-09-2026</time></td>
        </tr>

        <tr>
          <td>Asemahle Sinqe</td>
          <td><time datetime="2026-06-12">12-06-2026</time></td>
        </tr>
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

        <tr>
          <td>J. Smith</td>
          <td><time datetime="2026-09-12">12-09-2026</time></td>
          <td>R50 000</td>
        </tr>

        <tr>
          <td>S. Ntlonti</td>
          <td><time datetime="2026-04-12">12-04-2026</time></td>
          <td>R49 000</td>
        </tr>

        <tr>
          <td>O. Maliwa</td>
          <td><time datetime="2026-09-13">13-09-2026</time></td>
          <td>R37 000</td>
        </tr>

        <tr>
          <td>A. Sinqe</td>
          <td><time datetime="2026-06-12">12-06-2026</time></td>
          <td>R50 000</td>
        </tr>
        
