<?php

    require_once('../Models/user-info-model.php');

    if(isset($_POST['submit'])){

        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $status = addUser($fullname, $username, $phone, $email, $password);

        if($status) header('location: ../Views/sign-in.html');
        else echo "Account Creation Failed";

    }

?>