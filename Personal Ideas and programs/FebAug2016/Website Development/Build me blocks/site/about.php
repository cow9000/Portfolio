<?php
	
	$conn = mysqli_connect("buildmeblocks.com","buildm10_bmb","!billsyall@.c","buildm10_bmb");
	$recentPosts = "";
	$i = 0;
	
	session_start();
	$welcomeUser = "<a href='login.php'>Member Login</a> / <a href='register.php'>register</a>";
	if(isset($_SESSION["username"])){
		$welcomeUser = "Welcome back <a href='settings.php'>" . $_SESSION["username"] . "</a><br><a href='logout.php'>Logout here</a>";
	}
	
	$result = mysqli_query($conn, "SELECT * FROM blog ORDER BY time DESC");
	while($row = mysqli_fetch_assoc($result)){
	$i ++;
	if($i > 5){
		break;
	}
	$recentPosts = "<li><a href='blog.php?post=" . $row["title"] . "'>" . $row["title"] . "</a></li>" . $recentPosts;
	}
	
	include "index2.php";
?>