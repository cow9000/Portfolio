<?php
	//IF TABLES ARE DELETED OR NEED TO BE CREATED
	include "backend/createTables.php";
	include "backend/connect.php";
	/////////////////////////////////////////////
	
	if(isset($_POST["register"])){
		$username = $_POST["username"];
		$password = $_POST["password"];
			$salted = $_POST["password"]; //Hash and Salt
		
	}
	
	
	include "html.php";
?>