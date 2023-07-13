<?php

    require_once('../Models/poll-model.php');
    require_once('message-controller.php');

    if(isset($_POST['submit'])){

        $pollTitle = $_POST['pollTitle'];
        $option1 = $_POST['option1'];
        $option2 = $_POST['option2'];
        $option3 = $_POST['option3'];
        $option4 = $_POST['option4'];
        $id = $_COOKIE['id'];

        $status = createPoll($id, $pollTitle, $option1, $option2, $option3, $option4);
        if($status) popup("Congratulations!", "New poll has been created.");
        else popup("Error!", "Could not create poll. Please try again.");
        
    }

?>