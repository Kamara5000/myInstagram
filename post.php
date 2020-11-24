<?php 
    
    
        function myFunc($params){
            $a = addslashes($params);
            $b = htmlentities($a);
            $c = htmlspecialchars($b);
            $d = trim($c);

            return $d;
        }
            $id = myFunc($_GET['id']);
            //echo $id;

			if (isset($id)) {
				require 'connection.php';
            
            $fetch_from_db =$con->prepare("SELECT * FROM posts WHERE post_id= ?");
             $b = $fetch_from_db->bind_param('s', $id);
             $c=$fetch_from_db->execute();
             $a=$fetch_from_db->get_result();
             $c= $a->fetch_assoc();
                				
                // echo "<img height='100px' width='100px' src='uploads/{$c['file_name']}'/>";
                
            
                            

                        


			}else{
				header("Location: dashboard.php");
			}
				

?>

<div  style="margin-left:350px; height:100%; max-width:500px">
 <div class='card  bg-dark'>
     <?php echo "<img class='card-img-top' height='500px' width='500px'  src='uploads/{$c['file_name']}'/>" ?> 
     <div class="card-body " style="background-color:#FAFAFA">
         <p class="card-text text-dark"><?php echo $c['file_text']; ?></p>
         <p class='card-text text-danger'> <small class='text-muted'>Posted on <?php echo $c['post_date']?> 
         at <?php echo $c['post_time']?> </small></p>
     
     </div> 
             
 </div>
 </div>