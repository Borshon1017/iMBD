<?php
    require_once('../Models/user-info-model.php'); 
    require_once('../Controllers/message-controller.php');  
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }   
    $id=$_COOKIE['id'];
    $row = UserInfo($id);
    $flag = 0;
    if(isset($_GET['id'])){
    $id2 = $_GET['id'];
    $row2 = UserInfo($id2);
    if($id!=$id2) $flag = 1;
    } 
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMBD View Profile Info</title>
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
            
            if($row['Role'] == "General User"){
                echo "<img src=\" ../{$row['ProfilePicture']} \" width=\"40px\">&nbsp;&nbsp;&nbsp;
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
            ?>
            </td>
        </tr>
    </table><br><br><br>

    <center>

    <?php

    if($flag==0) echo "<img src=\"../{$row['ProfilePicture']}\" width=\"100px\">";
    else echo "<img src=\"../{$row2['ProfilePicture']}\" width=\"100px\">";

    ?>
        <br><br><br>

        <table width="40%" bgcolor="black" border="1" cellspacing="0" cellpadding="25" bordercolor="F5C518">    
        <tr>

            <?php

                if($flag==0){

                    echo "<td>
                    <font color=\"white\" face=\"times new roman\" size=\"6\">Full Name : {$row['Fullname']} </font><br><br>
                    <font color=\"white\" face=\"times new roman\" size=\"6\">Username : {$row['Username']} </font><br><br>
                    <font color=\"white\" face=\"times new roman\" size=\"6\">Phone Number : {$row['Phone']} </font><br><br>
                    <font color=\"white\" face=\"times new roman\" size=\"6\">Email : {$row['Email']} </font><br>
                </td>";

                }else{

                        echo "<td>
                        <font color=\"white\" face=\"times new roman\" size=\"6\">Full Name : {$row2['Fullname']} </font><br><br>
                        <font color=\"white\" face=\"times new roman\" size=\"6\">Username : {$row2['Username']} </font><br><br>
                        <font color=\"white\" face=\"times new roman\" size=\"6\">Phone Number : {$row2['Phone']} </font><br><br>
                        <font color=\"white\" face=\"times new roman\" size=\"6\">Email : {$row2['Email']} </font><br>
                    </td>";

                }

            ?>
                
            </tr>
        </table><br><br><br>
        
    </center>
    <br><br><br><br><br>
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