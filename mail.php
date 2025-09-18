<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
include 'conf.php'; // your database connection config

// Connect to DB
$conn = new mysqli(
    $conf['db_host'],
    $conf['db_user'],
    $conf['db_pass'],
    $conf['db_name']
);

if ($conn->connect_error) {
    die("DB connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form values
    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $phone_no   = trim($_POST['phone_no'] ?? '');
    $vehicle_model = trim($_POST['vehicle_model'] ?? '');
    $date    = $_POST['date'] ?? '';
    $time    = $_POST['time'] ?? '';
    $notes   = trim($_POST['notes'] ?? '');

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
        exit;
    }

    // Optional: prevent duplicate email bookings
    $checkStmt = $conn->prepare("SELECT COUNT(*) FROM bookings WHERE email = ?");
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkStmt->bind_result($count);
    $checkStmt->fetch();
    $checkStmt->close();

    if ($count > 0) {
        echo "This email has already booked a service.";
        exit;
    }

    // Insert booking into DB
    $stmt = $conn->prepare("
        INSERT INTO bookings 
        (name, email, phone_no, vehicle_model, date, time, notes) 
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->bind_param("sssssss", $name, $email, $phone_no, $vehicle_model, $date, $time, $notes);

    if ($stmt->execute()) {
        echo "Thank you $name! Your booking has been received.<br>";

        // Send confirmation email
        if ($conf['mail_type'] === "smtp") {
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host       = $conf['smtp_host'];
                $mail->SMTPAuth   = true;
                $mail->Username   = $conf['smtp_user'];
                $mail->Password   = $conf['smtp_pass'];
                $mail->SMTPSecure = $conf['smtp_secure'];
                $mail->Port       = $conf['smtp_port'];

                $mail->setFrom($conf['site_email'], $conf['site_name']);
                $mail->addAddress($email, $name);
                $mail->Subject = "Garage Booking Confirmation";
                $mail->Body = "Hello $name,\n\n"
                            . "Thank you for booking a service with " . $conf['site_name'] . ".\n\n"
                            . "Booking Details:\n"
                            . "Phone_No: $phone_no\n"
                            . "Vehicle_model: $vehicle_model\n"
                            . "Date: $date\n"
                            . "Time: $time\n"
                            . "Notes: $notes\n\n"
                            . "We look forward to serving you!\n";

                $mail->send();
                echo "A confirmation email has been sent to $email.";
            } catch (Exception $e) {
                echo "Booking saved, but email could not be sent. Error: {$mail->ErrorInfo}";
            }
        }
    } else {
        echo "Error saving booking: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
