<?php
   require_once('../Models/user-info-model.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMBD FAQ</title>
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
            <?php
                if(isset($_COOKIE['flag'])){
                    $id=$_COOKIE['id'];
                    $row = UserInfo($id);
              
            
                    if($row['Role'] == "General User"){
                        echo " <img src=\" ../{$row['ProfilePicture']} \" width=\"40px\">&nbsp;&nbsp;&nbsp;
                        <select name=\"profile\" onchange=\"location = this.value;\">
                        <option disabled selected hidden> {$row['Username']} </option>
                        <option value=\"user-profile.php\">Profile</option>
                        <option value=\"watchlist.php\">Watchlist</option>
                        <option value=\"purchase-history.php\">Purchase List</option>
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
                }else{
                    echo "<a href=\"sign-in.html\">
                        <font color=\"white\" face=\"times new roman\">Sign In</font>
                    </a>";
                }
            ?>
            </td>
        </tr>
    </table><br><br><br>
    
    <center>
        <font color="F5C518" face="times new roman" size="12">FAQ</font><br><br><br>
        <hr color="F5C518" width="530px"><br><br><br>
    </center>

    <table width="80%" bgcolor="black" border="0" cellspacing="0" cellpadding="15" align="center">
        <tr>
            <td>
                <ul>
                    <li>
                        <font color="F5C518" face="times new roman" size="6">What is the purpose of this website?</font><br><br>
                        <font color="white" face="times new roman" size="4">This website is designed to provide a comprehensive database of movies, TV shows, and other related content, allowing users to access information such as cast and crew details, plot summaries, ratings, and reviews.</font><br><br><br>
                    </li>
                    <li>
                        <font color="F5C518" face="times new roman" size="6">How can I search for a specific movie or TV show?</font><br><br>
                        <font color="white" face="times new roman" size="4">You can use the search bar located at the top of the website to search for a specific movie or TV show by its title.</font><br><br><br>
                    </li>
                    <li>
                        <font color="F5C518" face="times new roman" size="6">Can I contribute to the website's content?</font><br><br>
                        <font color="white" face="times new roman" size="4">Currently, we do not offer user-generated content. However, our team of content writers and critics ensures that the database is regularly updated with the latest movies, TV shows, and relevant information.</font><br><br><br>
                    </li>
                    <li>
                        <font color="F5C518" face="times new roman" size="6">How can I contact the support team for assistance?</font><br><br>
                        <font color="white" face="times new roman" size="4">If you have any questions, concerns, or feedback, you can reach out to our support team by using the helpline form on our website. We aim to respond to inquiries promptly and provide the necessary assistance.</font><br><br><br>
                    </li>
                </ul>
            </td>
        </tr>
    </table>

 
    <br><br><br>
    <center>
        <a href="about-us.php"><font color="white" face="times new roman" size="4">About Us</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="helpline.php"><font color="white" face="times new roman" size="4">Helpline</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="faq.php"><font color="white" face="times new roman" size="4">FAQ</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="terms-and-services.php"><font color="white" face="times new roman" size="4">Terms and Services</font></a><br><br><br>
        <font color="white" face="times new roman" size="3">iMBD</font><br><br>
        <font color="white" face="times new roman" size="2">A Maa Babar Dowa Company</font><br>
        <font color="white" face="times new roman" size="1">© 2023 by iMBD.com,  Inc.</font><br><br>
    </center>
    
</body>
</html>