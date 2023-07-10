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
    <title>iMBD View Profile Info</title>
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
                    <option value="watchlist.html">Watchlist</option>
                    <option value="settings.php">Settings</option>
                    <option value="sign-in.html">Log Out</option>
                </select>
            </td>
        </tr>
    </table><br><br><br>

    <center>

        <img src="../<?php echo $row['ProfilePicture']; ?>" width="100px"><br><br><br>

        <table width="40%" bgcolor="black" border="1" cellspacing="0" cellpadding="25" bordercolor="F5C518">
        <?php
        $row=UserInfo($id);
        ?>    
        <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Full Name : <?php echo $row['Fullname']; ?></font><br><br>
                    <font color="white" face="times new roman" size="6">Username : <?php echo $row['Username']; ?></font><br><br>
                    <font color="white" face="times new roman" size="6">Phone Number : <?php echo $row['Phone']; ?></font><br><br>
                    <font color="white" face="times new roman" size="6">Email : <?php echo $row['Email']; ?></font><br>
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