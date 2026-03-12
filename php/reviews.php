<?php
session_start();

require_once "../php/connection.php";
include_once "../php/alert.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location:../html/reviews.php");
    exit();
}

if (!isset($_SESSION['myid'])) {
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Please sign in to submit a review.'
    ];
    $redirect = urlencode('/html/reviews.php');
    header("Location:../html/signIn.php?redirect=$redirect");
    exit();
}

$review_text = clean($_POST['review'] ?? '');
$rating = isset($_POST['rating']) ? (int) $_POST['rating'] : 0;

if ($review_text === '' || $rating < 1 || $rating > 5) {
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Please provide a review and a rating between 1 and 5.'
    ];
    header("Location:../html/reviews.php");
    exit();
}

$image_name = null;
if (!empty($_FILES['image']['name'])) {
    $tmp_name = $_FILES['image']['tmp_name'];
    $image_max_size = 2 * 1024 * 1024; // 2MB
    $image_size = $_FILES['image']['size'];
    $image_type = $_FILES['image']['type'];

    $allowed_types = ["image/png", "image/jpeg"];
    if (!in_array($image_type, $allowed_types, true)) {
        $_SESSION['alert'] = [
            'type' => 'error',
            'message' => 'Only .png and .jpg/.jpeg images are allowed.'
        ];
        header("Location:../html/reviews.php");
        exit();
    }

    if ($image_size > $image_max_size) {
        $_SESSION['alert'] = [
            'type' => 'error',
            'message' => 'Image is too large.'
        ];
        header("Location:../html/reviews.php");
        exit();
    }

    $original = basename($_FILES['image']['name']);
    $ext = strtolower(pathinfo($original, PATHINFO_EXTENSION));
    $safe_name = preg_replace('/[^a-zA-Z0-9_-]/', '_', pathinfo($original, PATHINFO_FILENAME));
    $image_name = $safe_name . '_' . time() . '.' . $ext;
    $image_path = "../images/reviews/" . $image_name;

    if (!move_uploaded_file($tmp_name, $image_path)) {
        $_SESSION['alert'] = [
            'type' => 'error',
            'message' => 'Failed to upload image.'
        ];
        header("Location:../html/reviews.php");
        exit();
    }
}

$sql = "INSERT INTO reviews (user_id, text_review, image, rating) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Database error. Please try again.'
    ];
    header("Location:../html/reviews.php");
    exit();
}

$user_id = (int) $_SESSION['myid'];
$stmt->bind_param("issi", $user_id, $review_text, $image_name, $rating);

if (!$stmt->execute()) {
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Could not save your review. Please try again.'
    ];
    $stmt->close();
    header("Location:../html/reviews.php");
    exit();
}

$stmt->close();
$_SESSION['alert'] = [
    'type' => 'success',
    'message' => 'Review submitted successfully!'
];
header("Location:../html/reviews.php");
exit();
?>
