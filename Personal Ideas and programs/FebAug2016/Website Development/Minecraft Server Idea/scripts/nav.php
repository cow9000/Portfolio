<?php
	include "connection.php";
	include "createTables.php";
	include "functions.php";
	session_start();
	$memberInfo = "<p><a href='login.php'>Login</a>, or <a href='login.php'>Register</a></p>";
	$username = "";
	
	$nav = "
		<li><a href='index.php'>Home</a></li>
		<li><a href='chat.php'>Chat</a></li>
		<li><a href='#'>Donate</a></li>
		<li><a href='#'>Forum</a></li>
		<li><a href='#'>Storyline</a></li>
	";
	
	if(isset($_SESSION["username"])){
		$username = $_SESSION["username"];
		$userInfo = mysqli_query($conn, "SELECT * FROM users WHERE username='" . $_SESSION["username"] . "'");
		$fetchInfo = mysqli_fetch_assoc($userInfo);
		$getId = $fetchInfo["id"];
		$memberInfo = "Welcome back <a href='profile/?id=" . $getId . "'>" . $_SESSION["username"] . "</a>" . "<a style='float:right; margin-right:16px;' href='logout.php'>Logout</a>";
		if(isset($_GET["uuid"])){
			if(validUUID($_GET["uuid"])){
				echo "Valid";
			}else{
				echo "Invalid";
			}
		}
	}else{
		if(isset($_GET["uuid"])){
			if(validUUID($_GET["uuid"])){
				//They need to set up an account.
				header("location:login.php?uuid=" . $_GET["uuid"]);
				echo "Valid";
			}else{
				echo "Invalid";
			}
		}
	}
?>