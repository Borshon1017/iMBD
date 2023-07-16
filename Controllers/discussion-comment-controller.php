<?php

require_once('../Models/discussion-comment-model.php');
require_once('../Models/user-info-model.php');
require_once('message-controller.php');

if(isset($_POST['submit'])){

    $uID = $_COOKIE['id'];
    $row=UserInfo($uID);
    $username = $row['Username'];
    $dID = $_GET['did'];
    $comment = $_POST['comment'];

    //Null value check
    if(empty($comment))  popup("Error!", "Comment can not be empty");

    $status = addComment($dID, $uID, $username, $comment);
    if($status) header('location:../Views/discussion.php?did='.$dID);
    else popup("Error!", "Unable to post. Please try again");
}

?>