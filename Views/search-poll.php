<?php
    require_once('../Models/user-info-model.php');
    require_once('../Controllers/message-controller.php'); 
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }
    $id = $_COOKIE['id'];
    $row = UserInfo($id);
    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        if(empty($title)){
            popup("Error!","Please enter what you want to search.");
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Search Poll</title>
</head>
<body bgcolor="black">
    <table width="100%" bgcolor="black" border="0" cellspacing="0" cellpadding="15">
        <tr height="60px">
            <td>
                &nbsp;<a href="../index.php"><img src="../Uploads/logo.png" width="80px"></a>
            </td>
            <td>
                
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="search-content.php"><button class="btn search">Search iMBD</button></a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
            </td>
            <td>
                <?php
                if($row['Role'] == "General User"){
                    echo "<img src=\"../{$row['ProfilePicture']}\" width=\"40px\">&nbsp;&nbsp;&nbsp;
                    <select name=\"profile\" onchange=\"location = this.value;\">
                        <option disabled selected hidden>{$row['Username']}</option>
                        <option value=\"user-profile.php\">Profile</option>
                        <option value=\"watchlist.php\">Watchlist</option>
                        <option value=\"purchase-history.php\">Purchase List</option>
                        <option value=\"settings.php\">Settings</option>
                        <option value=\"logout-page.php\">Log Out</option>
                    </select>";
                } else if($row['Role'] == "Content Writer" || $row['Role'] == "Administrator" || $row['Role'] == "Critic"){
                    echo "<img src=\"../{$row['ProfilePicture']}\" width=\"40px\">&nbsp;&nbsp;&nbsp;
                    <select name=\"profile\" onchange=\"location = this.value;\">
                        <option disabled selected hidden>{$row['Username']}</option>
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
        <font color="F5C518" face="times new roman" size="12">Search Poll</font><br><br><br>
        <hr color="F5C518" width="530px"><br>
        <input type="text" id="livesearch" onkeyup="search(this.value)" name="title" placeholder="Search Poll Title" size="100px">&nbsp;&nbsp;
        <br><br>
            
            <table width="85%" bgcolor="black" border="0" cellspacing="0" cellpadding="15">
            <tr>
        <td>
        <font color="F5C518" face="times new roman" size="5">Poll Title</font>
        <hr color="F5C518" width="120px" align="left">
        </td></tr>
        <tr><td><font id="message" color="white" face="times new roman" size="6">Please enter a title</font></td></tr>
        
            <script>
            function search(str){ 
                if(str==""){
                document.getElementById('message').innerHTML="<tr><td align=\"center\"><font color=\"white\" face=\"times new roman\" size=\"6\">Please Type Title</font><br><br><br>";
                return;
                }
                let xhttp=new XMLHttpRequest(); 
                xhttp.open('post','../Controllers/search-poll-controller.php',true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send('name='+str);
                xhttp.onload=function(){
                document.getElementById('message').innerHTML=this.responseText;
                }
            }
            </script>
        </table>

        <br><br><br>
    </center>
    <br><br><br>
    <center>
        <a href="about-us.php"><font color="white" face="times new roman" size=\"4\">About Us</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="helpline.php"><font color="white" face=\"times new roman\" size=\"4\">Helpline</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="faq.php"><font color="white" face=\"times new roman\" size=\"4\">FAQ</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="terms-and-services.php"><font color="white" face=\"times new roman\" size=\"4\">Terms and Services</font></a><br><br><br>
        <font color="white" face=\"times new roman\" size=\"3\">iMBD</font><br><br>
        <font color="white" face=\"times new roman\" size=\"2\">A Maa Babar Dowa Company</font><br>
        <font color="white" face=\"times new roman\" size=\"1\">© 2023 by iMBD.com, Inc.</font><br><br>
    </center>
</body>
</html>
