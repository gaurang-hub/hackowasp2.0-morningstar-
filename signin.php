<!DOCTYPE html>
<html>
<head>
	<title>Login into your account</title>
	<link rel="stylesheet" type="text/css" href="css/signin.css">
</head>
<body>
	<div class="signin-form">
		<form action="" method="POST">
			<h1>Sign In</h1>
			<h3>Login into ChatApp</h3>
			</div>
			<div class="form_group">
				<label>Email</label><br>
				<input type="email" name="email" class="form_control" placeholder="example@site.com" required autocomplete="off">
			</div>
			
			<div class="form_group">
				<label>Password</label><br>
				<input type="password" name="pass" class="form_control" placeholder="Enter password" required autocomplete="off">
			</div>
			<div class="forgot">
				Forgot password<br>
				<a href="forgot_pass.php">Click Here</a>
			</div>
			<div class="form_group">
				<input type="submit" name="sign_in" class="form_control" placeholder="Login">
			</div>
			<?php ?>
		</form>
		<div class="no_acc">
			Don't have an account 
			<a href="signup.php">create one!</a>
		</div>
</body>

</html>