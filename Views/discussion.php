<?php
    require_once('../Models/user-info-model.php');
    require_once('../Models/discussion-model.php');
    require_once('../Models/discussion-comment-model.php');
    require_once('../Controllers/message-controller.php');  
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }         
    $id=$_COOKIE['id'];
    $row=UserInfo($id);
    $drow = getDiscussion();
    $did = $drow['DiscussionID'];
    $resultC = getAllComments($did);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMBD Discussion</title>
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
                    <option value="purchase-history.php">Purchase List</option>
                    <option value="settings.php">Settings</option>
                    <option value="logout-page.php">Log Out</option>
                </select>
            </td>
        </tr>
    </table><br><br><br>

    <form action="../Controllers/discussion-comment-controller.php?did=<?php echo $did; ?>" method="post">
    <table width="80%" bgcolor="black" border="1" cellspacing="0" cellpadding="25" align="center" bordercolor="F5C518">
        <tr>
            <td>
                <font color="F5C518" face="times new roman" size="6"><?php echo $drow["DiscussionTitle"]?></font>
                <br><br><br>
                <font color="white" face="times new roman" size="4"><?php echo $drow["DiscussionDescription"]?></font>
                <br><br><br>
                <?php 
                if(mysqli_num_rows($resultC)>0){
                    while($w=mysqli_fetch_assoc($resultC)){
                        $uname=$w['Username'];
                        $comment=$w['DiscussionComment'];
                        echo "<font color=\"F5C518\" face=\"times new roman\" size=\"5\">{$uname} : </font>
                        <font color=\"white\" face=\"times new roman\" size=\"5\">{$comment}</font><br><br>";
                    }
                }
                ?>
                <br><br><br>
                <textarea name="comment" rows="15" cols="134"></textarea><br><br>
                <p align="right">
                <button name="submit">Post Comment</button>&nbsp;&nbsp;&nbsp;&nbsp;
                </p>
            </td>
            <br>
        </tr>
    </table>
    </form>
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