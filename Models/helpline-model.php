<?php

 require_once('database.php');

function sendMail($sender, $reciever, $message){

    $con = dbConnection();

    $sql = "insert into Helpline values('', '{$sender}' ,'{$reciever}', '{$message}')";

    if(mysqli_query($con, $sql)) return true;
    else return false;
    
}

?>
