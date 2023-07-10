<?php
$src = $_FILES['myfile']['tmp_name'];
//echo $src;

$des = "../Uploads/Images".$_FILES['myfile']['name'];
//echo $des;
if(move_uploaded_file($src, $des)){
    echo "Success";
}else{
    echo "Error";
}

?>