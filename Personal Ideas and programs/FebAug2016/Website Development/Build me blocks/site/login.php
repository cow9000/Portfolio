<?php
	
	$conn = mysqli_connect("localhost","root","thechickenninja","bmb");
	$error = "";
	
	session_start();
	$welcomeUser = "<a href='login.php'>Member Login</a> / <a href='register.php'>register</a>";
	if(isset($_SESSION["username"])){
		$welcomeUser = "Welcome back <a href='settings.php'>" . $_SESSION["username"] . "</a><br><a href='logout.php'>Logout here</a>";
	}
	
	if(isset($_SESSION["username"])){
		header("location:about.php");
	}
	
	
	//members - id, username
	
	
	if(isset($_POST["username"])){
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$getAll = mysqli_query($conn, "SELECT * FROM members WHERE username='" . $username . "'");
		$getAll2 = mysqli_fetch_assoc($getAll);
		
		if($getAll || $getAll2 || mysqli_num_rows($getAll2) != 0){
			$dbPassword = $getAll2["password"];
			//password_hash($password, PASSWORD_BCRYPT);
			if(password_verify($password, $dbPassword)){
				$_SESSION["username"] = $username;
				$error = "hi";
				header("location:about.php");
				
			}else{ 
				$error = "<div style='width:350px; height:32px; border:2px solid red; margin:15px 0px; padding:5px 5px; border-radius:5px;'><p style='color:white;'>That username and password combination does not match!</p></div>";
			}
		}else{
			$error = "<div style='width:350px; height:32px; border:2px solid red; margin:15px 0px; padding:5px 5px; border-radius:5px;'><p style='color:white;'>That username and password combination does not match!</p></div>";
		}
	}
	
	include "login2.php";
?>