<?php

 require_once('database.php');

function createDiscussion($discussionTitle, $description){

    $con = dbConnection();

    $sql = "insert into Discussion values('', '{$discussionTitle}' ,'{$description}')";

    if(mysqli_query($con, $sql)) return true;
    else return false;
    
}

?>
