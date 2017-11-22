<?php
	session_start();
	//Start session so it can check for username
	
	$username = "<a href='login.php'>Login</a>
				<p>or</p>
				<a href='register.php'>Register!</a>";
				
				
	if(isset($_SESSION["username"])){
		$username = "<p>Welcome back <a href='member.php?" . $_SESSION["username"] . "'>" . $_SESSION["username"] . "</a></p>";
	}
	
	
	
	include "Html/index.php";
?>