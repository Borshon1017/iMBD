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
function pendingReview($id, $site)
{
    global $crow;
    $con = dbConnection();
    $row = UserInfo($id);
    $userid= $row['UserID'] ;


    $sql = "SELECT * FROM ContentInfo WHERE Status ='Inactive';";

    $result = mysqli_query($con, $sql);

    while ($crow = mysqli_fetch_assoc($result)) {
        $cid = $crow['ContentID'];
        $posterURL = $crow['Poster'];
        $title = $crow['ContentTitle'];
        $description = $crow['ContentDescription'];
        $releaseDate = $crow['ReleaseDate'];

        if (strlen($description) > 220) {
            $description = substr($description, 0, 220) . '...';
        }

        echo '<tr>';
        if ($site == "index") {
            echo '<td><a href="views/content-page.php?cid=' . $cid . '"><img src="' . $posterURL . '" width="180px"></a></td>';
        } else if ($site == "view") {
            echo '<td><a href="../views/content-page.php?cid=' . $cid . '"><img src="../' . $posterURL . '" width="180px"></a></td>';
        }
        echo '<td valign="top" align="left">';
        if ($site == "index") {
            echo '<a href="views/content-page.php?cid=' . $cid . '"> <font color="white" face="times new roman" size="6">' . $title . '</font></a><br><br>';
        } else if ($site == "view") {
            echo '<a href="../views/content-page.php?cid=' . $cid . '"> <font color="white" face="times new roman" size="6">' . $title . '</font></a><br><br>';
        }
        echo '<font color="white" face="times new roman" size="4">' . $description . '</font><br><br>';
        echo '<font color="white" face="times new roman" size="4">Release Date: ' . $releaseDate . '</font><br><br>';
        if (isset($_COOKIE['flag'])) {
            $row = UserInfo($id);
            if ($row['Role'] == "General User") {
                $sql = "SELECT * FROM watchlist WHERE UserID = '$id' AND ContentID = '$cid'";
                $result = mysqli_query($con, $sql);
                $count = mysqli_num_rows($result);
                if ($count > 0) {
                    echo '<font color="5799EF" face="times new roman" size="4">Already added to Watchlist</font><br><br>';
                } else {
                    echo '<a href="Controllers/Add-to-Watchlist.php?cid=' . $cid . '"><font color="5799EF" face="times new roman" size="4">Add to Watchlist</font></a><br><br>';
                }
            }
            echo '<form action="rating-review-page.php" method="POST" enctype="multipart/form-data">';
            echo '<input type="hidden" name="cid" value="' . $cid . '">';
            echo '<input type="submit" value="Rating and Review">';
            echo '</form>';
        }
        echo '</td>';
        echo '</tr>';
    }
}


function pastReview($id, $site)
{
    global $crow;
    $con = dbConnection();
    $row = UserInfo($id);
    $userid= $row['UserID'] ;


    $sql = "SELECT * FROM ContentInfo WHERE Status ='Active';";    $result = mysqli_query($con, $sql);

    while ($crow = mysqli_fetch_assoc($result)) {
        $cid = $crow['ContentID'];
        $posterURL = $crow['Poster'];
        $title = $crow['ContentTitle'];
        $description = $crow['ContentDescription'];
        $releaseDate = $crow['ReleaseDate'];

        if (strlen($description) > 220) {
            $description = substr($description, 0, 220) . '...';
        }

        echo '<tr>';
        if ($site == "index") {
            echo '<td><a href="views/content-page.php?cid=' . $cid . '"><img src="' . $posterURL . '" width="180px"></a></td>';
        } else if ($site == "view") {
            echo '<td><a href="../views/content-page.php?cid=' . $cid . '"><img src="../' . $posterURL . '" width="180px"></a></td>';
        }
        echo '<td valign="top" align="left">';
        if ($site == "index") {
            echo '<a href="views/content-page.php?cid=' . $cid . '"> <font color="white" face="times new roman" size="6">' . $title . '</font></a><br><br>';
        } else if ($site == "view") {
            echo '<a href="../views/content-page.php?cid=' . $cid . '"> <font color="white" face="times new roman" size="6">' . $title . '</font></a><br><br>';
        }
        echo '<font color="white" face="times new roman" size="4">' . $description . '</font><br><br>';
        echo '<font color="white" face="times new roman" size="4">Release Date: ' . $releaseDate . '</font><br><br>';
        if (isset($_COOKIE['flag'])) {
            $row = UserInfo($id);
            if ($row['Role'] == "General User") {
                $sql = "SELECT * FROM watchlist WHERE UserID = '$id' AND ContentID = '$cid'";
                $result = mysqli_query($con, $sql);
                $count = mysqli_num_rows($result);
                if ($count > 0) {
                    echo '<font color="5799EF" face="times new roman" size="4">Already added to Watchlist</font><br><br>';
                } else {
                    echo '<a href="Controllers/Add-to-Watchlist.php?cid=' . $cid . '"><font color="5799EF" face="times new roman" size="4">Add to Watchlist</font></a><br><br>';
                }
            }
            echo '<form action="edit-rating-review-page.php" method="POST" enctype="multipart/form-data">';
            echo '<input type="hidden" name="cid" value="' . $cid . '">';
            echo '<input type="submit" value="Rating and Review">';
            echo '</form>';
        }
        echo '</td>';
        echo '</tr>';
    }
}
 

 $crow;

?>