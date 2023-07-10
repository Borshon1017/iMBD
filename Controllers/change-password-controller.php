<?php

require_once('../Models/user-info-model.php');         
$id=$_SESSION['id'];
$row=UserInfo($id);

if(isset($_POST['submit'])){
    $oldpass=$_POST['oldpass'];
    $newpass=$_POST['newpass'];
    $repass=$_POST['repass'];

    if($oldpass!=$row['Password']){
        echo 'Old Password Invalid';
    }else if($newpass!=$repass) {
        echo 'Password does not match!';
    }else if(strlen($newpass)<8){
        echo 'Password less than 8 character!';
    }else{
        if(changePassword($id,$newpass)==true){
            header('location:../Views/wrong.html');
        }
        else{

        }

    }
}
?>