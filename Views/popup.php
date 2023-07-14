<?php
    require_once('../Models/user-info-model.php'); 
    session_start(); 

    $title = $_SESSION['title'];
    $message = $_SESSION['message'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMBD Popup</title>
</head>
<body bgcolor="black">
    <table width="100%" bgcolor="black" border="0" cellspacing="0" cellpadding="15">
        <tr height="60px">
            <td>
                &nbsp;<a href="../index.php"><img src="../Uploads/logo.png" width="80px"></a>
            </td>
            <td>
                <input type="text" placeholder="Search iMBD" size="100px">
            </td>
            <td>
            <?php
            
            if(!isset($_COOKIE['flag'])){
                echo "<a href=\"sign-in.html\">
                        <font color=\"white\" face=\"times new roman\">Sign In</font>
                    </a>";
            }else{
                $id =$_COOKIE['id'];
                $row=UserInfo($id);
                if($row['Role'] == "General User"){
                    echo "<img src=\"../{$row['ProfilePicture']} \" width=\"40px\">&nbsp;&nbsp;&nbsp;
                    <select name=\"profile\" onchange=\"location = this.value;\">
                        <option disabled selected hidden> {$row['Username']} </option>
                        <option value=\"user-profile.php\">Profile</option>
                        <option value=\"watchlist.php\">Watchlist</option>
                        <option value=\"settings.php\">Settings</option>
                        <option value=\"logout-page.php\">Log Out</option>
                    </select>";
                }
                else if($row['Role'] == "Content Writer" || $row['Role'] == "Administrator" || $row['Role'] == "Critic"){
                    echo "<img src=\"../{$row['ProfilePicture']} \" width=\"40px\">&nbsp;&nbsp;&nbsp;
                    <select name=\"profile\" onchange=\"location = this.value;\">
                        <option disabled selected hidden> {$row['Username']} </option>
                        <option value=\"user-profile.php\">Profile</option>
                        <option value=\"dashboard.php\">Dashboard</option>
                        <option value=\"settings.php\">Settings</option>
                        <option value=\"logout-page.php\">Log Out</option>
                    </select>";
                }
            }
            ?>
            </td>
        </tr>
    </table><br><br><br><br><br><br><br><br>
    
    <center>
        <font color="F5C518" face="times new roman" size="20"><?php echo $title ?></font><br><br>
        <font color="white" face="times new roman" size="6"><?php echo $message ?></font><br><br>
    </center>

    <br><br><br><br><br><br><br><br><br>
    <center>
        <a href="Views/about-us.html"><font color="white" face="times new roman" size="4">About Us</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="Views/helpline.html"><font color="white" face="times new roman" size="4">Helpline</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="Views/faq.html"><font color="white" face="times new roman" size="4">FAQ</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="Views/terms-and-services.html"><font color="white" face="times new roman" size="4">Terms and Services</font></a><br><br><br>
        <font color="white" face="times new roman" size="3">iMBD</font><br><br>
        <font color="white" face="times new roman" size="2">A Maa Babar Dowa Company</font><br>
        <font color="white" face="times new roman" size="1">© 2023 by iMBD.com,  Inc.</font><br><br>
    </center>
</body>
</html>

