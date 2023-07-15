<?php
    require_once('../Models/discussion-comment-model.php');
    require_once('message-controller.php');

    if(isset($_POST['submit'])){

        $commentID = $_GET['id'];
        $comment = $_POST['comment'];
        $dID = $_GET['did'];

        
        if(updateComment($commentID, $comment)) header('location:../Views/discussion.php?did='.$dID);
        else popup("Error!", "Could not edit comment. Please try again.");

    }

?>