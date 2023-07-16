<?php
     require_once('../Models/discussion-model.php');
     require_once('message-controller.php');

     
    if(isset($_POST['submit'])){

        $id=$_GET['id'];
        $discussionTitle=$_POST['discussionTitle'];
        $description=$_POST['description'];

        if(strlen(trim($discussionTitle)) == 0 || strlen(trim($description)) == 0) popup("Error!", "You can not leave any fields empty.");

        if(updateDiscussion($id,$discussionTitle,$description)===true)popup("Success!", "Your discusson has been updated successfully");
        else popup("Error!", "Could not update discussion. Please try again.");
    }
 
?>