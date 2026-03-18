<?php
session_start();

require_once "../php/connection.php";
include_once "../php/alert.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location:../html/booking.php");
    exit();
}

if (!isset($_SESSION['myid'])) {
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Please sign in to submit a booking.'
    ];
    $redirect = urlencode('/html/booking.php');
    header("Location:../html/signIn.php?redirect=$redirect");
    exit();
}

$checkin = clean($_POST['checkin'] ?? '');
$checkout = clean($_POST['checkout'] ?? '');
$number_of_people = isset($_POST['number_of_people']) ? (int) $_POST['number_of_people'] : 0;
$preferences = clean($_POST['preferences'] ?? '');

if ($checkin === '' || $checkout === '' || $number_of_people <= 0) {
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Please fill in all required fields.'
    ];
    header("Location:../html/booking.php");
    exit();
}

try {
    $startDate = new DateTime($checkin);
    $endDate = new DateTime($checkout);
} catch (Exception $e) {
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Invalid date selection.'
    ];
    header("Location:../html/booking.php");
    exit();
}

if ($endDate <= $startDate) {
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Check-out must be after check-in.'
    ];
    header("Location:../html/booking.php");
    exit();
}

$duration = (int) $startDate->diff($endDate)->days;

$catering = isset($_POST['catering']) ? (int) $_POST['catering'] : 0;
$photography = isset($_POST['photography']) ? 1 : 0;
$accommodation = isset($_POST['accommodation']) ? 1 : 0;

$package_id = sprintf('C%dP%dA%d', $catering, $photography, $accommodation);

$sql = "INSERT INTO booking (user_id, number_of_people, start_Date, duration, package_id, preferences) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Database error. Please try again.'
    ];
    header("Location:../html/booking.php");
    exit();
}

$user_id = (int) $_SESSION['myid'];
$startDateStr = $startDate->format('Y-m-d H:i:s');
$stmt->bind_param("iisiss", $user_id, $number_of_people, $startDateStr, $duration, $package_id, $preferences);

if (!$stmt->execute()) {
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Booking could not be saved. Please try again.'
    ];
    $stmt->close();
    header("Location:../html/booking.php");
    exit();
}

$stmt->close();
$_SESSION['alert'] = [
    'type' => 'success',
    'message' => 'Booking submitted successfully!'
];
header("Location:../html/booking.php");
exit();
?>
