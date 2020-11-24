<?php
    
    require 'connection.php';
    session_start();
    
        if (isset($_SESSION['id'])) {
            // $id = $_SESSION['id'];
            // print_r($id);
        
   
    if (isset($_POST['submit'])) {
        $fileName = $_FILES['pic']['name'];
        $id = $_SESSION['id'];
        //print_r($_FILES);
        if ($fileName !== '') {
            $moved = move_uploaded_file($_FILES['pic']['tmp_name'], 'uploads/'.$fileName);
            if ($moved) {
                $insertIntoDb="UPDATE users SET user_profile_pic = '$fileName' WHERE user_id = '$id'";
                $a = $con->query($insertIntoDb);
                // $insertIntoDb=$con->prepare("INSERT INTO users (user_profile_pic) VALUES(?) WHERE user_id = ?");
                // $b = $insertIntoDb->bind_param('ss', $fileName,$id);
                // $c=$insertIntoDb->execute();
                
                if ($a) {
                    header('location: dashboard.php');
                }else{
                    $_SESSION['emptyError']='upload failed please try again';
                    header('location: uploadprofilepic.php');
                }
            }else{
                $_SESSION['emptyError']='upload failed please try again';
                header('location: uploadprofilepic.php');
            }
        }else{
            $_SESSION['emptyError']='please choose a file';
            header('location: uploadprofilepic.php');
        }
        
    }
                }else{
                    $_SESSION['emptyError']='upload failed please login and try again';
                    header('location: uploadprofilepic.php');
    }
?>