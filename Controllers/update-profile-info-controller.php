<?php
    require_once('../Models/user-info-model.php');    
    require_once('../Controllers/message-controller.php');
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }  
    if(isset($_POST['updateinfo'])){
      
    $id2=$_GET['id'];
    
    $id=$_COOKIE['id'];
    $fullname = $_POST['Fullname'];
    $username = $_POST['Username'];
    $phone = $_POST['Phone'];
    $email = $_POST['Email'];

        


    if($id!=$id2){
    if(updateUserInfo($id2,$fullname, $username, $phone, $email)===true)popup("Success!", "Your information has been updated successfully");
    else popup("Error!", "Could not update information. Please try again.");
    }else{
    if(updateUserInfo($id,$fullname, $username, $phone, $email)===true)popup("Success!", "Your information has been updated successfully");
    else popup("Error!", "Could not update information. Please try again.");
    }
    

}
?>