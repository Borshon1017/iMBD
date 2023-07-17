<?php
    require_once('../Models/user-info-model.php');
    require_once('message-controller.php');
    
    $id=$_COOKIE['id'];
    $src = $_FILES['myfile']['tmp_name'];

    //No file selected
    if(empty($src)) popup("Error!", "No file selected.");

    $fileName = 'Uploads/Images/'.$_FILES['myfile']['name'];
    $des = "../Uploads/Images/".$_FILES['myfile']['name'];

    if(move_uploaded_file($src, $des)){ 

    updateProfilePicture($fileName, $id);
    popup("Success!", "Your profile picture has been updated.");

    }
    else popup("Error!", "Could not update profile picture. Please try again.");


?>