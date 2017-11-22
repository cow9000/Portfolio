<?php
	session_start();
	$conn = mysqli_connect("localhost","root","thechickenninja","rpserver");

    if($conn -> connect_error){
        echo "Error could not connect to database.";
    }
    $settings = "";
	$setBio = "";
	
	
	
	
	if(!isset($_GET["profileUser"])){
		if(isset($_SESSION["username"])){
			header("location:../Profile?profileUser=". $_SESSION["username"] . "");
		}else{
			header("location:../home");
		}
	}else{
		$user = htmlspecialchars($_GET["profileUser"]);
		$getUsers = mysqli_query($conn, "SELECT username FROM users WHERE username = '". $user . "'");
		
		if(mysqli_num_rows($getUsers) != 0){
				
				$level = "100";
				$rankStatus = "";
				
				
				$getSrc = mysqli_query($conn, "SELECT profileImage FROM users WHERE username='". $user ."'");
				$getSrc2 = mysqli_fetch_assoc($getSrc);
				
				
				$src = "<img src='". $getSrc2["profileImage"]."'></img>";
				
				if(isset($_POST["bio"])){
					$bioSet = $_POST["bio"];
					$sql2 = mysqli_query($conn,"UPDATE bio SET bio='". $bioSet ."' WHERE username='". $user ."'");
				}
				
				$getBio = mysqli_query($conn, "SELECT bio FROM bio WHERE username = '". $user ."'");
				$getBio2 = mysqli_fetch_assoc($getBio);
				$bio = "<div id='wrap'>" .   htmlspecialchars($getBio2["bio"]) . "</div>";
				
				if(isset($_SESSION["username"])){
					if($user === $_SESSION["username"]){
						$settings = "<a href='../logout?logout=true'>Logout</a>";
						$setBio = "
						<form method='post' action='index.php?profileUser=". $_SESSION["username"] . "'>
						<textarea maxlength='600' type='text' name='bio' cols='70' rows='10'>" .  htmlspecialchars($getBio2["bio"]) . "</textarea>
						<input type='submit' name='submit' value='Save bio'></input>
						</form>
						";
					}
				}
				
	
		}else{
			if(isset($_SESSION["username"])){
				header("location:../Profile?profileUser=". $_SESSION["username"] . "");
			}else{
				header("location:../home");
			}
		}
	}
	
	
	if(!isset($_SESSION["username"])){
		$rl = "<a id='login' href='../login' style='display:inline;'>Login</a><p style='display:inline;'> / </p> <a style='display:inline;' id='register' href='../register'>Register</a>";
	}else{
		$rl="<p>Welcome back " . $_SESSION["username"] ."</p> <a id='register' href='../logout?logout=" . "true" ."'>Logout</a>";
	}
	
	
    include "profile.php";
    
    
    
?>