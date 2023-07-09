<?php

    require_once('../Models/user-info-model.php');
    
    
   
    

    if(isset($_POST['submit'])){

        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repassword=$_POST['repassword'];


        if(strlen($password)<8){
            echo 'Password less than 8 character!';
        }
        else if(uniqueEmail($email)==false){
            echo 'Email already used!';
        }else if($password!=$repassword){
            echo 'Password does not match!';
        }else{
            $status = addUser($fullname, $username, $phone, $email, $password);
            if($status) header('location: ../Views/congratulations.html');
            else echo "Account Creation Failed";
        }


        
        
        
    }

?>