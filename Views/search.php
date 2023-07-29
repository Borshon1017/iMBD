<?php  
require_once('../Models/user-info-model.php');     
require_once('../Models/database.php');
require_once('../Models/watchlist-model.php');
if(!isset($_COOKIE['flag'])){
    popup("Error!","You need to sign-in in order to access this page.");
}
$id = $_COOKIE['id'];
$row = UserInfo($id);
function search($value){
    $con = dbConnection();
    $sql = "SELECT * FROM ContentInfo WHERE ContentTitle LIKE '%$value%' ";
    $result=mysqli_query($con,$sql);
    return $result;
}

            $json= $_REQUEST['name'];
            //$category = $_POST['category'];
            $result = search($json);
            if(mysqli_num_rows($result) > 0) {
                echo "<table width=\"40%\" bgcolor=\"black\" border=\"0\" cellspacing=\"0\" cellpadding=\"15\">";
                while($crow = mysqli_fetch_assoc($result)) {
                    $cid = $crow['ContentID'];
                    $posterURL = $crow['Poster'];
                    $title = $crow['ContentTitle'];
                    $description = $crow['ContentDescription'];
                    $releaseDate = $crow['ReleaseDate'];

                    if(strlen($description) > 220) {
                        $description = substr($description, 0, 220) . '...';
                    }
                    echo "
                    <tr>
                        <td><a href=\"content-page.php?cid={$cid}\"><img src=\"../$posterURL\" width=\"180px\"></a></td>
                        <td valign=\"top\" align=\"left\">
                        <a href=\"content-page.php?cid={$cid}\"><font color=\"white\" face=\"times new roman\" size=\"6\">$title</font></a><br><br>
                        <font color=\"white\" face=\"times new roman\" size=\"4\">$description</font><br><br>
                        <font color=\"white\" face=\"times new roman\" size=\"4\">Release Date: $releaseDate</font><br><br>";
                        if($row['Role'] == "General User"){
                            $content=watchlistcheck($id,$cid);
                            $count = mysqli_num_rows($content);
                            if ($count > 0) 
                            {
                            echo"<font color=\"5799EF\" face=\"times new roman\" size=\"4\">Already added to Watchlist</font><br><br>";
                            }
                            else{
                            echo"<a href=\"../Controllers/Add-to-Watchlist.php?cid=$cid\"><font color=\"5799EF\" face=\"times new roman\" size=\"4\">Add to Watchlist</font></a>";
                            }
                        }
                       echo " </td>
                    </tr>";
                }
            
            }else{
                echo "<tr><td align=\"center\"><font color=\"white\" face=\"times new roman\" size=\"6\">No Match found</font><br><br><br>";
            }
?>