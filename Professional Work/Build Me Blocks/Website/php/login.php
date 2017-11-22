<?php
	
	$conn = mysqli_connect("localhost","root","thechickenninja","bmb");
	$error = "";
	
	session_start();
	$welcomeUser = "<a href='login.php'>Member Login</a>";
	if(isset($_SESSION["username"])){
		$welcomeUser = $_SESSION["username"];
	}
	
	if(isset($_SESSION["username"])){
		header("location:../about.php");
	}
	
	if(isset($_POST["username"])){
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$getAll = mysqli_query($conn, "SELECT * FROM members WHERE username='" . $username . "'");
		$getAll2 = mysqli_fetch_assoc($getAll);
		
		if(mysqli_num_rows($getAll2) != 0){
			$dbPassword = $getAll2["password"];
			//password_hash($password, PASSWORD_BCRYPT);
			if(password_verify($dbPassword, $password)){
				$_SESSION["username"] = $username;
				$error = "hi";
				header("location:../about.php");
			}else{
				$error = "<p style='color:red;'>That username and password combination do not match!</p>";
			}
		}else{
			$error = "<p style='color:red;'>That username and password combination do not match!</p>";
		}
	}
	
	include "login2.php";
?>