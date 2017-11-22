<?php
	session_start();
	$conn = mysqli_connect("localhost","root","thechickenninja","journal");
	
		if(isset($_POST["journalTitle"])){
			mysqli_query($conn,"INSERT INTO journals(text,title,date) VALUES('" . mysqli_real_escape_string($conn,$_POST["journalText"]) . "','" . $_POST["journalTitle"] . "',NOW())");
			header("location:index.php");
		}
	
	
	$error= "";
	$page = '
	<form action="index.php" method="POST">
		<input type="text" name="username" placeholder="Username"></input>
		<br>
		<input type="password" name="password" placeholder="Password"></input>
		<br>
		<input type="submit" value="Submit"></input>
	</form>';
	if(!isset($_SESSION["username"])){
		if(isset($_POST["username"])){
			$getPassword = mysqli_query($conn,"SELECT * FROM password WHERE username='" . $_POST['username'] . "'");
			$getp2 = mysqli_fetch_assoc($getPassword);
			if($getPassword){
				if($_POST["password"] === $getp2["password"]){
					$_SESSION["username"] = $_POST["username"];
					header("location:index.php");
				}else{
					$error = "<p style='color:red;'>Incorrect username and password combination</p>";
				}
			}else{
				$error = "<p style='color:red;'>Incorrect username and password combination</p>";
			}
		}
	}else{
	
		$page="
			<form action='index.php' method='POST'>
				<input type='hidden' name='logout' value='1'></input>
				<input type='submit' value='Logout' style='cursor:pointer; float:right;'></input>
			</form>
			<form action='index.php' method='POST'>
				<input type='text' name='journalTitle' placeholder='Title'></input>
				<Br>
				<textarea name='journalText' placeholder='Text'></textarea>
				<br>
				<input type='submit' value='Submit' style='cursor:pointer;'></input>
			</form>
		";
		$getJournal = mysqli_query($conn, "SELECT * FROM journals");
		while($row = mysqli_fetch_assoc($getJournal)){
		$page = $page . 
		"<div id='mainJournal'>
			<div id='top'>
				<p class='title'>" . $row["title"] . "</p>
				<br>
				<p class='title:after'>" . $row["date"] . "</p>
			</div>
			<p class='text'>" . $row["text"] . "</p>
		</div>";
		}
		
		
	}
	if(isset($_POST["logout"])){
		session_destroy();
		header("location:index.php");
	}

	include 'journal.php';
?>