<?php

require_once('../Models/comment-info-model.php');
require_once('../Models/user-info-model.php');
require_once('message-controller.php');

if(isset($_POST['submit'])){

    $uID = $_COOKIE['id'];
    $row=UserInfo($uID);
    $username = $row['Username'];
    $cID = $_GET['cid'];
    $comment = $_POST['comment'];

    //Null value check
    if(strlen(trim($comment)) == 0)  popup("Error!", "Comment can not be empty");
    
    $status = addComment($uID, $cID, $username, $comment);
    if($status) header('location:../Views/content-page.php?cid='.$cID);
    else popup("Error!", "Unable to post. Please try again");
}

?>