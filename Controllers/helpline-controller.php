<?php

require_once('../Models/helpline-model.php');
require_once('message-controller.php');

if(isset($_POST['submit'])){

    $sender = $_POST['sender'];
    $reciever = 'helpline.imbd@gmail.com';
    $message = $_POST['message'];

    if(strlen(trim($sender)) == 0 || strlen(trim($message)) == 0) popup("Error!", "You can not leave any fields empty.");

    $status = sendMail($sender, $reciever, $message);
    if($status) popup("Thank You!", "Thank you for your contacting us. Our team will reach out to you soon.");
    else popup("Error!", "Unable to send mail. Please try again");
    
}

?>