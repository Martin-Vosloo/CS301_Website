<?php
require "../php/connection.php";

function getDbConnection()
{
    global $conn;
    return $conn;
}

function fetchBookingReportRows()
{
    $db = $conn;
    if (!$conn || $conn->connect_error) {
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
            INNER JOIN users u ON u.identityNumber = b.idNo
            ORDER BY b.start_Date DESC";

    $result = $conn->query($sql);
    if (!$result) {
        return [];
    }

    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = [
            "fname" => $row["fname"],
            "lname" => $row["lname"],
            "email_address" => $row["email_address"],
            "start_date" => $row["start_Date"],
            "duration" => (int) $row["duration"],
            "fullcatering" => (int) $row["full_catering"],
            "photographer" => (int) $row["photographer"],
            "lodging" => (int) $row["lodging"],
            "wedding_preference" => $row["wedding_preference"],
        ];
    }

    $result->free();
    return $rows;
}

