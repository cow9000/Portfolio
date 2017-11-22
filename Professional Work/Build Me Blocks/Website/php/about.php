<?php
	session_start();
	$welcomeUser = "<a href='login.php'>Member Login</a>";
	if(isset($_SESSION["username"])){
		$welcomeUser = $_SESSION["username"];
	}
	include "index2.php";
?>