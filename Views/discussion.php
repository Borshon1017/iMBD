<?php
    require_once('../Models/user-info-model.php');
    require_once('../Models/discussion-model.php');
    require_once('../Models/discussion-comment-model.php');
    require_once('../Controllers/message-controller.php');  
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }         
    $id=$_COOKIE['id'];
    $row= UserInfo($id);
    $drow = getDiscussion();
    $did = $drow['DiscussionID'];
    $resultC = getAllComments($did);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>iMBD Discussion</title>
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

    
    <table width="80%" bgcolor="black" border="1" cellspacing="0" cellpadding="25" align="center" bordercolor="F5C518">
        <tr>
            <td>
                <font color="F5C518" face="times new roman" size="6"><?php echo $drow["DiscussionTitle"]?></font>
                <br><br><br>
                <font color="white" face="times new roman" size="4"><?php echo $drow["DiscussionDescription"]?></font>
                <br><br><br>
                <div id="comments">
                <?php 
                if(mysqli_num_rows($resultC)>0){
                    while($w=mysqli_fetch_assoc($resultC)){
                        $uname=$w['Username'];
                        $comment=$w['DiscussionComment'];
                        $commentID = $w['DiscussionCommentID'];
                        echo "<font color=\"F5C518\" face=\"times new roman\" size=\"5\">{$uname} : </font>
                        <font color=\"white\" face=\"times new roman\" size=\"5\">{$comment}</font><br><br>";
                        if($id == $w['UserID']){
                            echo "<a href=\"edit-discussion-comment.php?id={$commentID}&did={$did}\"><button>Edit Comment</button></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"../Controllers/delete-discussion-comment-controller.php?id={$commentID}&did={$did}\"><button>Delete Comment</button></a><br><br>";
                        }
                    }
                }
                ?>
                </div>
                
                <br><br><br>
                <input type="hidden" id="uid" value="<?php echo $id; ?>">
                <input type="hidden" id="did" value="<?php echo $did; ?>">
                <input type="hidden" id="username" value="<?php echo $row['Username']; ?>">
              
       
                <textarea id="comment" rows="15" cols="174"></textarea><br><br>
                <font color="red" face="times new roman" size="3" id="commentError"></font>
                <p align="right">

                <button name="submit" onclick="postComment()">Post Comment</button>&nbsp;&nbsp;&nbsp;&nbsp;
            
                </p>
             
            </td>
            
            <br>
        </tr>
    </table>
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
    <script>

function postComment(){

let id = document.getElementById('uid').value;
let did = document.getElementById('did').value;
let username = document.getElementById('username').value;
let comment = document.getElementById('comment').value;

let commentOBJ =  {
        'uid': id,
        'did': did,
        'username': username,
        'comment' : comment
};

let data = JSON.stringify(commentOBJ);

let xhttp = new XMLHttpRequest();
xhttp.open('POST', '../Controllers/discussion-comment-controller.php', true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

xhttp.send('json='+data);
location.reload();
}

function checkCommentLength() {
    let commentInput = document.getElementById('comment'); 
    let commentError = document.getElementById('commentError');
    let maxLength = 500;

    if (commentInput.value.length > maxLength) {
        commentError.textContent = 'Comment cannot exceed 500 characters.';
    } else {
        commentError.textContent = '';
    }
}
</script>
</body>
</html>