<?php
    require_once('../Models/user-info-model.php');   
    session_start();        
    $id=$_SESSION['id'];
    $row=UserInfo($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMBD Settings</title>
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
                <img src="..<?php echo $row['ProfilePicture']; ?>" width="40px">&nbsp;&nbsp;&nbsp;
                <select name="profile" onchange="location = this.value;">
                    <option disabled selected hidden><?php echo $row['Username']; ?></option>
                    <option value="Views/user-profile.html">Profile</option>
                    <option value="watchlist.html">Watchlist</option>
                    <option value="">Settings</option>
                    <option value="sign-in.html">Log Out</option>
                </select>
            </td>
        </tr>
    </table><br><br><br>

    <center>
        <font color="F5C518" face="times new roman" size="12">Settings</font><br><br><br>
        <hr color="F5C518" width="530px"><br><br><br>

        <table width="60%" bgcolor="black" border="0" cellspacing="0" cellpadding="10">
            <tr align="center">
                <td>
                    <a href=""><font color="white" face="times new roman" size="6">Change Password</font></a>
                </td>
            </tr>
            <tr align="center">
                <td>
                    <a href="edit-profile-info.php"><font color="white" face="times new roman" size="6">Update Profile Info</font></a>
                </td>
            </tr>
        </table><br><br><br>
    </center>
    <br><br><br>
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