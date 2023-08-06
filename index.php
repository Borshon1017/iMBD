<?php
    require_once('Models/user-info-model.php'); 
    require_once('Models/content-info-model.php');
    require_once('Models/discussion-model.php');
    require_once('Models/poll-model.php');
    require_once('Models/watchlist-model.php'); 
    $prow = getPoll();
    $drow = getDiscussion();
    $movie=showMovies();
    $tvshows=showTVShow();
    $anime=showAnime(); 
    $newarr=showNewArrivals();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>iMBD Home</title>
</head>
<body bgcolor="black">
    <table width="100%" border="0" cellspacing="0" cellpadding="10">
        <tr height="60px">
            <td>
                &nbsp;<img src="Uploads/logo.png" width="80px">
            </td>
            <td></td>
            <td></td>
            <td>
                
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="Views/search-content.php"><button class="btn search">Search iMBD</button></a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
            </td>
            <td align="right">
            <?php

            if(!isset($_COOKIE['flag'])){
                echo "<a href=\"Views/sign-in.html\">
                        <font color=\"white\" face=\"times new roman\">Sign In</font>
                    </a>";
            }else{
                $id =$_COOKIE['id'];
                $row=UserInfo($id);
                if($row['Role'] == "General User"){
                    echo "<img src=\" {$row['ProfilePicture']} \" width=\"40px\">&nbsp;&nbsp;&nbsp;
                    <select name=\"profile\" onchange=\"location = this.value;\">
                        <option disabled selected hidden> {$row['Username']} </option>
                        <option value=\"Views/user-profile.php\">Profile</option>
                        <option value=\"Views/watchlist.php\">Watchlist</option>
                        <option value=\"Views/purchase-history.php\">Purchase List</option>
                        <option value=\"Views/settings.php\">Settings</option>
                        <option value=\"Views/logout-page.php\">Log Out</option>
                    </select>";
                }
                else if($row['Role'] == "Content Writer" || $row['Role'] == "Administrator" || $row['Role'] == "Critic"){
                    echo "<img src=\" {$row['ProfilePicture']} \" width=\"40px\">&nbsp;&nbsp;&nbsp;
                    <select name=\"profile\" onchange=\"location = this.value;\">
                        <option disabled selected hidden> {$row['Username']} </option>
                        <option value=\"Views/user-profile.php\">Profile</option>
                        <option value=\"Views/dashboard.php\">Dashboard</option>
                        <option value=\"Views/settings.php\">Settings</option>
                        <option value=\"Views/logout-page.php\">Log Out</option>
                    </select>";
                }
            }
            
            ?>
            </td>
            <td></td>
        </tr>
    </table><br><br><br>
    <table width="100%" bgcolor="black" border="0" cellspacing="0" cellpadding="10">
        <tr>
            <td valign="top">
                
                <a href="Views/movies.php"><font color="F5C518" face="times new roman" size="12">Movies</font></a><br>
                <hr color="F5C518" width="530px" align="left"><br>
                <a href="Views/movies.php"><font color="5799EF" face="times new roman" size="4">More to explore</font></a><br><br>
                <table width="90%" bgcolor="black" border="0" cellspacing="0" cellpadding="15">             
                            <?php $counter=0; 
                                if(mysqli_num_rows($movie)>0){
                                    while($crow=mysqli_fetch_assoc($movie)){
                                                if($counter==3) break;
                                                else $counter++;
                                                $cid=$crow['ContentID'];
                                                $posterURL = $crow['Poster'];
                                                $title = $crow['ContentTitle'];
                                                $description = $crow['ContentDescription'];
                                                $releaseDate = $crow['ReleaseDate'];
                                                if (strlen($description) > 220) {
                                                $description = substr($description, 0, 220) . '...';
                                                }
                                                echo "<tr>                          
                                                <td><a href=\"Views/content-page.php?cid=$cid\"><img src=\"$posterURL\" width=\"180px\"></a></td>
                                                <td valign=\"top\" align=\"left\">
                                                <a href=\"Views/content-page.php?cid=$cid\"> <font color=\"white\" face=\"times new roman\" size=\"6\">$title</font></a><br><br>
                                                <font color=\"white\" face=\"times new roman\" size=\"4\">$description</font><br><br>
                                                <font color=\"white\" face=\"times new roman\" size=\"4\">Release Date:$releaseDate</font><br><br>";
                                                if(isset($_COOKIE['flag'])){
                                                if($row['Role'] == "General User")
                                                {
                                                $content=watchlistcheck($id,$cid);
                                                $count = mysqli_num_rows($content);
                                                if ($count > 0) 
                                                {
                                                echo"<font color=\"5799EF\" face=\"times new roman\" size=\"4\">Already added to Watchlist</font><br><br>";
                                                }
                                                else{
                                                echo"<a href=\"Controllers/Add-to-Watchlist.php?cid=$cid\"><font color=\"5799EF\" face=\"times new roman\" size=\"4\">Add to Watchlist</font></a>";
                                                }
                                            }
                                            }
                                        }
                                    
                                }         
                            ?>
                </table><br><br><br>
                
                <a href="Views/tv-shows.php"><font color="F5C518" face="times new roman" size="12">TV Shows</font></a><br>
                <hr color="F5C518" width="530px" align="left"><br>
                <a href="Views/tv-shows.php"><font color="5799EF" face="times new roman" size="4">More to explore</font></a><br><br>
                <table width="90%" bgcolor="black" border="0" cellspacing="0" cellpadding="15">
            
                <?php $counter=0;
                                if(mysqli_num_rows($tvshows)>0){
                                    while($crow=mysqli_fetch_assoc($tvshows)){
                                                if($counter==3) break;
                                                else $counter++;
                                                $cid=$crow['ContentID'];
                                                $posterURL = $crow['Poster'];
                                                $title = $crow['ContentTitle'];
                                                $description = $crow['ContentDescription'];
                                                $releaseDate = $crow['ReleaseDate'];
                                                if (strlen($description) > 220) {
                                                $description = substr($description, 0, 220) . '...';
                                                }
                                                echo "<tr>                          
                                                <td><a href=\"Views/content-page.php?cid=$cid\"><img src=\"$posterURL\" width=\"180px\"></a></td>
                                                <td valign=\"top\" align=\"left\">
                                                <a href=\"Views/content-page.php?cid=$cid\"> <font color=\"white\" face=\"times new roman\" size=\"6\">$title</font></a><br><br>
                                                <font color=\"white\" face=\"times new roman\" size=\"4\">$description</font><br><br>
                                                <font color=\"white\" face=\"times new roman\" size=\"4\">Release Date:$releaseDate</font><br><br>";
                                                if(isset($_COOKIE['flag'])){
                                                if($row['Role'] == "General User")
                                                {
                                                $content=watchlistcheck($id,$cid);
                                                $count = mysqli_num_rows($content);
                                                if ($count > 0) 
                                                {
                                                echo"<font color=\"5799EF\" face=\"times new roman\" size=\"4\">Already added to Watchlist</font><br><br>";
                                                }
                                                else{
                                                echo"<a href=\"Controllers/Add-to-Watchlist.php?cid=$cid\"><font color=\"5799EF\" face=\"times new roman\" size=\"4\">Add to Watchlist</font></a>";
                                                }
                                            }
                                            }
                                        }
                                    
                                }  
                                ?>

                </table><br><br><br>
                
                <a href="Views/animes.php"><font color="F5C518" face="times new roman" size="12">Animes</font></a><br>
                <hr color="F5C518" width="530px" align="left"><br>
                <a href="Views/animes.php"><font color="5799EF" face="times new roman" size="4">More to explore</font></a><br><br>
                <table width="90%" bgcolor="black" border="0" cellspacing="0" cellpadding="15">
                <?php $counter=0;
                                if(mysqli_num_rows($anime)>0){
                                    while($crow=mysqli_fetch_assoc($anime)){
                                               if($counter==3) break;
                                                else $counter++;
                                                $cid=$crow['ContentID'];
                                                $posterURL = $crow['Poster'];
                                                $title = $crow['ContentTitle'];
                                                $description = $crow['ContentDescription'];
                                                $releaseDate = $crow['ReleaseDate'];
                                                if (strlen($description) > 220) {
                                                $description = substr($description, 0, 220) . '...';
                                                }
                                                echo "<tr>                          
                                                <td><a href=\"Views/content-page.php?cid=$cid\"><img src=\"$posterURL\" width=\"180px\"></a></td>
                                                <td valign=\"top\" align=\"left\">
                                                <a href=\"Views/content-page.php?cid=$cid\"> <font color=\"white\" face=\"times new roman\" size=\"6\">$title</font></a><br><br>
                                                <font color=\"white\" face=\"times new roman\" size=\"4\">$description</font><br><br>
                                                <font color=\"white\" face=\"times new roman\" size=\"4\">Release Date:$releaseDate</font><br><br>";
                                                if(isset($_COOKIE['flag'])){
                                                if($row['Role'] == "General User")
                                                {
                                                $content=watchlistcheck($id,$cid);
                                                $count = mysqli_num_rows($content);
                                                if ($count > 0) 
                                                {
                                                echo"<font color=\"5799EF\" face=\"times new roman\" size=\"4\">Already added to Watchlist</font><br><br>";
                                                }
                                                else{
                                                echo"<a href=\"Controllers/Add-to-Watchlist.php?cid=$cid\"><font color=\"5799EF\" face=\"times new roman\" size=\"4\">Add to Watchlist</font></a>";
                                                }}
                                            }
                                        }
                                    
                                }  
                                ?>

                   
                </table><br><br><br>

            </td>

            <td valign="top">

                <?php

                    if(isset($_COOKIE['flag']))
                    {
                        if($row['Role'] == "General User")
                        {
                        echo "<font color=\"F5C518\" face=\"times new roman\" size=\"12\">Check out todays poll</font><br>
                        <hr color=\"F5C518\" width=\"530px\" align=\"left\"><br>
                        <font color=\"white\" face=\"times new roman\" size=\"12\">{$prow["PollTitle"]}</font><br><br>
                        <a href=\"Views/poll.php\"><font color=\"5799EF\" face=\"times new roman\" size=\"4\">Join poll</font></a><br><br><br>
                        
                        <font color=\"F5C518\" face=\"times new roman\" size=\"12\">Join our weekly discussion</font><br>
                        <hr color=\"F5C518\" width=\"530px\" align=\"left\"><br>
                        <font color=\"white\" face=\"times new roman\" size=\"12\">{$drow["DiscussionTitle"]}</font><br><br>
                        <a href=\"Views/discussion.php\"><font color=\"5799EF\" face=\"times new roman\" size=\"4\">View discussion</font></a><br><br><br>";
                        }
                    }
                ?>

                <a href="Views/new-arrivals.php"><font color="F5C518" face="times new roman" size="12">New Arrivals</font></a>
                <hr color="F5C518" width="530px" align="left"><br>
                <a href="Views/new-arrivals.php"><font color="5799EF" face="times new roman" size="4">See More</font></a><br><br><br>
                <table width="90%" bgcolor="black" border="0" cellspacing="0" cellpadding="15">
                <?php $counter=0;
                                if(mysqli_num_rows($newarr)>0){
                                    while($crow=mysqli_fetch_assoc($newarr)){
                                        if($counter==3) break;
                                        else $counter++;
                                        $cid=$crow['ContentID'];
                                        $posterURL = $crow['Poster'];
                                        $title = $crow['ContentTitle'];
                                        $description = $crow['ContentDescription'];
                                        $releaseDate = $crow['ReleaseDate'];
                                        if (strlen($description) > 220) {
                                        $description = substr($description, 0, 220) . '...';
                                        }
                                        echo "<tr>                          
                                        <td><a href=\"Views/content-page.php?cid=$cid\"><img src=\"$posterURL\" width=\"180px\"></a></td>
                                        <td valign=\"top\" align=\"left\">
                                        <a href=\"Views/content-page.php?cid=$cid\"> <font color=\"white\" face=\"times new roman\" size=\"6\">$title</font></a><br><br>
                                        <font color=\"white\" face=\"times new roman\" size=\"4\">$description</font><br><br>
                                        <font color=\"white\" face=\"times new roman\" size=\"4\">Release Date:$releaseDate</font><br><br>";
                                        if(isset($_COOKIE['flag'])){
                                        if($row['Role'] == "General User")
                                        {
                                            $content=watchlistcheck($id,$cid);
                                            $count = mysqli_num_rows($content);
                                            if ($count > 0) 
                                            {
                                             echo"<font color=\"5799EF\" face=\"times new roman\" size=\"4\">Already added to Watchlist</font><br><br>";
                                            }
                                            else{
                                             echo"<a href=\"Controllers/Add-to-Watchlist.php?cid=$cid\"><font color=\"5799EF\" face=\"times new roman\" size=\"4\">Add to Watchlist</font></a>";
                                            }
                                            }
                                        }
                                    }
                                    
                                }
                            ?>     
                  
                
                </table><br><br><br>
                <a href="#" onclick="redirectToRandomPage() ; return false;"><font color="F5C518" face="times new roman" size="12">Surprise me</font></a>
                <hr color="F5C518" width="530px" align="left"><br>
            </td>
        </tr>
    </table>

    <br><br><br>
    <center>
        <a href="Views/about-us.php"><font color="white" face="times new roman" size="4">About Us</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="Views/helpline.php"><font color="white" face="times new roman" size="4">Helpline</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="Views/faq.php"><font color="white" face="times new roman" size="4">FAQ</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="Views/terms-and-services.php"><font color="white" face="times new roman" size="4">Terms and Services</font></a><br><br><br>
        <font color="white" face="times new roman" size="3">iMBD</font><br><br>
        <font color="white" face="times new roman" size="2">A Maa Babar Dowa Company</font><br>
        <font color="white" face="times new roman" size="1">© 2023 by iMBD.com,  Inc.</font><br><br>
    </center>
</body>
</html>

<script>

function getRandomInt(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        
        function redirectToRandomPage() {
            let randomCid = getRandomInt(1, 6);
            let redirectUrl = "http://localhost/imbd/Views/content-page.php?cid=" + randomCid;
            window.location.href = redirectUrl;
        }
    </script>