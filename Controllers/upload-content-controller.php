<?php

    require_once('message-controller.php');
    require_once('../Models/content-info-model.php');
    session_start(); 
    
    if(isset($_POST['Upload'])){

        $srcPoster = $_FILES['poster']['tmp_name'];

        //Null value checking
        if(empty($srcPoster)) popup("Error!", "No file selected.");

        $poster = 'Uploads/Posters/'.$_FILES['poster']['name'];
        $desPoster = "../Uploads/Posters/".$_FILES['poster']['name'];
        
        if(move_uploaded_file($srcPoster, $desPoster)){}
        else
        {
            popup("Error!", "Could not upload the poster, Please try again.");
        }


        $srcTrailer = $_FILES['trailer']['tmp_name'];

        //Null value checking
        if(empty($srcTrailer)) popup("Error!", "No file selected.");

        $trailer = 'Uploads/Trailers'.$_FILES['trailer']['name'];
        $desTrailer = "../Uploads/Trailers/".$_FILES['trailer']['name'];
        if(move_uploaded_file($srcTrailer, $desTrailer)) {}
        else
        {
            popup("Error!", "Could not upload the trailer, Please try again.");
        }

        $title = $_POST['title'];
        $description = $_POST['description'];
        $director = $_POST['director'];
        $cast = $_POST['cast'];
        $category = $_POST['category'];
        $releaseDate = $_POST['releaseDate'];
        $price = $_POST['price'];
        $downloadLink = $_POST['downloadLink'];
        $id = $_COOKIE['id'];

        //Null value checking
        if(strlen(trim($title)) == 0 || strlen(trim($description)) == 0 || strlen(trim($director)) == 0 || strlen(trim($cast)) == 0 || strlen(trim($category)) == 0 || strlen(trim($releaseDate)) == 0 || strlen(trim($price)) == 0 || strlen(trim($downloadLink)) == 0) popup("Error!", "You can not leave any fields empty.");

        //Price validation
        if(!is_numeric($price)) popup("Error!", "Price has to be a number.");

        $status = uploadContent($id, $title, $description, $director, $cast, $category, $releaseDate, $poster, $trailer, $price, $downloadLink);
        
        if($status) popup("Congratulations!", "Your content has been uploaded.");
        else popup("Error!", "Could not upload content.");
        
    }
?>