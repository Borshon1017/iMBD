<?php

function dbConnection(){

    $con = mysqli_connect('127.0.0.1', 'root', '', 'iMBD');
    return $con;
    
}

?>