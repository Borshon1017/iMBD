<?php

function showcontent($cid)
{
   

    $conn = mysqli_connect('localhost', 'root', '', 'iMBD');

   
    $sql = "SELECT * FROM contentinfo WHERE ContentID='$cid'";
    $result = mysqli_query($conn, $sql);

 
 
     
        $row = mysqli_fetch_assoc($result);

       
        $posterURL = $row['PosterURL'];
        $title = $row['Title'];
        $description = $row['Description'];
        $releaseDate = $row['ReleaseDate'];

        echo '<tr>';
        echo '<td><img src="' . $posterURL . '" width="180px"></td>';
        echo '<td valign="top" align="left">';
        echo '<font color="white" face="times new roman" size="6">' From Databaseee . $title . '</font><br><br>';
        echo '<font color="white" face="times new roman" size="4">' . $description . '</font><br><br>';
        echo '<font color="white" face="times new roman" size="4">Release Date: ' . $releaseDate . '</font><br><br>';
        echo '<a href=""><font color="5799EF" face="times new roman" size="4">Add to Watchlist</font></a><br><br>';
        echo '</td>';
        echo '</tr>';
 

    // Close the database connection
    mysqli_close($conn);
}

?>
