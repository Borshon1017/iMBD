<?php

require_once('../Models/user-info-model.php');
require_once('message-controller.php');
require "../Vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if(isset($_POST['submit'])){

    
    session_start();
    $sendTo = $_POST['mail'];

    //Null value checking
    if(strlen(trim($sendTo)) == 0) popup("Error!", "Email field can not be null.");

    $otp = random_int(1000, 9999);
    if(uniqueEmail($sendTo)) popup("Error!", "The email you provided does not exist in our database.");
    $row = getRowByMail($sendTo);
    $username = $row['Username'];
    $id = $row['UserID'];
    $_SESSION['mail'] = $sendTo;
    $_SESSION['otp'] = $otp;
    $_SESSION['id'] = $id;

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = "helpline.imbd@gmail.com";
    $mail->Password = "tqkdteyhzbsazypb";

    $mail->setFrom("helpline.imbd@gmail.com", "iMBD");

    $mail->addAddress($sendTo);

    $mail->Subject = "Reset Password";

    $mail->Body = "Hello, {$username}.\n\nThis is an automatic message from the iMBD helpline system.\n\nWe received a request to reset the password for the iMBD account associated with this e-mail address.\nIf you made this request, please use the OTP below to change your password.\n\n{$otp}\n\nIf you did not request to have your password reset you can safely ignore this email.\n\nRegards,\niMBD Helpline";
    $mail->send();
    header('location:../Views/otp-confirmation.php');
}

?>