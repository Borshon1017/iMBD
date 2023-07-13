<?php
session_start();
    require_once('../Models/user-info-model.php'); 
    require_once('../Models/content-info-model.php');
    require_once('../Controllers/message-controller.php');  
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }
       
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMBD Animes</title>
</head>
<body bgcolor="black">
    <table width="100%" bgcolor="black" border="0" cellspacing="0" cellpadding="5">
        <tr height="60px">
            <td>
                &nbsp;<a href="home.html"><img src="../Uploads/logo.png" width="80px"></a>
            </td>
            <td>
                <input type="text" placeholder="Search iMBD" size="100px">
            </td>
            <td>
                <font color="white" face="times new roman">Watchlist</font>
            </td>
            <td>
                <a href="sign-in.html">
                    <font color="white" face="times new roman">Sign In</font>
                </a>
            </td>
        </tr>
    </table><br><br><br>

    <center>
        <font color="F5C518" face="times new roman" size="12">Animes</font><br><br><br>
        <hr color="F5C518" width="530px"><br><br><br>

        <table width="40%" bgcolor="black" border="0" cellspacing="0" cellpadding="15">
                    <?php for ($cid = 1; $cid <=countContent(); $cid++) showAnime($cid, "view"); ?>
                </table><br><br><br>
    </center>
    <br><br><br>
    <center>
        <font color="white" face="times new roman" size="3">iMBD</font><br><br>
        <font color="white" face="times new roman" size="2">A Maa Babar Dowa Company</font><br>
        <font color="white" face="times new roman" size="1">© 2023 by iMBD.com, Inc.</font><br><br>
    </center>

</body>
</html>