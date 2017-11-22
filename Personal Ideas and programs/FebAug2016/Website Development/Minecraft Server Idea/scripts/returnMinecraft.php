	<?php
	include "connection.php";
	include "functions.php";
	if(isset($_GET["players"])){
		$players = "";
		$conn = getDBH();
		$stmt = $conn->prepare("SELECT * FROM players");
		//Execute
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();
		while($row = $result->fetch_assoc()) {
			$players = $players . $row["playername"];
		}
		echo $players;
	}
	
	if(isset($_GET["online"])){
		$socket = @fsockopen("serenityus.noip.me",25566, $errno, $errstr, 0.1);
		if ($socket !== false) {
			@fwrite($socket, "\xFE");
			$data = "";
			$data = @fread($socket, 1024);
			@fclose($socket);
			if ($data !== false && substr($data, 0, 1) == "\xFF") {
				$info = explode("\xA7", mb_convert_encoding(substr($data,1), "iso-8859-1", "utf-16be"));
				$serverName = substr($info[0], 1);
				$playersOnline = $info[1];
				$playersMax = $info[2];
				return $playersOnline . "/" . $playersMax;
			} else {
				// Server did not send back proper data, or reading from socket failed.
				echo "Server is down";
			}
		} else {
			// Can't connect. Server is probably down.
			echo "Server is down";
		}
	}
		
	
	
	?>