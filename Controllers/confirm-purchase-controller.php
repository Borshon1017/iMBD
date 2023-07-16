<?php
require_once('message-controller.php');
require_once('../Models/database.php');
require_once('../Models/payment-info-model.php');
require_once('../Models/content-info-model.php');
require_once('../Models/user-info-model.php');


if(isset($_POST['submit'])){

    $cardNo = $_POST['cardNo'];
    $pinNo = $_POST['pinNo'];

    //Null value check
    if(strlen(trim($cardNo)) == 0 || strlen(trim($pinNo)) == 0) popup("Error!", "You can not leave any fields empty.");

    //Card No check
    if(is_numeric($cardNo)){
        if(strlen(trim($cardNo)) == 11){}
        else popup("Error!", "Card no needs to be 11 digits.");
    }else{
        popup("Error!", "Card no needs to be a number.");
    }

    //Pin No check
    if(is_numeric($pinNo)){
        if(strlen(trim($pinNo)) == 4){}
        else popup("Error!", "PIN no needs to be 4 digits.");
    }else{
        popup("Error!", "PIN no needs to be a number.");
    }


    $id = $_COOKIE['id'];
    $cid = $_GET['cid'];
    $contentResult = getContentDetails($cid);
    if ($contentResult) {
        $crow = mysqli_fetch_assoc($contentResult);
        $title = $crow['ContentTitle'];
        
        $price = $crow['Price'];
        $purchaseDate = date("d-m-Y");
    }
    $row=UserInfo($id);
    $username=$row['Username'];
        
    $status = addToPurchase($id, $username, $title, $price, $purchaseDate);

    if ($status) header('location:../views/download-page.php?cid='.$cid); 
    else popup("Error!", "Unable to purchase this content.");

}


?>