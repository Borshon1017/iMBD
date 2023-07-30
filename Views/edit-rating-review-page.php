<?php
    require_once('../Models/user-info-model.php');
    require_once('../Models/content-info-model.php');
    require_once('../Models/rating-review.php'); 
    require_once('../Controllers/message-controller.php');  
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }        
    $id=$_COOKIE['id'];
    $row=UserInfo($id);
    $cid = $_GET['cid'];
    $result = getRatingDetails($cid);
    $title=getContentDetails($cid);
    if ($title){
        $name=mysqli_fetch_assoc($title);
        $t=$name['ContentTitle'];
    }
    if ($result) {
        $crow = mysqli_fetch_assoc($result);
        $rating = $crow['Rating'];
        $review = $crow['Review'];
     
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>iMBD Rate/Review</title>
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
        <font color="F5C518" face="times new roman" size="12">Rate/Review:<?php echo "$t";?></font><br><br><br>
        <hr color="F5C518" width="650px"><br><br><br>
        <form action="../Controllers/update-review.php" method="POST" enctype="multipart/form-data">
        <table width="60%" bgcolor="black" border="0" cellspacing="0" cellpadding="10">
                <tr>
                    <td>
                        <font color="white" face="times new roman" size="6">Rating [1-5]: </font>
                    </td>
                    <td>
                        <input type="text" size="60px" name="rating" id="rating" onkeyup="validateRating()">
                        <br>
                        <font color="red" face="times new roman" size="3" id="ratingError"></font>
                        <input type="hidden" size="60px" name="cid" value="<?php echo $cid; ?>">
                        <input type="hidden" size="60px" name="id" value="<?php echo $id; ?>">
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <font color="white" face="times new roman" size="6">Review [max 500 chars]: </font>
                    </td>
                    <td>
                        <textarea cols="59" rows="10" name="review" id="review" onkeyup="validateReview()"></textarea>
                        <br>
                        <font color="red" face="times new roman" size="3" id="reviewError"></font>
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="2">
                        <br><br><br>
                        <input type="submit" name="submit" value="Submit" id="submitButton">
                    </td>
                </tr>
            </table>  <br><br><br>
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
    <script>
        function validateRating() {
            const ratingInput = document.getElementById("rating");
            const ratingError = document.getElementById("ratingError");
            const rating = parseInt(ratingInput.value);

            if (isNaN(rating) || rating < 1 || rating > 5) {
                ratingError.textContent = "Rating must be a number between 1 and 5.";
            } else {
                ratingError.textContent = "";
            }

            checkFormValidity();
        }

        function validateReview() {
            const reviewInput = document.getElementById("review");
            const reviewError = document.getElementById("reviewError");
            const review = reviewInput.value;

            if (review.length > 500) {
                reviewError.textContent = "Review cannot exceed 500 characters.";
            } else {
                reviewError.textContent = "";
            }

            checkFormValidity();
        }

        function checkFormValidity() {
            const ratingInput = document.getElementById("rating");
            const reviewInput = document.getElementById("review");
            const submitButton = document.getElementById("submitButton");
            const rating = parseInt(ratingInput.value);
            const review = reviewInput.value;

            if (isNaN(rating) || rating < 1 || rating > 5 || review.length > 500) {
                submitButton.disabled = true;
            } else {
                submitButton.disabled = false;
            }
        }
    </script>
</body>
</html>