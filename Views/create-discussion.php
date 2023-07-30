<?php
    require_once('../Models/user-info-model.php');
    require_once('../Controllers/message-controller.php');  
    require_once('../Models/discussion-model.php');
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
    <link rel="stylesheet" href="../style.css">
    <title>iMBD Create Discussion</title>
</head>
<body bgcolor="black">
    <table width="100%" border="0" cellspacing="0" cellpadding="10">
        <tr height="60px">
            <td>
                &nbsp;<img src="../Uploads/logo.png" width="80px">
            </td>
            <td></td>
            <td></td>
            <td>
                
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="search-content.php"><button class="btn search">Search iMBD</button></a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
            </td>
            <td>
                <img src="../<?php echo $row['ProfilePicture']; ?>" width="40px">&nbsp;&nbsp;&nbsp;
                <select name="profile" onchange="location = this.value;">
                    <option disabled selected hidden><?php echo $row['Username']; ?></option>
                    <option value="user-profile.php">Profile</option>
                    <option value="dashboard.php">Dashboard</option>
                    <option value="settings.php">Settings</option>
                    <option value="sign-in.html">Log Out</option>
                </select>
            </td>
            <td></td>
        </tr>
    </table><br><br><br>

    <center>
        <font color="F5C518" face="times new roman" size="12">Create Discussion</font><br><br><br>
        <hr color="F5C518" width="530px"><br><br><br>
        <form action="../Controllers/create-discussion-controller.php" method="POST">
        <table width="60%" bgcolor="black" border="0" cellspacing="0" cellpadding="10">
                <tr>
                    <td>
                        <font color="white" face="times new roman" size="6">Discussion Title: </font>
                    </td>
                    <td>
                        <input type="text" size="60px" name="discussionTitle" id="discussionTitle" onkeyup="checkTitleLength()">
                        <br>
                        <font color="red" face="times new roman" size="3" id="titleError"></font>
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <font color="white" face="times new roman" size="6">Description : </font>
                    </td>
                    <td>
                        <textarea cols="59" rows="10" name="description" id="description" onkeyup="checkDescriptionLength()"></textarea>
                        <br>
                        <font color="red" face="times new roman" size="3" id="descriptionError"></font>
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="2">
                        <br><br><br>
                        <input type="submit" name="submit" value="Create Discussion">
                    </td>
                </tr>
            </table><br><br><br>
        </form>
    </center>
    <br><br><br>
    <center>
        <a href="about-us.php"><font color="white" face="times new roman" size="4">About Us</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="helpline.php"><font color="white" face="times new roman" size="4">Helpline</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="faq.php"><font color="white" face="times new roman" size="4">FAQ</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="terms-and-services.php"><font color="white" face="times new roman" size="4">Terms and Services</font></a><br><br><br>
        <font color="white" face="times new roman" size="3">iMBD</font><br><br>
        <font color="white" face="times new roman" size="2">A Maa Babar Dowa Company</font><br>
        <font color="white" face="times new roman" size="1">© 2023 by iMBD.com, Inc.</font><br><br>
    </center>
    <script>
        function checkTitleLength() {
            let title = document.getElementById('discussionTitle').value;
            if (title.length > 50) {
                document.getElementById('titleError').innerHTML = "Title cannot be more than 50 characters.";
            } else {
                document.getElementById('titleError').innerHTML = "";
            }
        }

        function checkDescriptionLength() {
            let description = document.getElementById('description').value;
            if (description.length > 700) {
                document.getElementById('descriptionError').innerHTML = "Description cannot be more than 700 characters.";
            } else {
                document.getElementById('descriptionError').innerHTML = "";
            }
        }
    </script>
</body>
</html>