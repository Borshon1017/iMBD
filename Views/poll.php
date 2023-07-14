<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMBD Poll</title>
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
                <font color="white" face="times new roman">Watchlist</font>
            </td>
            <td>
                <a href="sign-in.html">
                    <font color="white" face="times new roman">Sign In</font>
                </a>
            </td>
        </tr>
    </table><br><br><br>

    <table width="30%" bgcolor="black" border="1" cellspacing="0" cellpadding="25" align="center" bordercolor="F5C518">
        <tr>
            <td>
                <form action="../Controllers/poll-vote-controller.php" method="post">
                <font color="F5C518" face="times new roman" size="6">Poll : Who is the GOAT actor?</font>
                <br><br><br>
                <input type="radio" name="vote" value="Rianul Amin">&nbsp;&nbsp;&nbsp;&nbsp;<font color="white" face="times new roman" size="5">Rianul Amin</font><br><br>
                <input type="radio" name="vote" value="Tanvir Tamal">&nbsp;&nbsp;&nbsp;&nbsp;<font color="white" face="times new roman" size="5">Tanvir Tamal</font><br><br>
                <input type="radio" name="vote" value="Ferdous Sazid">&nbsp;&nbsp;&nbsp;&nbsp;<font color="white" face="times new roman" size="5">Ferdous Sazid</font><br><br>
                <input type="radio" name="vote" value="Borshon Alfred">&nbsp;&nbsp;&nbsp;&nbsp;<font color="white" face="times new roman" size="5">Borshon Alfred</font><br><br><br>
                <button align="center">Vote</button>
                </form>
            </td>
            <br>
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