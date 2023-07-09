<?php

    require_once('../Models/user-info-model.php');

    if(isset($_POST['submit'])){

        $email = $_POST['email'];
        $password = $_POST['password'];
        $rememberMe = $_POST['rememberMe'];

        $status = login($email, $password);

        if($status){

            if(getRole() == "General User") header('location: ../index.html');
            if(getRole() == "Administrator") header('location: ../index.html');
            if(getRole() == "Content Writer") header('location: ../index.html');
            if(getRole() == "Critic") header('location: ../index.html');

        }else{
           header('location:../Views/sigin-error.html');
        }
    }

?>