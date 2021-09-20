<?php 
    session_start();
    

			if (isset($_SESSION['id'])) {
				require 'connection.php';
				$id = $_SESSION['id'];

                $postSql = "SELECT * FROM posts WHERE user_id= '$id'";
                $check = $con->query($postSql);
                
                
                $queryP= '';
                $k= '' ;
                
                $_SESSION['fullname'] = '';
                $_SESSION['username'] = '';
                $_SESSION['profilePic'] = '';
                $_SESSION['bio']        = '';
                
                if($check->num_rows >0){
                    $q = "SELECT users.user_id, users.user_email_or_phone, users.user_fullname, 
                    users.user_username, users.user_profile_pic, users.user_bio,posts.post_id,posts.file_name,
                    posts.file_text,posts.post_date,posts.post_time,posts.post_tag FROM `users` 
                    JOIN posts ON users.user_id=posts.user_id WHERE users.user_id= $id GROUP BY post_tag    ORDER BY posts.post_id DESC ";
                     $queryP = $con->query($q);
                     $k = $queryP->fetch_all();  
                     
                     $user = $k[0];

                     $_SESSION['fullname'] = $user[2];
                     $_SESSION['username'] = $user[3];
                     $_SESSION['profilePic'] = $user[4];
                     $_SESSION['bio']        = $user[5];
                 
                
                }else{
                    $sql = "SELECT user_id, user_email_or_phone, user_fullname, user_username, user_profile_pic, user_bio FROM users WHERE user_id= '$id'";
                    $queryP = $con->query($sql);
                    $m = $queryP->fetch_all(); 

                    $user = $m[0];

                    $_SESSION['fullname'] = $user[2];
                    $_SESSION['username'] = $user[3];
                    $_SESSION['profilePic'] = $user[4];
                    $_SESSION['bio']        = $user[5];
                }
                
                 
                //print_r($k[0]);
                  
              
               
                
                //$sql = "SELECT user_id, user_email_or_phone, user_fullname, user_username, user_profile_pic, user_bio FROM users WHERE user_id= '$id'";
                //$postSql = "SELECT * FROM posts WHERE user_id= '$id'";
                //$postSql = "SELECT * FROM posts WHERE user_id= '$id' GROUP BY post_tag";
				//$queryDb = $con->query($sql);
				//$a = $queryDb->fetch_assoc();
                //print_r($a);

               
                
            //    $queryPost = $con->query($postSql);
            //     $post = $queryPost->fetch_all();
                //print_r($post);
               // print_r($queryPost);
                
                 
                $_SESSION['fullname'] = $user[2];
                $_SESSION['username'] = $user[3];
                $_SESSION['profilePic'] = $user[4];
                $_SESSION['bio']        = $user[5];
            

				//echo "<a href='logout.php'>log out</a>";

				//echo "<img height='100px' width='100px' src='uploads/{$a['files']}'/>";

			}else{
				header("Location: loginform.php");
			}
?>

<!DOCTYPE html>
<html>
<head>
<title>Instagram</title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
</head>
<body>

<div class="container-fluid">
    <div class="row" style="background-color:#FFFFFF; height: 50px; padding-left: 80px; padding-right: 50px;">
        <div class="col-sm-3"><h3 style="margin-top:10px;">Instagram<h3>
        </div>
        
        <div class="col-sm-4">
            
            <div class="input-group " style="margin-top:15px; margin-left: 50px;">
                <div class="input-group-prepend">
                  
                  <span class="input-group-text bg-light fa fa-search" style="border: none;"></span>
                </div>
                <input class="bg-light" style="outline: none;  border-style: none;" type="text" placeholder="search">
                <div class="input-group-append">
                    <span class="input-group-text bg-light fa fa-close" style="border: none;"></span>
                </div>
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
    
    <div class="row bg-light pt-5" style="padding-left: 200px">
    
        <div class="col-sm-4">
            
            

                           <?php if (($_SESSION['profilePic'])=='') {
                           echo '<div style="width: 150px; height: 150px; border-radius: 75px; background-color: white;">
        
                            <a href="uploadprofilepic.php"><span style="margin:38%" class="fa fa-plus">Add profile picture</span></a>
                            </div>';
                          }else{
                            echo "<div>
                            <a href='uploadprofilepic.php'><img style='width: 150px; height: 150px; border-radius: 75px;' src='uploads/{$_SESSION['profilePic']}'/>
                                </div></a>";
                          } ?>
    
        </div>
        
        <div class="col-sm-4">
            <div><?php if (isset($_SESSION['username'])) {
                            echo $_SESSION['username'];
                        }?> <span style="margin-left: 10px;"><a href="editprofileform.php">
                <button class="btn btn-sm" style="border: 1px solid;">Edit Profile
                </button></a></span>
            </div>

            <div style="margin-top: 10px;">
                <p><span><?php $num =$queryP->num_rows; 
                 echo $num; ?> posts </span> 
                 <span  style="margin-left: 20px;">0 following</span>
                     <span  style="margin-left: 20px;">0 follower</span></p>
               
            </div>

            <div>
                <p> <?php if (isset($_SESSION['fullname'])) {
                            echo $_SESSION['fullname'];
                        }?> </p>
                
                <p><?php if (isset($_SESSION['bio'])) {
                            echo $_SESSION['bio'];
                        }else{echo 'Bio';}?> </p></p>
            
            </div>

           
        </div>
        
        
        <hr>  
        
        
    <div class="col-sm-12 " style=" padding-right: 200px"><hr/></div> 
    
    </div>
    

    <div class="row bg-light "  style="padding-left: 200px; padding-right: 200px">

        <div class="col-sm-12">
                 <div class='card-deck'>
                <?php
                
                if ($k) {
                   
                    //print_r($b);
                   
                       
                            foreach($k as $pst){  
                             echo "
                             
                            <div class='m-3 bg-light'>
                             <a href='post.php?id=$pst[11]'><img style='width: 300px; height: 290px;' src='uploads/{$pst[7]}'/></a>
                            </div>
                            
                              
                              "; 
                            }   
                            
                        
                    
                       echo "<div style='margin:auto'><a href='uploadpostform.php'>click to add a post <span class='fa fa-camera'></span> <br/>
                       <span  class='fa fa-plus ml-5'></a></div>"; 
                            
                       
                     
                    
                }else{
                    echo '
                    you have no post yet 
                    <div class="card bg-light">
                        <div style="margin:auto; width: 150px; height: 150px; border-radius: 75px; background-color: white;" >
                       
                        <div style="margin:22%"><a href="uploadpostform.php">click to add a photo <span class="fa fa-camera"></span> <br/>
                        <span  class="fa fa-plus ml-4"></a>
                        </div>
                        </div>
                    </div>
                    
                    
                    ';
                }
                ?>
            </div>   
        </div>
        
        <div>
            <?php
               
            
            ?>
        </div>
    </div>

</div>

</body>
</html>