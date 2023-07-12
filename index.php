<?php
    require_once('Models/user-info-model.php'); 
    require_once('Models/content-info-model.php'); 
    $id =$_COOKIE['id'];
    $row=UserInfo($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMBD Home</title>
</head>
<body bgcolor="black">
    <table width="100%" bgcolor="black" border="0" cellspacing="0" cellpadding="15">
        <tr height="60px">
            <td>
                &nbsp;<img src="Uploads/logo.png" width="80px">
            </td>
            <td>
                <input type="text" placeholder="Search iMBD" size="100px">
            </td>
            <td>

            <?php
            if($row['Role'] == "General User"){
                echo "<img src=\" {$row['ProfilePicture']} \" width=\"40px\">&nbsp;&nbsp;&nbsp;
                <select name=\"profile\" onchange=\"location = this.value;\">
                    <option disabled selected hidden> {$row['Username']} </option>
                    <option value=\"Views/user-profile.php\">Profile</option>
                    <option value=\"Views/watchlist.html\">Watchlist</option>
                    <option value=\"Views/settings.php\">Settings</option>
                    <option value=\"Views/sign-in.html\">Log Out</option>
                </select>";
            }
            else if($row['Role'] == "Content Writer"){
                echo "<img src=\" {$row['ProfilePicture']} \" width=\"40px\">&nbsp;&nbsp;&nbsp;
                <select name=\"profile\" onchange=\"location = this.value;\">
                    <option disabled selected hidden> {$row['Username']} </option>
                    <option value=\"Views/user-profile.php\">Profile</option>
                    <option value=\"Views/dashboard.php\">Dashboard</option>
                    <option value=\"Views/settings.php\">Settings</option>
                    <option value=\"Views/sign-in.html\">Log Out</option>
                </select>";
            }
            ?>
            </td>
        </tr>
    </table><br><br><br>
    <table width="100%" bgcolor="black" border="0" cellspacing="0" cellpadding="10">
        <tr>
            <td>
                
                <a href="Views/movies.php"><font color="F5C518" face="times new roman" size="12">Movies</font></a><br>
                <hr color="F5C518" width="530px" align="left"><br>
                <a href="Views/movies.php"><font color="5799EF" face="times new roman" size="4">More to explore</font></a><br><br>
                <table width="90%" bgcolor="black" border="0" cellspacing="0" cellpadding="15">
    <?php
for ($cid = 1; $cid <=6; $cid++) {
showMovies($cid);
}
?>
                   
                </table><br><br><br>

                <a href="Views/tv-shows.php"><font color="F5C518" face="times new roman" size="12">TV Shows</font></a><br>
                <hr color="F5C518" width="530px" align="left"><br>
                <a href="Views/tv-shows.php"><font color="5799EF" face="times new roman" size="4">More to explore</font></a><br><br>
                <table width="90%" bgcolor="black" border="0" cellspacing="0" cellpadding="15">
                    <a href="sign-in.html"><tr>
                        <td>
            
                            <?php
for ($cid = 1; $cid <=6; $cid++) {
showTVShow($cid);
}
?>

                </table><br><br><br>
                
                <a href="Views/animes.php"><font color="F5C518" face="times new roman" size="12">Animes</font></a><br>
                <hr color="F5C518" width="530px" align="left"><br>
                <a href="Views/animes.php"><font color="5799EF" face="times new roman" size="4">More to explore</font></a><br><br>
                <table width="90%" bgcolor="black" border="0" cellspacing="0" cellpadding="15">
                    <a href="sign-in.html">
                    <?php
for ($cid = 1; $cid <=6; $cid++) {
showAnime($cid);
}
?>    
                   
                </table><br><br><br>

            </td>

            <td valign="top">

                <?php

                    if($row['Role'] == "General User"){
                        echo "<font color=\"F5C518\" face=\"times new roman\" size=\"12\">Check out todays poll</font><br>
                        <hr color=\"F5C518\" width=\"530px\" align=\"left\"><br>
                        <font color=\"white\" face=\"times new roman\" size=\"12\">Who is the GOAT actor?</font><br><br>
                        <a href=\"Views/poll.html\"><font color=\"5799EF\" face=\"times new roman\" size=\"4\">Join poll</font></a><br><br><br>
                        
                        <font color=\"F5C518\" face=\"times new roman\" size=\"12\">Join our weekly discussion</font><br>
                        <hr color=\"F5C518\" width=\"530px\" align=\"left\"><br>
                        <font color=\"white\" face=\"times new roman\" size=\"12\">Is among us the greatest game ever created?</font><br><br>
                        <a href=\"Views/discussion.html\"><font color=\"5799EF\" face=\"times new roman\" size=\"4\">View discussion</font></a><br><br><br>";
                    }
                
                ?>

                <font color="F5C518" face="times new roman" size="12">Recommended for you</font>
                <hr color="F5C518" width="530px" align="left"><br>
                <a href=""><font color="5799EF" face="times new roman" size="4">Get more recommendations</font></a><br><br><br>
                <table width="90%" bgcolor="black" border="0" cellspacing="0" cellpadding="15">
                    <a href="sign-in.html"><tr>
                    <?php
for ($cid = 1; $cid <=3; $cid++) {
showcontent($cid);
}
?>   
                </table><br><br><br>
                
                <?php

                    if($row['Role'] == "General User"){
                        echo "<font color=\"F5C518\" face=\"times new roman\" size=\"12\">Your Purchases</font>
                        <hr color=\"F5C518\" width=\"530px\" align=\"left\"><br>
                        <a href=\"\"><font color=\"5799EF\" face=\"times new roman\" size=\"4\">Show all purchases</font></a><br><br><br>
                        <table width=\"90%\" bgcolor=\"black\" border=\"0\" cellspacing=\"0\" cellpadding=\"15\">
                            <a href=\"sign-in.html\"><tr>
                                <td>
                                    <img src=\"Uploads/posters/across_the_spider-verse.jpg\" width=\"180px\">
                                </td>
                                <td valign=\"top\" align=\"left\">
                                    <font color=\"white\" face=\"times new roman\" size=\"6\">Spiderman: Across The Spider Verse</font><br><br>
                                    <font color=\"white\" face=\"times new roman\" size=\"4\">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse praesentium suscipit error! Saepe incidunt illo maxime vero veniam quos itaque praesentium natus similique porro, eaque autem? Esse corporis modi laboriosam?</font><br><br>
                                    <font color=\"white\" face=\"times new roman\" size=\"4\">Release Date: 19/01/2002</font><br><br>
                                    <a href=\"\"><font color=\"5799EF\" face=\"times new roman\" size=\"4\">Add to Watchlist</font></a><br><br>
                                </td>
                            </tr></a>
                                <td>
                                    <img src=\"Uploads/posters/Among_Us_poster.png\" width=\"180px\">
                                </td>
                                <td valign=\"top\" align=\"left\">
                                    <font color=\"white\" face=\"times new roman\" size=\"6\">Among Us: Who Is The Imposter</font><br><br>
                                    <font color=\"white\" face=\"times new roman\" size=\"4\">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse praesentium suscipit error! Saepe incidunt illo maxime vero veniam quos itaque praesentium natus similique porro, eaque autem? Esse corporis modi laboriosam?</font><br><br>
                                    <font color=\"white\" face=\"times new roman\" size=\"4\">Release Date: 19/01/2002</font><br><br>
                                    <a href=\"\"><font color=\"5799EF\" face=\"times new roman\" size=\"4\">Add to Watchlist</font></a><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src=\"Uploads/posters/morbius.jpg\" width=\"180px\">
                                </td>
                                <td valign=\"top\" align=\"left\">
                                    <font color=\"white\" face=\"times new roman\" size=\"6\">Morbius: It's Morbing Time</font><br><br>
                                    <font color=\"white\" face=\"times new roman\" size=\"4\">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse praesentium suscipit error! Saepe incidunt illo maxime vero veniam quos itaque praesentium natus similique porro, eaque autem? Esse corporis modi laboriosam?</font><br><br>
                                    <font color=\"white\" face=\"times new roman\" size=\"4\">Release Date: 19/01/2002</font><br><br>
                                    <a href=\"\"><font color=\"5799EF\" face=\"times new roman\" size=\"4\">Add to Watchlist</font></a><br><br>
                                </td>
                            </tr>
                        </table>";
                    }
                
                ?>

            </td>
        </tr>
    </table>

    <br><br><br>
    <center>
        <a href="Views/about-us.html"><font color="white" face="times new roman" size="4">About Us</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="Views/helpline.html"><font color="white" face="times new roman" size="4">Helpline</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="Views/faq.html"><font color="white" face="times new roman" size="4">FAQ</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="Views/terms-and-services.html"><font color="white" face="times new roman" size="4">Terms and Services</font></a><br><br><br>
        <font color="white" face="times new roman" size="3">iMBD</font><br><br>
        <font color="white" face="times new roman" size="2">A Maa Babar Dowa Company</font><br>
        <font color="white" face="times new roman" size="1">© 2023 by iMBD.com,  Inc.</font><br><br>
    </center>
</body>
</html>