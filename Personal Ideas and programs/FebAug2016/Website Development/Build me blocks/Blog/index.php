<?php
	$conn = mysqli_connect("localhost","root","thechickenninja","blog");
	session_start();
	$post = "<form action='index.php' method='post'>
		<input name='title'></input>
		<textarea name='text'></textarea>
		<input type='submit' value='post'></input>
	</form>
	";
	
	if(isset($_POST["title"])){
	if(isset($_SESSION["username"])){
		$poster = $_SESSION["username"];
		$blogText = $_POST["text"];
		$title = $_POST["title"];
		$date = date('m/d/Y h:i:s a', time());
			$checkAdmin = mysqli_query("SELECT admin FROM posts WHERE username='" . $_SESSION["username"] . "'");
			$getAdminList = mysqli_fetch_assoc($checkAdmin);
			$admin = $getAdminList["admin"];
			if($admin == "t"){
				$putIn = mysqli_query("INSERT INTO posts(poster,date,blogtext,other) VALUES ('" . $poster ."', '". $date ."', '". $blogText ."', '" . $title ."')");
			}
		}
	}
	
	if(isset($_GET["post"])){
		if(isset($_SESSION["username"])){
			$checkAdmin = mysqli_query("SELECT admin FROM posts WHERE username='" . $_SESSION["username"] . "'");
			$getAdminList = mysqli_fetch_assoc($checkAdmin);
			$admin = $getAdminList["admin"];
			if($admin == "t"){
				$cover = "<div id='cover'>...Ect</div>";
			}
		}
	}
	
	
	for($i = 1; $i < 600; $i++){
		$getBlog = mysqli_query($conn,"SELECT * FROM posts WHERE id=" . $i ."");
		$info = mysqli_fetch_assoc($getBlog);
		
		$getPostId = $info["id"];
		$getPoster = $info["poster"];
		$getText = $info["blogtext"];
		$getDate = $info["date"];
		
		
		if($getBlog || mysqli_num_rows($getBlog) != 0){
			$post = "
			<div id='blogpost'>
				<div id='poster'>" . $getPoster . "</div>
				<div id='text'>" . $getText ."</div>
				<div id=''>". $getDate . "</div>
			</div>" . $post;
		}
		
	}
	
	echo $post;
	
?>