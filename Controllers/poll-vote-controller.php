<?php

require_once('../Models/pollvotes-model.php');
require_once('message-controller.php');

if(isset($_POST['submit'])){

    $status = vote($pollID, $id, $vote);
    if($status) popup("Thank You!", "Thank you for your opinion. It'll help us out a lot.");
    else popup("Error!", "Unable to vote. Please try again");
    
}

?>