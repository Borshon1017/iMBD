<?php
require_once('../Controllers/message-controller.php');
require_once('../Models/database.php');

$id = $_COOKIE['id'];
$cid = $_GET['cid'];

$con = dbConnection();

$sql = "insert into watchlist values('','{$cid}' ,'{$id}')";

if (mysqli_query($con, $sql)) {
    popup("Watchlist", "Content Added to watchlist sucessfully");
} else {
    popup("Watchlist", "Failed to Add to watchlist");
}


?>

