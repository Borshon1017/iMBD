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
    <title>iMBD Edit Profile Info</title>
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

        ?><br><br><br>
        <?php
            if($flag==0){
            echo"
        <form action=\"../Controllers/update-profile-info-controller.php?id={$id}\" method=\"post\">
        <table width=\"40%\" bgcolor=\"black\" border=\"0\" cellspacing=\"0\" cellpadding=\"25\" bordercolor=\"F5C518\">
            <tr>
                <td>
                    <font color=\"white\" face=\"times new roman\" size=\"6\">Full Name :
                </td>
                <td>
                    <input type=\"text\" name=\"Fullname\" id=\"fullname\" value=\"{$row['Fullname']}\" onkeyup=\"validateFullName()\"></font>
                <br>
                <font color=\"red\" face=\"times new roman\" size=\"3\" id=\"fnameError\"></font>
                </td>

                    </td>
            </tr>
            <tr>
                <td>
                    <font color=\"white\" face=\"times new roman\" size=\"6\">Username :
                </td>
                <td>
                    <input type=\"text\" name=\"Username\" id=\"username\" value=\"{$row['Username']}\" onkeyup=\"validateUsername()\"></font>
                    <br>
                    <font color=\"red\" face=\"times new roman\" size=\"3\" id=\"usernameError\"></font>
                    </td>
            </tr>
            <tr>
                <td>
                    <font color=\"white\" face=\"times new roman\" size=\"6\">Phone Number :
                </td>
                <td>
                    <input type=\"text\" name=\"Phone\" id=\"phone\" value=\"{$row['Phone']}\" onkeyup=\"validatePhoneNumber()\"></font>
                    <br>
                    <font color=\"red\" face=\"times new roman\" size=\"3\" id=\"phoneError\"></font>
                    </td>
            </tr>
            <tr>
                <td>
                    <font color=\"white\" face=\"times new roman\" size=\"6\">Email :
                </td>
                <td>
                    <input type=\"text\" name=\"Email\" id=\"email\" value=\"{$row['Email']}\" onkeyup=\"validateEmail()\"></font>
                    <br>
                    <font color=\"red\" face=\"times new roman\" size=\"3\" id=\"mailError\"></font>
                    </td>
            </tr>
            <tr align=\"center\">
                <td colspan=\"2\">
                    <input type=\"submit\" name=\"updateinfo\" id=\"submitButton\" value=\"Update Information\">
                </td>
            </tr>";
        } else {
            echo "
                    <form action=\"../Controllers/update-profile-info-controller.php?id={$id2}\" method=\"post\">
                    <table width=\"40%\" bgcolor=\"black\" border=\"0\" cellspacing=\"0\" cellpadding=\"25\" bordercolor=\"F5C518\">
                    <tr>
                        <td>
                            <font color=\"white\" face=\"times new roman\" size=\"6\">Full Name :
                        </td>
                        <td>
                            <input type=\"text\" name=\"Fullname\" id=\"fullname\" value=\"{$row2['Fullname']}\" onkeyup=\"validateFullName()\"></font>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <font color=\"white\" face=\"times new roman\" size=\"6\">Username :
                        </td>
                        <td>
                            <input type=\"text\" name=\"Username\" id=\"username\" value=\"{$row2['Username']}\" onkeyup=\"validateUsername()\"></font>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <font color=\"white\" face=\"times new roman\" size=\"6\">Phone Number :
                        </td>
                        <td>
                            <input type=\"text\" name=\"Phone\" id=\"phone\" value=\"{$row2['Phone']}\" onkeyup=\"validatePhoneNumber()\"></font>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <font color=\"white\" face=\"times new roman\" size=\"6\">Email :
                        </td>
                        <td>
                            <input type=\"text\" name=\"Email\" id=\"email\" value=\"{$row2['Email']}\" onkeyup=\"validateEmail()\"></font>
                        </td>
                    </tr>
                    <tr align=\"center\">
                        <td colspan=\"2\">
                            <input type=\"submit\" name=\"updateinfo\" value=\"Update Information\">
                        </td>
                    </tr>";
        }
        ?>
        </table>
        <br><br><br>
        </form>
    </fieldset>
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
    <script>
    
    function validateFullName() {
        const fullNameInput = document.getElementById("fullname");
        const fullNameError = document.getElementById("fnameError");
        const fullName = fullNameInput.value;

        if (fullName.trim() === "") {
            fullNameError.textContent = "Full Name cannot be empty";
        } else if (fullName.split(" ").length < 2) {
            fullNameError.textContent = "Full Name must contain exactly 2 words";
        } else if (fullName.length > 50) {
            fullNameError.textContent = "Full Name should be less than 50 characters";
        } else {
            fullNameError.textContent = "";
        }
        checkFormValidity()
    }

    
    function validateUsername() {
        const usernameInput = document.getElementById("username");
        const usernameError = document.getElementById("usernameError");
        const username = usernameInput.value;

        if (username.trim() === "") {
            usernameError.textContent = "Username cannot be empty";
        } else if (username.split(" ").length > 1) {
            usernameError.textContent = "Username cannot contain spaces";
        } else if (username.length > 40) {
            usernameError.textContent = "Username should be less than 40 characters";
        } else {
            usernameError.textContent = "";
        }
        checkFormValidity()
    }

    
    function validatePhoneNumber() {
        let phone = document.getElementById('phone').value;

            if (phone === '') {
                document.getElementById('phoneError').innerHTML = "Phone number cannot be empty.";
            } else {
                for (let i = 0; i < phone.length; i++) {
                    if (!Number.isInteger(parseInt(phone[i]))) {
                        document.getElementById('phoneError').innerHTML = "Phone number can only contain numbers.";
                        break;
                    }
                }

                if (phone.length !== 11) {
                    document.getElementById('phoneError').innerHTML = "Phone number must be 11 characters long.";
                } else {
                    document.getElementById('phoneError').innerHTML = "";
                }
            }
            checkFormValidity()
            
    }

    
    function validateEmail() {
        let mail = document.getElementById('email').value;
            let atPos = mail.indexOf('@');
            let dotPos = mail.lastIndexOf('.');

            if (!mail) {
                document.getElementById('mailError').innerHTML = "Email cannot be empty.";
            } else if (atPos === -1 || atPos === 0 || dotPos === -1 || dotPos <= atPos + 1 || dotPos === mail.length - 1) {
                document.getElementById('mailError').innerHTML = "Invalid email address.";
            } else {
                document.getElementById('mailError').innerHTML = "";
            }
            checkFormValidity()
    }

    
    function checkFormValidity() {
        let fullname = document.getElementById('fullname').value;
            let username = document.getElementById('username').value;
            let phone = document.getElementById('phone').value;
            let email = document.getElementById('email').value;
            
            

            if (
                fullname === '' ||
                username === '' ||
                phone === '' ||
                email === '' ||
                document.getElementById('fnameError').innerText !== '' ||
                document.getElementById('usernameError').innerText !== '' ||
                document.getElementById('phoneError').innerText !== '' ||
                document.getElementById('mailError').innerText !== ''
            ) {
                document.getElementById('submitButton').disabled = true;
            } else {
                document.getElementById('submitButton').disabled = false;
            }
    }

</script>
</body>
</html>

