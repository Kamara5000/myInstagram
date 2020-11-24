<?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
<title>log in</title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

   <div  
   class="mt-5" style="width: 25%; height: 100%; align-items: center; margin: auto; padding: 10px;">
   <div class="text-success" style="text-align: center">
   
   <?php 
    if (isset($_SESSION['regSuccess'])) {
        echo $_SESSION['regSuccess'];
    }
    ?>
    </div>

    <div class="text-danger" style="text-align: center">
   
   <?php 
    if (isset($_SESSION['logError'])) {
        echo $_SESSION['logError'];
    }
    ?>
    </div>

    

    <div class="card " style="width: 100%; height: 100%; align-items: center; margin: auto; padding: 10px;">
    
    <div class="text-success">Sign In</div>
    <form action="login.php"  method="POST">
    <input class="form-control bg-light mt-2" type="text" name="emailOrPhone" placeholder="email or phone">
    <input class="form-control bg-light mt-2" type="password" name="password" placeholder="password">
    <input class="form-control btn btn-sm btn-success mt-2" type="submit" name="submit" value="Sign In">
    </form>
    </div>
   </div>

<?php 
session_unset();

?>
</body>
</html>