<?php  
require_once('../Models/user-info-model.php');     
require_once('../Models/poll-model.php'); 
require_once('message-controller.php');
if(!isset($_COOKIE['flag'])){
    popup("Error!","You need to sign-in in order to access this page.");
}
$id = $_COOKIE['id'];
$row = UserInfo($id);
    $name= $_REQUEST['name'];
    $result = searchpoll($name);
    if(mysqli_num_rows($result)>0){
        while($w=mysqli_fetch_assoc($result)){
            $pollid=$w['PollID'];
            $poll=$w['PollTitle'];
            echo "    
            <tr><td><font color=\"white\" face=\"times new roman\" size=\"5\">$poll</font></td>&nbsp&nbsp&nbsp
            <td><a onclick=\"alert('Delete Poll!')\" href=\"../Controllers/delete-poll-info.php?pollid={$pollid}\"><font color=\"5799EF\" face=\"times new roman\" size=\"5\">Delete Poll</font></a></td>        
            </tr><br><br>";
        }
    }else {
        echo '<tr><td align="center"><font color="white" face="times new roman" size="6">No Poll Found</font></td></tr>';
    }
?>
    
