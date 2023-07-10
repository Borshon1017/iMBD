<?php
<<<<<<< Updated upstream
require_once('../Models/user-info-model.php');   
$info = $_SESSION['info'];
$id = $info['UserID'];
=======

>>>>>>> Stashed changes
$src = $_FILES['myfile']['tmp_name'];

$fileName = 'Uploads/Images/'.$_FILES['myfile']['name'];
$des = "../Uploads/Images/".$_FILES['myfile']['name'];

if(move_uploaded_file($src, $des)){
    echo "Success";
         
    $info = $_SESSION['info'];
    updateProfilePicture($fileName, $id);

}
else{
    echo "Error";
}


?>