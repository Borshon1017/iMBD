<?php
    require_once('../Models/user-info-model.php');
    require_once('../Models/discussion-model.php');
    require_once('../Models/discussion-comment-model.php');
    require_once('../Controllers/message-controller.php');  
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }
    $id=$_COOKIE['id'];
    $row=UserInfo($id);
    $commentID = $_GET['id'];
    $discussionID = $_GET['did'];
    $commentInfo = getComment($commentID);
             
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMBD Edit Comment</title>
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
                    <option value="watchlist.php">Watchlist</option>
                    <option value="purchase-history.php">Purchase List</option>
                    <option value="settings.php">Settings</option>
                    <option value="logout-page.php">Log Out</option>
                </select>
            </td>
        </tr>
    </table><br><br><br>
    <center>
    <form action="../Controllers/edit-discussion-comment-controller.php?id=<?php echo "{$commentID}&did={$discussionID}"; ?>" method="post">
    <table width="30%" bgcolor="black" border="0" cellspacing="0" cellpadding="10">
        <tr>
            <td align="center">
                <font color="F5C518" face="times new roman" size="12"><?php echo $commentInfo['Username']; ?></font><br><br>
            </td>
        </tr>
        <tr>
            <td>
                <textarea name="comment" cols="57" id="commentInput" oninput="checkCommentLength()" rows="20"><?php echo $commentInfo['DiscussionComment']; ?></textarea>
                <br>
                <font color="red" face="times new roman" size="3" id="commentError"></font>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="submit" value="Edit Comment">
            </td>
        </tr>
    </table></form>
    <br><br><br>
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
    <script>
    function checkCommentLength() {
        let commentInput = document.getElementById('commentInput');
        let commentError = document.getElementById('commentError');
        let maxLength = 500;

        if (commentInput.value.length > maxLength) {
            commentError.textContent = 'Comment cannot exceed 300 characters.';
           
            document.getElementById('submitButton').disabled = true;
        } else {
            commentError.textContent = '';
            document.getElementById('submitButton').disabled = false;
        }
    }
</script>
</body>
</html>