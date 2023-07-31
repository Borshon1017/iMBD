<?php
require_once('../Models/poll-model.php');
require_once('message-controller.php');
$pollid=$_GET['pollid'];
$status=deletepoll($pollid);
if($status) popup("Congratulations!", "Your poll has been Delete.");
        else popup("Error!", "Could not delete poll.");

?>