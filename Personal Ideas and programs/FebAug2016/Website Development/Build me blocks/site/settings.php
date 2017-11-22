<?php
	session_start();
	$conn = mysqli_connect("localhost","root","thechickenninja","bmb");
	$member = "<p>Member status - </p>";
	$error = "";
	$np = "";
	if(isset($_POST["password"])){
		$password2 = mysqli_query($conn, "SELECT * FROM members WHERE username = '" . $_SESSION["username"] . "'");
		$password = mysqli_fetch_assoc($password2);
		if($_POST["2password"] != ""){
			if($_POST["repassword"] != ""){
				if($_POST["2password"] == $_POST["repassword"]){
					if(password_verify($_POST["password"],$password["password"])){
						$password2 = password_hash($_POST["2password"],PASSWORD_BCRYPT);
						mysqli_query($conn, "UPDATE members SET password='" . $password2 . "' WHERE id=" . $password["id"]);
						$error = "<p style='color:green;'>Password has been changed</p>";
						//INSERT MAILING TO PERSONS ACCOUNT
					}else{
						$error = "<p style='color:red;'>Incorrect password!</p>";
					}
					
				}else{
					$error = "<p style='color:red;'>The two passwords do not match!</p>";
				}
				
				
			}
		}
	}
	
	
	
	
	
	
	$welcomeUser = "<a href='login.php'>Member Login</a> / <a href='register.php'>register</a>";
	if(isset($_SESSION["username"])){
		$welcomeUser = "Welcome back <a href='settings.php'>" . $_SESSION["username"] . "</a><br><a href='logout.php'>Logout here</a>";
		$isAdmin = mysqli_query($conn,"SELECT * FROM members WHERE admin='t' AND username='" . $_SESSION["username"] . "'");
		if(mysqli_num_rows($isAdmin) >= 1){
			header("location:memberPage.php");
		}
	}else{
		header("location:about.php");
	}
	include "settings2.php";
?>