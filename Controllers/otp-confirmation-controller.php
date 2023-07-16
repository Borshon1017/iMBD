<?php

require_once('../Models/user-info-model.php');
require_once('message-controller.php');
session_start();

if(isset($_POST['submit'])){

    $otp = $_POST['otp'];
    $cotp = $_SESSION['otp'];
    $id = $_SESSION['id'];
    if($otp!=$cotp) popup("Error!", "Wrong OTP, Unable to change password.");
    
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    //Cross password validation
    if($password!=$repassword) popup("Error!", "Passwords do not match. Please check again.");

    //Password validation
    else if(strlen($repassword)<8)popup("Error!", "Password must be atleast 8 characters long.");
    else{
        if(changePassword($id,$password)==true) popup("Congratulations!", "Your password has been changed.");
        else popup("Error!", "Could not change password. Please try again");
    }
    
}

?>