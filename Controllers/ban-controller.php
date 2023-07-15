<?php
    require_once('../Models/user-info-model.php'); 
    require_once('message-controller.php'); 
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }
    $id=$_GET['id'];
    

     if(banUser($id)){
        popup("Success!","User has been Banned successfully");
     }else{
        popup("Error!", "Could not Ban user. Please try again."); 
     }

?>