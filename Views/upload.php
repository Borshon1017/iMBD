<?php
    require_once('../Models/user-info-model.php');
    require_once('../Controllers/message-controller.php');

    $id = $_SESSION['id'];
    $src = $_FILES['myfile']['tmp_name'];

    $fileName = 'Uploads/Images/'.$_FILES['myfile']['name'];
    $des = "../Uploads/Images/".$_FILES['myfile']['name'];

    if(move_uploaded_file($src, $des)){
    popup("Success!", "Your profile picture has been updated.");
         
    $info = $_SESSION['info'];
    updateProfilePicture($fileName, $id);

    }
    else{
        popup("Error!", "Could not update profile picture. Please try again.");
    }


?>