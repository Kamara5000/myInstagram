<?php 
    
        session_start();
        
            $user= $_SESSION['username'];       
			
				require 'connection.php';

                $d;
                $postSql = "SELECT * FROM posts";
                $check = $con->query($postSql);
                
                if($check->num_rows >0){
                    $q = "SELECT 
                    users.user_username,users.user_profile_pic,posts.post_id,posts.file_name,
                    posts.file_text,posts.post_date,posts.post_time,posts.post_tag FROM `users` 
                    JOIN posts ON users.user_id=posts.user_id  GROUP BY post_tag    ORDER BY posts.post_id DESC ";
                     $queryP = $con->query($q);
                     $k = $queryP->fetch_all();  
                     
                     $d = $k;

                     //print_r($d);                
                }else{
                    echo("no post available");
                }
                

            //  $queryP = $con->query($fetch_from_db);
            //          $d = $queryP->fetch_all();  
                     
            
            // $fetch_from_db =$con->prepare("SELECT * FROM posts");
            //  $c=$fetch_from_db->execute();
            //  $a=$fetch_from_db->get_result();
            //  //$c= $a->fetch_assoc();
            //  $d = $a->fetch_all();
                //print_r($c);
                //print_r($d);
              // print_r($a); 				
                
                
            //   $fetch_from_db =$con->query("SELECT * FROM posts WHERE post_tag= '$id'");
            //   $d = $fetch_from_db->fetch_all();
                            

        
				

?>

<!DOCTYPE html>
<html>
<head>
	<title>Instagram</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>

 <div class="container-fluid">
        <div class="row mb-3" style="background-color:#FFFFFF; height: 50px; padding-left: 80px; padding-right: 50px;">
        <div class="col-sm-3"><h3 style="margin-top:10px;">Instagram<h3>
        </div>
        
        <div class="col-sm-4">
            
            <div class="input-group " style="margin-top:15px; margin-left: 50px;">
                
                <input class="bg-light" style="outline: none;  border-style: none;" type="text" placeholder="search">

            </div>
              
        </div>
        <div class="col-sm-5" style="margin-top:10px; padding-left: 50px;">
                <a href="home.php"><span class="fa fa-home fa-2x ml-2"></span></a>
                <span class="fa fa-send-o fa-2x ml-2"></span>
                <span class="fa fa-compass fa-2x ml-2"></span>
                <span class="fa fa-heart-o fa-2x ml-2"></span>
                <span > <?php echo "
                <a href='dashboard.php'><img style='width: 25px; margin-left:20px; margin-top:-10px; height: 25px; border-radius: 40px;' src='uploads/{$_SESSION['profilePic']}'/></a>
                "; ?><a href="logout.php"><button class="btn btn-sm btn-light" style="float:right">Log out</button></a></span>
               
        </div>
    </div>
            
                <?php
            
                if ($d) {
                   
                    //print_r($b);
                   
                       
                            foreach($d as $pst){ 
                                $user= $_SESSION['username'];  
                            //  echo "
                             
                            // <div class='m-3 bg-light'>
                            //  <a href='post.php?id=$pst[6]'><img style='width: 300px; height: 290px;' src='uploads/{$pst[2]}'/></a>
                            // </div>
                            
                              
                            //   "; 
                        echo "
                        <div class='row pt-4  bg-light' style='padding-left:200px; padding-right:200px'  >
                            <div class='col-sm-8 pb-3'>
                                
                            <div class= 'card'>
                                
                                <div class='card-header bg-white d-flex'>
                                    <a href='dashboard.php'><img  height='40px' width='40px' style='border-radius: 85px;'  src='uploads/{$pst[1]}'/></a> 
                                    <div class='ml-3 mt-3'>$pst[0]</div>
                                </div>
                                    <div class='card-body'>
                                    <img  height='100%' width='100%'  src='uploads/{$pst[3]}'/> 
                                    </div>
                          

                                <div class='card-footer mb-2 bg-white'>
                                       
                                        <p class='card-text'>$pst[0] <span > $pst[4]</span></p>
                                        <p class='card-text text-light d-flex'> <small class='text-muted'> Posted on   $pst[4]
                                        at   $pst[6] </small> <span style='margin-left:auto'>
                                        <a href='editpostform.php?id=$pst[1]'><button class='btn btn-sm ml-auto ' style='background-color:#244451; color:white'>
                                        Edit post</button></a></span></p>
                                </div>

                            </div>
                            </div>
                        </div>

                           ";}   
                                           
                     
                    
                } ?>

                </div>
                
 </body>            

 </html>





                        
                        