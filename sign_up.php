<?php 
include("include/connection.php");
	if(isset($_POST['sign_up'])){
		$user = $_POST['user_name'];
		$pass = $_POST['user_pass'];
		$email = $_POST['user_email'];
		$country = $_POST['user_country'];
		$gender = $_POST['user_gender'];
		$user = mysqli_real_escape_string($connection,$user);
		$user = htmlentities($user);
		$pass = mysqli_real_escape_string($connection,$pass);
		$pass = htmlentities($pass);
		$email = mysqli_real_escape_string($connection,$email);
		$email = htmlentities($email);
		$country = mysqli_real_escape_string($connection,$country);
		$country = htmlentities($country);
		$gender = mysqli_real_escape_string($connection,$gender);
		$gender = htmlentities($gender);
		$random = rand(1,2);
		if($user == ''){
			echo '<script type = "text/javascript">';
			echo 'alert("Sorry we could not verify your name")';
			echo '</script>';
			exit();
		}
		if(strlen($pass)<8){
			echo '<script type = "text/javascript">';
			echo 'alert("Password should be minimum 8 characters long")';
			echo '</script>';
			exit();		
		}
		$check_email = "select * from chatappdb where user_email='$email'";
		$res_email = mysqli_query($connection,$check_email);
		if(mysqli_num_rows($res_email)){
			echo '<script type = "text/javascript">';
			echo 'alert("Sorry email already exists")';
			echo '</script>';
			header('Location: http://localhost/Chat%20App/signup.php');
			exit();
		}
		if($rand == 1){
			$profile_pic = "images/login1.jpg";
		}
		else if($rand == 2){
			$profile_pic = "images/login.jpg";
		}
		$insert = "insert into chatappdb (user_name, user_pass, user_email, user_profile, user_country, user_gender) values('$user','$pass','$email','$profile_pic','$country','$gender')";
		$insert_query = mysqli_query($connection,$insert);
		if($insert_query){
			echo '<script type = "text/javascript">';
			echo 'alert("Congratulations your account has been successfully created")';
			echo '</script>';
			header('Location: http://localhost/Chat%20App/signin.php');
		}
		else{
			echo '<script type = "text/javascript">';
			echo 'alert("Sorry your account could not be created")';
			echo '</script>';
			header('Location: http://localhost/Chat%20App/signup.php');	
		}
	}
	else{
		//header('Location: http://localhost/Chat%20App/signup.php');
		exit();
	}
?>