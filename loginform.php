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

<div class="container-fluid">
    <div class="row">
   <div  
   class="mt-5 col-sm-8   m-auto" style="width: 100%; height: 100%; align-items: center; padding: 10px;">
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

    

    <div class="card  col-sm-12 p-3 mx-auto" style="width: 100%; height: 100%; align-items: center; margin-top: 10%; font-size:30px;">
    
    <div class="text-success"><h1>Sign In</h1></div>
    <form action="login.php"  method="POST" class="col-sm-8">
    <input class="form-control w-100 bg-light mt-5" style="width: 100%" type="text" name="emailOrPhone" placeholder="email or phone">
    <input class="form-control bg-light mt-5" type="password" name="password" placeholder="password">
    <button class=" btn btn-lg  btn-success mt-5" type="submit" name="submit" style= "margin-left:40%; ">Sign In</button>
    </form>
    </div>
   </div>
</div>
</div>

<?php 
session_unset();

?>
</body>
</html>