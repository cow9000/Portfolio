<?php

	$conn = mysqli_connect("localhost","root","thechickenninja","bmb");
	$errors = "";
	$noerrors = 0;
	
	$userInput = "";
	$passwordInput = "";
	$emailInput = "";
	$repasswordInput = "";
	$lastnameInput = "";
	$firstnameInput = "";

	if(isset($_POST["username"])){
		$userInput = $_POST["username"];
		$passwordInput = $_POST["password"];
		$emailInput = $_POST["email"];
		$repasswordInput = $_POST["repassword"];
		$lastnameInput = $_POST["lname"];
		$firstnameInput = $_POST["fname"];
		
		if($_POST["password"] == ""){
			$errors = $errors . "<p style='color:red;'>You need to have a password!</p>";
			$noerrors = 1;
		}
		if($_POST["email"] == ""){
			$errors = $errors . "<p style='color:red;'>You need to have a email!</p>";
			$noerrors = 1;
		}
		if($_POST["lname"] == ""){
			$errors = $errors . "<p style='color:red;'>You need to have a last name!</p>";
			$noerrors = 1;
		}
		if($_POST["fname"] == ""){
			$errors = $errors . "<p style='color:red;'>You need to have a first name!</p>";
			$noerrors = 1;
		}
		if($_POST["password"] != $_POST["repassword"]){
			$errors = $errors . "<p style='color:red;'>Your passwords do not match</p>";
			$noerrors = 1;
		}
		if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
			$errors = $errors . "<p style='color:red;'>This email is not valid</p>";
			$noerrors = 1;
		}
		if(!strlen($_POST["password"]) > 5){
			$errors = $errors . "<p style='color:red;'>Your password must be longer than 5 characters</p>";
			$noerrors = 1;
		}
		
		//Search for other usernames
		$getUser = mysqli_query($conn,"SELECT * FROM members WHERE username='" . $_POST["username"] . "'");
		if(mysqli_num_rows($getUser) >= 1){
			$errors = $errors . "<p style='color:red;'>That username already exists!</p>";
			$noerrors = 1;
		}
		
		$getEmail = mysqli_query($conn,"SELECT * FROM members WHERE email='" . $_POST["email"] . "'");
		if(mysqli_num_rows($getEmail) >= 1){
			$errors = $errors . "<p style='color:red;'>That email is already registered!</p>";
			$noerrors = 1;
		}
		
		
		if($noerrors === 0){
			$username = mysqli_real_escape_string($conn,$_POST["username"]);
			$password = password_hash($_POST["password"],PASSWORD_BCRYPT);
			$first = mysqli_real_escape_string($conn,$_POST["fname"]);
			$last = mysqli_real_escape_string($conn,$_POST["lname"]);
			$date = date('Y-m-d H:i:s');
			$email = mysqli_real_escape_string($conn,$_POST["email"]);
			mysqli_query($conn, "INSERT INTO members(username,password,firstname,lastname,admin,purchases,warning,date,email) VALUES(
				'" . $username . "',
				'" . $password . "',
				'" . $first . "',
				'" . $last . "',
				'f',
				'',
				0,
				'" . $date . "',
				'" . $email . "'
			)
			");
			header("location:register.php");
		}
	}	


	session_start();
	$welcomeUser = "<a href='login.php'>Member Login</a> / <a href='register.php'>register</a>";
	if(isset($_SESSION["username"])){
		$welcomeUser = "Welcome back <a href='settings.php'>" . $_SESSION["username"] . "</a><br><a href='logout.php'>Logout here</a>";
	}
	include "register2.php";
?>