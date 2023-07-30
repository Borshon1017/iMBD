<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>iMBD Forgot Password</title>
</head>
<body bgcolor="black">
    <br><br>
    <center>
        <a href="../index.php"><img src="../Uploads/logo.png" width="80px"></a>
    </center>
    <br><br>
    <table width="30%" bgcolor="black" border="1" cellspacing="0" cellpadding="25" align="center" bordercolor="F5C518">
        <tr>
            <td>
                <form action="../Controllers/otp-confirmation-controller.php" method="post">
                <font color="F5C518" face="times new roman" size="6">Create New Password</font>
                <br><br>
                <font color="white" face="times new roman" size="4">To verify your email, we've sent a One Time Password (OTP) to <?php echo $_SESSION['mail']; ?></font> <a href="forgot-password.php"><font color="5799EF" face="times new roman" size="4">(Change)</font></a>
                <br><br>
                <font color="white" face="times new roman" size="4">Enter OTP</font>
                <br>
                <input type="text" name="otp" size="43px"><br><br>
                <hr color="F5C518" width="auto">
                <br>
                <font color="white" face="times new roman" size="4">Password</font>
                <br>
                <input type="password" name="password" size="43px">
                <br><br>
                <font color="white" face="times new roman" size="2"><i>i &nbsp;</i></font><font color="white" face="times new roman" size="2">Passwords must be at least 8 characters.</font>
                <br><br>
                <font color="white" face="times new roman" size="4">Re-enter password</font>
                <br>
                <input type="password" name="repassword" size="43px">
                <br><br><br>
                <button name="submit">Save changes and Sign-In</button>
                </form>
            </td>
            <br>
        </tr>
    </table>
    <br><br><br><br><br>
    <center>
        <a href="about-us.php"><font color="white" face="times new roman" size="4">About Us</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="helpline.php"><font color="white" face="times new roman" size="4">Helpline</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="faq.php"><font color="white" face="times new roman" size="4">FAQ</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="terms-and-services.php"><font color="white" face="times new roman" size="4">Terms and Services</font></a><br><br><br>
        <font color="white" face="times new roman" size="3">iMBD</font><br><br>
        <font color="white" face="times new roman" size="2">A Maa Babar Dowa Company</font><br>
        <font color="white" face="times new roman" size="1">© 2023 by iMBD.com,  Inc.</font><br><br>
    </center>
</body>
</html>