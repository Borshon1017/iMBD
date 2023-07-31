<?php

require_once('../Models/comment-info-model.php');
require_once('../Models/user-info-model.php');
require_once('message-controller.php');

$json = $_REQUEST['json'];
$commentOBJ = json_decode($json);

    
$status = addComment($commentOBJ->uid, $commentOBJ->cid, $commentOBJ->username, $commentOBJ->comment);
if($status) header('location:../Views/content-page.php?cid='.$commentOBJ->cid);
else popup("Error!", "Unable to post. Please try again");


?>