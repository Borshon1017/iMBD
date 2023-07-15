<?php
    require_once('../Models/comment-info-model.php');
    require_once('message-controller.php');

    if(isset($_POST['submit'])){

        $commentID = $_GET['id'];
        $comment = $_POST['comment'];
        $cID = $_GET['cid'];

        
        if(updateComment($commentID, $comment)) header('location:../Views/content-page.php?cid='.$cID);
        else popup("Error!", "Could not edit comment. Please try again.");

    }

?>