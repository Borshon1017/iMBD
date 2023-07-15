<?php
require_once('message-controller.php');
require_once('../Models/database.php');


$cid = $_POST['cid'];

$con = dbConnection();
echo $cid;

$sql = "DELETE FROM contentinfo WHERE ContentID = '$cid'";

if (mysqli_query($con, $sql)) {
    echo $cid;

} else {
    popup("Failed", "Failed to Delete");
}


?>

