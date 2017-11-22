<?php
	$link = mysqli_connect("localhost","root","thechickenninja","users");
	session_start();

	if(!$link){
		$output = "Could not connect to database";
	}else{
		$output = "Connection to database was successful...";
	}
	
	if(!mysqli_set_charset($link,'utf8')){
		$output = "Unable to set database connection encoding.";
	}
	
	if(!mysqli_select_db($link, "users")){
		$output = "Unable to locate Users Database";
	}
	
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		$username = $_SESSION['username'];
		$email1 = mysqli_query($link, "SELECT email FROM usertable WHERE username='". $username ."'");
		$email2 = mysqli_fetch_assoc($email1);
		$email3 = $email2["email"];
		$settings = "
		<div>
		<label for='email'>
		<form>
		<input type='text' placeholder='email' name='email' id='email'>
		</input>
		</div>
		\n
		<input type='submit' value='Save changes!'/>
		</label>
		</form>
		\n
		<div>
		<label for='password'>
		<form>
		<input type='password' id='password' name='password' placeholder='password'>
		</input>
		</div>
		\n
		<input type='submit' value='Save changes!'/>
		\n
		<div>
		<label for='receive'>
			<input type='radio' name='receive' value='Yes'>Yes<br>
			<input type='radio' name='receive' value='No'>No<br>
		\n
		<input type='submit' value='Save changes!'/>
		";
	} else {
		header("Location:../home");
	}
	
	
	
	
	include 'members.php';
	
?>