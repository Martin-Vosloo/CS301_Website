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
                b.preferences,
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
            "package_id" => clean($row["package_id"]),
            "preferences" => clean($row["preferences"] ?? '')
        ];
    }

    $result->free();
    return $rows;
}

function fetchReviewReportRows()
{
    global $conn;
    $db = $conn;
    if (!$db || $db->connect_error) {
        return [];
    }

    $sql = "SELECT 
                r.id,
                r.text_review,
                r.image,
                r.rating,
                r.date_of_review,
                u.fname,
                u.lname,
                u.email_address
            FROM reviews r
            LEFT JOIN users u ON u.id = r.user_id
            ORDER BY r.date_of_review DESC";

    $result = $db->query($sql);
    if (!$result) {
        return [];
    }

    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = [
            "review_id" => (int) $row["id"],
            "fname" => clean($row["fname"] ?? ''),
            "lname" => clean($row["lname"] ?? ''),
            "email_address" => clean($row["email_address"] ?? ''),
            "rating" => (int) $row["rating"],
            "date_of_review" => clean($row["date_of_review"]),
            "text_review" => clean($row["text_review"]),
            "image" => clean($row["image"] ?? '')
        ];
    }

    $result->free();
    return $rows;
}

function fetchEnquiryReportRows()
{
    global $conn;
    $db = $conn;
    if (!$db || $db->connect_error) {
        return [];
    }

    $sql = "SELECT 
                id,
                name1,
                name2,
                email_address,
                phone_number,
                wedding_date,
                number_of_guests,
                vision_description
            FROM enquiry
            ORDER BY wedding_date DESC";

    $result = $db->query($sql);
    if (!$result) {
        return [];
    }

    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = [
            "enquiry_id" => (int) $row["id"],
            "name1" => clean($row["name1"]),
            "name2" => clean($row["name2"]),
            "email_address" => clean($row["email_address"]),
            "phone_number" => clean($row["phone_number"] ?? ''),
            "wedding_date" => clean($row["wedding_date"]),
            "number_of_guests" => clean($row["number_of_guests"]),
            "vision_description" => clean($row["vision_description"])
        ];
    }

    $result->free();
    return $rows;
}
