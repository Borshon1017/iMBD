<?php

    require_once('database.php');

    $row;
    function login($email, $password){

        global $row;

        $con = dbConnection();

        $sql = "select * from UserInfo where email ='{$email}' and password ='{$password}' and status ='Active'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        $row = mysqli_fetch_assoc($result);

        if($count == 1) return true;
        else return false;

    }

    function getRole(){

        global $row;
        return $row["Role"];

    }

    function addUser($fullname, $username, $phone, $email, $password){

        $con = dbConnection();

        $sql = "insert into UserInfo values('', '{$fullname}' ,'{$username}' ,'{$phone}', '{$email}', '{$password}', 'Images/default_pfp.jpg', 'General User', 'Active')";

        if(mysqli_query($con, $sql)) return true;
        else return false;
        
    }

    function deleteUser(){

    }

    function getAllUser(){

    }

    function updateUser(){

    }

?>