<?php
session_start();
require_once "connection.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../html/signIn.php');
    exit;
}

$email_address = clean($_POST['email_address'] ?? '');
$password = $_POST['password'] ?? '';
$redirect = $_POST['redirect'] ?? '../html/index.php';

if ($email_address === '' || $password === '') {
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Please enter your email and password.'
    ];
    header('Location: ../html/signIn.php');
    exit;
}

$query = 'SELECT id, fname, role, password FROM users WHERE email_address = ? AND alive = 1 LIMIT 1';
$stmt = $conn->prepare($query);
if (!$stmt) {
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Database error. Please try again.'
    ];
    header('Location: ../html/signIn.php');
    exit;
}

$stmt->bind_param('s', $email_address);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if (!$user || !password_verify($password, $user['password'])) {
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'Wrong username or password.'
    ];
    header('Location: ../html/signIn.php');
    exit;
}

session_regenerate_id(true);
$_SESSION['myid'] = $user['id'];
$_SESSION['name'] = $user['fname'];
$_SESSION['role'] = $user['role'];

header('Location: ' . $redirect);
exit;
?>
