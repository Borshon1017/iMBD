<?php
function TitleMsg($title, $message)
{
   
    session_start();
    $_SESSION['title'] = $title;
    $_SESSION['message'] = $message;

 
    header("Location: popup.php");
    exit();
}
?>
