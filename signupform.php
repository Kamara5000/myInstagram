<?php
session_start()

?>

<!DOCTYPE html>
<html>
<head>
	<title>Instagram</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>


    
    <div style="width:100%; height: 100%; align-items: center; margin: auto;">
    
		<div class="card mt-5" style="width: 25%; height: 100%; align-items: center; margin: auto; padding: 10px;" >
        <div class="text-danger"><?php 
		if (isset($_SESSION['regError'])) {
			echo $_SESSION['regError'];
		}
        ?></div>
        <div style="text-align: center; padding: 15px;">
				<h1>Instagram</h1>
				<p>Sign up to see photos and videos from your friend</p>
				
			</div>
			<div>OR</div>
	
			<div style="padding: 15px; width: 100%;">
				<button class="btn btn-sm btn-primary" style="width: 100%;"><span class="fa fa-facebook"></span>
					Log in with facebook</button>
			</div>
	
			<div style="padding: 15px; width: 100%;">
				<diV style="text-align:  center;">
				<form method="POST"  action="signUp.php"  enctype="multipart/form-data">
					<input class="form-control bg-light  mt-2"  type="text" name="emailOrPhone" placeholder="mobile number or email">
					<input class="form-control bg-light mt-2" type="text" name="fullname" placeholder="full name">
					<input class="form-control bg-light  mt-2" type="text" name="username" placeholder="username">
					<input class="form-control bg-light mt-2" type="password" name="password" placeholder="password">
					<button class="form-control bg-primary mt-2" type="submit" name="submit" >Sign up</button>
				</form>
			</diV>
			<div style="text-align: center; padding: 15px;">
				
				<small>By signing up, you agree to our Terms , Data Policy and Cookies Policy .</small>			
			</div>
		</div>

	
		<div class="card mt-2" style="height: 100%; align-items:  center;  padding: 10px;" >
			<p>Have an account? <a href="">Log in</a></p>
		
		</div>

	</div>
	<?php 
	session_unset();

	?>
</body>
</html>