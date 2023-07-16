<?php
 require_once('database.php');
 require_once('user-info-model.php');

 if(isset($_COOKIE['flag']))
 {
    $id=$_COOKIE['id'];
 }
 else
 {
   $id="0";
 }


function uploadContent($id, $title, $description, $director, $cast, $category, $releaseDate, $poster, $trailer, $price, $downloadLink){
    $status="Inactive";
    $con = dbConnection();

    $sql = "insert into ContentInfo values('','{$id}' ,'{$title}' ,'{$description}', '{$director}', '{$cast}', '{$category}', '{$releaseDate}', '{$poster}', '{$trailer}', '{$price}' ,'{$downloadLink}' , 'Inactive' )";

    if(mysqli_query($con, $sql)) return true;
    else return false;
}



function updateContent($cid, $title, $description, $director, $cast, $category, $releaseDate, $poster, $trailer, $price, $downloadLink) {
    $con = dbConnection();

    $sql = "UPDATE ContentInfo SET ContentTitle = '{$title}', ContentDescription = '{$description}', Director = '{$director}', Cast = '{$cast}', Category = '{$category}', ReleaseDate = '{$releaseDate}', Poster = '{$poster}', Trailer = '{$trailer}', Price = '{$price}', DownloadLink = '{$downloadLink}' , Status='Inactive' WHERE ContentID = '{$cid}'";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}

function getContentDetails($cid){

    $con = dbConnection();

    $sql = "SELECT * FROM contentinfo WHERE ContentID = '$cid'";

    $result = mysqli_query($con, $sql);
    return $result;
    
}

function countContent()
{
    global $crow;
    $con = dbConnection();
    $sql = "SELECT * FROM contentinfo ";
    $result = mysqli_query($con, $sql);
    $crow = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);
        return $count;
  
}
function countWatchlist()
{
    global $id;
    $con = dbConnection();
    $sql = "SELECT COUNT(w.ContentID) AS count FROM ContentInfo c, Watchlist w WHERE c.ContentID = w.ContentID AND w.UserID = '$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    return $count;
}


function showMovies(){
    $con = dbConnection();
    $sql = "SELECT * FROM contentinfo WHERE Category='Movie' ";
    $result = mysqli_query($con, $sql);
    return $result;

}

function showAnime()
{
    
    $con = dbConnection();
    $sql = "SELECT * FROM contentinfo WHERE Category='Anime' ";
    $result = mysqli_query($con, $sql);
    return $result;

}


function searchContent($title, $category='') {
    global $id;
    $con = dbConnection();
    if (!empty($category))
    {
    $sql = "SELECT * FROM ContentInfo WHERE ContentTitle LIKE '%$title%' AND Category = '$category'";
    }
    
    else
    {
        $sql = "SELECT * FROM ContentInfo WHERE ContentTitle LIKE '%$title%' ";
    }

    $result = mysqli_query($con, $sql);
    return $result;
}



    function showTVShow()
    {
        $con = dbConnection();
        $sql = "SELECT * FROM contentinfo WHERE Category='TV Show' ";
        $result = mysqli_query($con, $sql);
        return $result;
    }




function removeFromWatchlist($cid, $id)
{
    $con = dbConnection();
    $query = "DELETE FROM Watchlist WHERE ContentID='$cid' AND UserID='$id'";
    $result = mysqli_query($con, $query);
    return $result;
}




function showNewArrivals()
{
    $con = dbConnection(); 
    $sql = "SELECT * FROM contentinfo ORDER BY ContentID DESC";
    $result = mysqli_query($con, $sql);
    return $result;
         
}

function countUploads($cid)
{
    global $id;
    global $crow;
    $con = dbConnection();
    $sql = "SELECT * FROM contentinfo WHERE UserID='$id'"; 
    $result = mysqli_query($con, $sql);
   
        $count = mysqli_num_rows($result);
        return $count;

}

function showUploadsEdit($id)
{
    global $crow;
    $con = dbConnection();
    $row = UserInfo($id);
    $userid= $row['UserID'] ;

    $sql = "SELECT * FROM contentinfo WHERE UserID='$userid'";
    $result = mysqli_query($con, $sql);

    return $result;
}


function showUploadsDelete($id)
{
    global $crow;
    $con = dbConnection();
    $row = UserInfo($id);
    $userid= $row['UserID'] ;

    $sql = "SELECT * FROM contentinfo WHERE UserID='$userid'";
    $result = mysqli_query($con, $sql);

   return $result;
}



?>