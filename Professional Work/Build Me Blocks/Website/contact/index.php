<?php
		if(isset($_POST["name"])){
					$to      = "melissa@buildmeblocks.com";
					$subject = "Message sent by user - " . $_SESSION["username"];
					$message = "From user - '" . $_SESSION["username"] . "', Phone number - " . $_POST["phoneNumber"] . "<br><br><br><br><br><br> Message - '" . $_POST["message"] . "<br><br>To reply to this message, send a email to this users email - " . $_POST["email"];
					$headers = 'From: contactform@buildmeblocks.com' . "\r\n" .
					    'Reply-To: " . "contactform@buildmeblocks.com" . "' . "\r\n" .
					    'X-Mailer: PHP/' . phpversion();
					    $headers .= "MIME-Version: 1.0\r\n";

$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
					
					mail($to, $subject, $message, $headers);
		}
	include "../footer.php";
	include "../navagation.php";
	include "contact2.php";
?>