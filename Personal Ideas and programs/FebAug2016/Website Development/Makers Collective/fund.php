<?php
	$myfile = fopen("information/fund/page.txt", "r");
	$content = "";
	$body = "";
	session_start();
	if(isset($_SESSION["username"])){
		$content = "<a href='?edit'>Edit fundraising page.</a><br>";
	}
	
	while(!feof($myfile)){
		
		$body = $body . fgets($myfile);
		
	}
	
	$content = $content . $body;
	
	if(isset($_SESSION["username"])){
		if(isset($_GET["edit"])){
			$content = "
			<form method='POST' action='fund.php'>
				<textarea name='edit'>" . $body . "</textarea>
				<input type='submit' value='Edit page'></input>
			</form>
			";
		}
		if(isset($_POST["edit"])){
			unlink("information/fund/page.txt");
			$myfile = fopen("information/fund/page.txt", "w");
			$txt = $_POST["edit"] . "\n";
			fwrite($myfile, $txt);
			fclose($myfile);
			header("location:fund.php");
		}
	}
	
	include "html/fund.php";
?>