<?php
	include "connection.php";
	$chat = "";
	//In here
	$getChat = mysqli_query($conn, "SELECT * FROM chat ORDER BY date");
	while($row = mysqli_fetch_assoc($getChat)){
	
		$chat = $row["date"] . " - " . $row["playername"] . ": " . str_replace('_', ' ', $row["chat"]) . "<br>" . $chat;
	}
	echo $chat;
?>