<?php
    require_once('../Models/user-info-model.php');
    require_once('../Controllers/message-controller.php');  
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }
    $result=getAllUser();
    $id=$_COOKIE['id'];
    $row=UserInfo($id);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>iMBD View All Users</title>
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
        <font color="F5C518" face="times new roman" size="12">General Users</font><br><br><br>
        <hr color="F5C518" width="530px"><br> 
        <input type="text" id="live" name="title" onkeyup="search(this.value)" placeholder="Search by email" size="100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
        <br><br> 
         <table width="85%" bgcolor="black" border="0" cellspacing="0" cellpadding="15">
            <tr>
                <td>
                    <font color="F5C518" face="times new roman" size="5">Name</font>
                    <hr color="F5C518" width="80px" align="left">
                </td>
                <td>
                    <font color="F5C518" face="times new roman" size="5">Username</font>
                    <hr color="F5C518" width="120px" align="left">
                </td>
                <td>
                    <font color="F5C518" face="times new roman" size="5">Email</font>
                    <hr color="F5C518" width="80px" align="left">
                </td>
                
            </tr>
            <tr><td><font id="name" color="white" face="times new roman" size="5"></font></td>
                    <td><font id="username" color="white" face="times new roman" size="5">Please Enter a email</font></td>
                    <td><font id="email" color="white" face="times new roman" size="5"></font></td>          
                    </tr>
                    </table>
        
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
        function search(str){
            if(str==""){
                document.getElementById('name').innerHTML="";
                document.getElementById('username').innerHTML="Please Enter a email";
                document.getElementById('email').innerHTML="";
                return;
            }

            let email=document.getElementById('live').value;
           
            let data=JSON.stringify(email);
            let xhttp=new XMLHttpRequest();
            xhttp.open('post','../Controllers/search-user-controller.php',true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send('name='+data);
            xhttp.onreadystatechange=function(){
                if(this.readyState == 4 && this.status == 200){
                    let user = JSON.parse(this.responseText);
                    if(user=="No"){
                        document.getElementById('name').innerHTML="";
                        document.getElementById('username').innerHTML="No match found";
                        document.getElementById('email').innerHTML="";
                    }else{
                    document.getElementById('name').innerHTML=user.Fullname;
                    document.getElementById('username').innerHTML=user.Username;
                    document.getElementById('email').innerHTML=user.Email;
                    }
                }
            }
        }
    </script>

</body>
</html>