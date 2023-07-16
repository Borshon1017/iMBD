<?php
require_once('message-controller.php');
require_once('../Models/database.php');
require_once('../Models/payment-info-model.php');
require_once('../Models/content-info-model.php');
require_once('../Models/user-info-model.php');



$id = $_COOKIE['id'];
$cid = $_POST['cid'];
$contentResult = getContentDetails($cid);
if ($contentResult) {
    $crow = mysqli_fetch_assoc($contentResult);
    $title = $crow['ContentTitle'];
    
    $price = $crow['Price'];
    $purchaseDate = date("d-m-Y");
}
$row=UserInfo($id);

    $username=$row['Username'];
    $role=$row['Role'];
    if($role=="General User"){
    addToPurchase($id, $username, $title, $price, $purchaseDate);
    popup("Purchased", "Content purchased sucessfully");
    }else{
        popup("Error", "You can't purchase Content"); 
    }

?>