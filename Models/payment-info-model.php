<?php
 require_once('database.php');
 require_once('user-info-model.php');
 if(isset($_COOKIE['flag']))
 {
     $id=$_COOKIE['id'];
 }

 function getPaymentInfoByUserID($userID)
{
    $con = dbConnection();
    $sql = "SELECT * FROM PaymentInfo WHERE UserID = '$userID'";
    $result = mysqli_query($con, $sql);
    return $result;
}

function getAllPaymentInfo()
{
    $con = dbConnection();
    $sql = "SELECT * FROM PaymentInfo ";
    $result = mysqli_query($con, $sql);
    return $result;
}
 

?>