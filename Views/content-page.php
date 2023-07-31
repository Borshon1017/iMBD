<?php
    require_once('../Models/user-info-model.php'); 
    require_once('../Models/content-info-model.php'); 
    require_once('../Controllers/message-controller.php'); 
    require_once('../Models/database.php');
    require_once('../Models/comment-info-model.php');
    require_once('../Models/rating-review.php');

    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }
    $id = $_COOKIE['id'];
    $row = UserInfo($id);
    $cid = $_GET['cid'];
    $resultC = getAllComments($cid);
    $result = getContentDetails($cid);
    $resultR = showRatingReview($cid);

    if ($result) {
        
        $crow = mysqli_fetch_assoc($result);
        $title = $crow['ContentTitle'];
        $releaseDate = $crow['ReleaseDate'];
        $posterURL = $crow['Poster'];
        $trailer = $crow['Trailer'];
        $description = $crow['ContentDescription'];
        $director = $crow['Director'];
        $cast = $crow['Cast'];
        $category = $crow['Category'];
        $price= $crow['Price'];

 
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>iMBD Content Title</title>
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
            <td></td>
        </tr>
    </table><br>
    
    <table width="100%" bgcolor="black" border="0" cellspacing="0" cellpadding="15">
        <tr>
            <td>
                <font color="white" face="times new roman" size="12"><?php echo $title; ?></font><br><br>
                <font color="white" face="times new roman" size="4"><?php echo $category; ?> |</font>
                <font color="white" face="times new roman" size="4">Release Date: <?php echo $releaseDate; ?></font><br><br>
            </td>
        </tr>
        <tr>
            <td>
                <img src="../<?php echo $posterURL; ?>" width="300px">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<video src="../<?php echo $trailer; ?>" controls autoplay width="800px"></video><br><br><br>
            </td>
        </tr>
        <tr>
            <td>
                <hr color="F5C518" width="100%"><br><br>
                <font color="white" face="times new roman" size="12">Description : </font><br>
                <hr color="F5C518" width="270px" align="left"><br>
                <font color="white" face="times new roman" size="6"><?php echo $description; ?></font><br><br><br>
                <hr color="F5C518" width="100%">
            </td>
        </tr>
        <tr>
            <td>
              <font color="white" face="times new roman" size="6">Purchase This:</font>
                <a href="payment-info.php?cid=<?php echo $cid; ?>"><font color="white" face="times new roman" size="6"><?php echo $price; ?></font></a>

            </td>
        </tr>
        <tr>
            <td>
                <?php
            $row=UserInfo($id);
            if($row['Role'] == "General User")
            {
                $con = dbConnection();
            $sql = "SELECT * FROM watchlist WHERE UserID = '$id' AND ContentID = '$cid'";
            $result = mysqli_query($con, $sql);
            $count = mysqli_num_rows($result);
                if ($count > 0) 
            {
            echo '<font color="white" face="times new roman" size="6">Already added to Watchlist</font><br><br>';
            }
            else{
            echo '<a href="../Controllers/Add-to-Watchlist.php?cid=' . $cid  . '"><font color="white" face="times new roman" size="6">Add to Watchlist</font></a><br><br>';
            }
        }
        ?>
                <hr color="F5C518" width="100%">
            </td>
        </tr>
        <tr>
            <td>
                <font color="white" face="times new roman" size="6">Directors : </font><br>
                <hr color="F5C518" width="150px" align="left"><br>
                <font color="white" face="times new roman" size="6"><?php echo $director; ?></font><br><br><br>
                <font color="white" face="times new roman" size="6">Casts : </font><br>
                <hr color="F5C518" width="100px" align="left"><br>
                <font color="white" face="times new roman" size="6"><?php echo $cast; ?></font><br><br><br>
                <hr color="F5C518" width="100%">
            </td>
        </tr>
        <tr>
            <td>
                <font color="white" face="times new roman" size="12">Critic's Opinion : </font><br><br><br>
                <font color="white" face="times new roman" size="6">Rating : </font>
                <hr color="F5C518" width="120px" align="left"><br>
                <font color="white" face="times new roman" size="6"><?php if($resultR != false) echo $resultR['Rating'];
                                                                          else echo "Not yet rated"; ?></font><br><br><br>
                <font color="white" face="times new roman" size="6">Review : </font>
                <hr color="F5C518" width="130px" align="left"><br>
                <font color="white" face="times new roman" size="6"><?php if($resultR != false) echo $resultR['Review'];
                                                                          else echo "Not yet reviewed"; ?></font><br><br><br>
                <hr color="F5C518" width="100%">
            </td>
        </tr>
        <tr>
            <td>
                <font color="white" face="times new roman" size="12">Comments : </font><br><br><br>
                <?php 
                if(mysqli_num_rows($resultC)>0){
                    while($w=mysqli_fetch_assoc($resultC)){
                        $uname=$w['Username'];
                        $comment=$w['Comment'];
                        $commentID = $w['CommentID'];
                        echo "<font color=\"F5C518\" face=\"times new roman\" size=\"5\">{$uname} : </font>
                        <font color=\"white\" face=\"times new roman\" size=\"5\">{$comment}</font><br><br>";
                        if($id == $w['UserID']){
                            echo "<a href=\"edit-comment.php?id={$commentID}&cid={$cid}\"><button>Edit Comment</button></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"../Controllers/delete-comment-controller.php?id={$commentID}&cid={$cid}\"><button>Delete Comment</button></a><br><br>";
                        }
                    }
                }
            ?>
                <br><br><br>
                <input type="hidden" id="uid" value="<?php echo $id; ?>">
                <input type="hidden" id="cid" value="<?php echo $cid; ?>">
                <input type="hidden" id="username" value="<?php echo $row['Username']; ?>">
                <textarea id="comment" rows="15" cols="174" onkeyup="checkCommentLength()"></textarea><br><br>
                <font color="red" face="times new roman" size="3" id="commentError"></font>
                <p align="right">
                    <button name="submit" id=submitButton onclick="postComment()">Post Comment</button>&nbsp;&nbsp;&nbsp;&nbsp;
                </p>
            </td>
        </tr>
    </table>
    <script>

        function postComment(){

            let id = document.getElementById('uid').value;
            let cid = document.getElementById('cid').value;
            let username = document.getElementById('username').value;
            let comment = document.getElementById('comment').value;

            let commentOBJ =  {
                    'uid': id,
                    'cid': cid,
                    'username': username,
                    'comment' : comment
            };

            let data = JSON.stringify(commentOBJ);

            let xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../Controllers/comment-controller.php', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send('json='+data);
            location.reload();
           
        }

        function checkCommentLength() {
    let commentInput = document.getElementById('comment'); 
    let commentError = document.getElementById('commentError');
    let maxLength = 500;

    if (commentInput.value.length > maxLength || commentInput.value.length==0) {
        commentError.textContent = 'Comment cannot exceed 500 or be empty characters.';
    } else {
        commentError.textContent = '';
    }
}
function checkCommentLength() {
    let commentInput = document.getElementById('comment'); 
    let commentError = document.getElementById('commentError');
    let maxLength = 500;

    if (commentInput.value.length > maxLength || commentInput.value.length === 0) {
        commentError.textContent = 'Comment cannot exceed 500 characters or be empty.';
        document.getElementById('submitButton').disabled = true;
    } else {
        commentError.textContent = '';
        document.getElementById('submitButton').disabled = false;
    }
}


    </script>

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
