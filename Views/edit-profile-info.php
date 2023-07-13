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
    <title>iMBD Edit Profile Info</title>
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
            <?php
            
            if($row['Role'] == "General User"){
                echo "<img src=\" ../{$row['ProfilePicture']} \" width=\"40px\">&nbsp;&nbsp;&nbsp;
                <select name=\"profile\" onchange=\"location = this.value;\">
                    <option disabled selected hidden> {$row['Username']} </option>
                    <option value=\"user-profile.php\">Profile</option>
                    <option value=\"watchlist.php\">Watchlist</option>
                    <option value=\"settings.php\">Settings</option>
                    <option value=\"logout-page.php\">Log Out</option>
                </select>";
            }
            else if($row['Role'] == "Content Writer" || $row['Role'] == "Administrator" || $row['Role'] == "Critic"){
                echo "<img src=\" ../{$row['ProfilePicture']} \" width=\"40px\">&nbsp;&nbsp;&nbsp;
                <select name=\"profile\" onchange=\"location = this.value;\">
                    <option disabled selected hidden> {$row['Username']} </option>
                    <option value=\"user-profile.php\">Profile</option>
                    <option value=\"dashboard.php\">Dashboard</option>
                    <option value=\"settings.php\">Settings</option>
                    <option value=\"logout-page.php\">Log Out</option>
                </select>";
            }
            ?>
            </td>
        </tr>
    </table><br><br><br>      
    <center>

        <img src="../<?php echo $row['ProfilePicture']; ?>" width="100px"><br><br><br>
        <form method=post>
        <table width="40%" bgcolor="black" border="0" cellspacing="0" cellpadding="25" bordercolor="F5C518">
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Full Name : 
                </td>
                <td>
                    <input type="text" name="Fullname" value="<?php echo $row['Fullname']?>"></font>
                </td>
            </tr>
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Username : 
                </td>
                <td>
                    <input type="text" name="Username" value="<?php echo  $row['Username']?>"></font>
                </td>
            </tr>
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Phone Number : 
                </td>
                <td>
                    <input type="text" name="Phone" value="<?php echo  $row['Phone']?>"></font>
                </td>
            </tr>
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Email : 
                </td>
                <td>
                    <input type="text" name="Email" value="<?php echo  $row['Email']?>"></font>
                </td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <input type="submit" name="updateinfo" value="Update Information">
                </td>
            </tr>
        </table>
        <br><br><br>
        </form>
    </fieldset>
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

<?php
if(isset($_POST['updateinfo'])){

    $fullname = $_POST['Fullname'];
    $username = $_POST['Username'];
    $phone = $_POST['Phone'];
    $email = $_POST['Email'];

    if(updateUserInfo($id,$fullname, $username, $phone, $email)==true) popup("Success!", "Your information has been updated successfully");
    else popup("Error!", "Could not update information. Please try again.");

}
?>