<?php

 require_once('database.php');

function createDiscussion($discussionTitle, $description){

    $con = dbConnection();

    $sql = "insert into Discussion values('', '{$discussionTitle}' ,'{$description}')";

    if(mysqli_query($con, $sql)) return true;
    else return false;
    
}

function getDiscussion(){

    $con = dbConnection();

    $sql = "select * from Discussion order by DiscussionID desc limit 1;";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
        if($count == 1) 
        {
        $row = mysqli_fetch_assoc($result);
        return $row;

        }
        else return false;
}

function getAllDiscussion(){
    $con = dbConnection();
    $sql="select DiscussionID,DiscussionTitle from discussion";
    $result=mysqli_query($con,$sql);
    return $result;
}

    function getaDiscussion($id){
        $con=dbConnection();
        $sql="select* from discussion where DiscussionID='$id'";
        $result=mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    function updateDiscussion($id,$discussionTitle,$description){
        $con=dbConnection();
        $sql="update discussion set DiscussionTitle='$discussionTitle',DiscussionDescription='$description' where DiscussionID='$id'";
        $result=mysqli_query($con,$sql);
        return true;
    }


?>
