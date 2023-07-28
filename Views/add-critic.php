<?php
    require_once('../Models/user-info-model.php');   
    require_once('../Controllers/message-controller.php');  
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }      
    $id=$_COOKIE['id'];
    $row=UserInfo($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMBD Add Critic</title>
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
        <font color="F5C518" face="times new roman" size="12">Add Critic</font><br><br><br>
        <hr color="F5C518" width="530px"><br><br><br>
        <form action="../Controllers/add-critic-controller.php" method="POST">
        <table width="60%" bgcolor="black" border="0" cellspacing="0" cellpadding="10">
                <tr>
                    <td>
                        <font color="white" face="times new roman" size="6">Fullname :</font>
                    </td>
                    <td>
                        <input type="text" size="40px" name="fullname" id="fullname" onkeyup="checkFullName()">
                        <br>
                        <font color="red" face="times new roman" size="3" id="fnameError"></font>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font color="white" face="times new roman" size="6">Username :</font>
                    </td>
                    <td>
                        <input type="text" size="40px" name="username" id="username" onkeyup="checkUserName()">
                        <br>
                        <font color="red" face="times new roman" size="3" id="usernameError"></font>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font color="white" face="times new roman" size="6">Phone Number :</font>
                    </td>
                    <td>
                        <input type="text" size="40px" name="phone" id="phone" onkeyup="checkPhone()">
                        <br>
                        <font color="red" face="times new roman" size="3" id="phoneError"></font>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font color="white" face="times new roman" size="6">Email :</font>
                    </td>
                    <td>
                        <input type="email" size="40px" name="email" id="email" onkeyup="checkMail()">
                        <br>
                        <font color="red" face="times new roman" size="3" id="mailError"></font>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font color="white" face="times new roman" size="6">Password :</font>
                    </td>
                    <td>
                        <input type="password" size="40px" name="password" id="password" onkeyup="checkPassword()">
                        <br>
                        <font color="red" face="times new roman" size="3" id="passwordError"></font>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font color="white" face="times new roman" size="6">Confirm Password :</font>
                    </td>
                    <td>
                        <input type="password" size="40px" name="repassword" id="repassword" onkeyup="checkRepassword()">
                        <br>
                        <font color="red" face="times new roman" size="3" id="repasswordError"></font>
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="2">
                        <br><br><br>
                        <input type="submit" name="submit" value="Add Critic">
                    </td>
                </tr>
            </table>
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
        function checkFullName() {
            
            let name = document.getElementById('fullname').value;
            let nameLen = name.split(' ');

            if (nameLen.length < 2) {
                document.getElementById('fnameError').innerHTML = "Can not be less than 2 words";
            } else {
                document.getElementById('fnameError').innerHTML = "";
            }

            for (let i = 0; i < name.length; i++) {
                if (!checkChar(name[i])) {
                    document.getElementById('fnameError').innerHTML = "Name can only contain letters, dots, or spaces.";
                    break;
                }
            }
        }

        function checkUserName() {
           
            let username = document.getElementById('username').value;

            if (username === '') {
                document.getElementById('usernameError').innerHTML = "Username cannot be empty.";
            } else {
                for (let i = 0; i < username.length; i++) {
                    if (!checkChar(username[i])) {
                        document.getElementById('usernameError').innerHTML = "Username can only contain letters, numbers, dots, or spaces.";
                        return;
                    }
                }

                if (username.split(' ').length > 1) {
                    document.getElementById('usernameError').innerHTML = "Username cannot contain more than one word.";
                } else if (username.length > 15) {
                    document.getElementById('usernameError').innerHTML = "Username cannot exceed 15 characters.";
                } else {
                    document.getElementById('usernameError').innerHTML = "";
                }
            }
        }

        function checkPhone() {
            
            let phone = document.getElementById('phone').value;

            if (phone === '') {
                document.getElementById('phoneError').innerHTML = "Phone number cannot be empty.";
            } else {
                for (let i = 0; i < phone.length; i++) {
                    if (!Number.isInteger(parseInt(phone[i]))) {
                        document.getElementById('phoneError').innerHTML = "Phone number can only contain numbers.";
                        return;
                    }
                }

                if (phone.length != 11) {
                    document.getElementById('phoneError').innerHTML = "Must be 11 characters.";
                } else {
                    document.getElementById('phoneError').innerHTML = "";
                }
            }
        }

        function checkMail() {
           
            let mail = document.getElementById('email').value;
            let atPos = mail.indexOf('@');
            let dotPos = mail.lastIndexOf('.');

            if (!mail) {
                document.getElementById('mailError').innerHTML = "Email can not be empty";
            } else if (atPos === -1 || atPos === 0 || dotPos === -1 || dotPos <= atPos + 1 || dotPos === mail.length - 1) {
                document.getElementById('mailError').innerHTML = "Invalid email address";
            } else {
                document.getElementById('mailError').innerHTML = "";
            }
        }

        function checkPassword() {
        let password = document.getElementById('password').value;

        if (password === '') {
            document.getElementById('passwordError').innerHTML = "Password cannot be empty.";
        } else if (password.length < 8) {
            document.getElementById('passwordError').innerHTML = "Password must be at least 8 characters long.";
        } else {
            document.getElementById('passwordError').innerHTML = "";
        }
    }
        function checkRepassword() {
            
            let password = document.getElementById('password').value;
            let repassword = document.getElementById('repassword').value;

            if (repassword !== password) {
                document.getElementById('repasswordError').innerHTML = "Passwords do not match.";
            } else {
                document.getElementById('repasswordError').innerHTML = "";
            }
        }


        function checkChar(ch) {
            return (ch >= 'A' && ch <= 'Z') || (ch >= 'a' && ch <= 'z') || (ch >= '0' && ch <= '9') || ch === '.' || ch === ' ';
        }
    </script>
</body>
</html>