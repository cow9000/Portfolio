<?php
	session_start();
	$login = "<li><a href='../login/'>Login</a></li>";
	$error = "";
	if(isset($_GET["error"])){
		$error = $_GET["error"];
	}
	
	if(isset($_SESSION["email"])){
		$login = "<li><a href='../dashboard/'>Dashboard</a></li>";
		header("location:../dashboard/");
	}
	include "html.php";
?>