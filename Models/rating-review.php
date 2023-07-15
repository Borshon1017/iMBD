<?php


 require_once('database.php');
 require_once('user-info-model.php');
 //$id =$_COOKIE['id'];
 if(isset($_COOKIE['flag']))
 {
    $id=$_COOKIE['id'];
    
 }

 function  giveRatingandReview($cid,$id,$review, $rating){

    $con = dbConnection();

    $sql = "INSERT INTO RatingReview (UserID, ContentID, Rating, Review) VALUES ('$id', '$cid', '$rating', '$review')";

    if(mysqli_query($con, $sql)) return true;
    else return false;
}
function updateRatingandReview($cid, $id, $review, $rating) {
    $con = dbConnection();
    $sql = "UPDATE RatingReview SET Rating = '$rating', Review = '$review' WHERE UserID = '$id' AND ContentID = '$cid'";

    if(mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}

 

 $crow;

?>