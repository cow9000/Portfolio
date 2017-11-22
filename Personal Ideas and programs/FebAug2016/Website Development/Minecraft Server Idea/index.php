<?php
	include "scripts/nav.php";
	
	$getBlogInfo = mysqli_query($conn, "SELECT * FROM blog ORDER BY date ASC");
	$news = "";
	while($row = mysqli_fetch_assoc($getBlogInfo)){
		$news = "asdasd";
	}
	
	include "pages/home.php";
?>