<?php

	$link = mysqli_connect("localhost","root","thechickenninja","users");
	if(isset($_GET["logout"])){
		if($_GET["logout"] == "true"){
			session_start();
			$_SESSION['loggedin'] = false;
			session_unset();
			session_destroy();
			header("location:../home");
			exit();
		}
	}else{
		session_start();
	}

	if(!$link){
		$output = "Could not connect to database";
	}else{
		$output = "Connection to database was successful...";
	}
	
	if(!mysqli_set_charset($link,'utf8')){
		$output = "Unable to set database connection encoding.";
	}
	
	if(!mysqli_select_db($link, "users")){
		$output = "Unable to locate Users Database";
	}

	
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		$signlogged = "<p id='para'>Welcome to Coders Companion " . "<br><a href='../members'>" .$_SESSION['username'] . "</a>" . "." . "<br><a href='?logout=true'>Logout?</a></p>";
		$sign = "Welcome back!";
	} else {
		$username = "<a href='../register'>Register or login</a>";
		$signlogged = "<p id='para'>Have you ever wanted to invent something
		that would change the world? Well, I did, that is why I started this website, I wanted to teach others
		 how to program, in this generation we are going into a world of code.
		 And I have a mission to teach people how to talk computer,
		 and you may be asking, why are we better? We are better because
		 we don't care for the money, we care for your success!</p>
		<a href='../register' id='smallT'>Register or login</a>";
		$sign = "Sign up!";
	}
	
include 'home.php'


?>