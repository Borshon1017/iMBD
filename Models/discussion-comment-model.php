<?php

 require_once('database.php');

    function addComment($dID, $uID, $username, $comment){

    $con = dbConnection();

    $sql = "insert into DiscussionComment values('', '{$dID}' ,'{$uID}', '{$username}' ,'{$comment}')";

    if(mysqli_query($con, $sql)) return true;
    else return false;
    
}

function getAllComments($dID){

    $con = dbConnection();
    
    $sql="select * from DiscussionComment where DiscussionID='{$dID}'";
    $result=mysqli_query($con,$sql);
    return $result;
}