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

 

 $crow;

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

function showContent($cid)
{
    
  global $crow;
  $con = dbConnection();

   
    $sql = "SELECT * FROM contentinfo WHERE ContentID='$cid'";
    $result = mysqli_query($con, $sql);

 
 
     
        $crow = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);
        if($count == 1) 
        {
            $posterURL = $crow['Poster'];
            $title = $crow['ContentTitle'];
            $description = $crow['ContentDescription'];
            $releaseDate = $crow['ReleaseDate'];
            if (strlen($description) > 220) {
                $description = substr($description, 0, 220) . '...';
            }
    
    
            echo '<tr>';
            if ($site=="index")
            {
            echo '<td><a href="views/content-page.php?cid=' . $cid . '"><img src="' . $posterURL . '" width="180px"></a></td>';
            }
            else if ($site=="view")
            {
                echo '<td><a href="../views/content-page.php?cid=' . $cid . '"><img src="../' . $posterURL . '" width="180px"></a></td>';
            }
            echo '<td valign="top" align="left">';
            if ($site=="index") {
            echo '<a href="views/content-page.php?cid=' . $cid . '"> <font color="white" face="times new roman" size="6">' . $title . '</font></a><br><br>';
            }
            else if ($site=="view")
            {
                echo '<a href="../views/content-page.php?cid=' . $cid . '"> <font color="white" face="times new roman" size="6">' . $title . '</font></a><br><br>';
            }
            echo '<font color="white" face="times new roman" size="4">' . $description . '</font><br><br>';
            echo '<font color="white" face="times new roman" size="4">Release Date: ' . $releaseDate . '</font><br><br>';
            if(isset($_COOKIE['flag']))
            {
                global $id;
                            $row=UserInfo($id);
            if($row['Role'] == "General User")
            {
            
            $sql = "SELECT * FROM watchlist WHERE UserID = '$id' AND ContentID = '$cid'";
            $result = mysqli_query($con, $sql);
            $count = mysqli_num_rows($result);
                if ($count > 0) 
            {
            echo '<font color="5799EF" face="times new roman" size="4">Already added to Watchlist</font><br><br>';
            }
            else{
            echo '<a href="Controllers/Add-to-Watchlist.php?cid=' . $cid  . '"><font color="5799EF" face="times new roman" size="4">Add to Watchlist</font></a><br><br>';
            }
        }
            echo '</td>';
            echo '</tr>';
            }
            else
            {
            
            }
        }
       
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


function searchContent($title) {
    global $id;
    $con = dbConnection();
    $sql = "SELECT * FROM ContentInfo WHERE ContentTitle LIKE '%$title%'";
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

function showUploadsEdit($id, $site)
{
    global $crow;
    $con = dbConnection();
    $row = UserInfo($id);
    $userid= $row['UserID'] ;

    $sql = "SELECT * FROM contentinfo WHERE UserID='$userid'";
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
            echo '<form action="edit-content-info-details.php" method="POST" enctype="multipart/form-data">';
            echo '<input type="hidden" name="cid" value="' . $cid . '">';
            echo '<input type="submit" value="Update Content">';
            echo '</form>';
        }
        echo '</td>';
        echo '</tr>';
    }
}


function showUploadsDelete($id, $site)
{
    global $crow;
    $con = dbConnection();
    $row = UserInfo($id);
    $userid= $row['UserID'] ;

    $sql = "SELECT * FROM contentinfo WHERE UserID='$userid'";
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
            echo '<form action="../Controllers/delete-content-details.php" method="POST" enctype="multipart/form-data">';
            echo '<input type="hidden" name="cid" value="' . $cid . '">';
            echo '<input type="submit" value="Delete Content">';
            echo '</form>';
        }
        echo '</td>';
        echo '</tr>';
    }
}



?>