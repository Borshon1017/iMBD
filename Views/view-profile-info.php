<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMBD View Profile Info</title>
</head>
<body bgcolor="black">
<?php
require_once('../Models/database.php');
require_once('../Models/user-info-model.php');
$userData = returnUserData();

?>
 
    <table width="100%" bgcolor="black" border="0" cellspacing="0" cellpadding="15">
        <tr height="60px">
            <td>
                &nbsp;<img src="../Images/logo.png" width="80px">
            </td>
            <td>
                <input type="text" placeholder="Search iMBD" size="100px">
            </td>
            <td>
                <img src="../Images/icons/default_pfp.jpg" width="40px">&nbsp;&nbsp;&nbsp;
                <select name="profile" onchange="location = this.value;">
                    <option disabled selected hidden>Username</option>
                    <option value="Views/user-profile.html">Profile</option>
                    <option value="watchlist.html">Watchlist</option>
                    <option value="">Settings</option>
                    <option value="">Log Out</option>
                </select>
            </td>
        </tr>
    </table><br><br><br>

    <center>

        <img src="../Images/icons/default_pfp.jpg" width="100px"><br><br><br>

        <table width="40%" bgcolor="black" border="0" cellspacing="0" cellpadding="10">
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Full Name : <?php echo $userData['Fullname']; ?></font>
                </td>
            </tr>
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Username : <?php echo $userData['Username']; ?></font>
                </td>
            </tr>
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Phone Number : <?php echo $userData['Phone']; ?></font>
                </td>
            </tr>
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Email : <?php echo $userData['Email']; ?></font>
                </td>
            </tr>
        </table><br><br><br>
    </center>
    <br><br><br><br><br>
    <center>
        <a href="about-us.html"><font color="white" face="times new roman" size="4">About Us</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="helpline.html"><font color="white" face="times new roman" size="4">Helpline</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="faq.html"><font color="white" face="times new roman" size="4">FAQ</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="terms-and-services.html"><font color="white" face="times new roman" size="4">Terms and Services</font></a><br><br><br>
        <font color="white" face="times new roman" size="3">iMBD</font><br><br>
        <font color="white" face="times new roman" size="2">A Maa Babar Dowa Company</font><br>
        <font color="white" face="times new roman" size="1">© 2023 by iMBD.com, Inc.</font><br><br>
    </center>

</body>
</html>