<?php

    require_once('../Models/user-info-model.php');
    require_once('message-controller.php');

    if(isset($_POST['submit'])){

        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repassword=$_POST['repassword'];
        $role = 'Content Writer';

       
        if(strlen(trim($fullname)) == 0 || strlen(trim($username)) == 0 || strlen(trim($phone)) == 0 || strlen(trim($email)) == 0 || strlen(trim($password)) == 0 || strlen(trim($repassword)) == 0) popup("Error!", "You can not leave any fields empty.");

       
        $namepart = explode(' ', $fullname);

        if(count($namepart) < 2) {
            popup("Error!", "Name needs to be atleast two words.");
            return;
        }
        else if(!ctype_alpha($fullname[0])) {
            popup("Error!", "Name can not start with a digit.");
            return;
        }
        else if((!ctype_alnum(str_replace(array('.', ' '), '', $fullname)))) {
            popup("Error!", "Name can only contain A-Z, a-z and . (dot).");
            return;
        }

        
        if(strlen($phone)!=11) {
            popup("Error!", "Invalid phone number, Please try again.");
            return;
        }
        if($phone[0] == "0" && $phone[1] == "1") {}
        else{
            popup("Error!", "Invalid phone number, Please try again.");
            return;
        }

        
    $checking1 = explode('@', $email);
    if(count($checking1) == 2){
        $checking2 = explode('.', $checking1[1]);
        $c = count($checking2);
        if(count($checking2) < 2){
            popup("Error!", "Invalid email, Please try again.");
            return;
        }
    }
    else {
        popup("Error!", "Invalid email, Please try again.");
        return;
    }
    if($email[strlen($email)-1] == "."){
        popup("Error!", "Invalid email, Please try again.");
        return;
    }

        
        if(strlen($password)<8) popup("Error!", "Password must be atleast 8 characters long.");

        
        else if(uniqueEmail($email)==false) popup("Error!", "Email already exists.");

        
        else if($password!=$repassword) popup("Error!", "Passwords does not match.");
        else{

            $status = addUser($fullname, $username, $phone, $email, $password, $role);
            if($status) popup("Congratulations!", "New content writer has been added.");
            else popup("Error!", "Could not add content writer. Please try again");

        }  
        
    }

?>