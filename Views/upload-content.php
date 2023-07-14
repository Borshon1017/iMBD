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
    <title>iMBD Upload Content</title>
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
        <font color="F5C518" face="times new roman" size="12">Upload Content</font><br><br><br>
        <hr color="F5C518" width="530px"><br><br><br>
        <form action="../Controllers/upload-content-controller.php" method="POST" enctype="multipart/form-data">
        <table width="60%" bgcolor="black" border="0" cellspacing="0" cellpadding="10">
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Title : </font>
                </td>
                <td>
                    <input type="text" size="60px" name="title" required>
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <font color="white" face="times new roman" size="6">Description : </font>
                </td>
                <td>
                    <textarea cols="59" rows="10" name="description" required></textarea>
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <font color="white" face="times new roman" size="6">Director : </font>
                </td>
                <td>
                    <input type="text" size="60px" name="director" required>
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <font color="white" face="times new roman" size="6">Cast : </font>
                </td>
                <td>
                    <input type="text" size="60px" name="cast" required>
                </td>
            </tr>
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Category : </font>
                </td>
                <td>
                    <select name="category">
                        <option value="Movie">Movie</option>
                        <option value="TV Show">TV Show</option>
                        <option value="Anime">Anime</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Release Date : </font>
                </td>
                <td>
                    <input type="date" name="releaseDate" required>
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
                            <input type="file" name="poster" accept=".png,.jpg,.jpeg" required> <br> <br>
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
                            <input type="file" name="trailer" accept=".mp4,.mkv,.webm" required> <br> <br>
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
                    <input type="text" size="60px" name="price" required>
                </td>
            </tr>
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Download Link : </font>
                </td>
                <td>
                    <input type="text" size="60px" name="downloadLink" requied>
                </td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <br><br><br>
                    <input type="submit" name="Upload" value="Upload">
                </td>
            </tr>
        </table><br><br><br>
        </form>
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