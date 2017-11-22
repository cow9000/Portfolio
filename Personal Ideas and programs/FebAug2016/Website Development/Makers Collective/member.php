<?php
	$members = "";
	$path = "information/members/";
	$style="<style>";
	$anchor = "";
	$current = 0;
	$admin = "";
	session_start();
	if(isset($_SESSION["username"])) $members = "<a href='?create'>Create more members</a>";
	if ($handle = opendir($path)) {
	    while (false !== ($file = readdir($handle))) {
 	       if ('.' === $file) continue;
 	       if ('..' === $file) continue;
			$myfile = fopen("information/members/" . $file, "r") or die("Unable to open file!");
			$i = 0;
			$name = "";
			$desc = "";
			
			while(!feof($myfile)){
				if($i == 0){
					$name = fgets($myfile);
					$name = trim(preg_replace('/\s+/', ' ', $name));
				}else if($i >= 1){
					$desc = $desc . fgets($myfile);
				}
				$i++;
			}
			
			if(isset($_SESSION["username"])){
				$admin = "<a href='?delete=" . $file . "'> - DELETE</a>";
				$admin = $admin . "<a href='?edit=" . $file . "'> - EDIT</a>";
			}
			
			$members = $members . "<p class='title title" . $current . "'>" . $name . "</p>" . $admin;
			$members = $members . "<p>" . $desc . "</p>";
			$current++;
			fclose($myfile);
	    }
	    closedir($handle);
	}
	
	if(isset($_SESSION["username"])){
		if(isset($_GET["create"])){
			$members="<form action='member.php' method='POST'>Member name - <input type='text' placeholder='Name of member' name='title'></input><br><br>";
			$members=$members . "Member description<br><textarea placeholder='Description of member' name='descr'></textarea>";
			$members=$members . "<input type='submit' value='Create member'></input>";
			$style="<style>.t11::before{content:'CREATING NEW EVENT' !important;}</style>";
			$members = $members . "</form>";
		}
		if(isset($_POST["title"]) && isset($_POST["descr"])){
			if(file_exists("information/members/" . $_POST["descr"] . ".txt")){
				
				$myfile = fopen("information/members/" . $_POST["descr"] . "(" . rand(1, 1000) . ").txt", "w") or die("Unable to open file!");
			}else{
							$myfile = fopen("information/members/" . $_POST["date"] . ".txt", "w") or die("Unable to open file!");
			}
			$txt = $_POST["title"] . "\n";
			fwrite($myfile, $txt);
			$txt = $_POST["descr"];
			fwrite($myfile, $txt);
			fclose($myfile);
			header("location:member.php");
		}
		if(isset($_GET["delete"])){
			$myFile = "information/members/" . $_GET["delete"];
			unlink($myFile);
			header("location:member.php");
		}
		if(isset($_GET["edit"])){
			$i = 0;
			$titleEDIT = "";
			$dateEDIT = "";
			$descrEDIT = "";
			$myfile = fopen("information/members/" . $_GET["edit"], "r") or die("Unable to open file!");
			
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
			
			
			$members="<form action='member.php' method='POST'>Member name - <input type='text' placeholder='Name of member' name='titleEDIT' value='" . $titleEDIT . "'></input><br><br>";
			$members=$members . "Member description<br><textarea placeholder='Description of member' name='descrEDIT'>" . $descrEDIT . "</textarea><input type='hidden' name='filenameEDIT' value='" . $_GET["edit"] . "'></input>";
			$members=$members . "<input type='submit' value='Edit member'></input>";
			$style="<style>.t11::before{content:'CREATING NEW EVENT' !important;}</style>";
			$members = $members . "</form>";
		}
		if(isset($_POST["titleEDIT"]) && isset($_POST["filenameEDIT"])){
			unlink("information/members/" . $_POST["filenameEDIT"]);
			if(file_exists("information/members/" . $_POST["titleEDIT"] . ".txt")){
				
				$myfile = fopen("information/members/" . $_POST["titleEDIT"] . "(" . rand(1, 1000) . ").txt", "w") or die("Unable to open file!");
			}else{
							$myfile = fopen("information/members/" . $_POST["titleEDIT"] . ".txt", "w") or die("Unable to open file!");
			}
			$txt = $_POST["titleEDIT"] . "\n";
			fwrite($myfile, $txt);
			$txt = $_POST["descrEDIT"];
			fwrite($myfile, $txt);
			fclose($myfile);
			header("location:member.php");
		}
	}
	
	include "html/member.php";
?>