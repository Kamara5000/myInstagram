<?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Post</title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

   <div  
   class="mt-5" style="width: 25%; height: 100%; align-items: center; margin: auto; padding: 10px;">
     <div class="text-danger" style="text-align: center">
   
     <?php 
      
      $_SESSION['postId'] = $_GET['id'];
      
      //echo $_SESSION['postId'];
     
    if (isset($_SESSION['emptyError'])) {
        echo $_SESSION['emptyError'];
    }

       
    
    ?>
    </div>
    

    

    <div class="card " style="width: 100%; height: 100%; align-items: center; margin: auto; padding: 10px;">
    
    <div class="text-success">Edit post</div>
    <form action="editpost.php"  method="POST" enctype="multipart/form-data">
    <input class="form-control bg-light mt-2" type="file" name="pic">
    <input class="form-control bg-light mt-2" type="text" name="postText" placeholder="Edit post text" />
    <button class="btn btn-sm bg-success mt-3 e" style="margin-left:120px" type="submit" name="submit">upload</button>
    </form>
    </div>
   </div>

  
</body>
</html>