<?php

    require_once('database.php');

    $row;
    function login($email, $password){

        global $row;

        $con = dbConnection();

        $sql = "select * from UserInfo where email ='{$email}' and password ='{$password}' and status ='Active'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count == 1) 
        {

        $row = mysqli_fetch_assoc($result);
        $_SESSION['info'] = $row;
        return true;

        }
        else return false;

    }

    function addUser($fullname, $username, $phone, $email, $password){

        $con = dbConnection();

        $sql = "insert into UserInfo values('', '{$fullname}' ,'{$username}' ,'{$phone}', '{$email}', '{$password}', 'Images/default_pfp.jpg', 'General User', 'Active')";

        if(mysqli_query($con, $sql)) return true;
        else return false;
        
    }
    
    function uniqueEmail($email){

        $con = dbConnection();
        $sql="select email from userinfo where email like '{$email}' ";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count==1) return false;
        else return true; 
        
    }

    function deleteUser(){

    }

    function getAllUser(){

    }

    function updateUser(){

    }

?>