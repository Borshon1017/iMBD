<?php

 require_once('database.php');

    function createPoll($userid,$pollTitle, $option1, $option2, $option3, $option4){

    $con = dbConnection();

    $sql = "insert into Poll values('','{$userid}','{$pollTitle}' ,'{$option1}', '{$option2}', '{$option3}', '{$option4}')";

    if(mysqli_query($con, $sql)) return true;
    else return false;
    
    }
    function getPoll(){

        $con = dbConnection();
    
        $sql = "select * from Poll order by PollID desc limit 1;";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);
            if($count == 1) 
            {
            $row = mysqli_fetch_assoc($result);
            return $row;
    
            }
            else return false;
    }
   
    function getAllPoll(){
        $con = dbConnection();
        $sql="select PollID,PollTitle from poll";
        $result=mysqli_query($con,$sql);
        return $result;
    }
    function getAPoll($id){
        $con=dbConnection();
        $sql="select* from poll where PollID='$id'";
        $result=mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    function updatePoll($id,$pollTitle,$option1, $option2, $option3, $option4){
        $con=dbConnection();
        $sql = "update poll set PollTitle='$pollTitle',OptionOne='$option1',OptionTwo='$option2',OptionThree='$option3',OptionFour='$option4' where PollID ='$id'";
        $result=mysqli_query($con,$sql);
        return true;
    }

?>