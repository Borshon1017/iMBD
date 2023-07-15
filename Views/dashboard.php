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
    <title>iMBD Dashboard</title>
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
                    <option value="dashboard.php">Dashboard</option>
                    <option value="settings.php">Settings</option>
                    <option value="logout-page.php">Log Out</option>
                </select>
            </td>
        </tr>
    </table><br><br><br>

    <center>
        <font color="F5C518" face="times new roman" size="12">Dashboard</font><br><br><br>
        <hr color="F5C518" width="530px"><br><br><br>

        <?php

        if($row['Role'] == "Content Writer"){
            echo "<table width=\"60%\" bgcolor=\"black\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\">
            <tr align=\"center\">
                <td>
                    <a href=\"upload-content.php\"><font color=\"white\" face=\"times new roman\" size=\"6\">Upload Content</font></a>
                </td>
            </tr>
            <tr align=\"center\">
                <td>
                    <a href=\"edit-content-info.php\"><font color=\"white\" face=\"times new roman\" size=\"6\">Edit Content Info</font></a>
                </td>
            </tr>
            <tr align=\"center\">
                <td>
                    <a href=\"delete-content.php\"><font color=\"white\" face=\"times new roman\" size=\"6\">Delete Content</font></a>
                </td>
            </tr>
        </table>";
        }

        else if($row['Role'] == "Critic"){
            echo "<table width=\"60%\" bgcolor=\"black\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\">
            <tr align=\"center\">
                <td>
                    <a href=\"rate-review-content.php\"><font color=\"white\" face=\"times new roman\" size=\"6\">Rate/Review Content</font></a>
                </td>
            </tr>
            <tr align=\"center\">
                <td>
                    <a href=\"edit-rating-review.php\"><font color=\"white\" face=\"times new roman\" size=\"6\">Edit Rating/Review</font></a>
                </td>
            </tr>
        </table>";
        }
        
        else if($row['Role'] == "Administrator"){
            echo "<table width=\"60%\" bgcolor=\"black\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\">
            <tr align=\"center\">
                <td>
                    <a href=\"manage-general-user.php\"><font color=\"white\" face=\"times new roman\" size=\"6\">Manage General User</font></a>
                </td>
            </tr>
            <tr align=\"center\">
                <td>
                    <a href=\"manage-content-writer.php\"><font color=\"white\" face=\"times new roman\" size=\"6\">Manage Content Writer</font></a>
                </td>
            </tr>
            <tr align=\"center\">
                <td>
                    <a href=\"manage-critic.php\"><font color=\"white\" face=\"times new roman\" size=\"6\">Manage Critic</font></a>
                </td>
            </tr>
            <tr align=\"center\">
                <td>
                    <a href=\"manage-poll.php\"><font color=\"white\" face=\"times new roman\" size=\"6\">Manage Poll</font></a>
                </td>
            </tr>
            <tr align=\"center\">
                <td>
                    <a href=\"manage-discussion.php\"><font color=\"white\" face=\"times new roman\" size=\"6\">Manage Discussion</font></a>
                </td>
            </tr>
            <tr align=\"center\">
                <td>
                    <a href=\"sales-history.php\"><font color=\"white\" face=\"times new roman\" size=\"6\">Sales History</font></a>
                </td>
            </tr>
            <tr align=\"center\">
                <td>
                    <a href=\"helpline-message.php\"><font color=\"white\" face=\"times new roman\" size=\"6\">Helpline Messages</font></a>
                </td>
            </tr>
        </table>";
        }

        ?>
        <br><br><br>
    </center>
    <br><br><br><br>
    <center>
        <a href="about-us.php"><font color="white" face="times new roman" size="4">About Us</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="helpline.php"><font color="white" face="times new roman" size="4">Helpline</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="faq.php"><font color="white" face="times new roman" size="4">FAQ</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="terms-and-services.php"><font color="white" face="times new roman" size="4">Terms and Services</font></a><br><br><br>
        <font color="white" face="times new roman" size="3">iMBD</font><br><br>
        <font color="white" face="times new roman" size="2">A Maa Babar Dowa Company</font><br>
        <font color="white" face="times new roman" size="1">© 2023 by iMBD.com, Inc.</font><br><br>
    </center>

</body>
</html>