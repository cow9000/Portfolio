<?php
	if(isset($_GET["password"])){
		if($_GET["password"] == "IlU2Vt33zcoamEjDlajBU1USo4o3O"){
			include "functions.php";
			$conn = getDBH();
			$stmt =  $conn->stmt_init();
			$stmt -> prepare("INSERT INTO chat (playername, chat, date) VALUES (?, ?, NOW())");
			$stmt->bind_param("ss", $name, $chat);
			// insert one row
			$name = $_GET["player"];
			$chat = $_GET["chat"];
			$stmt->execute();
		}else{
		echo "You really are that stupid huh?";
	}
	}else{
		echo "Requires password";
	}
?>