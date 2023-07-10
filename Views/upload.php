<?php
$src = $_FILES['myfile']['tmp_name'];


$des = "../Uploads/Images".$_FILES['myfile']['name'];

if(move_uploaded_file($src, $des)){
    echo "Success";
}else{
    echo "Error";
}

?>