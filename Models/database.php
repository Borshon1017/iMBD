<?php

function dbConnection(){

    $conn = mysqli_connect('localhost', 'root', '', 'iMBD');
    return $conn;
    
}

?>
