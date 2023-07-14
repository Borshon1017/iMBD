<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMBD About Us</title>
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
    
        <center>
            <font color="F5C518" face="times new roman" size="12">About Us</font><br><br><br>
            <hr color="F5C518" width="530px"><br><br><br>
        </center>

        <table width="100%" bgcolor="black" border="0" cellspacing="0" cellpadding="15">
            <tr>
                <td align="center">
                    <font color="white" face="times new roman" size="12">About iMBD</font><br>
                    <hr color="F5C518" width="300px" align="center"><br><br>
                    <font color="white" face="times new roman" size="5">Our website aims to be the ultimate destination for movie enthusiasts,<br> providing a seamless and efficient platform to explore, rate, review, and purchase movies. <br> With reviews from expert film critics, a vast collection of films, and a user-friendly interface, <br> we strive to enhance your movie-watching experience. Discover, decide, and indulge in the world of cinema on our website.</font><br><br><br>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <font color="white" face="times new roman" size="12">Meet the Developers</font><br>
                    <hr color="F5C518" width="440px" align="center"><br>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <font color="white" face="times new roman" size="6">Borshon Alfred Gomes</font><br>
                    <font color="white" face="times new roman" size="4">21-44561-1</font><br><br>
                    <font color="white" face="times new roman" size="6">Tanvir Hasan Tamal</font><br>
                    <font color="white" face="times new roman" size="4">21-44626-1</font><br><br>
                    <font color="white" face="times new roman" size="6">MD. Ferdous Sazid</font><br>
                    <font color="white" face="times new roman" size="4">21-44455-1</font><br><br>
                    <font color="white" face="times new roman" size="6">Rianul Amin Rian</font><br>
                    <font color="white" face="times new roman" size="4">21-44589-1</font><br><br>
                </td>
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