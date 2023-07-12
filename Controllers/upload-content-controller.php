<?php

    require_once('message-controller.php');
    require_once('../Models/content-info-model.php');
    session_start();        
    
    if(isset($_POST['Upload'])){

        $srcPoster = $_FILES['poster']['tmp_name'];
        $poster = 'Uploads/Posters/'.$_FILES['poster']['name'];
        $desPoster = "../Uploads/Posters/".$_FILES['poster']['name'];
        
        if(move_uploaded_file($srcPoster, $desPoster)){ 

            echo "Success";
        
            }
            else
        {
            echo "no";
        }


        $srcTrailer = $_FILES['trailer']['tmp_name'];
        $trailer = 'Uploads/Trailers'.$_FILES['trailer']['name'];
        $desTrailer = "../Uploads/Trailers/".$_FILES['trailer']['name'];
        if(move_uploaded_file($srcTrailer, $desTrailer))
        {
            echo "Success";
        }
        else
        {
            echo "no";
        }

        $title = $_POST['title'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $releaseDate = $_POST['releaseDate'];
        //$poster = $_POST['poster']; //
        //$trailer = $_POST['trailer']; //
        $price = $_POST['price'];
        $downloadLink = $_POST['downloadLink'];
        $id=$_COOKIE['id'];

        $status = uploadContent($id, $title, $description, $category, $releaseDate, $poster, $trailer, $price, $downloadLink);
        
        if($status) popup("Congratulations!", "Your content has been uploaded.");
        else popup("Error!", "Could not upload content.");
        
    }

    else
    {
        echo "not really";
    }
?>