<?php


 require_once('database.php');
 require_once('user-info-model.php');
 //$id =$_COOKIE['id'];
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

    $con = dbConnection();

    $sql = "insert into ContentInfo values('','{$id}' ,'{$title}' ,'{$description}', '{$director}', '{$cast}', '{$category}', '{$releaseDate}', '{$poster}', '{$trailer}', '{$price}' ,'{$downloadLink}' )";

    if(mysqli_query($con, $sql)) return true;
    else return false;
}

function getContentDetails($cid){

    $con = dbConnection();

    $sql = "SELECT * FROM contentinfo WHERE ContentID = '$cid'";

    $result = mysqli_query($con, $sql);
    return $result;
    
}

function showContent($cid, $site)
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


function showMovies($cid, $site)
{
    
  global $crow;
  $con = dbConnection();

   
    $sql = "SELECT * FROM contentinfo WHERE ContentID='$cid' and Category='Movie' ";
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
            if(isset($_COOKIE['flag']))
            {
            if($row['Role'] == "General User")
            {
            $sql = "SELECT * FROM watchlist WHERE UserID = '$id' AND ContentID = '$cid'";
            $row=UserInfo($id);
            
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
}

function showAnime($cid, $site)
{
    
  global $crow;
  $con = dbConnection();

   
    $sql = "SELECT * FROM contentinfo WHERE ContentID='$cid' and Category='Anime' ";
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
function searchContent($title) {
    global $id;
    $con = dbConnection();
    $sql = "SELECT * FROM ContentInfo WHERE ContentTitle LIKE '%$title%'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        for ($i = 0; $i < $count; $i++) {
            $crow = mysqli_fetch_assoc($result);
            $posterURL = $crow['Poster'];
            $title = $crow['ContentTitle'];
            $description = $crow['ContentDescription'];
            $releaseDate = $crow['ReleaseDate'];

            if (strlen($description) > 220) {
                $description = substr($description, 0, 220) . '...';
            }

            echo '<tr>';
            echo '<td><img src="../' . $posterURL . '" width="180px"></td>';
            echo '<td valign="top" align="left">';
            echo '<font color="white" face="times new roman" size="6">' . $title . '</font><br><br>';
            echo '<font color="white" face="times new roman" size="4">' . $description . '</font><br><br>';
            echo '<font color="white" face="times new roman" size="4">Release Date: ' . $releaseDate . '</font><br><br>';
            global $id;
            $row = UserInfo($id);
            if ($row['Role'] == "General User") {
                $cid = $crow['ContentID'];
                $sql = "SELECT * FROM watchlist WHERE UserID = '$id' AND ContentID = '$cid'";
                $result = mysqli_query($con, $sql);
                $count = mysqli_num_rows($result);
                if ($count > 0) {
                    echo '<font color="5799EF" face="times new roman" size="4">Already added to Watchlist</font><br><br>';
                } else {
                    echo '<a href="Controllers/Add-to-Watchlist.php?cid=' . $cid . '"><font color="5799EF" face="times new roman" size="4">Add to Watchlist</font></a><br><br>';
                }
            }

            echo '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="2">No matching results found.</td></tr>';
    }
}



function showTVShow($cid, $site)
{
    global $id;

  global $crow;
  $con = dbConnection();

   
    $sql = "SELECT * FROM contentinfo WHERE ContentID='$cid' and Category='TV Show' ";
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




function removeFromWatchlist($cid, $id)
{
    $con = dbConnection();
    $query = "DELETE FROM Watchlist WHERE ContentID='$cid' AND UserID='$id'";
    $result = mysqli_query($con, $query);
    return $result;
}

function showWatchlist($site)
{
    global $id;

    for ($cid = 1; $cid <= countWatchlist(); $cid++)
    {
        $con = dbConnection();
        $query = "SELECT * FROM ContentInfo c, Watchlist w WHERE c.ContentID = w.ContentID AND w.UserID = '$id' AND w.ContentID='$cid'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);

        if ($count == 1)
        {
            $posterURL = $row['Poster'];
            $title = $row['ContentTitle'];
            $description = $row['ContentDescription'];
            $releaseDate = $row['ReleaseDate'];

            if (strlen($description) > 220) {
                $description = substr($description, 0, 220) . '...';
            }

            echo '<tr>';
            echo '<td><a href="../views/content-page.php?cid=' . $cid . '"><img src="../' . $posterURL . '" width="180px"></a></td>';
            echo '<td valign="top" align="left">';
            echo '<a href="../views/content-page.php?cid=' . $cid . '"> <font color="white" face="times new roman" size="6">' . $title . '</font></a><br><br>';
            echo '<font color="white" face="times new roman" size="4">' . $description . '</font><br><br>';
            echo '<font color="white" face="times new roman" size="4">Release Date: ' . $releaseDate . '</font><br><br>';
            echo '<form method="post" action="../Controllers/remove-from-watchlist.php">';
            echo '<input type="hidden" name="cid" value="' . $cid . '">';
            echo '<button type="submit">Remove</button>'; 
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }
        else
        {

        }
    }
}

function showNewArrivals($cid, $site)
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


?>