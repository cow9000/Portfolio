<?php
	//SYSTEM - 
	//first when you get sent the link it should look like this blahblahblah.com/?confirmation=43845893489349825&id=1
	//Then it checks if confirmation is equal to the md5
	$conn = mysqli_connect("localhost","buildm10_bmb","!billsyall@.c","buildm10_bmb");
	$getDailyMessage = mysqli_query($conn, "SELECT * FROM dailymessage WHERE id=1");
	$getDaily2 = mysqli_fetch_assoc($getDailyMessage);
	$dailyMessage = $getDaily2["message"];
	
				
				
	if(isset($_GET["confirmation"])){
		if(isset($_GET["id"])){
			$encrypt = md5(1290*3+$_GET['id']);
			if($_GET["confirmation"] == $encrypt){
				//Makes sure the ?confirmation equals what it is supposed to.
			}else{
				header("location:../home/");
			}
		}else{
			header("location:../home/");
		}
	}else{
		header("location:../home/");
	}
	
			if(isset($_POST["password"])){
				if($_POST["password"] == $_POST["repassword"]){
					$getEmail = mysqli_query($conn, "SELECT * FROM members WHERE id='" . $_GET['id'] . "'");
					$getEmail2 = mysqli_fetch_assoc($getEmail);
					$check = mysqli_query($conn,"SELECT * FROM resetPassword WHERE email='" . $getEmail2["email"] . "'");
					if(mysqli_num_rows($check) >= 1){
						$password = password_hash($_POST["password"],PASSWORD_BCRYPT);
						
						mysqli_query($conn, "UPDATE members SET password='" . $password . "' WHERE id=" . $_GET["id"]);
						mysqli_query($conn, "DELETE FROM resetPassword WHERE email='" . $getEmail2["email"]  . "'");
						header("location:../home/");
						
					}else{
						header("location:../home/");
					}
				}
			}

	include "../footer.php";
	include "../navagation.php";
	include "fps2.php";
?>