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

        //Null value checking
        if(strlen(trim($email)) == 0 || strlen(trim($password)) == 0) popup("Error!", "You can not leave any fields empty.");

        $status = login($email, $password);
   
        
        if($status!=false){
    
            if($status['Role'] == "General User" and $status['Status'] == "Active"  ){

                if($Remember=="true"){
                    setcookie("flag","true",time()+999999999,"/");
                }
                if($Remember=="false"){
                    setcookie("flag","false",time()+3600,"/");
                }           
                setcookie("id",$status['UserID'],time()+99999999999,"/");
                header('location: ../index.php');

            }else if($status['Role'] == "Administrator" and $status['Status'] == "Active" ){
                
                if($Remember=="true"){
                    setcookie("flag","true",time()+999999999,"/");
                }
                if($Remember=="false"){
                    setcookie("flag","false",time()+3600,"/");
                }           
                setcookie("id",$status['UserID'],time()+99999999999,"/");
                header('location: ../index.php');
            }else if($status['Role'] == "Content Writer" and  $status['Status'] == "Active"){
                
                if($Remember=="true"){
                    setcookie("flag","true",time()+999999999,"/");
                }
                if($Remember=="false"){
                    setcookie("flag","false",time()+3600,"/");
                }           
                setcookie("id",$status['UserID'],time()+99999999999,"/");
                header('location: ../index.php');
            }else if($status['Role'] == "Critic" and $status['Status'] == "Active"){
                
                if($Remember=="true"){
                    setcookie("flag","true",time()+999999999,"/");
                }
                if($Remember=="false"){
                    setcookie("flag","false",time()+3600,"/");
                }           
                setcookie("id",$status['UserID'],time()+99999999999,"/");
                header('location: ../index.php');
            }else{
                popup("Error!", "Could not sign-in.Your are banned from the website.");
            }

        }else{
            popup("Error!", "Could not sign-in. Invalid sign-in credentials.");
        }
        
    }

?>