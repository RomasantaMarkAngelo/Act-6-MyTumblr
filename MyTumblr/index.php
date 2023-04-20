<?php

	//TO START THE SESSION
	session_start();

	//PRE DEFINED VARIABLE
	$user_name = "Romasanta";
	$password = "delmundo";
	$name = "Mark Angelo Romasanta";
	$address = "Bangwayin Torrijos Marinduque";


	$url_add = "https://" . $_SERVER ['HTTP_HOST'] .  $_SERVER['PHP_SELF'];

	// TO TEST IF THE BUTTON IS CLICKED
	if(isset($_REQUEST['submit_button']) === true){
		//TO TEST IF USERNAME IS AMTCHED TO THE PRE DEFINE USERNAME
		if(($_REQUEST['form_username']) !=  $user_name){
			header("Location:" . $url_add."?username_not_exist");
		}
		else if(($_REQUEST['form_username']) ==  $user_name && $_REQUEST['form_pass'] != $password)
		{
			header("Location:" . $url_add."?incorect_pass");
		}else if(($_REQUEST['form_username']) ==  $user_name && $_REQUEST['form_pass'] == $password)
		{
			header("Location:" . $url_add."?login_successful");
		}
		$_SESSION['ses_username'] = $user_name;
		$_SESSION['ses_password'] = $password;
		$_SESSION['ses_name'] = $name;
		$_SESSION['ses_adress'] = $address;

						
	}
?>




<!doctype html>
<html lang="en">
  <head>
  	<title>MyTumblr</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">MyTumblr Log In</h3>
						
						<form method="$_POST" action="#" class="login-form">
		      		<div class="form-group">

						<?php
						if(isset($_REQUEST['username_not_exist']) === true){
							echo"<div class='alert alert-danger' role='alert'> Username does not exist </div>";
						}else if(isset($_REQUEST['incorect_pass']) === true){
							echo"<div class='alert alert-danger' role='alert'> Incorrect Password </div>";
						}else if(isset($_REQUEST['login_successful']) === true){
							echo"<div class='alert alert-danger' role='alert'> Redirecting to next page... </div>";
							header("Refresh: 1; url=account.php");
						}else if(isset($_REQUEST['logout']) === true){
							echo"<div class='alert alert-danger' role='alert'> Thank You </div>";
						
						}else if(isset($_REQUEST['logfirst']) === true){
							echo"<div class='alert alert-danger' role='alert'> Log In First </div>";
						
						}else if(isset($_SESSION['ses_username']) === true){
							echo"<div class='alert alert-danger' role='alert'> You are still Logged in. <a href= 'account.php'> Clicked here.</a> </div>";
						
						}


						
						?>
						
						
					  	

		      			<input type="text" class="form-control rounded-left" name="form_username" placeholder="Username" required>
		      		</div>
	            <div class="form-group d-flex">
	              <input type="password" class="form-control rounded-left" name="form_pass"  placeholder="Password" required>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#">Forgot Password</a>
								</div>
	            </div>
	            <div class="form-group">
	            	<button type="submit"  class="btn btn-primary rounded submit p-3 px-5" name="submit_button" >Get Started</button>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

  <!--<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script> -->





	</body>
</html>

