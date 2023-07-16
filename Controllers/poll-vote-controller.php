<?php

require_once('../Models/pollvotes-model.php');
require_once('message-controller.php');

if(isset($_POST['submit'])){

    $pollID = $_GET['pid'];
    $id = $_COOKIE['id'];
    $vote = $_POST['vote'];
    $status = vote($pollID, $id, $vote);

    if(!isset($vote)) popup("Error!", "Unable to vote, You need to choose an option.");
    if($status) popup("Thank You!", "Thank you for your opinion. It'll help us out a lot.");
    else popup("Error!", "Unable to vote. Please try again");
}

?>