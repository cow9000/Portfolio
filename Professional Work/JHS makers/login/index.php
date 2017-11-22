<?php
	session_start();
	$login = "<li class='selected'><a href='../login/'>Login</a></li>";
	$register = "<li><a href='../register/'>Register</a></li>";
	$error = "";
	if(isset($_GET["error"])){
		$error = $_GET["error"];
	}
	
	if(isset($_SESSION["email"])){
		$login = "<li><a href='../dashboard/'>Dashboard</a></li>";
		$register = "";
		header("location:../dashboard/");
	}
	include "html.php";
?>