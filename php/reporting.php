<?php
require "../php/connection.php";

// function getDbConnection()
// {
//     global $conn;
//     return $conn;
// }

function fetchBookingReportRows()
{
    global $conn;
    $db = $conn;
    if (!$db || $db->connect_error) {
        return [];
    }
    

    $sql = "SELECT 
                u.fname,
                u.lname,
                u.email_address,
                b.start_Date,
                b.duration,
                b.full_catering,
                b.photographer,
                b.lodging,
                b.wedding_preference
            FROM booking b
            INNER JOIN users u ON u.id = b.idNo
            ORDER BY b.start_Date DESC";

    $result = $db->query($sql);
    if (!$result) {
        return [];
    }

    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = [
            "fname" => clean($row["fname"]),
            "lname" => clean($row["lname"]),
            "email_address" => clean($row["email_address"]),
            "start_date" => clean($row["start_Date"]),
            "duration" => (int) clean($row["duration"]),
            "fullcatering" => (int) clean($row["full_catering"]),
            "photographer" => (int) clean($row["photographer"]),
            "lodging" => (int) clean($row["lodging"]),
            "wedding_preference" => clean($row["wedding_preference"])
        ];
    }

    $result->free();
    return $rows;
}

