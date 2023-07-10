<?php

    require_once('../Models/user-info-model.php');
    require_once('message-controller.php');
    session_start();        
    
    if(isset($_POST['submit'])){

        $email = $_POST['email'];
        $password = $_POST['password'];
        $rememberMe = $_POST['rememberMe'];

        $status = login($email, $password);
        $info = $_SESSION['info'];
        
        if($status){

            if($info['Role'] == "General User") header('location: ../index.php');
            if($info['Role'] == "Administrator") header('location: ../index.php');
            if($info['Role'] == "Content Writer") header('location: ../index.php');
            if($info['Role'] == "Critic") header('location: ../index.php');
           

        }else popup("Error!", "Could not sign-in. Invalid sign-in credentials.");
        
    }

?>