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
function deleteComment($commentID){

    $con = dbConnection();
    
    $sql="DELETE FROM CommentInfo WHERE CommentID='$commentID'";

    if(mysqli_query($con, $sql)) return true;
    else return false;

}
function getComment($commentID){

    $con = dbConnection();
    
    $sql = "select* from CommentInfo where CommentID = '{$commentID}'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row;

}
function updateComment($commentID, $message){

    $con = dbConnection();
    $sql = "update CommentInfo set Comment='$message' where CommentID ='$commentID'";
    $result = mysqli_query($con, $sql);
    return true;

}

?>