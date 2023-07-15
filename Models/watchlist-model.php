<?php
 require_once('database.php');

    $crow;
    $id = $_POST['id'];
    $cid = $_POST['cid'];
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

?>