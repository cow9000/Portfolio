<?php
	$conn = mysqli_connect("localhost","root","thechickenninja","bmb");
	mysqli_connect(
	$error = "";
	if(isset($_POST["email"])){
		$getEmail = mysqli_query($conn, "SELECT * FROM members WHERE email='" . $_POST["email"] . "'");
		if(!mysqli_num_rows($getEmail) >= 1){
			$error = "<p style='color:red;'>There is no account matching this email.</p>";
		}else{
			$getId = mysqli_fetch_assoc($getEmail);
			header("location:http://localhost:8080/build%20me%20blocks/site/fps.php?confirmation=" . md5(1290*3+$getId["id"]). "&id=" . $getId["id"] . "");
			$to = $_POST["email"];
			$subject = 'Build Me Blocks - Password Recovery';
			$message = "<a href='http://localhost:8080/build%20me%20blocks/site/fps.php?confirmation=" . md5(1290*3+$getId["id"]). "&id=" . $getId["id"] . "'>Click here to reset your password</a>";
			$headers = 'From: noreply@buildmeblocks.com';

			mail($to, $subject, $message, $headers);
		}
	
	}
	
	



	session_start();
	$welcomeUser = "<a href='login.php'>Member Login</a> / <a href='register.php'>register</a>";
	if(isset($_SESSION["username"])){
		$welcomeUser = "Welcome back <a href='settings.php'>" . $_SESSION["username"] . "</a><br><a href='logout.php'>Logout here</a>";
	}
	include "forgotpass2.php";
?>