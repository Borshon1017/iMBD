<?php

 require_once('database.php');

    function createPoll($userid,$pollTitle, $option1, $option2, $option3, $option4){

    $con = dbConnection();

    $sql = "insert into Poll values('','{$userid}','{$pollTitle}' ,'{$option1}', '{$option2}', '{$option3}', '{$option4}')";

    if(mysqli_query($con, $sql)) return true;
    else return false;
    
}

?>
