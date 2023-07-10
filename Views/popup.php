<?php
session_start();


  
    $title = $_SESSION['title'];
    $message = $_SESSION['message'];

   
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMBD</title>
</head>
<body bgcolor="black">
    <!-- Rest of your HTML code -->
    <center>
        <font color="white" face="times new roman" size="20"><?php echo $title ?></font><br><br>
        <font color="white" face="times new roman" size="6"><?php echo $message ?></font><br><br>
    </center>
    <!-- Rest of your HTML code -->
</body>
</html>
