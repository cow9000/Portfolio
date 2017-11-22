<?php
	
	$conn = mysqli_connect("localhost","buildm10_bmb","!billsyall@.c","buildm10_bmb");
	$getDailyMessage = mysqli_query($conn, "SELECT * FROM dailymessage WHERE id=1");
	$getDaily2 = mysqli_fetch_assoc($getDailyMessage);
	$dailyMessage = $getDaily2["message"];
	$error = "";
	
	session_start();
	$welcomeUser = "<a href='../login'>Member Login</a> / <a href='../register'>register</a>";
	if(isset($_SESSION["username"])){
		$welcomeUser = "Welcome back <a href='../settings'>" . $_SESSION["username"] . "</a><br><a href='logout'>Logout here</a>";
	}
	
	if(isset($_SESSION["username"])){
		
		header("location:../settings");
		
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
				
				if(isset($_SESSION["redirect"])){
					if($_SESSION["redirect"] == "buy"){
						$_SESSION["redirect"] = null;
						header("location:../buy");
					}else if($_SESSION["redirect"] == "main"){
						$_SESSION["redirect"] = null;
						header("location:../home/");
					}else if($_SESSION["redirect"] == "message"){
						$_SESSION["redirect"] = null;
						header("location:../message/");
					}
					else{
						header("location:../buy");
					}
				}else{
					header("location:../settings");
				}
				
			}else{ 
				$error = "<div style='width:350px; height:32px; border:2px solid red; margin:15px 0px; padding:5px 5px; border-radius:5px;'><p style='color:white;'>That username and password combination does not match!</p></div>";
			}
		}else{
			$error = "<div style='width:350px; height:32px; border:2px solid red; margin:15px 0px; padding:5px 5px; border-radius:5px;'><p style='color:white;'>That username and password combination does not match!</p></div>";
		}
	}
	
	
	include "../navagation.php";
	include "../footer.php";
	include "login2.php";
?>