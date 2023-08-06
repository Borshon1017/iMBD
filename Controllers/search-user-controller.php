<?php
require_once('../Models/user-info-model.php');
    $json= $_REQUEST['name'];
    $user=json_decode($json);
    $row=search($user);
    if(mysqli_num_rows($row) > 0) {
        while($user = mysqli_fetch_assoc($row)) {
            echo json_encode($user);
        }
    }else{
        echo json_encode("No");
    }
?>