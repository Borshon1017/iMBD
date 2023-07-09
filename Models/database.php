<?php

function dbConnection(){

    $conn = mysqli_connect('localhost:3308', 'root', '', 'iMBD');
    return $conn;
    
}

?>