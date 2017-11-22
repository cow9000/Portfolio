<?php
	include "connection.php";
	
	$check = mysqli_query($conn, "SELECT * FROM users");
	if(empty($check)){
		$createTable = mysqli_query($conn, "CREATE TABLE users(
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			username VARCHAR(255),
			password VARCHAR(500),
			email VARCHAR(355),
			verified VARCHAR(1),
			minecraftUUID VARCHAR(500)
		)");
		//BCRYPT
		$password = password_hash("thechickenninja84", PASSWORD_DEFAULT);
		$insertUser = mysqli_query($conn, "INSERT INTO users(username,password,email,verified,minecraftUUID) VALUES ('cow9000', '" . $password . "', 'flyingpiechicken@gmail.com','t','377be650-7756-4346-8442-88c20fed1366')");
	}
	
	//Code to check if code is in database for minecraft user
	$check = mysqli_query($conn, "SELECT * FROM minecraftCode");
	if(empty($check)){
		$createTable = mysqli_query($conn, "
		CREATE TABLE minecraftCode(
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			UUID VARCHAR(255),
			code VARCHAR(5000)
		)
		
		
		
		
		
		");
		$insertUser = mysqli_query($conn, "INSERT INTO admin(username) VALUES ('cow9000')");
	}
	
	
	$check = mysqli_query($conn, "SELECT * FROM blog");
	if(empty($check)){
		$createTable = mysqli_query($conn, "CREATE TABLE blog(
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			poster VARCHAR(255),
			text VARCHAR(500),
			date TIMESTAMP
		)");
		$insertBlog = mysqli_query($conn, "INSERT INTO blog (poster,text,date) VALUES ('cow9000','AUSDHAWODHAOIHDIOSAHDIOWHAIOSHDIOWHAIODHAWIODHIOAWHDIOASHDIOWHAIODHIOWHDIOWAHSIODHIWOAHISODHIWOAHSIDHWIOAHSDIOHWAIOSHDIOWHAIOSDHIOWAHSIODHWAIODSDW','1') ");
	}
	
	$check = mysqli_query($conn, "SELECT * FROM admin");
	if(empty($check)){
		$createTable = mysqli_query($conn, "
		CREATE TABLE admin(
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			username VARCHAR(255)
		)
		
		
		
		
		
		");
		$insertUser = mysqli_query($conn, "INSERT INTO admin(username) VALUES ('cow9000')");
	}
	$check = mysqli_query($conn, "SELECT * FROM chat");
	if(empty($check)){
		$createTable = mysqli_query($conn, "
		CREATE TABLE chat(
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			playername VARCHAR(500),
			chat VARCHAR(500),
			date TIMESTAMP
		)
		
		
		
		
		
		");
	}
	
	$check = mysqli_query($conn, "SELECT * FROM outputChat");
	if(empty($check)){
		$createTable = mysqli_query($conn, "
		CREATE TABLE outputChat(
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			playername VARCHAR(500),
			chat VARCHAR(500),
			date TIMESTAMP
		)
		
		
		
		
		
		");
	}
	
	
	$check = mysqli_query($conn, "SELECT * FROM players");
	if(empty($check)){
		$createTable = mysqli_query($conn, "
		CREATE TABLE players(
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			playername VARCHAR(500),
			uuid VARCHAR(200)
		)
		
		
		
		
		
		");
	}
	
?>