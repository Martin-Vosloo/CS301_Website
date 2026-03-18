<?php
session_start();
require_once "connection.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../html/signUp.php');
    exit;
}

$fname = clean($_POST['fname'] ?? '');
$lname = clean($_POST['lname'] ?? '');
$email_address = clean($_POST['email_address'] ?? '');
$password = $_POST['password'] ?? '';
$password_conf = $_POST['password_conf'] ?? '';

if ($fname === '' || $lname === '' || $email_address === '' || $password === '' || $password_conf === '') {
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Please fill in all required fields.'
    ];
    header('Location: ../html/signUp.php');
    exit;
}

if ($password !== $password_conf) {
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Passwords do not match.'
    ];
    header('Location: ../html/signUp.php');
    exit;
}

// Check if email is already in use
$checkQuery = 'SELECT id FROM users WHERE email_address = ? LIMIT 1';
$checkStmt = $conn->prepare($checkQuery);
if ($checkStmt) {
    $checkStmt->bind_param('s', $email_address);
    $checkStmt->execute();
    $checkStmt->store_result();
    if ($checkStmt->num_rows > 0) {
        $_SESSION['alert'] = [
            'type' => 'error',
            'message' => 'An account with that email already exists.'
        ];
        $checkStmt->close();
        header('Location: ../html/signUp.php');
        exit;
    }
    $checkStmt->close();
}

$hash = password_hash($password, PASSWORD_DEFAULT);
$role = 'user';
$alive = 1;

$insertQuery = 'INSERT INTO users (fname, lname, email_address, password, role, alive) VALUES (?, ?, ?, ?, ?, ?)';
$insertStmt = $conn->prepare($insertQuery);
if (!$insertStmt) {
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Database error. Please try again.'
    ];
    header('Location: ../html/signUp.php');
    exit;
}

$insertStmt->bind_param('sssssi', $fname, $lname, $email_address, $hash, $role, $alive);
if ($insertStmt->execute()) {
    $_SESSION['alert'] = [
        'type' => 'success',
        'message' => 'Account created successfully. Please sign in.'
    ];
    $insertStmt->close();
    header('Location: ../html/signIn.php');
    exit;
}

$insertStmt->close();
$_SESSION['alert'] = [
    'type' => 'error',
    'message' => 'Could not save to the database. Please try again.'
];
header('Location: ../html/signUp.php');
exit;
?>
