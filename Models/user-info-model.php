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
        return $row;

        }
        else return false;

    }
    

    function addUser($fullname, $username, $phone, $email, $password){

        $con = dbConnection();

        $sql = "insert into UserInfo values('', '{$fullname}' ,'{$username}' ,'{$phone}', '{$email}', '{$password}', 'Images/default_pfp.jpg', 'General User', 'Active')";

        if(mysqli_query($con, $sql)) return true;
        else return false;
        
    }

    function userInfo($id){
        $con=dbConnection();
        $sql="select* from UserInfo where UserID='$id'";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);
        return $row;
    }

    function changePassword($id,$newpass){
        $con=dbConnection();
        $sql = "update UserInfo set Password = '$newpass' where UserID = '$id'";
        if(mysqli_query($con,$sql)===true) return true;
        else return false; 
    }
    
    function uniqueEmail($email){

        $con = dbConnection();
        $sql="select email from userinfo where email like '{$email}' ";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count == 1) return false;
        else return true; 
        
    }

    function deleteUser(){

    }

    function getAllUser(){

    }

    function updateUserInfo( $id,$fullname, $username, $phone, $email){

        $con = dbConnection();
        $sql = "update UserInfo set Fullname = '$fullname', Username = '$username', Phone = '$phone',Email='$email' where UserID = '$id'";
             
        if(mysqli_query($con,$sql)===true) return true;
        else return false; 
        
    }
    function updateProfilePicture( $imagename, $id){

        $con = dbConnection();
        $sql = "update UserInfo set ProfilePicture = '$imagename' where UserID = '$id'";
             
        if(mysqli_query($con,$sql)===true) return true;
        else return false; 
        
    }

?>