<?php
    require_once('../Models/user-info-model.php');
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
    <link rel="stylesheet" href="../style.css">
    <title>iMBD Logging Out</title>
</head>
<body bgcolor="black">
    <table width="100%" border="0" cellspacing="0" cellpadding="10">
        <tr height="60px">
            <td>
                &nbsp;<a href="../index.php"><img src="../Uploads/logo.png" width="80px"></a>
            </td>
            <td></td>
            <td></td>
            <td>
                
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="search-content.php"><button class="btn search">Search iMBD</button></a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
            </td>
            <td>
            <?php
                $id =$_COOKIE['id'];
                $row=UserInfo($id);
                if($row['Role'] == "General User"){
                    echo "<img src=\"../{$row['ProfilePicture']} \" width=\"40px\">&nbsp;&nbsp;&nbsp;
                    <select name=\"profile\" onchange=\"location = this.value;\">
                        <option disabled selected hidden> {$row['Username']} </option>
                        <option disabled value=\"user-profile.php\">Profile</option>
                        <option disabled value=\"watchlist.php\">Watchlist</option>
                        <option disabled value=\"purchase-history.php\">Purchase List</option>
                        <option disabled value=\"settings.php\">Settings</option>
                        <option disabled value=\"sign-in.html\">Log Out</option>
                    </select>";
                }
                else if($row['Role'] == "Content Writer" || $row['Role'] == "Administrator" || $row['Role'] == "Critic"){
                    echo "<img src=\"../{$row['ProfilePicture']} \" width=\"40px\">&nbsp;&nbsp;&nbsp;
                    <select name=\"profile\" onchange=\"location = this.value;\">
                        <option disabled selected hidden> {$row['Username']} </option>
                        <option disabled value=\"user-profile.php\">Profile</option>
                        <option disabled value=\"dashboard.php\">Dashboard</option>
                        <option disabled value=\"settings.php\">Settings</option>
                        <option disabled value=\"sign-in.html\">Log Out</option>
                    </select>";
                }
            ?>
            </td>
            <td></td>
        </tr>
    </table><br><br><br><br><br><br><br><br>
    
    <center>
        <font color="F5C518" face="times new roman" size="20">Logging Out</font><br><br><br><br>
        <img src="../Uploads/Icons/loadloop.gif" width="50px"><br><br>
    </center>

    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    <center>
        <a href="Views/about-us.php"><font color="white" face="times new roman" size="4">About Us</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="Views/helpline.php"><font color="white" face="times new roman" size="4">Helpline</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="Views/faq.php"><font color="white" face="times new roman" size="4">FAQ</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="Views/terms-and-services.php"><font color="white" face="times new roman" size="4">Terms and Services</font></a><br><br><br>
        <font color="white" face="times new roman" size="3">iMBD</font><br><br>
        <font color="white" face="times new roman" size="2">A Maa Babar Dowa Company</font><br>
        <font color="white" face="times new roman" size="1">© 2023 by iMBD.com,  Inc.</font><br><br>
    </center>
</body>
</html>

<?php
    session_start();
    session_destroy();
    setcookie("flag","",time()-100000000,"/");
    setcookie("id","",time()-100000000,"/");

    header( "refresh:3;url=../index.php" );
?>
