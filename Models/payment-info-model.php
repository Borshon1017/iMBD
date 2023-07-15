<?php


 require_once('database.php');
 require_once('user-info-model.php');
 //$id =$_COOKIE['id'];
 if(isset($_COOKIE['flag']))
 {
    $id=$_COOKIE['id'];
 }
 else
 {
   
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

function showPaymentInfoByID()
{
    $userID = $_COOKIE['id'];
    $paymentInfo = getPaymentInfoByUserID($userID);

    echo '<table width="85%" bgcolor="black" border="0" cellspacing="0" cellpadding="15">';
    echo '<tr>';

    echo '<td>';
    echo '<font color="F5C518" face="times new roman" size="5">Content Title</font>';
    echo '<hr color="F5C518" width="150px" align="left">';
    echo '</td>';
    echo '<td>';
    echo '<font color="F5C518" face="times new roman" size="5">Price</font>';
    echo '<hr color="F5C518" width="75px" align="left">';
    echo '</td>';
    echo '<td>';
    echo '<font color="F5C518" face="times new roman" size="5">Purchase Date</font>';
    echo '<hr color="F5C518" width="160px" align="left">';
    echo '</td>';
    echo '</tr>';

    while ($row = mysqli_fetch_assoc($paymentInfo)) 
    {
        
        $contentTitle = $row['ContentTitle'];
        $price = $row['Price'];
        $purchaseDate = $row['PurchaseDate'];

        echo '<tr>';
        echo '<td>';
        echo '<font color="white" face="times new roman" size="5">' . $contentTitle . '</font>';
        echo '</td>';
        echo '<td>';
        echo '<font color="white" face="times new roman" size="5">' . $price . '</font>';
        echo '</td>';
        echo '<td>';
        echo '<font color="white" face="times new roman" size="5">' . $purchaseDate . '</font>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</table>';
}

function showAllPaymentInfo()
{
    $userID = $_COOKIE['id'];
    $paymentInfo = getAllPaymentInfo();

    echo '<table width="85%" bgcolor="black" border="0" cellspacing="0" cellpadding="15">';
    echo '<tr>';
    echo '<td>';
    echo '<font color="F5C518" face="times new roman" size="5">Username</font>';
    echo '<hr color="F5C518" width="120px" align="left">';
    echo '</td>';
    echo '<td>';
    echo '<font color="F5C518" face="times new roman" size="5">Content Title</font>';
    echo '<hr color="F5C518" width="150px" align="left">';
    echo '</td>';
    echo '<td>';
    echo '<font color="F5C518" face="times new roman" size="5">Price</font>';
    echo '<hr color="F5C518" width="75px" align="left">';
    echo '</td>';
    echo '<td>';
    echo '<font color="F5C518" face="times new roman" size="5">Purchase Date</font>';
    echo '<hr color="F5C518" width="160px" align="left">';
    echo '</td>';
    echo '</tr>';

    while ($row = mysqli_fetch_assoc($paymentInfo)) 
    {
        $username = $row['Username'];
        $contentTitle = $row['ContentTitle'];
        $price = $row['Price'];
        $purchaseDate = $row['PurchaseDate'];

        echo '<tr>';
        echo '<td>';
        echo '<font color="white" face="times new roman" size="5">' . $username . '</font>';
        echo '</td>';
        echo '<td>';
        echo '<font color="white" face="times new roman" size="5">' . $contentTitle . '</font>';
        echo '</td>';
        echo '<td>';
        echo '<font color="white" face="times new roman" size="5">' . $price . '</font>';
        echo '</td>';
        echo '<td>';
        echo '<font color="white" face="times new roman" size="5">' . $purchaseDate . '</font>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</table>';
}

?>