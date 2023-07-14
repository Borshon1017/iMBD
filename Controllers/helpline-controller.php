<?php

require_once('../Models/helpline-model.php');
require_once('message-controller.php');

if(isset($_POST['submit'])){

    $sender = $_POST['sender'];
    $reciever = 'helpline.imbd@gmail.com';
    $message = $_POST['message'];

    $status = sendMail($sender, $reciever, $message);
    if($status) popup("Thank You!", "Thank you for your contacting us. Our team will reach out to you soon.");
    else popup("Error!", "Unable to send mail. Please try again");
    
}

?>