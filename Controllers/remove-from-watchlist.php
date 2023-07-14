<?php
require_once('../Controllers/message-controller.php');
require_once('../Models/content-info-model.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $cid = $_POST['cid'];
    $id= $id =$_COOKIE['id'];

    removeFromWatchlist($cid, $id);

    popup("Watchlist", "Removed from Watchlist sucessfully");
    
}
?>