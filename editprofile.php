<?php
session_start();
require 'connection.php';

    //print_r($_POST);

    if (isset($_SESSION['id'])) {
       
    if (isset($_POST['submit'])) {
        
        function myFunc($params){
           $a = addslashes($params);
           $b = htmlentities($a);
           $c = htmlspecialchars($b);
           $d = trim($c);

           return $d;
       }

       $fullname = myFunc($_POST['nam']);
       $username = myFunc($_POST['usname']);
       $site = myFunc($_POST['site']);
       $bio = myFunc($_POST['bio']);
       $mail = myFunc($_POST['email']);
       $phone = myFunc($_POST['phone']);
       $gender = myFunc($_POST['gender']);

       $id=$_SESSION['id'];



  

       
   
   
       if ( !empty($site) && !empty($fullname) && !empty($username) && !empty($bio)  && !empty($mail)  && !empty($phone)  && !empty($gender)){

            $insertIntoDb="UPDATE users SET user_fullname = ?, user_username = ? , user_website = ?
            , user_bio = ? , user_email = ? , user_phone = ? , user_gender = ?
              WHERE user_id = '$id'";
            $confirm = $con->prepare($insertIntoDb);
           $check=$confirm->bind_param('sssssss', $fullname, $username, $site, $bio, $mail, $phone, $gender);
           $d=$confirm->execute();
          
           if ($d) {
               header('Location: dashboard.php');
            }else{
               $_SESSION['regError'] = "unable to update your profile please try again";
               header('Location: editprofileform.php'); 
            }  

           
 
           
       }elseif(!empty($site)){
           $insertIntoDb="UPDATE users SET  user_website = ? WHERE user_id  = '$id'";
           //$insertIntoDb="UPDATE users SET user_profile_pic = '$fileName' WHERE user_id = '$id'";
           $confirm = $con->prepare($insertIntoDb);
          $check=$confirm->bind_param('s', $site);
          $d=$confirm->execute();
         
          if ($d) {
              header('Location: dashboard.php');
           }else{
              $_SESSION['regError'] = "unable to update your profile please try again";
              header('Location: editprofileform.php'); 
           }  
       }elseif(!empty($fullname)){
           $insertIntoDb="UPDATE users SET  user_fullname = ?
             WHERE user_id  = '$id'";
           $confirm = $con->prepare($insertIntoDb);
          $check=$confirm->bind_param('s', $fullname);
          $d=$confirm->execute();
         
          if ($d) {
              header('Location: dashboard.php');
           }else{
              $_SESSION['regError'] = "unable to update your profile please try again";
              header('Location: editprofileform.php'); 
           }  
       }elseif(!empty($username)){
           $insertIntoDb="UPDATE users SET  user_username = ? WHERE user_id  = '$id'";
           $confirm = $con->prepare($insertIntoDb);
          $check=$confirm->bind_param('s', $username);
          $d=$confirm->execute();
         
          if ($d) {
              header('Location: dashboard.php');
           }else{
              $_SESSION['regError'] = "unable to update your profile please try again";
              header('Location: editprofileform.php'); 
           }  
       }elseif(!empty($bio)){
           $insertIntoDb="UPDATE users SET  user_bio = ?
             WHERE user_id  = '$id'";
           $confirm = $con->prepare($insertIntoDb);
          $check=$confirm->bind_param('s', $bio);
          $d=$confirm->execute();
         
          if ($d) {
              header('Location: dashboard.php');
           }else{
              $_SESSION['regError'] = "unable to update your profile please try again";
              header('Location: editprofileform.php'); 
           }  
       }elseif(!empty($mail)){
           $insertIntoDb="UPDATE users SET  user_email = ?
             WHERE user_id  = '$id'";
           $confirm = $con->prepare($insertIntoDb);
          $check=$confirm->bind_param('s', $mail);
          $d=$confirm->execute();
         
          if ($d) {
              header('Location: dashboard.php');
           }else{
              $_SESSION['regError'] = "unable to update your profile please try again";
              header('Location: editprofileform.php'); 
           }  
       }elseif(!empty($phone)){
           $insertIntoDb="UPDATE users SET  user_phone = ?
             WHERE user_id  = '$id'";
           $confirm = $con->prepare($insertIntoDb);
          $check=$confirm->bind_param('s', $phone);
          $d=$confirm->execute();
         
          if ($d) {
              header('Location: dashboard.php');
           }else{
              $_SESSION['regError'] = "unable to update your profile please try again";
              header('Location: editprofileform.php'); 
           }  
       }elseif(!empty($gender)){
           $insertIntoDb="UPDATE users SET  user_gender = ?
             WHERE user_id  = '$id'";
           $confirm = $con->prepare($insertIntoDb);
          $check=$confirm->bind_param('s', $gender);
          $d=$confirm->execute();
         
          if ($d) {
              header('Location: dashboard.php');
           }else{
              $_SESSION['regError'] = "unable to update your profile please try again";
              header('Location: editprofileform.php'); 
           }  
       }else{
           $_SESSION['regError'] = "please fill atleast one of your profile to edit";
           header('Location: editprofileform.php'); 
       }

       
   }


    }else{
            $_SESSION['regError'] = "please log in again to retry";
           header('Location: editprofileform.php'); 
    }


?>