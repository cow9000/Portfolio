<?php
	if(isset($_GET["password"])){
		if($_GET["password"] == "AJV38329jvia81uv8ioALgia39"){
			session_start();
			if($_GET["player"] == $_SESSION["username"]){
				include "functions.php";
				$conn = getDBH();
				$stmt =  $conn->stmt_init();
				$stmt -> prepare("INSERT INTO outputChat (playername, chat, date) VALUES (?, ?, NOW())");
				$stmt->bind_param("ss", $name, $chat);
				// insert one row
				$name = $_GET["player"];
				$chat = $_GET["chat"];
				$stmt->execute();
			}else{
				echo "You really are that stupid huh?";
			}
		}
	}else{
		echo "You really are that stupid huh?";
	}
?>