<?php

 require_once('database.php');

    function addComment($uID, $cID, $username, $comment){

    $con = dbConnection();

    $sql = "insert into CommentInfo values('', '{$uID}' ,'{$cID}', '{$username}' ,'{$comment}')";

    if(mysqli_query($con, $sql)) return true;
    else return false;
    
}

function getAllComments($cID){

    $con = dbConnection();
    
    $sql="select* from CommentInfo where ContentID='{$cID}'";
    $result=mysqli_query($con,$sql);
    return $result;
}