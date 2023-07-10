<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    session_start();
    $info = $_SESSION['info'];
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMBD Content Title</title>
</head>
<body bgcolor="black">
    <table width="100%" bgcolor="black" border="0" cellspacing="0" cellpadding="15">
        <tr height="60px">
            <td>
                &nbsp;<img src="../Uploads/logo.png" width="80px">
            </td>
            <td>
                <input type="text" placeholder="Search iMBD" size="100px">
            </td>
            <td>
                <img src="../<?php echo $info['ProfilePicture']; ?>" width="40px">&nbsp;&nbsp;&nbsp;
                <select name="profile" onchange="location = this.value;">
                    <option disabled selected hidden>Username</option>
                    <option value="user-profile.html">Profile</option>
                    <option value="watchlist.html">Watchlist</option>
                    <option value="settings.html">Settings</option>
                    <option value="sign-in.html">Log Out</option>
                </select>
            </td>
        </tr>
    </table><br>
    
    <table width="100%" bgcolor="black" border="0" cellspacing="0" cellpadding="15">

        <tr>
            <td>
                <font color="white" face="times new roman" size="12">Morbius: It's Morbing Time</font><br><br>
                <font color="white" face="times new roman" size="4">Movie |</font>
                <font color="white" face="times new roman" size="4">Release Date: 19/01/2002</font><br><br>
            </td>
        </tr>
        <tr>
            <td>
                <img src="../Uploads/posters/morbius.jpg" width="300px">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<video src="../Uploads/Trailers/MORBIUS - Official Trailer (HD).mp4" controls autoplay width="800px"></video><br><br><br>
            </td>
        </tr>
        <tr>
            <td>
                <hr color="F5C518" width="100%"><br><br>
                <font color="white" face="times new roman" size="12">Description : </font><br>
                <hr color="F5C518" width="270px" align="left"><br>
                <font color="white" face="times new roman" size="6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga minus iusto obcaecati adipisci iste mollitia officia earum eligendi quam assumenda, impedit quod odio modi dolorem! Architecto delectus veritatis explicabo debitis?</font><br><br><br>
                <hr color="F5C518" width="100%">
            </td>
        </tr>
        <tr>
            <td>
                <font color="white" face="times new roman" size="6">Purchase This : </font><a href=""><font color="white" face="times new roman" size="6">100 BDT</font></a>
            </td>
        </tr>
        <tr>
            <td>
                <a href=""><font color="white" face="times new roman" size="6">Add to Watchlist</font><br><br><br></a>
                <hr color="F5C518" width="100%">
            </td>
        </tr>
        <tr>
            <td>
                <font color="white" face="times new roman" size="6">Directors : </font><br>
                <hr color="F5C518" width="150px" align="left"><br>
                <font color="white" face="times new roman" size="6">Rianul Amin</font><br><br><br>
                <font color="white" face="times new roman" size="6">Casts : </font><br>
                <hr color="F5C518" width="100px" align="left"><br>
                <font color="white" face="times new roman" size="6">Borshon Alfred Gomes, </font>
                <font color="white" face="times new roman" size="6">Tanvir Hasan Tamal, </font>
                <font color="white" face="times new roman" size="6">Ferdous Sazid</font><br><br><br>
                <hr color="F5C518" width="100%">
            </td>
        </tr>
        <tr>
            <td>
                <font color="white" face="times new roman" size="12">Critic's Opinion : </font><br><br><br>
                <font color="white" face="times new roman" size="6">Rating : </font>
                <hr color="F5C518" width="120px" align="left"><br>
                <font color="white" face="times new roman" size="6">3.5/5</font><br><br><br>
                <font color="white" face="times new roman" size="6">Review : </font>
                <hr color="F5C518" width="130px" align="left"><br>
                <font color="white" face="times new roman" size="6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga minus iusto obcaecati adipisci iste mollitia officia earum eligendi quam assumenda, impedit quod odio modi dolorem! Architecto delectus veritatis explicabo debitis?</font><br><br><br>
                <hr color="F5C518" width="100%">
            </td>
        </tr>
        <tr>
            <td>
                <font color="white" face="times new roman" size="12">Comments : </font><br><br><br>
                <textarea name="comment" rows="15" cols="174"> </textarea><br><br>
                <p align="right">
                    <a href=""><font color="white" face="times new roman" size="6">Post Comment</font></a>&nbsp;&nbsp;&nbsp;&nbsp;
                </p>
            </td>
        </tr>

    </table>

    <br><br><br>
    <center>
        <a href="about-us.html"><font color="white" face="times new roman" size="4">About Us</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="helpline.html"><font color="white" face="times new roman" size="4">Helpline</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="faq.html"><font color="white" face="times new roman" size="4">FAQ</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="terms-and-services.html"><font color="white" face="times new roman" size="4">Terms and Services</font></a><br><br><br>
        <font color="white" face="times new roman" size="3">iMBD</font><br><br>
        <font color="white" face="times new roman" size="2">A Maa Babar Dowa Company</font><br>
        <font color="white" face="times new roman" size="1">© 2023 by iMBD.com,  Inc.</font><br><br>
    </center>
</body>
</html>