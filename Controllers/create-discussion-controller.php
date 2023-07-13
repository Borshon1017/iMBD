<?php

    require_once('../Models/discussion-model.php');
    require_once('message-controller.php');

    if(isset($_POST['submit'])){

        $discussionTitle = $_POST['discussionTitle'];
        $description = $_POST['description'];

        $status = createDiscussion($discussionTitle, $description);
        if($status) popup("Congratulations!", "New discussion has been created.");
        else popup("Error!", "Could not create discussion. Please try again.");
        
    }

?>