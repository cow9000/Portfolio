<?php
	session_start();
	$login = "<li><a href='../login/'>Login</a></li>";
	$register = "<li><a href='../register/'>Register</a></li>";
	$error = "";
    $username = "Guest - <a href='../login'>Login?</a> <a href='../register'>Register?</a>";
	if(isset($_GET["error"])){
		$error = $_GET["error"];
	}
	
	if(isset($_SESSION["email"])){
		$login = "<li><a href='../dashboard/'>Dashboard</a></li>";
		$register = "";
	}
    
    if(isset($_SESSION["username"])){
    
        $username = "<a href='../dashboard/'>" . $_SESSION["username"] . "</a>";
    
    }
    
	include "html.php";
?>