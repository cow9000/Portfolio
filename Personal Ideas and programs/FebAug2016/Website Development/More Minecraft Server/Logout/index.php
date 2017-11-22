<?php
	session_start();
	if(isset($_GET["logout"])){
		if($_GET["logout"] == "true"){
			$_SESSION['loggedin'] = false;
			session_unset();
			session_destroy();
			header("location:../home");
			exit();
		}
	}
	if(!isset($_SESSION["username"])){
		header("location:../home");
	}
	
	$username = $_SESSION["username"];
	
	

	include "logout.php";

?>