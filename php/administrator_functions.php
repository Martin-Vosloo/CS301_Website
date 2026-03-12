<?php
require_once "reporting.php";

// Legacy helper retained for compatibility.
function table()
{
    return fetchBookingReportRows();
}
?>
