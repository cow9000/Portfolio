<?php
	$files = "";
	if(isset($_GET["image"])){
		
		foreach (glob("../uploads/*.png") as $file) {
			if($file == '.' || $file == '..') continue;
			$files = $files .  "<div class='img'><img class='clickmeimg' src='$file'/><span>click for url</span></div>";
		}
		foreach (glob("../uploads/*.jpg") as $file) {
			if($file == '.' || $file == '..') continue;
			$files = $files .  "<div class='img'><img class='clickmeimg' src='$file'/><span>click for url</span></div>";
		}
		foreach (glob("../uploads/*.bit") as $file) {
			if($file == '.' || $file == '..') continue;
			$files = $files .  "<div class='img'><img class='clickmeimg' src='$file'/><span>click for url</span></div>";
		}
		foreach (glob("../uploads/*.gif") as $file) {
			if($file == '.' || $file == '..') continue;
			$files = $files .  "<div class='img'><img class='clickmeimg' src='$file'/><span>click for url</span></div>";
		}
		foreach (glob("../uploads/*.bmp") as $file) {
			if($file == '.' || $file == '..') continue;
			$files = $files .  "<div class='img'><img class='clickmeimg' src='$file'/><span>click for url</span></div>";
		}
		foreach (glob("../uploads/*.JPG") as $file) {
			if($file == '.' || $file == '..') continue;
			$files = $files .  "<div class='img'><img class='clickmeimg' src='$file'/><span>click for url</span></div>";
		}
	}else{
		foreach (glob("../uploads/*") as $file) {
			if($file == '.' || $file == '..') continue;
			$files = $files .  "<a class='clickme'>" . str_replace("../uploads/", "",$file) . "<span>Click me for url.</span></a>" . ", ";
		}
	}
	echo $files;
?>