<?php

    require_once('../Models/discussion-model.php');
    require_once('message-controller.php');

    if(isset($_POST['submit'])){

        $discussionTitle = $_POST['discussionTitle'];
        $description = $_POST['description'];

        if(strlen(trim($discussionTitle)) == 0 || strlen(trim($description)) == 0) popup("Error!", "You can not leave any fields empty.");

        $status = createDiscussion($discussionTitle, $description);
        if($status) popup("Congratulations!", "New discussion has been created.");
        else popup("Error!", "Could not create discussion. Please try again.");
        
    }

?>