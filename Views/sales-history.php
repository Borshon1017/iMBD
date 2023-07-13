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
    <title>iMBD Sales History</title>
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
                <img src="../<?php echo $row['ProfilePicture']; ?>" width="40px">&nbsp;&nbsp;&nbsp;
                <select name="profile" onchange="location = this.value;">
                    <option disabled selected hidden><?php echo $row['Username']; ?></option>
                    <option value="user-profile.html">Profile</option>
                    <option value="dashboard.php">Dashboard</option>
                    <option value="settings.php">Settings</option>
                    <option value="logout-page.php">Log Out</option>
                </select>
            </td>
        </tr>
    </table><br><br><br>

    <center>
        <font color="F5C518" face="times new roman" size="12">Sales History</font><br><br><br>
        <hr color="F5C518" width="530px"><br><br><br>

        <table width="85%" bgcolor="black" border="0" cellspacing="0" cellpadding="15">
            <tr>
                <td>
                    <font color="F5C518" face="times new roman" size="5">Username</font>
                    <hr color="F5C518" width="120px" align="left">
                </td>
                <td>
                    <font color="F5C518" face="times new roman" size="5">Content Title</font>
                    <hr color="F5C518" width="150px" align="left">
                </td>
                <td>
                    <font color="F5C518" face="times new roman" size="5">Price</font>
                    <hr color="F5C518" width="75px" align="left">
                </td>
                <td>
                    <font color="F5C518" face="times new roman" size="5">Purchase Date</font>
                    <hr color="F5C518" width="160px" align="left">
                </td>
            </tr>
            <tr>
                <td>
                    <font color="white" face="times new roman" size="5">ppsppspsspss</font>
                </td>
                <td>
                    <font color="white" face="times new roman" size="5">Among Us: The last one alive</font>
                </td>
                <td>
                    <font color="white" face="times new roman" size="5">420</font>
                </td>
                <td>
                    <font color="white" face="times new roman" size="5">19/01/2002</font>
                </td>
            </tr>
        </table>
        
        <br><br><br>
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