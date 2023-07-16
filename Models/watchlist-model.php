<?php
 require_once('database.php');
    
 $id = $_COOKIE['id'];

function AddtoWishlist($id, $cid)
{ 
   

    $con = dbConnection();

    $sql = "insert into watchlish values(' ',' {$id}' ,'{$cid}' )";

    if(mysqli_query($con, $sql)) return true;
    else return false;
    
}


function getContentDeatils($cid, $id){

    $con = dbConnection();

    $sql = "SELECT * FROM contentinfo WHERE ContentID = '$cid'";

    $result = mysqli_query($con, $sql);
    return $result;
    
}

function showWatchlist($id)
{
    $con = dbConnection();
    $sql = "SELECT * FROM ContentInfo c, Watchlist w WHERE c.ContentID = w.ContentID AND w.UserID = '$id'";
    $result = mysqli_query($con, $sql);
     return $result;
}

function watchlistcheck($id,$cid){
    $con = dbConnection();
    $sql = "SELECT * FROM watchlist WHERE UserID = '$id' AND ContentID = '$cid'";
    $result = mysqli_query($con, $sql);
    return $result;
}

?>