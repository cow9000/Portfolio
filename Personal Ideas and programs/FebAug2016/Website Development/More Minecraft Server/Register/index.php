<?php
	$dataname = "rpserver";
	$datapassword = "thechickenninja";
	$dataconnect = "localhost";
	
	$conn = mysqli_connect("localhost","root","thechickenninja","rpserver");
	
	
	
	
	
	if($conn -> connect_error){
		echo "Error - could not connect to database.";
	}
		
	if(!mysqli_set_charset($conn,'utf8')){
		$output = "Unable to set database connection encoding.";
	}
	
	if(!mysqli_select_db($conn, "rpserver")){
		$output = "Unable to locate Database";
	}
	
	session_start();
	if(isset($_SESSION["username"])){
		header("location:../Home");
	}
	
	if(!isset($_SESSION["username"])){
		$rl = "<a id='login' href='../login' style='display:inline;'>Login</a><p style='display:inline;'> / </p> <a style='display:inline;' id='register' href='../register'>Register</a>";
	}else{
		$rl="<p>Welcome back " . $_SESSION["username"] ."</p> <a id='register' href='../logout?logout=" . "true" ."'>Logout</a>";
	}
	
	
	$error = "";
	$success = "";
	if(isset($_POST["username"])){
		$username = htmlspecialchars($_POST["username"]);
		$password = htmlspecialchars($_POST["password"]);
		$retypepassword = htmlspecialchars($_POST["retypepassword"]);
		$email = htmlspecialchars($_POST["email"]);
		$date = date('Y/m/d H:i:s');
		$getUsers = mysqli_query($conn, "SELECT username FROM users WHERE username = '" . $username . "'");
		$getEmail = mysqli_query($conn, "SELECT email FROM users WHERE email='".$email."'");
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			if(strlen($password) > 6){
				if($password === $retypepassword){
					if(!$getUsers || mysqli_num_rows($getUsers) == 0){
						if(!$getEmail || mysqli_num_rows($getEmail) == 0){
							$password2 = password_hash($password, PASSWORD_BCRYPT);
							$sql = mysqli_query($conn,"INSERT INTO users(username, password, email, datejoined, verify, profileImage, minecraftName, admin) VALUES ('".$username."','".$password2."','".$email."', '".$date."' ,'false','../Images/profileImage.jpg','none','t')");
							$sql2 = mysqli_query($conn,"INSERT INTO bio(username,bio) VALUES ('". $username ."','not set yet')");
							$success = "<p style='color:green;'> You have created a account successfully!</p>";
						}else{
							$error = $error . "<br><p style='color:red;'>That email already exists!</p>";
						}
					}else{
						$error = $error . "<br><p style='color:red;'>That username already exists!</p>";
					}
				}else{
					$error = $error . "<br><p style='color:red;'>The retype password must be the same as the password.</p>";
				}
			}else{
				$error = $error . "<br><p style='color:red';>Your password needs to be greater than 6 characters </p>";
			}
		}else{
			$error = $error . "<br><p style='color:red;'>Email was not valid!</p>";
		}
		
	}else{
		$password = "";
		$retypepassword = "";
		$username = "";
		$email = "";
	}
	
	




include "register.php";

?>