<?php
    require_once('../Models/poll-model.php');
    require_once('message-controller.php');

    if(isset($_POST['submit'])){

        $pollid=$_GET['id'];

        $pollTitle=$_POST['pollTitle'];
        $option1=$_POST['option1'];
        $option2=$_POST['option2'];
        $option3=$_POST['option3'];
        $option4=$_POST['option4'];

        if(strlen(trim($pollTitle)) == 0 || strlen(trim($option1)) == 0 || strlen(trim($option2)) == 0 || strlen(trim($option3)) == 0 || strlen(trim($option4)) == 0) popup("Error!", "You can not leave any fields empty.");

        if(updatePoll($pollid,$pollTitle,$option1,$option2,$option3,$option4)===true)popup("Success!", "Your poll has been updated successfully");
        else popup("Error!", "Could not update information. Please try again.");

    }

?>