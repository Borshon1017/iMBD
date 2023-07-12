<?php

require_once('../Models/user-info-model.php');
require_once('message-controller.php');            
$id=$_COOKIE['id'];
$row=UserInfo($id);

if(isset($_POST['submit'])){
    $oldpass=$_POST['oldpass'];
    $newpass=$_POST['newpass'];
    $repass=$_POST['repass'];

    if($oldpass!=$row['Password']) popup("Error!", "Old password invalid");
    else if($newpass!=$repass) popup("Error!", "Passwords does not match. Please check again.");
    else if(strlen($newpass)<8)popup("Error!", "Password must be atleast 8 characters long.");
    else{

        if(changePassword($id,$newpass)==true) popup("Congratulations!", "Your password has been changed.");
        else popup("Error!", "Could not change password. Please try again");

    }
}
?>