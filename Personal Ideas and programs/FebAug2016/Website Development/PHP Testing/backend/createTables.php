<?php
	//INCLUDE CONNECT.php
	include "connect.php";
	//////////////////
	
	$checkTable = mysqli_query($con, "SELECT * FROM user");
	
	if(empty($checkTable)){
		$createTable = mysqli_query($con, "CREATE TABLE user(
		id INT(6) PRIMARY KEY AUTO_INCREMENT,
		firstname VARCHAR(255),
		lastname VARCHAR(255),
		username VARCHAR(155),
		password VARCHAR(1000),
		email VARCHAR(255),
		verified VARCHAR(1),
		
		)");
	}
	
	//id is the id of the user and friend will be listed as like 1,2,3,6,8,9,10,11,135
	$checkTable = mysqli_query($con, "SELECT * FROM friends");
	if(empty($checkTable)){
		$createTable = mysqli_query($con, "CREATE TABLE friends(
		id INT(6),
		friends VARCHAR(255)
		)");
	}
	
	//id is the person who the other person wants to be friends with, and otherid is the id of the other person.
	$checkTable = mysqli_query($con, "SELECT * FROM pending");
	if(empty($checkTable)){
		$createTable = mysqli_query($con, "CREATE TABLE pending(
		id INT(6),
		otherid INT(6)
		
		
		
		
		
		)");
	}
	
	
?>