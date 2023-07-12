<?php

    require_once('../Models/user-info-model.php');
    require_once('message-controller.php');  
    
    if(isset($_POST['submit'])){

        $email = $_POST['email'];
        $password = $_POST['password'];
        $Remember;

        if(isset($_POST['Remember'])){
            $Remember="true";
        }
       if(!isset($_POST['Remember'])){
            $Remember="false";
        }


        $status = login($email, $password);
        
        
        if($status!=false){
            if($Remember=="true"){
                setcookie("flag","true",time()+86000,"/");
            }
            if($Remember=="false"){
                setcookie("flag","false",time()+360,"/");
            }
           

            
            setcookie("id",$status['UserID'],time()+86000,"/");

            

            if($status['Role'] == "General User")header('location: ../index.php');
            if($status['Role'] == "Administrator") header('location: ../index.php');
            if($status['Role'] == "Content Writer") header('location: ../index.php');
            if($status['Role'] == "Critic") header('location: ../index.php');
           

        }else popup("Error!", "Could not sign-in. Invalid sign-in credentials.");
        
    }

?>