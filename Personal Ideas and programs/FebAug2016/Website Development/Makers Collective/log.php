<?php
	$error = "";
	session_start();
	if(isset($_POST["password"])){
		if(isset($_POST["username"])){
			if($_POST["password"] == "wanttoaccess"){
				if($_POST["username"] == "usernameiscool"){
					$_SESSION["username"] = "admin";
					header("location:index.php");
				}else{
					$error = "<p style='color:red;'>Incorrect username/password combination.</p>";
				}
			}else{
				$error = "<p style='color:red;'>Incorrect username/password combination.</p>";
			}
		}
	}


	include "html/login.php";
?>