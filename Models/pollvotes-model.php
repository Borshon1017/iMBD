<?php

 require_once('database.php');

function vote($pollID, $id, $vote){

    $con = dbConnection();

    $sql = "insert into PollVotes values('', '{$pollID}' ,'{$id}', '{$vote}')";

    if(mysqli_query($con, $sql)) return true;
    else return false;
    
}

?>
