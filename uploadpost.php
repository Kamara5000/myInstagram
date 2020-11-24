<?php
    
    require 'connection.php';
    session_start();
    
        if (isset($_SESSION['id'])) {
            // $id = $_SESSION['id'];
            // print_r($id);
        
   
    if (isset($_POST['submit'])) {
        function myFunc($params){
            $a = addslashes($params);
            $b = htmlentities($a);
            $c = htmlspecialchars($b);
            $d = trim($c);

            return $d;
        }

        $fileName = myFunc($_FILES['pic']['name']);
        $text = myFunc($_POST['postText']);
        $date =  date("l,d-m-y");
        $time = date("h:i:sa");
        $id = $_SESSION['id'];
        //print_r($_FILES);
        
        if ($fileName !== '') {
            $moved = move_uploaded_file($_FILES['pic']['tmp_name'], 'uploads/'.$fileName);
            if ($moved) {

                $a = $con->prepare("INSERT INTO posts (user_id, file_name, file_text, post_date, post_time)
                VALUES (?, ?, ?, ?,?)");
               $a->bind_param('sssss', $id, $fileName, $text, $date, $time);
               $b=$a->execute();
                
                if ($a) {
                    header('location: dashboard.php');
                }else{
                    $_SESSION['uploadFailed']='upload failed please try again';
                    header('location: uploadpostform.php');
                }
            }else{
                $_SESSION['uploadFailed']='upload failed please try again';
                header('location: uploadpostform.php');
            }
        }else{
            $_SESSION['uploadFailed']='please choose a file';
            header('location: uploadpostform.php');
        }
        
    }
                }else{
                    $_SESSION['uploadFailed']='upload failed please login and try again';
                    header('location: uploadpostform.php');
    }
?>