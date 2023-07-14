<?php

require_once('../Models/comment-info-model.php');
require_once('message-controller.php');

if(isset($_POST['submit'])){

    $pollID = $_GET['pid'];
    $id = $_COOKIE['id'];
    $vote = $_POST['vote'];
    $status = vote($pollID, $id, $vote);
    if($status) popup("Thank You!", "Thank you for your opinion. It'll help us out a lot.");
    else popup("Error!", "Unable to vote. Please try again");
}

?>