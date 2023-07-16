<?php
    require_once('../Models/user-info-model.php');
    require_once('../Models/rating-review.php'); 
    require_once('../Controllers/message-controller.php');  
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }        
    $id=$_COOKIE['id'];
    $row=UserInfo($id);
    $cid = $_POST['cid'];
    $result = getContentDetails($cid);
    if ($result) {
        $crow = mysqli_fetch_assoc($result);
        $rating = $crow['rating'];
        $review = $crow['Review'];
     
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMBD Rate/Review</title>
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
        <font color="F5C518" face="times new roman" size="12">Rate/Review: Movie Title</font><br><br><br>
        <hr color="F5C518" width="650px"><br><br><br>
        <form action="../Controllers/set-review.php" method="POST" enctype="multipart/form-data">
        <table width="60%" bgcolor="black" border="0" cellspacing="0" cellpadding="10">
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Rating [1-5] : </font>
                </td>
                <td>
                    <input type="text" size="60px" name="rating" value="<?php echo $rating?>" required>
                    <input type="hidden" size="60px" name="cid" value='<?php echo $cid; ?>' required>
                    <input type="hidden" size="60px" name="id" value='<?php echo $id; ?>' required>


                </td>
            </tr>
            <tr>
                <td valign="top">
                    <font color="white" face="times new roman" size="6">Review : </font>
                </td>
                <td>
                    <textarea cols="59" rows="10" name="review" valuer="<?php echo "review"?>" equired></textarea>
                </td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <br><br><br>
                    <input type="submit" name="submit" value="Submit">
                </td>
            </tr>
        </table><br><br><br>
        </form>
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