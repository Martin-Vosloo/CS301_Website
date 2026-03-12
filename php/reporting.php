<?php
require "../php/connection.php";

function fetchBookingReportRows()
{
    global $conn;
    $db = $conn;
    if (!$db || $db->connect_error) {
        return [];
    }

    $sql = "SELECT 
                b.booking_id,
                b.number_of_people,
                b.start_Date,
                b.duration,
                b.package_id,
                u.fname,
                u.lname,
                u.email_address
            FROM booking b
            LEFT JOIN users u ON u.id = b.user_id
            ORDER BY b.start_Date DESC";

    $result = $db->query($sql);
    if (!$result) {
        return [];
    }

    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = [
            "booking_id" => (int) $row["booking_id"],
            "fname" => clean($row["fname"] ?? ''),
            "lname" => clean($row["lname"] ?? ''),
            "email_address" => clean($row["email_address"] ?? ''),
            "number_of_people" => (int) $row["number_of_people"],
            "start_date" => clean($row["start_Date"]),
            "duration" => (int) $row["duration"],
            "package_id" => clean($row["package_id"])
        ];
    }

    $result->free();
    return $rows;
}
