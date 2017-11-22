<?php
	//SYSTEM - 
	//first when you get sent the link it should look like this blahblahblah.com/?confirmation=43845893489349825&id=1
	//Then it checks if confirmation is equal to the md5
	$conn = mysqli_connect("localhost","root","thechickenninja","bmb");
	
				
				
	if(isset($_GET["confirmation"])){
		if(isset($_GET["id"])){
			$encrypt = md5(1290*3+$_GET['id']);
			if($_GET["confirmation"] == $encrypt){
				//Makes sure the ?confirmation equals what it is supposed to.
			}else{
				header("location:about.php");
			}
		}else{
			header("location:about.php");
		}
	}else{
		header("location:about.php");
	}
	
			if(isset($_POST["password"])){
				if($_POST["password"] == $_POST["repassword"]){
					$password = password_hash($_POST["password"],PASSWORD_BCRYPT);
					mysqli_query($conn, "UPDATE members SET password='" . $password . "' WHERE id=" . $_GET["id"]);
					header("location:about.php");
				}
			}


	session_start();
	$welcomeUser = "<a href='login.php'>Member Login</a> / <a href='register.php'>register</a>";
	if(isset($_SESSION["username"])){
		$welcomeUser = "Welcome back <a href='settings.php'>" . $_SESSION["username"] . "</a><br><a href='logout.php'>Logout here</a>";
	}
	include "fps2.php";
?>