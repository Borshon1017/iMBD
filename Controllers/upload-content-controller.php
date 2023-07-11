<?php

    require_once('message-controller.php');
    require_once('../Models/content-info-model.php');
    session_start();        
    
    if(isset($_POST['submit'])){

        $title = $_POST['title'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $releaseDate = $_POST['releaseDate'];
        $poster = $_POST['poster'];
        $trailer = $_POST['trailer'];
        $price = $_POST['price'];
        $downloadLink = $_POST['downloadLink'];
        $id = $_SESSION['id'];

        $status = uploadContent($id, $title, $description, $category, $releaseDate, $poster, $trailer, $price, $downloadLink);
        
        if($status) popup("Congratulations!", "Your content has been uploaded.");
        else popup("Error!", "Could not upload content.");
        
    }

?>