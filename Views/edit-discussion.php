<?php
    require_once('../Models/user-info-model.php');
    require_once('../Models/discussion-model.php');
    $id=$_COOKIE['id'];
    $row=UserInfo($id);
    $result=getAllDiscussion();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMBD Edit Discussion</title>
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
        <font color="F5C518" face="times new roman" size="12">Edit Discussion</font><br><br><br>
        <hr color="F5C518" width="530px"><br><br><br>

        <table width="85%" bgcolor="black" border="0" cellspacing="0" cellpadding="15">
            <tr>
                <td>
                    <font color="F5C518" face="times new roman" size="5">Discussion Title</font>
                    <hr color="F5C518" width="170px" align="left">
                </td>
                <td>

                </td>
            </tr>
            <?php 
                if(mysqli_num_rows($result)>0){
                    while($w=mysqli_fetch_assoc($result)){
                        $discussionid=$w['DiscussionID'];
                        $discussion=$w['DiscussionTitle'];
                        echo "    
                        <tr><td><font color=\"white\" face=\"times new roman\" size=\"5\"> $discussion</font></td>
                        <td><a href=\"edit-discussion-info.php?id={$discussionid}\"><font color=\"5799EF\" face=\"times new roman\" size=\"5\">Edit Discussion</font></a></td>          
                        </tr>";
                    }
                }
            ?>
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