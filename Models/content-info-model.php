<?php
 require_once('database.php');

 $crow;
function showcontent($cid)
{
   
  global $crow;
  $con = dbConnection();

   
    $sql = "SELECT * FROM contentinfo WHERE ContentID='$cid'";
    $result = mysqli_query($con, $sql);

 
 
     
        $crow = mysqli_fetch_assoc($result);

       
        $posterURL = $crow['Poster'];
        $title = $crow['Title'];
        $description = $crow['ContentDescription'];
        $releaseDate = $crow['ReleaseDate'];

        echo '<tr>';
        echo '<td><img src="' . $posterURL . '" width="180px"></td>';
        echo '<td valign="top" align="left">';
        echo '<font color="white" face="times new roman" size="6">' . $title . '</font><br><br>';
        echo '<font color="white" face="times new roman" size="4">' . $description . '</font><br><br>';
        echo '<font color="white" face="times new roman" size="4">Release Date: ' . $releaseDate . '</font><br><br>';
        echo '<a href=""><font color="5799EF" face="times new roman" size="4">Add to Watchlist</font></a><br><br>';
        echo '</td>';
        echo '</tr>';
 


}

?>
