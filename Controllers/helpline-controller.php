<?php

require_once('../Models/helpline-model.php');
require_once('message-controller.php');

if(isset($_POST['submit'])){

    $sender = $_POST['sender'];
    $reciever = 'helpline.imbd@gmail.com';
    $message = $_POST['message'];

    if(strlen(trim($sender)) == 0 || strlen(trim($message)) == 0) popup("Error!", "You can not leave any fields empty.");

    
    //Email validation 
    $checking1 = explode('@', $email);
    if(count($checking1) == 2){
        $checking2 = explode('.', $checking1[1]);
        $c = count($checking2);
        if(count($checking2) < 2){
            popup("Error!", "Invalid email, Please 55 try again.");
            return;
        }
    }
    else {
        popup("Error!", "Invalid email, Please 11 try again.");
        return;
    }
    if($email[strlen($email)-1] == "."){
        popup("Error!", "Invalid email, Please 33 try again.");
        return;
    }

    $status = sendMail($sender, $reciever, $message);
    if($status) popup("Thank You!", "Thank you for your contacting us. Our team will reach out to you soon.");
    else popup("Error!", "Unable to send mail. Please try again");
    
}

?>