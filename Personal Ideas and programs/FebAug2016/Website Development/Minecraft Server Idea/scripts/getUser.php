<?php
	$user = "";
	session_start();
	if(isset($_SESSION["username"])){
		$user = $_SESSION["username"];
	}else{
		$user = "false";
	}
	echo $user;
?>