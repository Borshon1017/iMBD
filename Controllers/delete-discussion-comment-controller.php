<?php

    require_once('../Models/discussion-comment-model.php');

    $commentID = $_GET['id'];
    $dID = $_GET['did'];

    if(deleteComment($commentID)) header('location:../Views/discussion.php?did='.$dID);
    else popup("Error!", "Unable to post. Please try again");

?>