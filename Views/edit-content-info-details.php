<?php
    require_once('../Models/user-info-model.php');
    require_once('../Models/content-info-model.php');
    require_once('../Controllers/message-controller.php');

    if (!isset($_COOKIE['flag'])) {
        popup("Error!", "You need to sign in order to access this page.");
    }

    $id = $_COOKIE['id'];
    $row = UserInfo($id);
    $cid = $_POST['cid'];
    $result = getContentDetails($cid);

    if ($result) {
        $crow = mysqli_fetch_assoc($result);
        $title = $crow['ContentTitle'];
        $releaseDate = $crow['ReleaseDate'];
        $convertedDate = date('d/m/Y', strtotime($releaseDate));
        $posterURL = $crow['Poster'];
        $trailer = $crow['Trailer'];
        $description = $crow['ContentDescription'];
        $director = $crow['Director'];
        $cast = $crow['Cast'];
        $price = $crow['Price'];
        $category = $crow['Category'];
        $downloadLink= $crow['DownloadLink'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>iMBD Upload Content</title>
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
        <font color="F5C518" face="times new roman" size="12">Edit Content</font><br><br><br>
        <hr color="F5C518" width="530px"><br><br><br>
        <form action="../Controllers/update-content-controller.php" method="POST" enctype="multipart/form-data">
        <table width="60%" bgcolor="black" border="0" cellspacing="0" cellpadding="10">
                <tr>
                    <td>
                        <font color="white" face="times new roman" size="6">Title:</font>
                    </td>
                    <td>
                        <input type="text" id="title" size="60px" name="title" value="<?php echo $title; ?>" onkeyup="validateTitle()">
                        <span id="titleError" style="color: red;"></span>
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <font color="white" face="times new roman" size="6">Description:</font>
                    </td>
                    <td>
                        <textarea id="description" cols="59" rows="10" name="description" onkeyup="validateDescription()"><?php echo $description; ?></textarea>
                        <span id="descriptionError" style="color: red;"></span>
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <font color="white" face="times new roman" size="6">Director:</font>
                    </td>
                    <td>
                        <input type="text" id="director" size="60px" name="director" value="<?php echo $director; ?>" onkeyup="validateDirector()">
                        <span id="directorError" style="color: red;"></span>
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <font color="white" face="times new roman" size="6">Cast:</font>
                    </td>
                    <td>
                        <input type="text" id="cast" size="60px" name="cast" value="<?php echo $cast; ?>" onkeyup="validateCast()">
                        <span id="castError" style="color: red;"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font color="white" face="times new roman" size="6">Category:</font>
                    </td>
                    <td>
                        <select name="category">
                            <option value="Movie" <?php if ($category == 'Movie') echo 'selected'; ?>>Movie</option>
                            <option value="TV Show" <?php if ($category == 'TV Show') echo 'selected'; ?>>TV Show</option>
                            <option value="Anime" <?php if ($category == 'Anime') echo 'selected'; ?>>Anime</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font color="white" face="times new roman" size="6">Release Date:</font>
                    </td>
                    <td>
                        <input type="date" name="releaseDate" value="<?php echo htmlentities($convertedDate); ?>" required>
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
                        <font color="white" face="times new roman" size="6">Price:</font>
                    </td>
                    <td>
                        <input type="text" id="price" size="60px" name="price" value="<?php echo $price; ?>" onkeyup="validatePrice()">
                        <span id="priceError" style="color: red;"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font color="white" face="times new roman" size="6">Download Link:</font>
                    </td>
                    <td>
                        <input type="text" id="downloadLink" size="60px" name="downloadLink" value="<?php echo $downloadLink; ?>" onkeyup="validateDownloadLink()">
                        <span id="downloadLinkError" style="color: red;"></span>
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="2">
                        <br><br><br>
                        <input type="submit" id="submitButton" name="Update" value="Update" disabled>
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
   function isNotEmpty(inputValue) {
        return inputValue.trim() !== '';
        checkFormValidity();
    }

    function validateTitle() {
        const titleInput = document.getElementById('title');
        const titleError = document.getElementById('titleError');
        if (!isNotEmpty(titleInput.value) || titleInput.value.length > 40) {
            titleError.textContent = "Title must not be empty and should be 40 characters or less.";
        } else {
            titleError.textContent = "";
        }
        checkFormValidity();
    }

    function validateDescription() {
        const descriptionInput = document.getElementById('description');
        const descriptionError = document.getElementById('descriptionError');
        if (descriptionInput.value.length > 500) {
            descriptionError.textContent = "Description should be 500 characters or less.";
        } else {
            descriptionError.textContent = "";
        }
        checkFormValidity();
    }

    function validateDirector() {
        const directorInput = document.getElementById('director');
        const directorError = document.getElementById('directorError');
        if (!isNotEmpty(directorInput.value) || directorInput.value.length > 40) {
            directorError.textContent = "Director must not be empty and should be 40 characters or less.";
        } else {
            directorError.textContent = "";
        }
        checkFormValidity();
    }

    function validateCast() {
        const castInput = document.getElementById('cast');
        const castError = document.getElementById('castError');
        if (!isNotEmpty(castInput.value) || castInput.value.length > 40) {
            castError.textContent = "Cast must not be empty and should be 40 characters or less.";
        } else {
            castError.textContent = "";
        }
        checkFormValidity();
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
        checkFormValidity();
    }

    function validateDownloadLink() {
        const downloadLinkInput = document.getElementById('downloadLink');
        const downloadLinkError = document.getElementById('downloadLinkError');
        if (!isNotEmpty(downloadLinkInput.value)) {
            downloadLinkError.textContent = "Download Link must not be empty.";
        } else {
            downloadLinkError.textContent = "";
        }
        checkFormValidity();
    }

    function checkFormValidity() {
        let titleInput = document.getElementById('title').value;
        let descriptionInput = document.getElementById('description').value;
        let directorInput = document.getElementById('director').value;
        let castInput = document.getElementById('cast').value;
        let priceInput = document.getElementById('price').value;
        let downloadLinkInput = document.getElementById('downloadLink').value;

        let titleError = document.getElementById('titleError').innerText;
        let descriptionError = document.getElementById('descriptionError').innerText;
        let directorError = document.getElementById('directorError').innerText;
        let castError = document.getElementById('castError').innerText;
        let priceError = document.getElementById('priceError').innerText;
        let downloadLinkError = document.getElementById('downloadLinkError').innerText;

        let submitButton = document.getElementById('submitButton');

        if (
            isNotEmpty(titleInput) &&
            isNotEmpty(descriptionInput) &&
            isNotEmpty(directorInput) &&
            isNotEmpty(castInput) &&
            isNotEmpty(priceInput) &&
            isNotEmpty(downloadLinkInput) &&
            titleError === '' &&
            descriptionError === '' &&
            directorError === '' &&
            castError === '' &&
            priceError === '' &&
            downloadLinkError === ''
        ) {
            submitButton.disabled = false; 
        } else {
            submitButton.disabled = true; 
        }
    }
</script> 
</body>
</html>
