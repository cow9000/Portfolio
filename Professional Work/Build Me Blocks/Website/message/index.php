<?php
	session_start();
	$_SESSION["redirect"] = "message";
	$added = "";
	if(isset($_SESSION["username"])){
		if(isset($_POST["name"])){
			$get = mysqli_query($conn, "SELECT * FROM members WHERE kid = 't' AND username='" . $_SESSION["username"] . "'");
			if($get){
				$added = "This email does not have permission to be on the blog.";
			}
					$to      = "melissa@buildmeblocks.com";
					$subject = "Max and Elena - " . $_SESSION["username"];
					$message = "From user - '" . $_SESSION["username"] . "'<br><br>Message - '" . $_POST["message"] . "<br><Br>" . $added;
					$headers = 'From: contactform@buildmeblocks.com' . "\r\n" .
					    'Reply-To: " . "contactform@buildmeblocks.com" . "' . "\r\n" .
					    'X-Mailer: PHP/' . phpversion();
					    $headers .= "MIME-Version: 1.0\r\n";

$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
					
					mail($to, $subject, $message, $headers);
		}
	}else{
		header("location:../login");
	}
	include "../footer.php";
	include "../navagation.php";
	include "contact2.php";
?>