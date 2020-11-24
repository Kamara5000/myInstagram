<?php
session_start();
require 'connection.php';

    if (isset($_POST['submit'])) {
        
         function myFunc($params){
            $a = addslashes($params);
            $b = htmlentities($a);
            $c = htmlspecialchars($b);
            $d = trim($c);

            return $d;
        }

        $emailOrPhone = myFunc($_POST['emailOrPhone']);
        $fullname = myFunc($_POST['fullname']);
        $username = myFunc($_POST['username']);
        $pass = myFunc($_POST['password']);

        $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

        
    
    
        if ( !empty($emailOrPhone) && !empty($fullname) && !empty($username) && !empty($hashedPassword)) {
            $checkDatabase = "SELECT * FROM users WHERE  user_email_or_phone = ?";
		 	$confirm = $con->prepare($checkDatabase);
            $check=$confirm->bind_param('s', $emailOrPhone);
            $d=$confirm->execute();
            $result = $confirm->get_result();

            if ($result->num_rows>0) {
                $_SESSION['regError'] = "user with number or email already exist";
                header('Location: signUpform.php');
             }else{
                $a = $con->prepare("INSERT INTO users (user_email_or_phone, user_fullname, user_username, user_password)
                VALUES (?, ?, ?, ?)");
               $a->bind_param('ssss', $emailOrPhone, $fullname, $username, $hashedPassword);
               $b=$a->execute();
               
               if ($b) {
                   $_SESSION['regSuccess']= "you have registered succesfully you can log in now";
                   header('Location: loginform.php');
               }else{
                   $_SESSION['regError'] = "registration failed";
                   header('Location: signUpform.php');
               }
             }  

            
  
            
        }else{
            $_SESSION['regError'] = "please fill all input";
            header('Location: signUpform.php');
        }
    }




?>