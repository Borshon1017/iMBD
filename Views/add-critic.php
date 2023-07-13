<?php
    require_once('../Models/user-info-model.php');   
    require_once('../Controllers/message-controller.php');  
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }      
    $id=$_COOKIE['id'];
    $row=UserInfo($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMBD Add Critic</title>
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
                <img src="../<?php echo $row['ProfilePicture']; ?>" width="40px">&nbsp;&nbsp;&nbsp;
                <select name="profile" onchange="location = this.value;">
                    <option disabled selected hidden><?php echo $row['Username']; ?></option>
                    <option value="user-profile.php">Profile</option>
                    <option value="dashboard.php">Dashboard</option>
                    <option value="settings.php">Settings</option>
                    <option value="logout-page.php">Log Out</option>
                </select>
            </td>
        </tr>
    </table><br><br><br>

    <center>
        <font color="F5C518" face="times new roman" size="12">Add Critic</font><br><br><br>
        <hr color="F5C518" width="530px"><br><br><br>
        <form action="../Controllers/add-critic-controller.php" method="POST">
        <table width="60%" bgcolor="black" border="0" cellspacing="0" cellpadding="10">
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Fullname : </font>
                </td>
                <td>
                    <input type="text" size="40px" name="fullname" required>
                </td>
            </tr>
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Username : </font>
                </td>
                <td>
                    <input type="text" size="40px" name="username" required>
                </td>
            </tr>
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Phone Number : </font>
                </td>
                <td>
                    <input type="text" size="40px" name="phone" required>
                </td>
            </tr>
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Email : </font>
                </td>
                <td>
                    <input type="mail" size="40px" name="email" required>
                </td>
            </tr>
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Password : </font>
                </td>
                <td>
                    <input type="password" size="40px" name="password" required>
                </td>
            </tr>
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Confirm Password : </font>
                </td>
                <td>
                    <input type="password" size="40px" name="repassword" required>
                </td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <br><br><br>
                    <input type="submit" name="submit" value="Add Critic">
                </td>
            </tr>
        </table><br><br><br>
        </form>
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