<?php
    
    require 'connection.php';
    session_start();
    //$id =$_GET['id'];
 
    if (isset($_SESSION['postId'])) {
         //$id = $_SESSION['postId'];
        // print_r($id);
        if (isset($_POST['submit'])) {
            $fileName = $_FILES['pic']['name'];
            //$id = $_SESSION['postId'];
            $id = $_SESSION['postId'];
            $postText = $_POST['postText'];

            if ($fileName !== '' && $postText=='') {
                $moved = move_uploaded_file($_FILES['pic']['tmp_name'], 'uploads/'.$fileName);
                if ($moved) {
                
                    $insertIntoDb="UPDATE posts SET file_name = '$fileName' WHERE post_id = '$id'";
                    $a = $con->query($insertIntoDb);
                    
                    if ($a) {
                    header('location: dashboard.php');
                    }else{
                    $_SESSION['emptyError']='upload failed please try again';
                    header('location: editpostform.php');
                }
                
                }else{
                    $_SESSION['emptyError']=' unable to upload file please and try again';
                    header('location: editpostform.php');
                }
           
            }elseif($fileName == '' && $postText !==''){
                $insertIntoDb="UPDATE posts SET file_text = '$postText' WHERE post_id = '$id'";
                $a = $con->query($insertIntoDb);
                
                
                if ($a) {
                    header('location: dashboard.php');
                }else{
                    $_SESSION['emptyError']='upload failed please try again';
                    header('location: editpostform.php');
                }

            
            }elseif ($fileName !== '' && $postText !=='') {
                $moved = move_uploaded_file($_FILES['pic']['tmp_name'], 'uploads/'.$fileName);
                if ($moved) {
                
                    $insertIntoDb="UPDATE posts SET file_text = '$postText', file_name = '$fileName'  WHERE post_id = '$id'";
                    $a = $con->query($insertIntoDb);
                    
                    if ($a) {
                    header('location: dashboard.php');
                    }else{
                    $_SESSION['emptyError']='upload  failed please try again';
                    header('location: editpostform.php');
                }
                
                }else{
                    $_SESSION['emptyError']=' unable to upload file please and try again';
                    header('location: editpostform.php');
                }
            
            }elseif ($fileName == '' && $postText ==''){
                        $_SESSION['emptyError']=' please edit a file or text and try again';
                        header('location: editpostform.php');
            }




        }else{
            $_SESSION['emptyError']='please click the edit button to proceed';
            header('location: editpostform.php'); 
        }

    }else{
        $_SESSION['emptyError']='upload failed please login and try again';
        header('location: editpostform.php');
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
//     if (isset($_SESSION['postId'])) {
//             // $id = $_SESSION['id'];
//             // print_r($id);
        
   
//     if (isset($_POST['submit'])) {
//         $fileName = $_FILES['pic']['name'];
//         $id = $_SESSION['postId'];
//         $postText = $_POST['postText'];
//         //print_r($_FILES);
//         if ($fileName !== '' && $postText=='') {
//             $moved = move_uploaded_file($_FILES['pic']['tmp_name'], 'uploads/'.$fileName);
//             if ($moved) {
                
//                 $insertIntoDb="UPDATE posts SET file_name = '$fileName' WHERE post_id = '$id'";
//                 $a = $con->query($insertIntoDb);
//                 // $insertIntoDb=$con->prepare("INSERT INTO users (user_profile_pic) VALUES(?) WHERE user_id = ?");
//                 // $b = $insertIntoDb->bind_param('ss', $fileName,$id);
//                 // $c=$insertIntoDb->execute();
                
//                 if ($a) {
//                     header('location: dashboard.php');
//                 }else{
//                     $_SESSION['emptyError']='upload failed please try again';
//                     header('location: editpostform.php');
//                 }
//             }else if($fileName == '' && $postText !==''){
//                 $insertIntoDb="UPDATE posts SET file_text = '$postText' WHERE post_id = '$id'";
//                 $a = $con->query($insertIntoDb);
//                 // $insertIntoDb=$con->prepare("INSERT INTO users (user_profile_pic) VALUES(?) WHERE user_id = ?");
//                 // $b = $insertIntoDb->bind_param('ss', $fileName,$id);
//                 // $c=$insertIntoDb->execute();
                
//                 if ($a) {
//                     header('location: dashboard.php');
//                 }else{
//                     $_SESSION['emptyError']='upload failed please try again';
//                     header('location: editpostform.php');
//                 }

                
//             }else if($fileName !== '' && $postText !==''){
//                     $insertIntoDb="UPDATE posts SET file_text = '$postText' file_name= '$fileName' WHERE post_id = '$id'";
//                     $a = $con->query($insertIntoDb);
//                     // $insertIntoDb=$con->prepare("INSERT INTO users (user_profile_pic) VALUES(?) WHERE user_id = ?");
//                     // $b = $insertIntoDb->bind_param('ss', $fileName,$id);
//                     // $c=$insertIntoDb->execute();
                    
//                     if ($a) {
//                         header('location: dashboard.php');
//                     }else{
//                         $_SESSION['emptyError']='upload failed please try again';
//                         header('location: editpostform.php');
//                     }
    
//             }else if($fileName == '' && $postText ==''){
//                 $_SESSION['emptyError']=' please edit a file or text and try again';
//                         header('location: editpostform.php');
//             }
//         }
        
//     }else{
//         $_SESSION['emptyError']='upload failed please login and try again';
//         header('location: editpostform.php'); 
//     }

// }
//                 else{
//                     $_SESSION['emptyError']='upload failed please login and try again';
//                     header('location: editpostform.php');
//     }
?>