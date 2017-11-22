<?php
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
	
	
	if(!isset($_POST['loginuser'])){
		//PROBLEM = QUERY IS NOT STRING IT IS AN OBJECT
		$username = '';
		$password = '';
		$signInError = "<p>Please sign in</p>";
		
	}
	
	session_start();
	if(isset($_SESSION["username"])){
		header("location:../Home");
	}
	
	if(isset($_POST["loginuser"])){
		$username = htmlspecialchars($_POST["loginuser"]);
		$password = htmlspecialchars($_POST["loginpass"]);
		
		$hash = mysqli_query($conn, "SELECT password FROM users WHERE username='". $username ."'");
		
		if($hash){
			$hash2 = mysqli_fetch_assoc($hash);
			$hashPass = $hash2["password"];
			
		
			if(password_verify($password, $hashPass)){
				$signInError = "<p style='color:green;'>You are signed in as " . $usernameSign ."</p>";
				session_start();
				$_SESSION["username"] = $username;
				$_SESSION["loggedin"] = true;
				header("location:../Profile");
			}else{
				$signInError = "<p>The username or password was incorrect!</p>";
			}
		
		}else{
			$signInError = "<p>The username or password was incorrect!</p>";
		}
		
	}

	include "login.php";
	
?>