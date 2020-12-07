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

<div class="container-fluid">
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
                <span class="fa fa-send-o fa-2x ml-2"></span>
                <span class="fa fa-compass fa-2x ml-2"></span>
                <span class="fa fa-heart-o fa-2x ml-2"></span>
                <span > <?php echo "
                <img style='width: 25px; margin-left:20px; margin-top:-10px; height: 25px; border-radius: 40px;' src='uploads/{$_SESSION['profilePic']}'/>
                "; ?><a href="logout.php"><button class="btn btn-sm btn-light" style="float:right">Log out</button></a></span>
               
        </div>
    </div>


    <div class="row bg-light justify-content-center" >
        
            <div class="col-2 mt-4 mb-5 card" style="border-radius:0">
        
                    <div class="ml-2 mt-4" >Edit profile</div>
                    <div class="ml-2 mt-4">Change Password</div>
                    <div class="ml-2 mt-4">Apps and Websites</div>
                    <div class="ml-2 mt-4">Email and SMS</div>
                    <div class="ml-2 mt-4">Push Notification</div>
                    <div class="ml-2 mt-4">Manage contact</div>
                    <div class="ml-2 mt-4">Privacy and Security</div>
                    <div class="ml-2 mt-4">Login activity</div>
                    <div class="ml-2 mt-4">Emails from Instagram</div>
            
            </div>

            <div class="col-8 mt-4 mb-5 card" style="border-radius:0">
              
               <div  style=" margin:auto">     
                    <div class="text-danger " style="margin-left: 200px">
                             <?php 
		                        if (isset($_SESSION['regError'])) {
			                    echo $_SESSION['regError'];
		                        }
                            ?>
                    </div>


                <form class="ml-5 mt-5" method="POST" action="editprofile.php">
                    <div class="form-group row">
                        <label for="userN" class="col-2 col-form-label">
                        <?php echo "<img style='width: 40px; height: 40px; border-radius: 40px;' src='uploads/{$_SESSION['profilePic']}'/>";?>
                        </label>
                        <div class="col-6">
                        <?php echo $_SESSION['username']; ?><br>
                        <a href="uploadprofilepic.php">Change Profile Photo</a>
                         </div>
                    </div>

                     <div class="form-group row">
                        <label for="name" class="col-2 col-form-label">Name</label>
                        <div class="col-6">
                        <input type="text" name="nam" class="form-control bg-white" id="name" placeholder="<?php echo $_SESSION['fullname']; ?>"><br>
                        <small class="form-text text-muted">Help people discover your account by using the name you're known by:
                             either your full name, nickname, or business name.
                            You can only change your name twice within 14 days.</small>
                         </div>
                    </div>

                    <div class="form-group row">
                        <label for="uname" class="col-2 col-form-label">Username</label>
                        <div class="col-6">
                        <input type="text" name="usname" class="form-control bg-white" id="uname" placeholder="<?php echo $_SESSION['username']; ?>"><br>
                        <small class="form-text text-muted">
                            In most cases, you'll be able to change your username back to
                             <?php echo $_SESSION['username']; ?> for another 14 days. <a href="">Learn More</a></small>
                         </div>
                    </div>

                    <div class="form-group row">
                        <label for="site" class="col-2 col-form-label">Website</label>
                         <div class="col-6">
                        <input type="text" name="site" class="form-control" id="site" placeholder="website">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword" class="col-2 col-form-label">Bio</label>
                         <div class="col-6">
                        <textarea type="text" name="bio" class="form-control text-area" id="inputPassword" rows="3" >
                        <?php if (isset ($_SESSION['bio'])) {
                            echo $_SESSION['bio'];
                        }else{ echo 'Bio';}  ?>
                        </textarea>
                        </div> 
                    </div>

                    
                        <div class="form-group row">
                            <label for="inputPassword" class="col-2 col-form-label"></label>
                             <div class="col-6">
                                 <small class="input-text text-muted">
                                <Strong>Personal Information</Strong><br>
                                Provide your personal information, even if the account is used
                                for a business, a pet or something else. This won't be a part of your public profile.
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputE" class="col-2 col-form-label">Email</label>
                            <div class="col-6">
                                <input type="text" name="email" class="form-control" id="inputE" placeholder="Email">
                            </div> 
                        </div>

                        <div class="form-group row">
                            <label for="inputE" class="col-2 col-form-label">Phone Number</label>
                            <div class="col-6">
                                <input type="text" name="phone" class="form-control" id="inputE" placeholder="Phone Number">
                            </div> 
                        </div>

                        <div class="form-group row">
                            <label for="inputE" class="col-2 col-form-label">Gender</label>
                            <div class="col-6">
                                <input type="text" class="form-control" name="gender" id="inputE" placeholder="Male">
                            </div> 
                        </div>

                        <div class="form-group row">
                            <label for="inputE" class="col-2 col-form-label">Similar Account Suggestions</label>
                            <div class="form-check col-6 form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1">
                                    <small>Include your account when recommending similar accounts people might want to follow.<a href="">[?]</a></small>

                                </label>
                            </div> 
                        </div>

                        <div class="form-group row">
                            <label for="inputE" class="col-2 col-form-label"></label>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-4">
                                        <input type="submit" name="submit" class="form-control w-50 btn btn-sm btn-primary">
                                    </div>
                                    <div class="col-8">
                                        <small><a href="">Temporarily disable my account</a></small>
                                    </div>
                                </div
                            </div> 
                        </div>


                </form>
            </div>
            </div>
    
        
    </div>	
</div>        

    
        
</body>
</html>