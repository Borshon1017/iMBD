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

function deleteComment($commentID){

    $con = dbConnection();
    
    $sql="DELETE FROM DiscussionComment WHERE DiscussionCommentID='$commentID'";

    if(mysqli_query($con, $sql)) return true;
    else return false;

}
function getComment($commentID){

    $con = dbConnection();
    
    $sql = "select * from DiscussionComment where DiscussionCommentID ='{$commentID}'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row;

}
function updateComment($commentID, $message){

    $con = dbConnection();
    $sql = "update DiscussionComment set DiscussionComment='$message' where DiscussionCommentID ='$commentID'";
    $result = mysqli_query($con, $sql);
    return true;

}

?>