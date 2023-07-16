<?php
require_once('message-controller.php');
require_once('../Models/database.php');

$id = $_COOKIE['id'];
$cid = $_POST['cid'];

$con = dbConnection();

$sql = "insert into watchlist values('','{$cid}' ,'{$id}')";

if (mysqli_query($con, $sql)) {
    popup("Watchlist", "Content Added to watchlist sucessfully");
} else {
    popup("Watchlist", "Failed to Add to watchlist");
}


?>

