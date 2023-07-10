<?php

    require_once('../Models/user-info-model.php');       
    
    if(isset($_POST['submit'])){

        $email = $_POST['email'];
        $password = $_POST['password'];
        $rememberMe = $_POST['rememberMe'];

        $status = login($email, $password);
        $id = $_SESSION['id'];
        $row=UserInfo($id);
        
        if($status){

            if($row['Role'] == "General User") header('location: ../index.php');
            if($row['Role'] == "Administrator") header('location: ../index.php');
            if($row['Role'] == "Content Writer") header('location: ../index.php');
            if($row['Role'] == "Critic") header('location: ../index.php');
           

        }else{
           header('location:../Views/sign-in-error.html');
        }
        
    }

?>