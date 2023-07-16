<?php
    require_once('../Models/user-info-model.php');    
    require_once('../Controllers/message-controller.php');
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }  
    if(isset($_POST['updateinfo'])){
      
    $id2=$_GET['id'];
    
    $id=$_COOKIE['id'];
    $fullname = $_POST['Fullname'];
    $username = $_POST['Username'];
    $phone = $_POST['Phone'];
    $email = $_POST['Email'];

    //Null value checking
    if(strlen(trim($fullname)) == 0 || strlen(trim($username)) == 0 || strlen(trim($phone)) == 0 || strlen(trim($email)) == 0) popup("Error!", "You can not leave any fields empty.");

    //Fullname validation
    $namepart = explode(' ', $fullname);

    if(count($namepart) < 2) {
        popup("Error!", "Name needs to be atleast two words.");
        return;
    }
    else if(!ctype_alpha($fullname[0])) {
        popup("Error!", "Name can not start with a digit.");
        return;
    }
    else if((!ctype_alnum(str_replace(array('.', ' '), '', $fullname)))) {
        popup("Error!", "Name can only contain A-Z, a-z and . (dot).");
        return;
    }

    //Phone number validation
    if(strlen($phone)!=11) {
        popup("Error!", "Invalid phone number, Please try again.");
        return;
    }
    if($phone[0] == "0" && $phone[1] == "1") {}
    else{
        popup("Error!", "Invalid phone number, Please try again.");
        return;
    }

    //Email validation 
    $checking1 = explode('@', $email);
    if(count($checking1) == 2){
        $checking2 = explode('.', $checking1[1]);
        $c = count($checking2);
        if(count($checking2) < 2){
            popup("Error!", "Invalid email, Please 55 try again.");
            return;
        }
    }
    else {
        popup("Error!", "Invalid email, Please 11 try again.");
        return;
    }
    if($email[strlen($email)-1] == "."){
        popup("Error!", "Invalid email, Please 33 try again.");
        return;
    }
    


    if($id!=$id2){
    if(updateUserInfo($id2,$fullname, $username, $phone, $email)===true)popup("Success!", "Your information has been updated successfully");
    else popup("Error!", "Could not update information. Please try again.");
    }else{
    if(updateUserInfo($id,$fullname, $username, $phone, $email)===true)popup("Success!", "Your information has been updated successfully.");
    else popup("Error!", "Could not update information. Please try again.");
    }
    

}
?>