<?php
require_once('message-controller.php');
require_once('../Models/user-info-model.php'); 
if(!isset($_COOKIE['flag'])){
    popup("Error!","You need to sign-in in order to access this page.");
} 

$id = $_COOKIE['id'];
$row = UserInfo($id);
    $name= $_REQUEST['name'];
    $result = searchContent($name);
                if(mysqli_num_rows($result)>0){
                    echo "<table width=\"85%\" bgcolor=\"black\" border=\"0\" cellspacing=\"0\" cellpadding=\"15\">
                    <tr>
                    <td>
                    <font color=\"F5C518\" face=\"times new roman\" size=\"5\">Name</font>
                    <hr color=\"F5C518\" width=\"80px\" align=\"left\">
                    </td>
                    <td>
                    <font color=\"F5C518\" face=\"times new roman\" size=\"5\">Username</font>
                    <hr color=\"F5C518\" width=\"120px\" align=\"left\">
                    </td>
                    <td>
                    <font color=\"F5C518\" face=\"times new roman\" size=\"5\">Email</font>
                    <hr color=\"F5C518\" width=\"80px\" align=\"left\">
                    </td>
                    </tr>";
            
                    while($w=mysqli_fetch_assoc($result)){
                        $userid=$w['UserID'];
                        $name=$w['Fullname'];
                        $username=$w['Username'];
                        $email=$w['Email'];
                        echo "    
                        <tr><td><font color=\"white\" face=\"times new roman\" size=\"5\">$name</font></td>
                        <td><font color=\"white\" face=\"times new roman\" size=\"5\">$username</font></td>
                        <td><font color=\"white\" face=\"times new roman\" size=\"5\">$email</font></td> 
                        <td><a href=\"../Controllers/ban-controller.php?id={$userid}\"><font color=\"5799EF\" face=\"times new roman\" size=\"5\">Ban Content Writer</font></a></td>          
                        </tr>";
                    }
                }else{
                    echo"<tr><td align=\"center\"><font color=\"white\" face=\"times new roman\" size=\"6\">No Content Writer Found</font></td></tr>";
                }       
            ?>
        </table>
        