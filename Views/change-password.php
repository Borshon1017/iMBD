<?php
    require_once('../Models/user-info-model.php');    
    $id=$_SESSION['id'];  
    $row=UserInfo($id);  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMBD Forgot Password</title>
</head>
<body bgcolor="black">
    <table width="100%" bgcolor="black" border="0" cellspacing="0" cellpadding="15">
        <tr height="60px">
            <td>
                &nbsp;<img src="../Uploads/logo.png" width="80px">
            </td>
            <td>
                <input type="text" placeholder="Search iMBD" size="100px">
            </td>
            <td>
                <img src="../<?php echo $row['ProfilePicture']; ?>"  width="40px">&nbsp;&nbsp;&nbsp;
                <select name="profile" onchange="location = this.value;">
                    <option disabled selected hidden><?php echo $row['Username']; ?></option>
                    <option value="user-profile.html">Profile</option>
                    <option value="watchlist.html">Watchlist</option>
                    <option value="settings.php">Settings</option>
                    <option value="sign-in.html">Log Out</option>
                </select>
            </td>
        </tr>
    </table>
    <br><br>
    <form action="../Controllers/change-password-controller.php" method="post">
    <table width="30%" bgcolor="black" border="1" cellspacing="0" cellpadding="25" align="center" bordercolor="F5C518">
        <tr>
            <td>
                <font color="F5C518" face="times new roman" size="6">Create New Password</font>
                <br><br>
                <font color="white" face="times new roman" size="4">Enter Old Password</font>
                <br>
                <input type="password" name="oldpass" size="43px" required><br><br>
                <hr color="F5C518" width="auto">
                <br>
                <font color="white" face="times new roman" size="4">New Password</font>
                <br>
                <input type="password" name="newpass" size="43px" required>
                <br><br>
                <font color="white" face="times new roman" size="2"><i>i &nbsp;</i></font><font color="white" face="times new roman" size="2">Passwords must be at least 8 characters.</font>
                <br><br>
                <font color="white" face="times new roman" size="4">Re-enter New Password</font>
                <br>
                <input type="password" name="repass" size="43px" required>
                <br><br><br>
                <input type="submit" name="submit" value="Change Password">
            </td>
            <br>
        </tr>
    </table>
    </form>
    <br><br><br><br><br>
    <center>
        <a href="about-us.html"><font color="white" face="times new roman" size="4">About Us</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="helpline.html"><font color="white" face="times new roman" size="4">Helpline</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="faq.html"><font color="white" face="times new roman" size="4">FAQ</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="terms-and-services.html"><font color="white" face="times new roman" size="4">Terms and Services</font></a><br><br><br>
        <font color="white" face="times new roman" size="3">iMBD</font><br><br>
        <font color="white" face="times new roman" size="2">A Maa Babar Dowa Company</font><br>
        <font color="white" face="times new roman" size="1">© 2023 by iMBD.com,  Inc.</font><br><br>
    </center>
</body>
</html>