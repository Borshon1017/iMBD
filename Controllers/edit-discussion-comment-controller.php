<?php
    require_once('../Models/discussion-comment-model.php');
    require_once('message-controller.php');

    if(isset($_POST['submit'])){

        $commentID = $_GET['id'];
        $comment = $_POST['comment'];
        $dID = $_GET['did'];

        //Null value check
        if(empty($comment))  popup("Error!", "Comment can not be empty");
        elseif (strlen($comment) > 500) {
            popup("Error!", "Comment cannot exceed 300 characters.");}
        if(updateComment($commentID, $comment)) header('location:../Views/discussion.php?did='.$dID);
        else popup("Error!", "Could not edit comment. Please try again.");

    }

?>