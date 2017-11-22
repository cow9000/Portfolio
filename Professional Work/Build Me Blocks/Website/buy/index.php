<?php
	$conn = mysqli_connect("localhost","buildm10_bmb","!billsyall@.c","buildm10_bmb");
	$getDailyMessage = mysqli_query($conn, "SELECT * FROM dailymessage WHERE id=1");
	$getDaily2 = mysqli_fetch_assoc($getDailyMessage);
	$dailyMessage = $getDaily2["message"];
	session_start();
	$welcomeUser = "<a href='../login'>Member Login</a> / <a href='../register'>register</a>";
	$username = "";
	$v = "";
	$value = "<option value ='XXXXX'>--- SELECT A PRODUCT ---</option>";
	$i = 0;
	if(isset($_SESSION["username"])){
		$welcomeUser = "Welcome back <a href='../settings'>" . $_SESSION["username"] . "</a><br><a href='../logout'>Logout here</a>";
		$username = $_SESSION["username"];
		
		$result = mysqli_query($conn, "SELECT * FROM programs WHERE disabled = 'f'");
		while($row = mysqli_fetch_assoc($result)){
		
			$value = $value . "<option data-id='" . $row["descr"]. "||||||" . $row["price"] . "||||||" . $i . "' value = '" . $row["name"] . "'>" . $row["name"] . "</option>";
			$v = $v . "<input type='hidden' name='option_select" . $i . "' value='" . $row["name"] . "'><input type='hidden' name='option_amount" . $i . "' 			value= '". $row["price"] . "'>
			
			
			";
			
			$i += 1;
		}
		
	}
	
	
	if(isset($_SESSION["username"])){
		$username = $_SESSION["username"];
		include "../footer.php";
		include "../navagation.php";
		include "buy2.php";
	}else{
		$_SESSION["redirect"] = "buy";
		header("location:../login");
	}
?>