<?php
    require_once('../Models/user-info-model.php');         
    $id=$_COOKIE['id'];
    $row=UserInfo($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMBD Update Content Info</title>
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
                    <option value="sign-in.html">Log Out</option>
                </select>
            </td>
        </tr>
    </table><br><br><br>

    <center>
        <font color="F5C518" face="times new roman" size="12">Edit Content Info</font><br><br><br>
        <hr color="F5C518" width="530px"><br><br><br>

        <table width="60%" bgcolor="black" border="0" cellspacing="0" cellpadding="10">
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Title : </font>
                </td>
                <td>
                    <input type="text" size="60px">
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <font color="white" face="times new roman" size="6">Description : </font>
                </td>
                <td>
                    <textarea cols="59" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Category : </font>
                </td>
                <td>
                    <select>
                        <option value="">Movie</option>
                        <option value="">TV Show</option>
                        <option value="">Anime</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Release Date : </font>
                </td>
                <td>
                    <input type="date">
                </td>
            </tr>
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Upload Poster : </font>
                </td>
                <td>
                <table cellspacing="0" cellpadding="10" bgcolor="F5C518">
                    <tr>
                        <td>
                            <input type="file" name="myfile" accept=".png,.jpg,.jpeg"> <br> <br>
                        </td>
                    </tr>
                </table>
                </td>
            </tr>
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Upload Trailer : </font>
                </td>
                <td>
                <table cellspacing="0" cellpadding="10" bgcolor="F5C518">
                    <tr>
                        <td>
                            <input type="file" name="myfile" accept=".mp4,.mkv,.webm"> <br> <br>
                        </td>
                    </tr>
                </table>
                </td>
            </tr>
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Price : </font>
                </td>
                <td>
                    <input type="text" size="60px">
                </td>
            </tr>
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Download Link : </font>
                </td>
                <td>
                    <input type="text" size="60px">
                </td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <br><br><br>
                    <input type="submit" value="Update">
                </td>
            </tr>
        </table><br><br><br>
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