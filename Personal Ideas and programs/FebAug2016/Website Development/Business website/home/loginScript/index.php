<?php
	session_start();
	if(isset($_SESSION["username"])){
		header("location:../../home");
	}else{
		if(isset($_POST["username"])){
			if($_POST["username"]=="monkeylegs"){
				if(isset($_POST["password"])){
					if($_POST["password"] == "chickenslovewings"){
						$_SESSION["username"] = "Hi";
						header("location:../../home");
					}else{
						header("location:../../home?error=Incorrect username and password combination");
					}
				}else{
					header("location:../../home?error=Incorrect username and password combination");
				}
			}else{
				header("location:../../home?error=Incorrect username and password combination");
			}
		}else{
			header("location:../../home?error=Incorrect username and password combination");
		}
	}
?>