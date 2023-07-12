<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Services</title>
</head>
<body bgcolor="black">
    <table width="100%" bgcolor="black" border="0" cellspacing="0" cellpadding="5">
        <tr height="60px">
            <td>
                &nbsp;<img src="../Uploads/logo.png" width="80px">
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
                    <option value=\"watchlist.html\">Watchlist</option>
                    <option value=\"settings.php\">Settings</option>
                    <option value=\"sign-in.html\">Log Out</option>
                </select>";
            }
            else if($row['Role'] == "Content Writer" || $row['Role'] == "Administrator" || $row['Role'] == "Critic"){
                echo "<img src=\" ../{$row['ProfilePicture']} \" width=\"40px\">&nbsp;&nbsp;&nbsp;
                <select name=\"profile\" onchange=\"location = this.value;\">
                    <option disabled selected hidden> {$row['Username']} </option>
                    <option value=\"user-profile.php\">Profile</option>
                    <option value=\"dashboard.php\">Dashboard</option>
                    <option value=\"settings.php\">Settings</option>
                    <option value=\"sign-in.html\">Log Out</option>
                </select>";
            }
            ?>
            </td>
        </tr>
    </table><br><br><br>
        <center>
        <table width="40%" bgcolor="black" border="0" cellspacing="0" cellpadding="10">
            <font  color="white" face="times new roman" size="25">&nbsp;Terms & Services</font><br>
            <hr color="F5C518" width="550px">
            <br>
        </table>
        </center>
        <table width="40%" bgcolor="black" border="0" cellspacing="0" cellpadding="10">
            <font  color="white" face="times new roman" size="4">
                <ol>
                    <li>Users must accept and comply with the terms and services to use the website.</li><br>
                    <li>The website provides information, reviews, and recommendations for movies and TV shows.</li><br>
                    <li>Users must create an account and provide accurate information.</li><br>
                    <li>Users must follow all applicable laws and regulations and not engage in prohibited activities.</li><br>
                    <li>Intellectual property rights protect the website's content.</li><br>
                    <li>Users grant the website owner a non-exclusive right to use their submitted content.</li><br>
                    <li>The website may contain links to third-party websites, and users visit them at their own risk.</li><br>
                    <li>The website owner is not responsible for any damages or losses incurred while using the website.</li><br>
                    <li>The website may collect and use user information in accordance with its privacy policy.</li><br>
                    <li>The terms and services may be updated, and users will be notified of any changes.</li><br>
                </ol>
            </font>
        </table>>


        <br><br><br>
 
    <br><br><br><br><br>
    <center>
        <font color="white" face="times new roman" size="3">iMBD</font><br><br>
        <font color="white" face="times new roman" size="2">A Maa Babar Dowa Company</font><br>
        <font color="white" face="times new roman" size="1">© 2023 by iMBD.com, Inc.</font><br><br>
    </center>
    
</body>
</html>