<?php
    require_once('../Models/user-info-model.php');
    require_once('../Models/content-info-model.php');
    require_once('../Controllers/message-controller.php');  
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }         
    $id=$_COOKIE['id'];
    $row=UserInfo($id);
    $cid = $_GET['cid'];
    if($row['Role']!="General User"){
        popup("Error", "You can't purchase Content"); 
    }

    $result = getContentDetails($cid);
    if ($result) {
        
        $crow = mysqli_fetch_assoc($result);
        $title = $crow['ContentTitle'];
        $releaseDate = $crow['ReleaseDate'];
        $posterURL = $crow['Poster'];
        $trailer = $crow['Trailer'];
        $description = $crow['ContentDescription'];
        $director = $crow['Director'];
        $cast = $crow['Cast'];
        $price= $crow['Price'];
        $category=$crow['Category'];


    } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>iMBD Payment Info</title>
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
                    <option value="watchlist.php">Watchlist</option>
                    <option value="purchase-history.php">Purchase List</option>
                    <option value="settings.php">Settings</option>
                    <option value="logout-page.php">Log Out</option>
                </select>
            </td>
            <td></td>
        </tr>
    </table><br><br><br>

    <center>
    <font color="F5C518" face="times new roman" size="12">Payment Info</font><br><br><br>
    <hr color="F5C518" width="530px"><br><br><br>
    <table width="85%" bgcolor="black" border="0" cellspacing="0" cellpadding="15">
        <tr>
            <td>
                <font color="F5C518" face="times new roman" size="5">Content Title</font>
                <hr color="F5C518" width="150px" align="left">
            </td>
            <td>
                <font color="F5C518" face="times new roman" size="5">Category</font>
                <hr color="F5C518" width="120px" align="left">
            </td>
            <td>
                <font color="F5C518" face="times new roman" size="5">Price</font>
                <hr color="F5C518" width="80px" align="left">
            </td>
        </tr>
        <tr>
            <td>
                <font color="white" face="times new roman" size="5"><?php echo $title; ?></font>
            </td>
            <td>
                <font color="white" face="times new roman" size="5"><?php echo $category; ?></font>
            </td>
            <td>
                <font color="white" face="times new roman" size="5"><?php echo $price; ?></font>
            </td>
        </tr>
    </table><br><br><br><br><br><br>

    <br><br><br>
    <table width="30%" bgcolor="black" border="0" cellspacing="0" cellpadding="10">
        <tr>
            <td>
                <font color="F5C518" face="times new roman" size="12"><?php echo $row['Fullname'] ?></font><br><br>
            </td>
        </tr>
        <tr>
            <td>
                <form action="../Controllers/confirm-purchase-controller.php?cid=<?php echo $cid; ?>" method="post">
                <font color="white" face="times new roman" size="4">Enter 11 Digit Card No</font>
                <br>
                <input type="text" name="cardNo" size="43px"><br><br>
                <font color="white" face="times new roman" size="4">Enter 4 Digit Pin Number</font>
                <br>
                <input type="password" name="pinNo" size="43px">
            </td>
        </tr>
        <tr>
            <td>
                <br><br><br>
                <input type="submit" name="submit" value="Confirm Payment">
                </form>
            </td>
        </tr>
    </table><br><br><br>
    </center>
    <br><br><br><br><br><br>
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