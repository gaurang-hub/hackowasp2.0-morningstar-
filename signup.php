<!DOCTYPE html>
<html>
<head>
	<title>Create new account</title>
	<link rel="stylesheet" type="text/css" href="css/signup.css">
</head>
<body>
	<div class="signup-form">
		<form action="sign_up.php" method="POST">
			<h1>Sign Up</h1>
			<h3>Register to ChatApp now and star chatting with your friends right now</h3>
		</div>
			<div class="form_group">
				<label>Username</label><br>
				<input type="text" name="user_name" class="form_control" placeholder="Enter Username" required autocomplete="off">
			</div>
			<div class="form_group">
				<label>Password</label><br>
				<input type="password" name="user_pass" class="form_control" placeholder="Enter password" required autocomplete="off">
			</div>
			<div class="form_group">
				<label>Email</label><br>
				<input type="email" name="user_email" class="form_control" placeholder="example@site.com" required autocomplete="off">
			</div>
			<div class="form_group">
				<label>Your Country</label><br>
				<select name="user_country" class="form_control" required>
					<option disabled="">Select your country</option>
					<option>India</option>	
					<option>China</option>	
					<option>Sri Lanka</option>	
					<option>USA</option>	
					<option>England</option>	
					<option>Russia</option>	
					<option>France</option>	
					<option>Canada</option>	
				</select>
			</div>
			<div class="form_group">
				<label>Gender</label><br>
				<select name="user_gender" class="form_control" required>
					<option disabled="">Select your gender</option>
					<option>Male</option>	
					<option>Female</option>	
					<option>Others</option>
				</select>
			</div>
			<div class="form_group">
				<label class="checkbox-inline"><input type="checkbox" required>I accept the <a href="#">Terms of uses</a> &amp; <a href="#">Privacy Policy</a></label>
			</div>
			<div class="form_group">
				<input type="submit" name="sign_up" class="form_control" placeholder="Sign Up">
			</div>
			<?php include("sign_up.php"); ?>
		</form>
		
		<div class="acc_present">
			If you already have an account <a href="signin.php">Login Here!</a>
		</div>
</body>

</html>