<?php
    require_once('../Models/user-info-model.php');
    require_once('../Models/poll-model.php');
    require_once('../Controllers/message-controller.php');  
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }         
    $id=$_COOKIE['id'];
    $row=UserInfo($id);
    $prow = getPoll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMBD Poll</title>
</head>
<body bgcolor="black">
<table width="100%" bgcolor="black" border="0" cellspacing="0" cellpadding="15">
        <tr height="60px">
            <td>
                &nbsp;<a href="../index.php"><img src="../Uploads/logo.png" width="80px"></a>
            </td>
            <td>
                <form action="search-content.php" method="post">
                <input type="text" name="title" placeholder="Search iMBD" size="100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="submit" value="Search">
                </form>
            </td>
            <td>
                <img src="../<?php echo $row['ProfilePicture']; ?>" width="40px">&nbsp;&nbsp;&nbsp;
                <select name="profile" onchange="location = this.value;">
                    <option disabled selected hidden><?php echo $row['Username']; ?></option>
                    <option value="user-profile.php">Profile</option>
                    <option value="watchlist.php">Watchlist</option>
                    <option value="settings.php">Settings</option>
                    <option value="logout-page.php">Log Out</option>
                </select>
            </td>
        </tr>
    </table><br><br><br>

    <table width="30%" bgcolor="black" border="1" cellspacing="0" cellpadding="25" align="center" bordercolor="F5C518">
        <tr>
            <td>
                <form action="../Controllers/poll-vote-controller.php?pid=<?php echo $prow["PollID"]; ?>" method="post">
                <font color="F5C518" face="times new roman" size="6"><?php echo $prow["PollTitle"]?></font>
                <br><br><br>
                <input type="radio" name="vote" value="<?php echo $prow["OptionOne"]?>">&nbsp;&nbsp;&nbsp;&nbsp;<font color="white" face="times new roman" size="5"><?php echo $prow["OptionOne"]?></font><br><br>
                <input type="radio" name="vote" value="<?php echo $prow["OptionTwo"]?>">&nbsp;&nbsp;&nbsp;&nbsp;<font color="white" face="times new roman" size="5"><?php echo $prow["OptionTwo"]?></font><br><br>
                <input type="radio" name="vote" value="<?php echo $prow["OptionThree"]?>">&nbsp;&nbsp;&nbsp;&nbsp;<font color="white" face="times new roman" size="5"><?php echo $prow["OptionThree"]?></font><br><br>
                <input type="radio" name="vote" value="<?php echo $prow["OptionFour"]?>">&nbsp;&nbsp;&nbsp;&nbsp;<font color="white" face="times new roman" size="5"><?php echo $prow["OptionFour"]?></font><br><br><br>
                <button align="center" name="submit">Vote</button>
                </form>
            </td>
            <br>
        </tr>
    </table>

    <br><br><br>
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