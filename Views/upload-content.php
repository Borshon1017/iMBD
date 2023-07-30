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
    <title>iMBD Upload Content</title>
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
        <font color="F5C518" face="times new roman" size="12">Upload Content</font><br><br><br>
        <hr color="F5C518" width="530px"><br><br><br>
        <form action="../Controllers/upload-content-controller.php" method="POST" enctype="multipart/form-data">
            <table width="60%" bgcolor="black" border="0" cellspacing="0" cellpadding="10">
                <tr>
                    <td>
                        <font color="white" face="times new roman" size="6">Title : </font>
                    </td>
                    <td>
                        <input type="text" size="60px" name="title" id="title" onkeyup="validateTitle()">
                        <br>
                        <font color="red" face="times new roman" size="3" id="titleError"></font>
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <font color="white" face="times new roman" size="6">Description : </font>
                    </td>
                    <td>
                        <textarea cols="59" rows="10" name="description" id="description" onkeyup="validateDescription()"></textarea>
                        <br>
                        <font color="red" face="times new roman" size="3" id="descriptionError"></font>
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <font color="white" face="times new roman" size="6">Director : </font>
                    </td>
                    <td>
                        <input type="text" size="60px" name="director" id="director" onkeyup="validateDirector()">
                        <br>
                        <font color="red" face="times new roman" size="3" id="directorError"></font>
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <font color="white" face="times new roman" size="6">Cast : </font>
                    </td>
                    <td>
                        <input type="text" size="60px" name="cast" id="cast" onkeyup="validateCast()">
                        <br>
                        <font color="red" face="times new roman" size="3" id="castError"></font>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font color="white" face="times new roman" size="6">Category : </font>
                    </td>
                    <td>
                        <select name="category">
                            <option value="Movie">Movie</option>
                            <option value="TV Show">TV Show</option>
                            <option value="Anime">Anime</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font color="white" face="times new roman" size="6">Release Date : </font>
                    </td>
                    <td>
                        <input type="date" name="releaseDate" id="releaseDate" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font color="white" face="times new roman" size="6">Upload Poster : </font>
                    </td>
                    <td>
                        <table cellspacing="0" cellpadding="10" bgcolor="F5C518">
                            <tr>
                                <td>
                                    <input type="file" name="poster" accept=".png,.jpg,.jpeg"> <br> <br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font color="white" face="times new roman" size="6">Upload Trailer : </font>
                    </td>
                    <td>
                        <table cellspacing="0" cellpadding="10" bgcolor="F5C518">
                            <tr>
                                <td>
                                    <input type="file" name="trailer" accept=".mp4,.mkv,.webm"> <br> <br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font color="white" face="times new roman" size="6">Price : </font>
                    </td>
                    <td>
                        <input type="text" size="60px" name="price" id="price" onkeyup="validatePrice()">
                        <br>
                        <font color="red" face="times new roman" size="3" id="priceError"></font>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font color="white" face="times new roman" size="6">Download Link : </font>
                    </td>
                    <td>
                        <input type="text" size="60px" name="downloadLink" id="downloadLink" onkeyup="validateDownloadLink()">
                        <br>
                        <font color="red" face="times new roman" size="3" id="downloadLinkError"></font>
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="2">
                        <br><br><br>
                        <input type="submit" name="Upload" value="Upload" id="submitButton">
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
   function isNotEmpty(inputValue) {
        return inputValue.trim() !== '';
        function validateForm()
    }

    function validateTitle() {
        const titleInput = document.getElementById('title');
        const titleError = document.getElementById('titleError');
        if (!isNotEmpty(titleInput.value) || titleInput.value.length > 40) {
            titleError.textContent = "Title must not be empty and should be 40 characters or less.";
        } else {
            titleError.textContent = "";
        }
        function validateForm()
    }

    function validateDescription() {
        const descriptionInput = document.getElementById('description');
        const descriptionError = document.getElementById('descriptionError');
        if (descriptionInput.value.length > 500) {
            descriptionError.textContent = "Description should be 500 characters or less.";
        } else {
            descriptionError.textContent = "";
        }
        function validateForm()
    }

    function validateDirector() {
        const directorInput = document.getElementById('director');
        const directorError = document.getElementById('directorError');
        if (!isNotEmpty(directorInput.value) || directorInput.value.length > 40) {
            directorError.textContent = "Director must not be empty and should be 40 characters or less.";
        } else {
            directorError.textContent = "";
        }
        function validateForm()
    }

    function validateCast() {
        const castInput = document.getElementById('cast');
        const castError = document.getElementById('castError');
        if (!isNotEmpty(castInput.value) || castInput.value.length > 40) {
            castError.textContent = "Cast must not be empty and should be 40 characters or less.";
        } else {
            castError.textContent = "";
        }
        function validateForm()
    }

    function validatePrice() {
        let priceInput = document.getElementById('price').value;

        if (priceInput === '') {
            document.getElementById('priceError').innerHTML = "Price cannot be empty.";
        } else if (isNaN(priceInput) || parseFloat(priceInput) <= 0) {
            document.getElementById('priceError').innerHTML = "Please enter a valid positive number for the price.";
        } else {
            document.getElementById('priceError').innerHTML = "";
        }
        function validateForm()
    }

    function validateDownloadLink() {
        const downloadLinkInput = document.getElementById('downloadLink');
        const downloadLinkError = document.getElementById('downloadLinkError');
        if (!isNotEmpty(downloadLinkInput.value)) {
            downloadLinkError.textContent = "Download Link must not be empty.";
        } else {
            downloadLinkError.textContent = "";
        }
        function validateForm()
    }

    function validateForm() {
        
    }
</script>
</body>
</html>