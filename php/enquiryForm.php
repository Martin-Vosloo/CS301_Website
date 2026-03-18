<?php
session_start();

require_once "../php/connection.php";
include_once "../php/alert.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location:../html/index.php");
    exit();
}

if (empty($_POST['name1']) || empty($_POST['name2']) || empty($_POST['email']) || empty($_POST['date']) || empty($_POST['guests']) || empty($_POST['text'])) {
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Please fill in all required fields!'
    ];
    header("Location:../html/index.php");
    exit();
}

// Clean inputs
$enquiry_name1 = clean($_POST['name1']);
$enquiry_name2 = clean($_POST['name2']);
$enquiry_email = clean($_POST['email']);
$enquiry_phone = clean($_POST['phone'] ?? '');
$enquiry_date = clean($_POST['date']);
$enquiry_guests = clean($_POST['guests']);
$enquiry_text = clean($_POST['text']);

try {
    $dateObj = new DateTime($enquiry_date);
    $dateStr = $dateObj->format('Y-m-d H:i:s');
} catch (Exception $e) {
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Please select a valid date.'
    ];
    header("Location:../html/index.php");
    exit();
}

$sql = "INSERT INTO enquiry (name1, name2, email_address, phone_number, wedding_date, number_of_guests, vision_description)
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Database error. Please try again.'
    ];
    header("Location:../html/index.php");
    exit();
}

$stmt->bind_param(
    "sssssss",
    $enquiry_name1,
    $enquiry_name2,
    $enquiry_email,
    $enquiry_phone,
    $dateStr,
    $enquiry_guests,
    $enquiry_text
);

if (!$stmt->execute()) {
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Could not save your enquiry. Please try again.'
    ];
    $stmt->close();
    header("Location:../html/index.php");
    exit();
}

$stmt->close();
$_SESSION['alert'] = [
    'type' => 'success',
    'message' => 'Thank you! We cannot wait to hear more about your day!'
];

header("Location:../html/index.php");
exit();
?>

