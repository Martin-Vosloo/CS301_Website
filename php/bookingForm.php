<?php
session_start();

// Point tot the vendor folder in your root
require_once  dirname(__DIR__) . '/vendor/autoload.php';

// import PhpMailer library to this booking form
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


require_once "../php/connection.php";
include_once "../php/alert.php";

// create an instance and pass true to enable exceptions
$mail = new PHPMailer(true);

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

// convert the catering into a readable text since its using radio buttons

$catering_txt = ($catering == 1) ? "Full catering" : "Self-catered";

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
$endDateStr = $endDate->format('Y-m-d H:i:s');
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

// get the name and email of the user from the databases
$sql = "SELECT fname, email_address FROM users WHERE id = ?";

// return statement object and store in $stmt and bind params, and execute the query in the database
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();

// get the first row of the results and converts it into an associative array so you can access values using keys
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    die("User not found");
}

//store values
$name = $user['fname'];
$email = $user['email_address'];
$stmt->close();

// convert values into readable text
$photography_txt = ($photography == 1) ? "Included" : "Not Selected";
$accommodation_txt = ($accommodation == 1) ? "Included" : "Not Selected";


try{
    //server settings(FROM PHPMail server on GITHUB)
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $_ENV['SMTP_USERNAME'];                     //SMTP username
    $mail->Password   = $_ENV['SMTP_PASSWORD'];                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465; 

    // recipients
    $mail->setFrom('ayandamalawu535@gmail.com', 'Kampvuur en Konfetti');
    $mail->addAddress($email, $name);
    $mail->isHTML(true);

    $mail->addEmbeddedImage('../images/logo/logo1.png', 'venuelogo');
    // write email using html
    $mail->Subject = "Booking Confirmation: Your reservation at Kampvuur en Konfetti";

    $mail->Body = "

    <div>
        <img src='cid:venuelogo' alt='venue logo' style='width:160px; margin-bottom:5px;'>
    
        <h4><b>Hello $name,</b></h4>
    </div>
    
    <p>Thank you for choosing <b>Kampvuur en Konfetti</b> for your upcoming event. We have received your reservation request. Please find the details of your booking below: </p>

    <h3><b>Your stay</b></h3>
    Check-in: $checkin <br>
    Check-out: $endDateStr <br>
    Guests: $number_of_people <br>

    <h3><b>Selected Package</b></h3>
    Catering: $catering_txt <br>

    <h3><b>Optional Add-ons</b></h3>
    Photography: $photography_txt <br>
    Accommodation: $accommodation_txt <br>

    <h3><b>Special requests</b></h3>
    $preferences
    
    <br><br>
    You will be contacted shortly with deposit payment details to confirm your reservation.
    
    

    ";
    // incase the email doesnt display
    $mail->AltBody = 'Your booking request at Kampvuur en Konfetti has been received. We will contact you shortly with with deposit payment details.';

    //send emil
    $mail->send();
}
catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

$_SESSION['alert'] = [
    'type' => 'success',
    'message' => 'Booking successful! Please check your email.'
];
header("Location:../html/booking.php");
exit();
?>
