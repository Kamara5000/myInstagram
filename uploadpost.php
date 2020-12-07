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

    
        $text = myFunc($_POST['postText']);
        $date =  date("l,d-m-y");
        $time =   date("h:i:sa");
        $id = $_SESSION['id'];
        //print_r($_FILES);
        
        
        
        
        
        $fileNum = count($_FILES["pic"]['name']);
        $user = $_SESSION['username'];
        $tag = $user.rand(10,100000);
        //print_r($fileCount);
        for($i=0; $i < $fileNum; $i++)
            
            {
                $seconds   = date('s');
                $RandomNum   = rand(10,100000);
                $num = $seconds.$RandomNum;
    
                //print_r($num);
                $ImageName      = str_replace(' ','-',strtolower($_FILES['pic']['name'][$i]));
                $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
                 $ImageExt       = str_replace('.','',$ImageExt);
                //print_r($ImageExt);
                $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
                //print_r($ImageName);
                $NewImageName = $ImageName.'-'.$num.'.'.$ImageExt;
                
                if ($NewImageName !== '') {
                    $moved = move_uploaded_file($_FILES['pic']['tmp_name'][$i], 'uploads/'.$NewImageName );
                
                     if ($moved) {
                    
                        $a = $con->prepare("INSERT INTO posts (user_id, file_name, file_text, post_date, post_time,post_tag)
                        VALUES (?, ?, ?, ?,?,?)");
                         $a->bind_param('ssssss', $id, $NewImageName, $text, $date, $time,$tag);
                         $b=$a->execute();
                         if ($a) {
                        header('location: dashboard.php');
                         }else{
                        $_SESSION['uploadFailed']='upload failed  please try again';
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
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        //     if (isset($_SESSION['id'])) {
        //         // $id = $_SESSION['id'];
        //         // print_r($id);
            
       
        // if (isset($_POST['submit'])) {
        //     function myFunc($params){
        //         $a = addslashes($params);
        //         $b = htmlentities($a);
        //         $c = htmlspecialchars($b);
        //         $d = trim($c);
    
        //         return $d;
        //     }
    
        //   $fileName = myFunc($_FILES['pic']['name']);
        //     $text = myFunc($_POST['postText']);
        //     $date =  date("l,d-m-y");
        //     $time =   date("h:i:sa");
        //     $id = $_SESSION['id'];
            //print_r($_FILES);
            
        // if ($fileName !== '') {
        //     $moved = move_uploaded_file($_FILES['pic']['tmp_name'], 'uploads/'.$fileName);
        //     if ($moved) {

        //         $a = $con->prepare("INSERT INTO posts (user_id, file_name, file_text, post_date, post_time)
        //         VALUES (?, ?, ?, ?,?)");
        //        $a->bind_param('sssss', $id, $fileName, $text, $date, $time);
        //        $b=$a->execute();
                
        //         if ($a) {
        //             header('location: dashboard.php');
        //         }else{
        //             $_SESSION['uploadFailed']='upload failed please try again';
        //             header('location: uploadpostform.php');
        //         }
        //     }else{
        //         $_SESSION['uploadFailed']='upload failed please try again';
        //         header('location: uploadpostform.php');
        //     }
        // }else{
        //     $_SESSION['uploadFailed']='please choose a file';
        //     header('location: uploadpostform.php');
        // }
        
    }
                }else{
                    $_SESSION['uploadFailed']='upload failed please login and try again';
                    header('location: uploadpostform.php');
}

?>