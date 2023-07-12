<?php
 require_once('database.php');

 $crow;

function uploadContent($id, $title, $description, $category, $releaseDate, $poster, $trailer, $price, $downloadLink){

    $con = dbConnection();

    $sql = "insert into ContentInfo values('','{$id}' ,'{$title}' ,'{$description}', '{$category}', '{$releaseDate}', '{$poster}', '{$trailer}', '{$price}' ,'{$downloadLink}' )";

    if(mysqli_query($con, $sql)) return true;
    else return false;
    
}

function getContentDeatils($cid){

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
            echo '<td><img src="' . $posterURL . '" width="180px"></td>';
            }
            else if ($site=="view")
            {
                echo '<td><img src="../' . $posterURL . '" width="180px"></td>';
            }
            echo '<td valign="top" align="left">';
            echo '<font color="white" face="times new roman" size="12"><a href="views/content-page.php?cid=' . $cid . '">' . $title . '</a></font><br><br>';
            echo '<font color="white" face="times new roman" size="4">' . $description . '</font><br><br>';
            echo '<font color="white" face="times new roman" size="4">Release Date: ' . $releaseDate . '</font><br><br>';
            echo '<a href=""><font color="5799EF" face="times new roman" size="4">Add to Watchlist</font></a><br><br>';
            echo '</td>';
            echo '</tr>';
        

        }
        else
        {
            
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
            echo '<td><img src="' . $posterURL . '" width="180px"></td>';
            }
            else if ($site=="view")
            {
                echo '<td><img src="../' . $posterURL . '" width="180px"></td>';

            }
            echo '<td valign="top" align="left">';
            echo '<font color="white" face="times new roman" size="6">' . $title . '</font><br><br>';
            echo '<font color="white" face="times new roman" size="4">' . $description . '</font><br><br>';
            echo '<font color="white" face="times new roman" size="4">Release Date: ' . $releaseDate . '</font><br><br>';
            echo '<a href=""><font color="5799EF" face="times new roman" size="4">Add to Watchlist</font></a><br><br>';
            echo '</td>';
            echo '</tr>';
        

        }
        else
        {
            
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
            echo '<td><img src="' . $posterURL . '" width="180px"></td>';
            }
            else if ($site=="view")
            {
                echo '<td><img src="../' . $posterURL . '" width="180px"></td>';
            }
            echo '<td valign="top" align="left">';
            echo '<font color="white" face="times new roman" size="6">' . $title . '</font><br><br>';
            echo '<font color="white" face="times new roman" size="4">' . $description . '</font><br><br>';
            echo '<font color="white" face="times new roman" size="4">Release Date: ' . $releaseDate . '</font><br><br>';
            echo '<a href=""><font color="5799EF" face="times new roman" size="4">Add to Watchlist</font></a><br><br>';
            echo '</td>';
            echo '</tr>';
        

        }
        else
        {
            
        }
       
}

function showTVShow($cid, $site)
{
   
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
            echo '<td><img src="' . $posterURL . '" width="180px"></td>';
            }
            else if ($site=="view")
            {
                echo '<td><img src="../' . $posterURL . '" width="180px"></td>';
            }
            echo '<td valign="top" align="left">';
            echo '<font color="white" face="times new roman" size="6">' . $title . '</font><br><br>';
            echo '<font color="white" face="times new roman" size="4">' . $description . '</font><br><br>';
            echo '<font color="white" face="times new roman" size="4">Release Date: ' . $releaseDate . '</font><br><br>';
            echo '<a href=""><font color="5799EF" face="times new roman" size="4">Add to Watchlist</font></a><br><br>';
            echo '</td>';
            echo '</tr>';
        

        }
        else
        {

        }
       
}

?>
