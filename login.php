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
       
        $passw = myFunc($_POST['password']);
        $emailOrPhone = myFunc($_POST['emailOrPhone']);

        if ( !empty($emailOrPhone) && !empty($passw)){
            $fetch_from_db =$con->prepare("SELECT user_id, user_password from users WHERE user_email_or_phone
             = ?");
             $b = $fetch_from_db->bind_param('s', $emailOrPhone);
             $c=$fetch_from_db->execute();
             $a=$fetch_from_db->get_result();
            
                if ($a) {
                    $result=$a->fetch_assoc();
                    //print_r($result);
                    $pass = $result['user_password'];
                    $verify = password_verify($passw,$pass);
                    
                    if ($verify) {
                        $_SESSION['id'] = $result['user_id'];
                        //print_r($_SESSION['id']);
							header('Location: dashboard.php');
                    }else{
                        $_SESSION['logError'] = "please enter correct details and retry again";
                         header('Location: loginform.php');
                    }

                }else{
                    $_SESSION['logError'] = "user not found";
                    header('Location: loginform.php');
                }
        }else{
            $_SESSION['logError'] = "please fill all input";
            header('Location: loginform.php');
        }
    }

?>