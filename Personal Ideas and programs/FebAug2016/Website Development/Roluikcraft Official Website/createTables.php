<?php
	$conn = mysqli_connect("localhost","root","thechickenninja","test");
	
	$createMember = "CREATE TABLE members(
					id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					username VARCHAR(50) NOT NULL,
					mcusername VARCHAR(36),
					email VARCHAR(255) NOT NULL,
					verified VARCHAR(1),
					strength INT(5) UNSIGNED,
					wisdom INT(5) UNSIGNED,
					stamina INT(5) UNSIGNED,
					charisma INT(5) UNSIGNED,
					intelligence INT(5) UNSIGNED,
					level INT(5) UNSIGNED,
					exp INT(10) UNSIGNED,
					class VARCHAR(50),
					race VARCHAR(50),
					donated VARCHAR(1))";
?>