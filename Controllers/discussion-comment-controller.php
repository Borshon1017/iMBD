<?php

require_once('../Models/discussion-comment-model.php');
require_once('../Models/user-info-model.php');
require_once('message-controller.php');

$json = $_REQUEST['json'];
$commentOBJ = json_decode($json);

$status = addComment($commentOBJ->did, $commentOBJ->uid, $commentOBJ->username, $commentOBJ->comment);
if($status) header('location:../Views/discussion.php');
else popup("Error!", "Unable to post. Please try again");


?>