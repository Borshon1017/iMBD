<?php
    require_once('../Models/user-info-model.php'); 
    require_once('../Models/rating-review.php');    
    require_once('../Controllers/message-controller.php');  
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }     
    $id=$_COOKIE['id'];
    $row=UserInfo($id);
    $result=pendingReview();
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>iMBD Rate/Review Content</title>
</head>
<body bgcolor="black">
    <table width="100%" border="0" cellspacing="0" cellpadding="10">
        <tr height="60px">
            <td>
                &nbsp;<a href="../index.php"><img src="../Uploads/logo.png" width="80px"></a>
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
                    <option value="logout-page.php">Log Out</option>
                </select>
            </td>
            <td></td>
        </tr>
    </table><br><br><br>

    <center>
        <font color="F5C518" face="times new roman" size="12">Rate/Review Content</font><br><br><br>
        <hr color="F5C518" width="530px"><br><br><br>

        <table width="40%" bgcolor="black" border="0" cellspacing="0" cellpadding="15">
                        <?php  
                            if(mysqli_num_rows($result)>0){

                                    while ($crow = mysqli_fetch_assoc($result)) {
                                    $cid = $crow['ContentID'];
                                    $posterURL = $crow['Poster'];
                                    $title = $crow['ContentTitle'];
                                    $description = $crow['ContentDescription'];
                                    $releaseDate = $crow['ReleaseDate'];

                                    if (strlen($description) > 220) {
                                    $description = substr($description, 0, 220) . '...';
                                    }
                                    echo"
                                    <tr>
                                    <td><a href=\"content-page.php?cid=$cid\"><img src=\"../$posterURL\" width=\"180px\"></a></td>
                                    <td valign=\"top\" align=\"left\">
                                    <a href=\"content-page.php?cid=$cid\"> <font color=\"white\" face=\"times new roman\" size=\"6\">$title</font></a><br><br>
                                    <font color=\"white\" face=\"times new roman\" size=\"4\">$description</font><br><br>
                                    <font color=\"white\" face=\"times new roman\" size=\"4\">Release Date:$releaseDate</font><br><br>
                                    <form action=\"rating-review-page.php?cid={$cid}\" method=\"POST\">
                                    <input type=\"hidden\" name=\"cid\" value=\"$cid\">
                                    <input type=\"submit\" value=\"Rating and Review\">
                                    </form>
                                    </td>
                                    </tr>";
                                }    
                            }else{
                                echo"<tr><td align=\"center\"><font color=\"white\" face=\"times new roman\" size=\"6\">No Content Found</font></td></tr>";
                            }
                        ?>
        </table>
        
        <br><br><br><br><br><br>
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

</body>
</html>