<?php 
    
        session_start();
        function myFunc($params){
            $a = addslashes($params);
            $b = htmlentities($a);
            $c = htmlspecialchars($b);
            $d = trim($c);

            return $d;
        }
            $id = myFunc($_GET['id']);
            $_SESSION['postId']= $id;
            //echo $_SESSION['postId'];
            $user= $_SESSION['username'];       
			if (isset($id)) {
				require 'connection.php';
            
            $fetch_from_db =$con->prepare("SELECT * FROM posts WHERE post_tag= ?");
             $b = $fetch_from_db->bind_param('s', $id);
             $c=$fetch_from_db->execute();
             $a=$fetch_from_db->get_result();
             //$c= $a->fetch_assoc();
             $d = $a->fetch_all();
                //print_r($c);
                //print_r($d);
              // print_r($a); 				
                
                
            //   $fetch_from_db =$con->query("SELECT * FROM posts WHERE post_tag= '$id'");
            //   $d = $fetch_from_db->fetch_all();
                            

                        


			}else{
				header("Location: dashboard.php");
			}
				

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

<!-- <div  style="margin-left:350px; height:100%; max-width:500px">
 <div class='card'>
     <?php echo "<img class='card-img-top' height='500px' width='500px'  src='uploads/{$c['file_name']}'/>" ?> 
     <div class="card-body " style="background-color:#FAFAFA">
         <p class="card-text" style="color:#244451"><?php echo $c['file_text']; ?></p>
         <p class='card-text text-light'> <small class='text-muted'>Posted on <?php echo $c['post_date']?> 
         at <?php echo $c['post_time']?> </small> <span style="float:right">
         <a href="editpostform.php?id=<?php echo $id?>"><button class="btn btn-sm" style="background-color:#244451; color:white">Edit post</button></a></span></p>
     
     </div> 
             
 </div>
 </div>

 </div> -->
 
            <div class="container bg-light">
            
            
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
                        <div class='row ' style='margin:auto' >
                            <div class='col-8 mb-3'>
                                <div class='card mt-2' style='width:600px; height:620px; border-radius:0'>
                                    <img  height='100%' width='100%'  src='uploads/{$pst[2]}'/> 
                                </div>
                            </div>

                            <div class='col-2 mb-3'>
                                <div class='card mt-2' style='background-color:#white; width:300px; height:620px; margin-left:-142px;'>
                                        <div class='card-header bg-white'>$user</div>
                                        <div class='card-body'>
                                            <p class='card-text text-muted'>post comments</p>
                                        </div>

                                        <div class='card-footer bg-white'>
                                        <p class='card-text' style='color:#244451'> $pst[3] </p>
                                        <p class='card-text text-light'> <small class='text-muted'> Posted on   $pst[4]
                                        at   $pst[5] </small> <span style='float:right'>
                                        <a href='editpostform.php?id=$pst[0]'><button class='btn btn-sm' style='background-color:#244451; color:white'>
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





                        
                        