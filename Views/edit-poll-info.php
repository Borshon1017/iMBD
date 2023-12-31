<?php
    require_once('../Models/user-info-model.php'); 
    require_once('../Models/poll-model.php');        
    $id=$_COOKIE['id'];
    $row=UserInfo($id);
    $pollid=$_GET['pollid'];
    $poll=getAPoll($pollid);

?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>iMBD Edit Poll</title>
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
        <font color="F5C518" face="times new roman" size="12">Edit Poll</font><br><br><br>
        <hr color="F5C518" width="530px"><br><br><br>
        <form action="../Controllers/update-poll-controller.php?id=<?php echo $pollid;?>" method="POST">
        <table width="60%" bgcolor="black" border="0" cellspacing="0" cellpadding="10">
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Poll Title : </font>
                </td>
                <td>
                    <input type="text" size="40px" name="pollTitle" id="pollTitle" value="<?php echo $poll['PollTitle'] ?>"  onkeyup="checkPollTitleLength()" required>
                    <br>
                        <font color="red" face="times new roman" size="3" id="titleError"></font>
                </td>
            </tr>
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Option 1 : </font>
                </td>
                <td>
                    <input type="text" size="40px" name="option1" id="option1" value="<?php echo $poll['OptionOne'] ?>" onkeyup="checkOptionLength(1)" required>
                <br>
                        <font color="red" face="times new roman" size="3" id="option1Error"></font>
                </td>
            </tr>
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Option 2 : </font>
                </td>
                <td>
                    <input type="text" size="40px" name="option2" id="option2" value="<?php echo $poll['OptionTwo'] ?>" onkeyup="checkOptionLength(2)" required>
                    <br>
                        <font color="red" face="times new roman" size="3" id="option2Error"></font>
                </td>
            </tr>
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Option 3 : </font>
                </td>
                <td>
                    <input type="text" size="40px" name="option3" id="option3" value="<?php echo $poll['OptionThree'] ?> " onkeyup="checkOptionLength(3)" required>
                    <br>
                        <font color="red" face="times new roman" size="3" id="option3Error"></font>
                </td>
            </tr>
            <tr>
                <td>
                    <font color="white" face="times new roman" size="6">Option 4 : </font>
                </td>
                <td>
                    <input type="text" size="40px" name="option4" id="option4" value="<?php echo $poll['OptionFour'] ?>" onkeyup="checkOptionLength(4)" required>
                    <br>
                        <font color="red" face="times new roman" size="3" id="option4Error"></font>
                </td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <br><br><br>
                    <input type="submit" name="submit" value="Edit Poll" >
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

    <script>
    function checkPollTitleLength() {
        let pollTitle = document.getElementById('pollTitle').value;
        if (pollTitle.length > 100  || pollTitle.length <1) {
            document.getElementById('titleError').innerHTML = "Poll title cannot be more than 100 characters or empty";
        } else {
            document.getElementById('titleError').innerHTML = "";
        }
        checkFormValidity();
    }

    function checkOptionLength(optionId) {
            let option = document.getElementById('option' + optionId).value;
            if (option.length > 50 || option.length <1) {
                document.getElementById('option' + optionId + 'Error').innerText = "Option cannot be more than 50 characters or empty";
            } else {
                document.getElementById('option' + optionId + 'Error').innerText = "";
            }


            checkFormValidity();
        }

        function checkFormValidity() {
            let pollTitle = document.getElementById('pollTitle').value;
            let option1 = document.getElementById('option1').value;
            let option2 = document.getElementById('option2').value;
            let option3 = document.getElementById('option3').value;
            let option4 = document.getElementById('option4').value;

            if (
                pollTitle === '' ||
                option1 === '' ||
                option2 === '' ||
                option3 === '' ||
                option4 === '' ||
                document.getElementById('titleError').innerText !== '' ||
                document.getElementById('option1Error').innerText !== '' ||
                document.getElementById('option2Error').innerText !== '' ||
                document.getElementById('option3Error').innerText !== '' ||
                document.getElementById('option4Error').innerText !== ''
            ) {
                document.getElementById('submitButton').disabled = true;
            } else {
                document.getElementById('submitButton').disabled = false;
            }
        }
</script>

</body>
</html>