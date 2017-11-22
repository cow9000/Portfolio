<?php
	$conn = mysqli_connect("localhost","root","thechickenninja","rpserver");
	$news = '';
	session_start();
	if(!isset($_SESSION["username"])){
		$rl = "<a id='login' href='../login' style='display:inline;'>Login</a><p style='display:inline;'> / </p> <a style='display:inline;' id='register' href='../register'>Register</a>";
	}else{
		$rl="<p>Welcome back " . $_SESSION["username"] ."</p> <a id='register' href='../logout?logout=" . "true" ."'>Logout</a>";
	}
	
	
	$post = "";
	$options = "";
	$test = 600;
	$numberOfNews = 0;
	for($i = $test; $i > 0; $i -= 1){
	$getNews = mysqli_query($conn,"SELECT * FROM news WHERE id=" . $i ."");
	if(mysqli_num_rows($getNews) != 0){
		$all = mysqli_fetch_assoc($getNews);
		
		$id = $all["ID"];
		$title = $all["forumname"];
		$text = $all["forumtext"];
		$player = $all["poster"];
		$date = $all["date"];
		
		
		
		if(isset($_SESSION["username"])){
		
			$getA = mysqli_query($conn, "SELECT admin FROM users WHERE username='". $_SESSION["username"] ."'");
			$getA2 = mysqli_fetch_assoc($getA);
			$admin = $getA2["admin"];
			if($admin == "t"){
				$date2 = date('m/d/Y h:i:s a', time());
				
				if(isset($_POST["newsname"])){
					$putIn = mysqli_query($conn, "INSERT INTO news(poster,forumname,forumtext,date) VALUES ('" . $_SESSION["username"] . "','". $_POST["newsname"] . "','" . $_POST["newstext"] ."','". $date2 ."')");
					unset($_POST);
					header("location:../home");
				}
				
				
				
			$options = "
				<div id='options'>
					Settings
					<div class='inside'>
						<ul>
							<li><a href='?delete=" . $id ."'>Delete</a></li
							<li><a href='?post=" . "true" ."'>New post</a></li>
						</ul>
					</div>
				</div>";
					if(isset($_GET["delete"])){
	
						$getId = $_GET["delete"];
						$sql = mysqli_query($conn, "DELETE FROM news WHERE ID = {$getId}");
						header("location:../home");
						
					}else if(isset($_GET["post"])){
						$post = "
						<div id='post'>
							<div style='position:relative; top:128px;'>
								<form method = 'post' action = 'index.php'>
									News title - <input type='text' name='newsname'></input>
									<br>
									News text - <textarea name='newstext' cols='50' maxlength='2000'></textarea>
									<br>
									<input type='submit' name='submit' value='Create news post'></input>
							
								</form>
							</div>
						</div>";
						
						
						
						
						

					}
			}else{
				$options = "";
			}
					
		}
		
		
		/*		<div id='options'>
					<div class='inside'>
					
					</div>
				</div>
				
				
				<img id='image' src='https://minotar.net/helm/" . $player . "/48.png'></img>
		
		
			<div id='date'>
				{$date}
			</div>
		
		*/
		
		$getSrc = mysqli_query($conn, "SELECT profileImage FROM users WHERE username='". $player ."'");
		$getSrc2 = mysqli_fetch_assoc($getSrc);
		$image = $getSrc2["profileImage"];
		
		$numberOfNews ++;
		if($numberOfNews > 1){
			$i = 0;
			$numberOfNews = 0;
		}
		$news = $news . "
		<div id='news'>
			<div id='topTitle'>
				{$options}
				<div id='title2'>{$title}</div>
					<div class='bottom'>
						<div id='poster'>
							<img id='image' width='32' height='32' src='" . $image . "'></img>
							{$player}
						</div>
					</div>
				</div>
				
			<div id='text'>{$text}</div>
			<div id='bottomTitle'>
			<div id='date'>
				{$date}
			</div>
			</div>
		</div>";
	}
	
	

	}
	

	include "home.php";
?>