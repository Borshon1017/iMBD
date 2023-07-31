<?php
 require_once('database.php');
 require_once('user-info-model.php');
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
function setContentIDStatus($cid)
{
    $con = dbConnection();
    $sql = "UPDATE contentinfo SET Status = 'Active' WHERE ContentID = '$cid'";
    mysqli_query($con, $sql);
}
function getRatingDetails($cid){

    $con = dbConnection();

    $sql = "SELECT * FROM ratingreview WHERE ContentID = '$cid'";

    $result = mysqli_query($con, $sql);
    return $result;
    
}
function pendingReview()
{
    $con = dbConnection();
    $sql = "SELECT * FROM ContentInfo WHERE Status ='Inactive';";
    $result = mysqli_query($con, $sql);
    return $result;
}
function showRatingReview($cid){

    $con = dbConnection();
    $sql = "SELECT * FROM RatingReview WHERE ContentID ='{$cid}'";    
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
    if($count == 1){
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    else return false;

}
function pastReview($id)
{
    $con = dbConnection();
    $sql = "SELECT * FROM ContentInfo WHERE Status ='Active';";
    $result = mysqli_query($con, $sql);
    return $result;
}





?>