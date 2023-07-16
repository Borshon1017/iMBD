<?php
require_once('../Controllers/message-controller.php');
require_once('../Models/content-info-model.php');
require_once('../Models/rating-review.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $cid = $_POST['cid'];
    $id =$_COOKIE['id'];
    $review=$_POST['review'];
    $rating=$_POST['rating'];

    giveRatingandReview($cid, $id,$review, $rating);
    setContentIDStatus($cid);

    popup("Rating/Review", "Rating and Review has been set");
    
}
?>