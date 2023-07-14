<?php

    require_once('../Models/user-info-model.php');
    require_once('message-controller.php');

    if(isset($_POST['submit'])){

        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        $role = 'Critic';

        if(strlen($password)<8) popup("Error!", "Password must be atleast 8 characters long.");
        else if(uniqueEmail($email)==false) popup("Error!", "Email already exists.");
        else if($password!=$repassword) popup("Error!", "Passwords does not match.");
        else{

            $status = addUser($fullname, $username, $phone, $email, $password, $role);
            if($status) popup("Congratulations!", "New critic has been added.");
            else popup("Error!", "Could not add critic. Please try again");

        }  
        
    }

?>