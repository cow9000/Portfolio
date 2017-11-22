<?php
	$blog = "<a href='?create'>Create more events</a>";
	$path = "information/blogPosts/";
	$style="<style>";
	$anchor = "";
	$current = 0;
	$admin = "";
	$blog = "";
	$recent = "";
	session_start();
	if ($handle = opendir($path)) {
	    while (false !== ($file = readdir($handle))) {
 	       if ('.' === $file) continue;
 	       if ('..' === $file) continue;
			$myfile = fopen("information/blogPosts/" . $file, "r") or die("Unable to open file!");
			$i = 0;
			$title = "";
			$date = "";
			$content = "";
			
			while(!feof($myfile)){
				if($i == 0){
					$title = fgets($myfile);
					$title = trim(preg_replace('/\s+/', ' ', $title));
				}else if($i == 1){
					$date = fgets($myfile);
				}else if($i == 2 || $i > 2){
					$content = $content . fgets($myfile);
				}
				$i++;
			}
			if(isset($_SESSION["username"])){
				$admin = "<a href='?delete=" . $file . "'> - DELETE</a>";
				$admin = $admin . "<a href='?edit=" . $file . "'> - EDIT</a>";
			}
			$blog = $blog . "<a name='" . $current . "'></a><p class='title Btitle" . $current . "'>" . $title . "</p>" . $admin;
			$blog = $blog . "<p>Date - " . $date . "</p>";
			$blog = $blog . "<p>" . $content . "</p>";
			if($i <=5){
				$anchor=$anchor . "<a class='link' href='#" . $current . "'>" . $title . "</a><br>";
			}
			
			
			$current++;
			$title = "";
			$content = "";
			fclose($myfile);
			
			
	    }
	    closedir($handle);
	}
	
	if(isset($_SESSION["username"])){
		$admin = "<a href='?create'>Create new blogpost</a>";
		if(isset($_GET["delete"])){
			unlink("information/blogPosts/" . $_GET["delete"]);
			header("location:blog.php");
		}else if(isset($_GET["create"])){
			$blog = "
			<form method='POST' action='blog.php'>
				Title of blogpost - <input type='text' name='title' placeholder='Title of blogpost'></input>
				Content of blogbost <br>
				<textarea name='descr' placeholder='Content of blogpost'></textarea>
				<input type='hidden' name='date' value='" . date("Y-m-d") . "'></input>
				<input type='submit' value='Create blogpost'></input>
			</form>
			";
		}
		else if(isset($_GET["edit"])){
			$i = 0;
			$titleEDIT = "";
			$dateEDIT = "";
			$descrEDIT = "";
			$myfile = fopen("information/blogPosts/" . $_GET["edit"], "r") or die("Unable to open file!");
			
			while(!feof($myfile)){
				if($i == 0){
					$titleEDIT = fgets($myfile);
					$titleEDIT = trim(preg_replace('/\s+/', ' ', $titleEDIT));
				}else if($i == 1){
					$dateEDIT = fgets($myfile);
				}else if($i >= 2){
					$descrEDIT = $descrEDIT . fgets($myfile);
				}
				$i++;
			}
			
			
			$blog="<form action='blog.php' method='POST'>Event name - <input type='text' placeholder='Title of blogpost' name='titleEDIT' value='" . $titleEDIT . "'></input><br><br>";
			$blog=$blog . "<input type='hidden' name='dateEDIT' value='" . $dateEDIT . "'></input><br><br>";
			$blog=$blog . "Event description<br><textarea placeholder='Content of blogpost' name='descrEDIT'>" . $descrEDIT . "</textarea><input type='hidden' name='filenameEDIT' value='" . $_GET["edit"] . "'></input>";
			$blog=$blog . "<input type='submit' value='Edit Blogpost'></input>";
			$blog = $blog . "</form>";
		}
		
		if(isset($_POST["titleEDIT"]) && isset($_POST["descrEDIT"])){
			unlink("information/blogPosts/" . $_POST["filenameEDIT"]);
			$myfile = fopen("information/blogPosts/" . $_POST["filenameEDIT"] . ".txt", "w") or die("Unable to open file!");
			$txt = $_POST["titleEDIT"] . "\n";
			fwrite($myfile, $txt);
			$txt = $_POST["dateEDIT"] . "\n";
			fwrite($myfile, $txt);
			$txt = $_POST["descrEDIT"];
			fwrite($myfile, $txt);
			fclose($myfile);
			header("location:blog.php");
		}
		
		if(isset($_POST["title"]) && isset($_POST["date"])){
			$_POST["date"] = str_replace("/", "-", $_POST["date"], $_POST["date"]);
			if(file_exists("information/blogPosts/" . $_POST["date"] . ".txt")){
				
				$myfile = fopen("information/blogPosts/" . $_POST["date"] . "(" . rand(1, 1000) . ").txt", "w") or die("Unable to open file!");
			}else{
							$myfile = fopen("information/blogPosts/" . $_POST["date"] . ".txt", "w") or die("Unable to open file!");
			}
			$txt = $_POST["title"] . "\n";
			fwrite($myfile, $txt);
			$txt = $_POST["date"] . "\n";
			fwrite($myfile, $txt);
			$txt = $_POST["descr"];
			fwrite($myfile, $txt);
			fclose($myfile);
			header("location:blog.php");
		}
		
	}else{
		$admin = "";
	}
	include "html/blog.php";
?>