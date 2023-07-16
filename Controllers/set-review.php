<?php
require_once('../Controllers/message-controller.php');
require_once('../Models/content-info-model.php');
require_once('../Models/rating-review.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $cid = $_POST['cid'];
    $id =$_COOKIE['id'];
    $review=$_POST['review'];
    $rating=$_POST['rating'];


    //Null check
    if(strlen(trim($review)) == 0 || strlen(trim($rating)) == 0) popup("Error!", "You can not leave any fields empty.");
    
    //Rating check
    if(is_numeric($rating)){
        if($rating>=0 && $rating<=5){}
        else popup("Error!", "Please enter a number between 0 to 5.");
    }else{
        popup("Error!", "Rating needs to be a number.");
    }



    giveRatingandReview($cid, $id,$review, $rating);
    setContentIDStatus($cid);

    popup("Rating/Review", "Rating and Review has been set");
    
}
?>