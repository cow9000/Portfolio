<?php
	$link = mysqli_connect("localhost","root","thechickenninja","users");
	

	if(!$link){
		$output = "Could not connect to database";
	}else{
		$output = "Connection to database was successful...";
	}
	
	if(!mysqli_set_charset($link,'utf8')){
		$output = "Unable to set database connection encoding.";
	}
	
	if(!mysqli_select_db($link, "users")){
		$output = "Unable to locate Users Database";
	}

	if(!isset($_POST['username'])){
		$username = '';
		$password = '';
		$rpassword = '';
		$email = '';
		$usernameSign = '';
		$passwordSign = '';
		$passwordProblem = "";
		$usernameProblem = "";
		$emailProblem = "";
	}else{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$rpassword = $_POST['rpassword'];
		$email = $_POST['email'];
		$passwordProblem = "";
		$usernameProblem = "";
		$emailProblem = "";
		$usernameResult = mysqli_query($link, "SELECT username FROM usertable WHERE username='".$username."'");
		$emailResult = mysqli_query($link, "SELECT email FROM usertable WHERE email='".$email."'");
		if(mysqli_num_rows($usernameResult) != 0){
			$usernameProblem = "<p style='color:red;'>That username already exists!</p>";
		}else if (strlen($username) < 6){
			$usernameProblem = "<p style='color:red;'>Your username must be longer than 5 characters!</p>";
		}
		else if ($username == ""){
			$usernameProblem = "<p style='color:red;'>Your username can not be left blank!</p>";
		}
		else if($password != $rpassword){
			//If password is not equal to the re password.
			$passwordProblem = "<p style='color:red;'>Password and Re-password are not the same!</p>";
		}else if($password == ""){
		
			$passwordProblem = "<p style='color:red;'>Your password can not be left blank!</p>";
		}else if(strlen($password) < 7){
		
			$passwordProblem = "<p style='color:red;'>Password must be greater than 7 characters!</p>";
		}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$emailProblem = "<p style='color:red;'>Email is not valid, please enter a real email!</p>";
		}else if(mysqli_num_rows($emailResult) != 0){
			$emailProblem = "<p style='color:red;'>Email is already in use!</p>";
		}else{
		$hashAndSalt = password_hash($password, PASSWORD_BCRYPT);
		$date = date('Y/m/d H:i:s');
		$sql = "INSERT INTO usertable
		(username,password,email,activated,joined)
		VALUES (
		'{$username}',
		'" . $hashAndSalt. "',
		'{$email}',
		0,
		'{$date}')";
		$createUser = mysqli_query($link,$sql);
		}
		
		
	
		
		// When signing in Fetch hash+salt from database, place in $hashAndSalt variable
		// and then to verify $password:
		//if (password_verify($password, $hashAndSalt)) {
		// Verified	
		
	}
	session_start();
	if(isset($_SESSION["username"])){
		header("location:../Home");
	}
	
	
	if(!isset($_POST['usernameSign'])){
		//PROBLEM = QUERY IS NOT STRING IT IS AN OBJECT
		$usernameSign = '';
		$passwordSign = '';
		$signInError = "<p>Please sign in</p>";
		
	}else{
		$usernameSign = $_POST['usernameSign'];
		$passwordSign = $_POST['passwordSign'];
		$hash = mysqli_query($link, "SELECT password FROM usertable WHERE username='". $usernameSign ."'");
		$hash2 = mysqli_fetch_assoc($hash);
		$passwordfromServer = $hash2["password"];
		
		if (password_verify($passwordSign, $passwordfromServer)) {
			$signInError = "<p style='color:green;'>You are signed in as " . $usernameSign ."</p>";
			session_start();
			$_SESSION['loggedin'] = true;
			$_SESSION['username'] = $usernameSign;
			header("location:../home");
			
		}else{
			session_start();
			$_SESSION['loggedin'] = false;
			$signInError = "<p style='color:red;'>Incorrect Username or password</p>";
		}
	}
	
include 'register.php';
	
	
?>