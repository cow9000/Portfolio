<?php
	
	session_start();
	if(isset($_SESSION["username"])){
	function createRandomPassword() { 

    $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
    srand((double)microtime()*1000000); 
    $i = 0; 
    $pass = '' ; 

    while ($i <= 7) { 
        $num = rand() % 33; 
        $tmp = substr($chars, $num, 1); 
        $pass = $pass . $tmp; 
        $i++; 
    } 

    return $pass; 

} 
	
	
		$conn = mysqli_connect("localhost","buildm10_bmb","!billsyall@.c","buildm10_bmb");
		$getDailyMessage = mysqli_query($conn, "SELECT * FROM dailymessage WHERE id=1");
		$getDaily2 = mysqli_fetch_assoc($getDailyMessage);
		$dailyMessage = $getDaily2["message"];
		$member = "<p>Programs purchased - </p>";
		$error = "";
		$np = "";
		$usernameC = "Generate your code, by putting in your paypal email.";
			$getUserC = mysqli_query($conn, "SELECT * FROM affiliateProgram WHERE username='" . $_SESSION["username"] . "'");
		if($getUserC != null && !empty($getUserC)){
		$getUserC2 = mysqli_fetch_assoc($getUserC);
		$usernameC = "<p style='color:white; font-size:20px;'>" . $getUserC2["userCode"] . "</p>";
		$usernameC34 = "<Br><a href='../images/BMB Flyer & Share Flyer.pdf' style='color:white; font-size:20px;'>Download flyer here</a>";
		}
			if(isset($_GET['id'])) {
			// if id is set then get the file with the id from database
			
			$result = mysqli_query($conn, "SELECT * FROM upload WHERE id=" . $_GET['id']);
			$get = mysqli_fetch_assoc($result);
			
			$checkifPurchased = mysqli_query($conn,"SELECT * FROM purchases WHERE username='" . $_SESSION["username"] . "' AND purchase='" . $get["program"] . "'");
				if($checkifPurchased !== false){
					if(mysqli_num_rows($checkifPurchased) > 0){
						header("Content-length: " . $get["size"]);
						header("Content-type: " . $get["type"]);
						header("Content-Disposition: attachment; filename=" . $get["name"]);
						echo $get["content"];
						
						exit;
					}
				}
			}
		
		if(isset($_POST["password"])){
			$password2 = mysqli_query($conn, "SELECT * FROM members WHERE username = '" . $_SESSION["username"] . "'");
			$password = mysqli_fetch_assoc($password2);
			if($_POST["2password"] != ""){
				if($_POST["repassword"] != ""){
					if($_POST["2password"] == $_POST["repassword"]){
						if(password_verify($_POST["password"],$password["password"])){
							$password2 = password_hash($_POST["2password"],PASSWORD_BCRYPT);
							mysqli_query($conn, "UPDATE members SET password='" . $password2 . "' WHERE id=" . $password["id"]);
							$error = "<p style='color:green;'>Password has been changed</p>";
							//INSERT MAILING TO PERSONS ACCOUNT
						}else{
							$error = "<p style='color:red;'>Incorrect password!</p>";
						}
						
					}else{
						$error = "<p style='color:red;'>The two passwords do not match!</p>";
					}
					
					
				}
			}
		}
		if(isset($_POST["paypalEmail"])){
			$checkifPurchased = mysqli_query($conn,"SELECT * FROM purchases WHERE username='" . $_SESSION["username"] . "'");
				if($checkifPurchased !== false){
					if(mysqli_num_rows($checkifPurchased) > 0){
			$getEmail = mysqli_query($conn, "SELECT * FROM affiliateProgram WHERE username='" . $_SESSION["username"] . "'");
			if($getEmail && mysqli_num_rows($getEmail) !== 0){
				$updateEmail = mysqli_query($conn, "UPDATE affiliateProgram SET paypalemail='" . $_POST["paypalEmail"] . "' WHERE username='" . $_SESSION["username"] . "'");
			}else{
				$putEmail = mysqli_query($conn,"INSERT INTO affiliateProgram(money,username,paypalemail,userCode) VALUES (0.0, '" . $_SESSION["username"] . "','" . $_POST["paypalEmail"] . "','" . createRandomPassword() . "')");
			}
			$error = "<p style='color:green;'>Email successfully changed.</p>";
					}else{
						$error = "<p style='color:red;'>You must purchase a program</p>";
					}
				}else{
						$error = "<p style='color:red;'>You must purchase a program</p>";
					}
		}
		
		$getPrograms = mysqli_query($conn, "SELECT * FROM purchases WHERE username='" . $_SESSION["username"] . "'");
		if($getPrograms){
			while($row = mysqli_fetch_assoc($getPrograms)){
				$member = $member . "<Br><p style='color:white; font-size:24px;'>" . $row["purchase"] . "</p>";
				$member = $member . "<ul>";
				$getFiles = mysqli_query($conn, "SELECT * FROM upload WHERE program='" . $row["purchase"] . "'");
				while($row2 = mysqli_fetch_assoc($getFiles)){
					$member = $member . "<a href='?id=" . $row2["id"] . "' style='color:lightgray;'><li style='text-indent:48px; color:white; list-style:initial; font-size:20px; margin:10px;'>" . $row2["name"] . "</li></a>";
				}
				$member = $member . "</ul>";
			}
		}else{
			$member = $member . "None";
		}
		
		
		
		
		$welcomeUser = "<a href='../login/'>Member Login</a> / <a href='../register/'>register</a>";
		if(isset($_SESSION["username"])){
			$welcomeUser = "Welcome back <a href='../settings/'>" . $_SESSION["username"] . "</a><br><a href='../logout/'>Logout here</a>";
			$isAdmin = mysqli_query($conn,"SELECT * FROM members WHERE admin='t' AND username='" . $_SESSION["username"] . "'");
			if(mysqli_num_rows($isAdmin) >= 1){
				header("location:../memberPage");
			}
		}else{
			header("location:../home/");
		}
	}else{
		header("location:../home/");
	}
	
	/*
	Affiliate code
	<div id="moveRight" style='float:right; display:inline;'>
							<h3 class="t_left p3">Change paypal email</h3>
							<form action="settings.php" method="post">
								<input name="paypalEmail" type="text" placeholder="Paypal Email" style="display:block;"></input>
								<input type="submit" value="Enter email, and generate code."></input>
							</form>
							<h3>Your affiliate number is - <?php echo $usernameC;  echo $usernameC34; ?></h3>
						</div>
						</div>
	
	*/
	
	
	include "../footer.php";
	include "../navagation.php";
	include "settings2.php";
?>