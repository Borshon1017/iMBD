<?php

    require_once('../Models/comment-info-model.php');

    $commentID = $_GET['id'];
    $cID = $_GET['cid'];

    if(deleteComment($commentID)) header('location:../Views/content-page.php?cid='.$cID);
    else popup("Error!", "Unable to delete comment. Please try again");

?>