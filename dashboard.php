<?php 
	session_start();
	

			if (isset($_SESSION['id'])) {
				require 'connection.php';
				$id = $_SESSION['id'];
                $sql = "SELECT user_id, user_email_or_phone, user_fullname, user_username, user_profile_pic FROM users WHERE user_id= '$id'";
                $postSql = "SELECT * FROM posts WHERE user_id= '$id'";

				$queryDb = $con->query($sql);
				$a = $queryDb->fetch_assoc();
                //print_r($a);
                
               $queryPost = $con->query($postSql);
                $post = $queryPost->fetch_all();
                //print_r($post);
                //print_r($queryPost);
                
                 
                $_SESSION['fullname'] = $a['user_fullname'];
                $_SESSION['username'] = $a['user_username'];
                $_SESSION['profilePic'] = $a['user_profile_pic'];
            

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

</head>
<body>

<div class="container">
    <div class="row" style="background-color:#FFFFFF; height: 50px;">
        <div class="col-4"><h3 style="margin-top:20px; margin-left: 80px;">Instagram<h3>
        </div>
        
        <div class="col-4">
            
            <div class="input-group" style="margin-top:20px; margin-left: 80px;">
                <div class="input-group-prepend">
                  
                  <span class="input-group-text bg-light fa fa-search" style="border: none;"></span>
                </div>
                <input class="bg-light" style="outline: none;  border-style: none;" type="text" placeholder="search">
                <div class="input-group-append">
                    <span class="input-group-text bg-light fa fa-close" style="border: none;"></span>
                </div>
            </div>
              
        </div>
        <div class="col-4" style="margin-top:10px; padding-left: 50px;">
                <span class="fa fa-home fa-2x ml-2"></span>
                <span class="fa fa-send-o fa-2x ml-4"></span>
                <span class="fa fa-compass fa-2x ml-4"></span>
                <span class="fa fa-heart-o fa-2x ml-4"></span>
                <span > <?php echo "
                        <img style='width: 25px; margin-left:20px; margin-top:-10px; height: 25px; border-radius: 40px;' src='uploads/{$_SESSION['profilePic']}'/>
                        "; ?></span>
        </div>
    </div>
    
    <div class="row bg-light pt-5">
    
        <div class="col-4">
            
            

                           <?php if (($_SESSION['profilePic'])=='') {
                                $_SESSION['fullname'] = $a['user_fullname'];
                                $_SESSION['id'] = $a['user_id'];
                           echo '<div style="width: 150px; height: 150px; border-radius: 75px; background-color: white;">
        
                            <a href="uploadprofilepic.php"><span style="margin:38%" class="fa fa-plus">Add profile picture</span></a>
                            </div>';
                          }else{
                            echo "<div>
                            <a href='uploadprofilepic.php'><img style='width: 150px; height: 150px; border-radius: 75px;' src='uploads/{$_SESSION['profilePic']}'/>
                                </div></a>";
                          } ?>
    
        </div>
        
        <div class="col-4">
            <div><?php if (isset($_SESSION['username'])) {
                            echo $_SESSION['username'];
                        }?> <span style="margin-left: 10px;">
                <button class="btn btn-sm" style="border: 1px solid;">Edit Profile
                </button></span>
                <span style="margin-left: 10px;" class=" fa fa-spin fa-spinner fa-2x"></span>
            </div>

            <div style="margin-top: 10px;">
                <p><span><?php $num =$queryPost->num_rows; 
                 echo $num; ?> posts </span> 
                 <span  style="margin-left: 20px;">0 following</span>
                     <span  style="margin-left: 20px;">0 follower</span></p>
               
            </div>

            <div>
                <p> <?php if (isset($_SESSION['fullname'])) {
                            echo $_SESSION['fullname'];
                        }?> </p>
                
                <p>Bio</p>
            
            </div>

           
        </div>
        
        
        <hr>  
        
        
    <div class="col-12"><hr/></div> 
    
    </div>
    

    <div class="row bg-light">

        <div class="col-12">
                 <div class='card-deck'>
                <?php
                
                if ($post) {
                   
                    //print_r($b);
                   
                       
                            foreach($post as $pst){  
                             echo "
                             
                            <div class='m-3 bg-light'>
                             <a href='post.php?id=$pst[0]'><img style='width: 300px; height: 290px;' src='uploads/{$pst[2]}'/></a>
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