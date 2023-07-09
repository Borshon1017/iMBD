<?php

function dbConnection(){

    $conn = mysqli_connect('localhost', 'root', '', 'imbd');

    return $conn;
    
}

?>