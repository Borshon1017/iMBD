<?php
require_once('../Controllers/message-controller.php');
require_once('../Models/database.php');
require_once('../Models/content-info-model.php');
require_once('../Models/user-info-model.php');

$id = $_COOKIE['id'];
$cid = $_POST['cid'];



$contentResult = getContentDetails($cid);
if ($contentResult) {
    $crow = mysqli_fetch_assoc($contentResult);
    $title = $crow['ContentTitle'];
    $releaseDate = $crow['ReleaseDate'];
    $posterURL = $crow['Poster'];
    $trailer = $crow['Trailer'];
    $description = $crow['ContentDescription'];
    $director = $crow['Director'];
    $cast = $crow['Cast'];
    $price = $crow['Price'];
}

$con = dbConnection();
$purchaseDate = date("d-m-Y");
$sql = "INSERT INTO PaymentInfo (UserID, Username, ContentTitle, Price, PurchaseDate) 
        VALUES ('$id', '$username', '$title', '$price', '$purchaseDate')";
$insertResult = mysqli_query($con, $sql);

if ($insertResult) {
    header('location:../views/download-page.php?cid=' . $cid);
} else {
    return false;
}
?>