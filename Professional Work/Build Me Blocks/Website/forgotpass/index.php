<?php
	$conn = mysqli_connect("localhost","buildm10_bmb","!billsyall@.c","buildm10_bmb");
	$getDailyMessage = mysqli_query($conn, "SELECT * FROM dailymessage WHERE id=1");
	$getDaily2 = mysqli_fetch_assoc($getDailyMessage);
	$dailyMessage = $getDaily2["message"];
	$error = "";
	if(isset($_POST["email"])){
		$getEmail = mysqli_query($conn, "SELECT * FROM members WHERE email='" . $_POST["email"] . "'");
		$getEmail2 = mysqli_fetch_assoc($getEmail);
		if(!mysqli_num_rows($getEmail) >= 1){
			$error = "<p style='color:green;'>An email has been sent to your email address</p>";
		}else{
			$getId = mysqli_fetch_assoc($getEmail);
			#header("location:http://localhost:8080/build%20me%20blocks/site/fps.php?confirmation=" . md5(1290*3+$getId["id"]). "&id=" . $getId["id"] . "");
			$to = $_POST["email"];
			$subject = 'Build ME Blocks - Password Recovery';
			$message = "Hi " .  $getEmail2["firstname"] . ", you(or someone pretending to be you) recently asked for your password to be reset.<br>   <Br><a href='http://buildmeblocks.com/site/fps?confirmation=" . md5(1290*3+$getEmail2['id']) . "&id=" . strval($getEmail2['id']) . "/'>Click here to reset your password</a><br>   <br>If you did not request a password change, we would suggest immediently changing your password.";
			$headers = 'From: noreply@buildmeblocks.com';
			$headers = $headers . "MIME-Version: Build ME Blocks password reset\r\n";
			$headers = $headers . "Content-Type: text/html; charset=ISO-8859-1\r\n";

			mail($to, $subject, $message, $headers);
			$error = "<p style='color:green;'>An email has been sent to your email address</p>";
			$check = mysqli_query($conn,"SELECT `email` FROM `resetPassword` WHERE `email` ='" . $_POST["email"] . "'");
			if(!mysqli_num_rows($check) >= 1){
			
				mysqli_query($conn,"INSERT INTO `resetPassword`(`email`) VALUES ('" . $_POST["email"] . "')");
			
			}
		}
	
	}
	include "../footer.php";
	include "../navagation.php";
	include "forgotpass2.php";
?>