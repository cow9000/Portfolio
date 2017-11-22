<?php
	$events = "";
	$path = "information/events/";
	$style="<style>";
	$anchor = "";
	$current = 0;
	$admin = "";
	session_start();
	if(isset($_SESSION["username"])) $events = "<a href='?create'>Create more events</a>";
	if ($handle = opendir($path)) {
	    while (false !== ($file = readdir($handle))) {
 	       if ('.' === $file) continue;
 	       if ('..' === $file) continue;
			$myfile = fopen("information/events/" . $file, "r") or die("Unable to open file!");
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
			$events = $events . "<a name='" . $current . "'></a><p class='title title" . $current . "'></p>" . $admin;
			$events = $events . "<p>Date - " . $date . "</p>";
			$events = $events . "<p>" . $content . "</p>";
			$style = $style . "
			.title" . $current . "::before{

  content:'{$title}' !important;

}";
			$anchor=$anchor . "<a class='link' href='#" . $current . "'>" . $title . "</a><br>";
			$current++;
			$title = "";
			$content = "";
			fclose($myfile);
	    }
	    closedir($handle);
	}
	
	if(isset($_SESSION["username"])){
		if(isset($_GET["create"])){
			$events="<form action='event.php' method='POST'>Event name - <input type='text' placeholder='Title of event' name='title'></input><br><br>";
			$events=$events . "Event date - <input type='text' placeholder='Date of event' name='date'></input><br><br>";
			$events=$events . "Event description<br><textarea placeholder='Description of event' name='descr'></textarea>";
			$events=$events . "<input type='submit' value='Create Event'></input>";
			$style="<style>.t11::before{content:'CREATING NEW EVENT' !important;}</style>";
			$events = $events . "</form>";
		}
		if(isset($_POST["title"]) && isset($_POST["date"])){
			$_POST["date"] = str_replace("/", "-", $_POST["date"], $_POST["date"]);
			if(file_exists("information/events/" . $_POST["date"] . ".txt")){
				
				$myfile = fopen("information/events/" . $_POST["date"] . "(" . rand(1, 1000) . ").txt", "w") or die("Unable to open file!");
			}else{
							$myfile = fopen("information/events/" . $_POST["date"] . ".txt", "w") or die("Unable to open file!");
			}
			$txt = $_POST["title"] . "\n";
			fwrite($myfile, $txt);
			$txt = $_POST["date"] . "\n";
			fwrite($myfile, $txt);
			$txt = $_POST["descr"];
			fwrite($myfile, $txt);
			fclose($myfile);
			header("location:event.php");
		}
		if(isset($_GET["delete"])){
			$myFile = "information/events/" . $_GET["delete"];
			unlink($myFile);
			header("location:event.php");
		}
		if(isset($_GET["edit"])){
			$i = 0;
			$titleEDIT = "";
			$dateEDIT = "";
			$descrEDIT = "";
			$myfile = fopen("information/events/" . $_GET["edit"], "r") or die("Unable to open file!");
			
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
			
			
			$events="<form action='event.php' method='POST'>Event name - <input type='text' placeholder='Title of event' name='titleEDIT' value='" . $titleEDIT . "'></input><br><br>";
			$events=$events . "Event date - <input type='text' placeholder='Date of event' name='dateEDIT' value='" . $dateEDIT . "'></input><br><br>";
			$events=$events . "Event description<br><textarea placeholder='Description of event' name='descrEDIT'>" . $descrEDIT . "</textarea><input type='hidden' name='filenameEDIT' value='" . $_GET["edit"] . "'></input>";
			$events=$events . "<input type='submit' value='Edit Event'></input>";
			$style="<style>.t11::before{content:'CREATING NEW EVENT' !important;}</style>";
			$events = $events . "</form>";
		}
		if(isset($_POST["titleEDIT"]) && isset($_POST["dateEDIT"])){
			unlink("information/events/" . $_POST["filenameEDIT"]);
			$_POST["dateEDIT"] = str_replace("/", "-", $_POST["dateEDIT"], $_POST["dateEDIT"]);
			if(file_exists("information/events/" . $_POST["dateEDIT"] . ".txt")){
				
				$myfile = fopen("information/events/" . $_POST["dateEDIT"] . "(" . rand(1, 1000) . ").txt", "w") or die("Unable to open file!");
			}else{
							$myfile = fopen("information/events/" . $_POST["dateEDIT"] . ".txt", "w") or die("Unable to open file!");
			}
			$txt = $_POST["titleEDIT"] . "\n";
			fwrite($myfile, $txt);
			$txt = $_POST["dateEDIT"] . "\n";
			fwrite($myfile, $txt);
			$txt = $_POST["descrEDIT"];
			fwrite($myfile, $txt);
			fclose($myfile);
			header("location:event.php");
		}
	}
	
	$style = $style . "</style>";
	include "html/event.php";
?>