<?php

	function getDBH(){
		static $DBH = null;
		if (is_null($DBH)) {
			$DBH =  new mysqli("localhost","root","thechickenninja","server");
		}
		return $DBH;
	}
	function isAdmin($username){
		$conn = getDBH();
		$stmt = $conn->prepare("SELECT * FROM admin WHERE username=?");
		//Bind first ? to String and username
		$stmt->bind_param("s", $username);
		//Execute
		$stmt->execute();
		//Store the results
		$stmt->store_result();
		//Get the results
		$result = $stmt->num_rows;
		//Get the number of rows
		//and then close
		$stmt->close();
		if($result > 0){
			return true;
		}
		
		return false;
	
	}
	function validUUID($code){
		$conn = getDBH();
		$stmt = $conn->prepare("SELECT * FROM minecraftCode WHERE code=?");
		//Bind first ? to String and code
		$stmt->bind_param("s", $code);
		//Execute
		$stmt->execute();
		//Store the results
		$stmt->store_result();
		//Get the results
		$result = $stmt->num_rows;
		//Get the number of rows
		//and then close
		$stmt->close();
		if($result > 0){
			return true;
		}
		
		return false;
	}
	
	function getIp($host, $port) {
    $socket = @fsockopen($host, $port, $errno, $errstr,0.1);
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
            return true;
        } else {
            // Server did not send back proper data, or reading from socket failed.
            echo false;
        }
    } else {
        // Can't connect. Server is probably down.
        echo false;
    }
		
	}
	

	
?>