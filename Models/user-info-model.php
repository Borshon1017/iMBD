<?php

    require_once('database.php');


    $row;
    function login($email, $password){

        global $row;

        $con = dbConnection();
        $sql = "select * from UserInfo where email ='{$email}' and password ='{$password}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count == 1) 
        {
        $row = mysqli_fetch_assoc($result);
        return $row;

        }
        else return false;

    }
    
    function search($value){
        $con = dbConnection();
        $sql="SELECT * FROM userinfo WHERE Email LIKE '$value%'";
        $result=mysqli_query($con,$sql);
        return $result;
    }  
     
    function searchcontentwriter($value){
        $con = dbConnection();
        $sql="SELECT * FROM userinfo WHERE Email LIKE '$value%' and Role='Content Writer'";
        $result=mysqli_query($con,$sql);
        return $result;
    }  

    function addUser($fullname, $username, $phone, $email, $password, $role){

        $con = dbConnection();

        $sql = "insert into UserInfo values('', '{$fullname}' ,'{$username}' ,'{$phone}', '{$email}', '{$password}', 'Uploads/Images/default_pfp.jpg', '{$role}', 'Active')";

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

    function banUser($id){
        $con = dbConnection();
        $sql = "update UserInfo set status = 'Inactive' where UserID = '$id'";
        $result=mysqli_query($con,$sql);
        if($result){
            return $result;
        }else{
            return false;
        }


    }

    function getAllBanUser(){
        $con = dbConnection();
        $sql="select* from UserInfo where Role='General User' and status='Inactive'";
        $result=mysqli_query($con,$sql);
        if($result){
            return $result;
        }else{
            return false;
        }


    }
    function getAllBanContentwriter(){
        $con = dbConnection();
        $sql="select* from UserInfo where Role='Content Writer' and status='Inactive'";
        $result=mysqli_query($con,$sql);
        if($result){
            return $result;
        }else{
            return false;
        }


    }

    function getAllBanCritic(){
        $con = dbConnection();
        $sql="select* from UserInfo where Role='Critic' and status='Inactive'";
        $result=mysqli_query($con,$sql);
        if($result){
            return $result;
        }else{
            return false;
        }


    }


    function unbanUser($id){
        $con = dbConnection();
        $sql = "update UserInfo set status = 'Active' where UserID = '$id'";
        $result=mysqli_query($con,$sql);
        if($result){
            return $result;
        }else{
            return false;
        }
    }


    function getAllUser(){
        $con = dbConnection();
        $sql="select* from UserInfo where Role='General User' and status='Active'";
        $result=mysqli_query($con,$sql);
        return $result;
    }

    function getAllContentWriter(){
        $con = dbConnection();
        $sql="select* from UserInfo where Role='Content Writer' and status='Active'";
        $result=mysqli_query($con,$sql);
        return $result;
    }

    function getAllCritic(){
        $con = dbConnection();
        $sql="select* from UserInfo where Role='Critic' and status='Active'";
        $result=mysqli_query($con,$sql);
        return $result;
    }

   
    function updateUserInfo( $id,$fullname, $username, $phone, $email){

        $con = dbConnection();
        $sql = "update UserInfo set Fullname = '$fullname', Username = '$username', Phone = '$phone',Email='$email' where UserID = '$id'";
             
        if(mysqli_query($con,$sql)===true) return true;
        else return false; 
        
    }
    function getRowByMail( $email){

        $con = dbConnection();
        $sql = "Select * from UserInfo where Email = '$email'";
             
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
        
    }

    function updateProfilePicture( $imagename, $id){

        $con = dbConnection();
        $sql = "update UserInfo set ProfilePicture = '$imagename' where UserID = '$id'";
             
        if(mysqli_query($con,$sql)===true) return true;
        else return false; 
        
    }



?>