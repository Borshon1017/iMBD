<?php

    require_once('../Models/user-info-model.php');
    session_start();        

    if(isset($_POST['submit'])){

        $email = $_POST['email'];
        $password = $_POST['password'];
        $rememberMe = $_POST['rememberMe'];

        $status = login($email, $password);
        $info = $_SESSION['info'];

        if($status){

            if($info['Role']== "General User") header('location: ../index.html');
            if($info['Role'] == "Administrator") header('location: ../index.html');
            if($info['Role'] == "Content Writer") header('location: ../index.html');
            if($info['Role'] == "Critic") header('location: ../index.html');

        }else{
           header('location:../Views/sigin-error.html');
        }
    }

?>