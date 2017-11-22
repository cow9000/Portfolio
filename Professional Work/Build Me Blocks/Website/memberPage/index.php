<?php

	$conn = mysqli_connect("localhost","buildm10_bmb","!billsyall@.c","buildm10_bmb");
	$payment = "";
	$members = "";
	$page = "";
	$memberNames = "";
	$paymentNames = "";
	$comments = "";
	$commentNames = "";
	$newsLetter = "";
	$settings = "
	<form action='../memberPage/' method='POST'>
		<input type='text' name='dailyMessage' placeholder='Daily message'></input>
		<input type='submit' value='submit'></input>
	</form>";
	$programNames = "";
	$emailTo = "";
	session_start();

	
	
	if(isset($_SESSION["username"])){
	
		/*
		Put the normal member stuff here
		*/
		
		$isAdmin = mysqli_query($conn,"SELECT * FROM members WHERE admin='t' AND username='" . $_SESSION["username"] . "'");
		if(mysqli_num_rows($isAdmin) >= 1){
		        $coupons = "
			<div id=''>
				<form action='../memberPage/' method='POST'>
					<input type='text' name='couponName' placeholder='Coupon Code'></input>
					<input type='text' name='couponAmount' placeholder='Percent the person gets off. Or type in free for a free coupon. '></input>
					<input type='submit' value='Create coupon'></input>
				</form>
			</div>
                        <form action='../memberPage/' method='POST'>
                        <p>Delete Coupons</p>
                        <select name='coupon'>
                        <option>PLEASE SELECT A COUPON</option>
                        

			";
			$getCoupons = mysqli_query($conn, "SELECT * FROM Coupons");
$listCoupon = "<br><p style='font-size:22px;'>Coupons</p>";
                        while($row = mysqli_fetch_assoc($getCoupons)){
                        $listCoupon = $listCoupon . "<br><p>" . $row["couponcode"] ."    ||||||      " . $row["percent"] . "% Off</p> ";
                        if($row["percent"] != "free"){
                        $coupons = $coupons . "<option value=" . $row["couponcode"] . ">" . $row["couponcode"] ."    ||||||      " . $row["percent"] . "% Off </option>";
}else{
                        $coupons = $coupons . "<option value=" . $row["couponcode"] . ">" . $row["couponcode"] ."    ||||||      " . $row["percent"] . "</option>";
}
                        
                        }
                        $coupons = $coupons . "</select><input type='submit' value='Delete coupon'></input></form>";


                        if(isset($_POST["coupon"])){
                        
                        mysqli_query($conn, "DELETE FROM Coupons WHERE couponcode='" . $_POST["coupon"] . "'");
                        header("location:../memberPage#coupons");
                        
                        }
			if(isset($_POST["couponName"])){
				
				mysqli_query($conn,"INSERT INTO Coupons(couponcode,percent) VALUES('" . $_POST["couponName"] . "','" . $_POST["couponAmount"] . "')");
				header("location:../memberPage/#coupons");
			}


		        if(isset($_GET["commentdelete"])){
					$deleteComment = mysqli_query($conn, "DELETE FROM comments WHERE id=" . $_GET["commentdelete"]);
					header("location:../memberPage/");
			}
			if(isset($_GET["commentapprove"])){
					$approve = mysqli_query($conn, "UPDATE comments SET approved='t' WHERE id=" . $_GET["commentapprove"]);
					header("location:../memberPage/");
			}
			if(isset($_GET["spam"])){
				$spam = mysqli_query($conn,"UPDATE comments SET spam='t' WHERE id=" . $_GET["spam"]);
				$getPoster = mysqli_query($conn, "SELECT poster FROM comments WHERE id=" . $_GET["spam"]);
				$getPoster2 = mysqli_fetch_array($getPoster);
				$getWarningNum = mysqli_query($conn, "SELECT warning FROM members WHERE username= '" . $getPoster2["poster"] . "'");
				$getNum = mysqli_fetch_array($getWarningNum);
				$warning = mysqli_query($conn,"UPDATE members Set warning=" . $getNum + 1 . " WHERE username='" . $getPoster2["poster"] . "'");
				header("location:../memberPage/");
			}
			if(isset($_GET["delete"])){
					$deleteUser = mysqli_query($conn, "DELETE FROM members WHERE id=" . $_GET["delete"]);
					header("location:../memberPage/");
			}
			if(isset($_POST["programName"])){
				$programName = $_POST["programName"];
				$programPrice = $_POST["programPrice"];
				$programDesc = $_POST["programDesc"];
				mysqli_query($conn,"INSERT INTO programs(name,price,disabled,descr) VALUES('$programName',$programPrice,'f','$programDesc')");
				for($i = 1; $i <= 999;$i++){
					if(isset($_FILES["userfile" . $i]) && $_FILES["userfile" . $i]['size'] > 0){
						$Filename = $_FILES["userfile" . $i]['name'];
						
						
						$Filetype = $_FILES["userfile" . $i]['type'];
						
						$Filesize = $_FILES["userfile" . $i]['size'];
						$Filetmpname = $_FILES["userfile" . $i]['tmp_name'];
						$Fileerror = $_FILES["userfile" . $i]['error'];
						
						
						$fp      = fopen($Filetmpname, 'r');
						$content = fread($fp, filesize($Filetmpname));
						$content = addslashes($content);
						fclose($fp);
						
						
						if(!get_magic_quotes_gpc())
						{
						    $Filename = addslashes($Filename);
						}
						
						mysqli_query($conn, "INSERT INTO upload(name,type,size,content,program)	
						VALUES('" . $Filename . "','" . $Filetype . "','" . $Filesize . "','" . $content . "','" . $programName. "')");
					}else{
						$i=999;
						header("location:../memberPage/");
					}
				}
				
			}
			if(isset($_POST["programName2"])){
				$programName = $_POST["programName2"];
				for($i = 1; $i <= 999;$i++){
					if(isset($_FILES["userfile" . $i]) && $_FILES["userfile" . $i]['size'] > 0){
						$Filename = $_FILES["userfile" . $i]['name'];
						
						
						$Filetype = $_FILES["userfile" . $i]['type'];
						
						$Filesize = $_FILES["userfile" . $i]['size'];
						$Filetmpname = $_FILES["userfile" . $i]['tmp_name'];
						$Fileerror = $_FILES["userfile" . $i]['error'];
						
						
						$fp      = fopen($Filetmpname, 'r');
						$content = fread($fp, filesize($Filetmpname));
						$content = addslashes($content);
						fclose($fp);
						
						
						if(!get_magic_quotes_gpc())
						{
						    $Filename = addslashes($Filename);
						}
						
						mysqli_query($conn, "INSERT INTO upload(name,type,size,content,program)	
						VALUES('" . $Filename . "','" . $Filetype . "','" . $Filesize . "','" . $content . "','" . $programName. "')");
					}else{
						$i=999;
						header("location:../memberPage/");
					}
				}
				
			}
			if(isset($_POST["pricePassword"])){
				$getPassword = mysqli_query($conn, "SELECT * FROM members WHERE username='" . $_SESSION["username"] . "'");
				$getp2 = mysqli_fetch_assoc($getPassword);
				if(password_verify($_POST["pricePassword"],$getp2["password"])){
					$updatePrice = mysqli_query($conn, "UPDATE programs SET price=" . $_POST["pricePrice"] . " WHERE name='" . $_POST["priceName"] . "'");
					header("location:../memberPage/#programs");
				}
			}
			if(isset($_POST["changeDesc"])){
				$updateDesc = mysqli_query($conn,"UPDATE programs SET descr='" . $_POST["changeDesc"] ."' WHERE name='" . $_POST["Name"] . "' ");
				header("location:../memberPage/#programs");
			}
			if(isset($_POST["dailyMessage"])){
				$changeMessage = mysqli_query($conn, "UPDATE dailymessage SET message='" . mysqli_real_escape_string($conn, $_POST["dailyMessage"]) . "' WHERE id=1");
				header("location:../memberPage/");
			}
			if(isset($_POST["disable"])){
				$change = mysqli_query($conn, "UPDATE programs SET disabled='t' WHERE id=" . $_POST["disable"]);
			}
			if(isset($_POST["enable"])){
				$change = mysqli_query($conn, "UPDATE programs SET disabled='f' WHERE id=" . $_POST["enable"]);
			}
		
		
		
		
			$query = "SELECT id FROM members";
			$result = mysqli_query($conn, $query);
			if(empty($result)){
				$createTable = mysqli_query($conn, "
				CREATE TABLE members(
					id INT(10) PRIMARY KEY AUTO_INCREMENT,
					username VARCHAR(255) NOT NULL,
					password VARCHAR(2550) NOT NULL,
					firstname VARCHAR(255) NOT NULL,
					lastname VARCHAR(255) NOT NULL,
					admin VARCHAR(255) DEFAULT 'f',
					purchases VARCHAR(255) DEFAULT 'No purchases',
					warning INT(3),
					date VARCHAR(255),
					email VARCHAR(255)
				)");
				
				$createTestMember = mysqli_query($conn, "INSERT INTO members(username,password,firstname,lastname,admin,purchases,warning,date,email) VALUES(
				'cow9000',
				'password',
				'Derek',
				'Vawdrey',
				't',
				'Silver',
				0,
				'2015-27-3 12:00:00',
				'flyingpiechicken@gmail.com'
				
				)");
			}
			$query = "SELECT id FROM payment";
			$result = mysqli_query($conn, $query);
			if(empty($result)){
				$createTable = mysqli_query($conn, "
				CREATE TABLE payment(
					id INT(10) PRIMARY KEY AUTO_INCREMENT,
					username VARCHAR(255) NOT NULL,
					firstname VARCHAR(255) NOT NULL,
					lastname VARCHAR(255) NOT NULL,
					product VARCHAR(255) NOT NULL,
					price VARCHAR(255) NOT NULL,
					date TIMESTAMP
				)");
				
				$createTestPayment = mysqli_query($conn, "INSERT INTO payment(username,firstname,lastname,product,price,date) VALUES (
				'cow9000','Derek','Vawdrey','0684','50','1/1/1 0:0:0'
				
				
				)");
			}
		
			$query = "SELECT id FROM settings";
			$result = mysqli_query($conn, $query);
			if(empty($result)){
				$createTable = mysqli_query($conn, "
				CREATE TABLE PageSettings(
					recentblog VARCHAR(255) NOT NULL,
					dailyquotes VARCHAR(255) NOT NULL,
				)");
				
				
			}
		
		
		$result = mysqli_query($conn, "SELECT * FROM payment");
		while($row = mysqli_fetch_assoc($result)){
			$paymentNames = "<tr><td>".$row['username']."</td><td>" . $row['firstname'] . "</td><td>" . $row['lastname'] . "</td><td>" . $row["product"] . "</td><td>" . $row["price"] . "</td><td>" . $row["date"] . "</td><td>" . $row["coupon"] . "</td></tr>" . $paymentNames;
		}
		
		$result = mysqli_query($conn, "SELECT * FROM members");
		while($row = mysqli_fetch_assoc($result)){
		$memberNames = 
			"<tr><td>".$row['username']."</td><td>" . $row['firstname'] . "</td><td>" . $row['lastname'] . "</td><td>" . $row["purchases"] . "</td><td>" . $row["date"] . "</td><td>" . $row["warning"] . "</td></tr></td>"  . $memberNames;
		}
		
		$result = mysqli_query($conn, "SELECT * FROM comments WHERE approved = 'f' AND spam='f'");
		if($result){
			while($row = mysqli_fetch_assoc($result)){
				$blogTitle1 = mysqli_query($conn,"SELECT * FROM blog WHERE id = " . $row["blogid"]);
				$blogTitle = mysqli_fetch_assoc($blogTitle1);
				$commentNames = "<tr><td>" .$row["poster"] . "</td><td>" . $row["text"] . "</td><td>" . $blogTitle["title"] . "</td><td>" . $row["date"] . "</td><td>" . "<a href='?commentdelete=" . $row["id"] . "'>Delete</a> <a href='?commentapprove=" . $row["id"] ."'>Accept</a><a href='?spam=" . $row["id"] . "'>Spam</a>" . "</td></tr>" . $commentNames;
				
		
			
			}
		}
		
		function getFiles($name, $conn){
			$fileNames = "";
			$result = mysqli_query($conn, "SELECT * FROM upload WHERE program='" . $name . "'");
			while($row = mysqli_fetch_assoc($result)){
				$fileNames = $fileNames . $row["name"] . "<br>";
			}
			return $fileNames;
		}
		
		
		$result = mysqli_query($conn, "SELECT * FROM programs");
		while($row = mysqli_fetch_assoc($result)){
		
			if($row["disabled"] == 'f'){
				$thing = "<form method='POST' action='../memberPage/'>
					<input name='disable' type='hidden' value='" . $row["id"] . "'></input>
					<input type='submit' style='cursor:pointer;' value='Disable'></input>
				</form>";
			}else{
				$thing = "<form method='POST' action='../memberPage/'>
					<input name='enable' type='hidden' value='" . $row["id"] . "'></input>
					<input type='submit' style='cursor:pointer;' value='Enable'></input>
				</form>";
			}
		
			$programNames = $programNames . "<tr><td>" . $row["name"] . "</td><td>" . $row["price"] . "</td><td>" . getFiles($row["name"], $conn) . "</td><td>
			
			
			
			<form method='POST' action='../memberPage/'>
				<input name='pricePassword' type='password' placeholder='Insert password to change price'></input>
				<input name='pricePrice' type='text' placeholder='Price'></input>
				<input name='priceName' type='hidden' value='" . $row["name"] . "'></input>
				<input type='submit' style='cursor:pointer;' value='Change Price'></input>
			</form>
			<br><br>
			<form method='POST' action='../memberPage/'>
				<input name='changeDesc' type='text' placeholder='Desc'></input>
				<input name='Name' type='hidden' value='" . $row["name"] . "'></input>
				<input type='submit' style='cursor:pointer;' value='Change Desc'></input>
			</form>
			<br>
			<br>
                               <form action='../memberPage/' method='post' enctype='multipart/form-data'>
					<input type='text' name='programName2' placeholder='Program Name'>
					<div class='uploadFiles'>
						<input name='userfile1' type='file' onchange='addAnother()'>
					</div>
					<input type='submit' value='Insert files' style='cursor:pointer;'>
				</form>
			" . $thing . "
			
			
			</td></tr>";
		
		}
		
			
			
			
			$payment = "<table><tr>
			<th>Username</th>
			<th>First name</th>
			<th>Last name</th>
			<th>Product</th>
			<th>Price</th>
			<th>Date</th>
			<th>Coupons</th>
			</tr>" . $paymentNames . "</table>";

			$members = "
			<table>
			<tr>
				<th>Username</th>
				<th>First name</th>
				<th>Last name</th>
				<th>Programs Purchased</th>
				<th>Date joined</th>
				<th>Warnings</th>
				
			</tr>" . $memberNames . "</table>";
		
			$comments = "
			<table>
				<tr>
					<th>Poster</th>
					<th>Text</th>
					<th>Blog post</th>
					<th>Date Posted</th>
					<th>Actions</th>
				</tr>
				" . $commentNames . "
			</table>
			";
			
			$newsLetter = "
			<div id='sendMail'>
				<form action='../memberPage/' method='post'>
					<select name='setting'>
						<option value='All users'>All users</option>
						<option value='All paid members'>All paid members</option>
						<option value='All unpaid members'>All unpaid users</option>
					</select>
					<br>
					<input type='text' name='title' placeholder='title'></input>
					<textarea name='text' placeholder='Text of newsletter'></textarea>
					<input type='submit' value='Send Newsletter' style='cursor:pointer;'></input>
				</form>
			</div>";
			$programs = "
				
				<form action='../memberPage/' method='post' enctype='multipart/form-data'>
					<input type='text' name='programName' placeholder='Program Name'></input>
					<input type='text' name='programPrice' placeholder='Price'></input>
					<textarea name='programDesc' placeholder='Description'></textarea>
					<div class='uploadFiles'>
						<input name='userfile1' type='file' onchange='addAnother()'>
					</div>
					<input type='submit' value='Create program' style='cursor:pointer;'></input>
				</form>
				
				<p class='special'>WARNING - WHEN YOU CLICK SUBMIT DO NOT HIT IT AGAIN. WAIT FOR THE FILES TO UPLOAD TO THE SYSTEM.</p>
				";
			$editPrograms = "<table><tr>
			<th>Program name</th>
			<th>Price</th>
			<th>Files</th>
			<th>Actions</th>
			</tr>" . $programNames . "
				</table>
			";
		
		/*<div id='navBar'>
			<div class='btn-group open'>
				<ul>
					<li><a href='#payments' id='payments'><i class='fa fa-money'></i>Payments</a></li>
					<li><a href='#members' class='btn btn-primary' id='member'><i class='fa fa-user fa-fw ' ></i>Users</a></li>
					<li><a href='#comments' id='comments'><i class='fa fa-list-alt ' ></i>Comments</a></li>
					<li><a href='#newsletter' id='newsletter' ><i class='fa fa-paper-plane'></i>News letter</a></li>
					<li><a href='#programs' id='programs' ><i class='fa fa-suitcase'></i>Programs</a></li>
					<li><a href='#settings' id='settings' style='font-size:16px;' ><i class='fa fa-sun-o'></i>Daily message</a></li>
				</ul>
			</div>
		</div>	*/
		
	$page = "
	
			<header>
<div class='inner'> 
<div class='main'>
<nav> 
<ul class='menu'> 
<li class='item1'><span><a style='cursor:default !important;' href='#'>About</a></span> 
	<ul> 
		<li><a href='../home/'>About</a></li>
		<li><a href='../philosophy'>Philosophy</a></li> 
		<li><a href='../faq'>FAQ's</a></li> 
		<li><a href='../share'>Sharing</a></li>
	</ul> 
</li> 
<li class='item2'><span><a href='#' style='cursor:default !important;'>Programs</a></span> 
	<ul id='2'>
				<li><a href='../sam'>Special Agent Mission</a></li>
				<li><a href='../meetmax'>Meet Max and Elena</a></li>
				<li><a href='../reading'>Reading Adventures</a></li> 
				<li><a href='../share'>Share</a></li>
	</ul> 
</li> 


<li class='item3'><span><a href='#' style='cursor:default !important;'>Resources</a></span>
	<ul id='3'> 
		<li><a href='../resources?selection=1#slider1/'>Books and websites</a></li>
	</ul>
</li> 
<li class='item4'><span><a href='#' style='cursor:default !important;'>Blog</a></span> 
	<ul id='4'> 
			<li><a href='../blog'>Build ME Blocks blog</a></li>
			<li><a href='../forum'>Forum</a></li> 
	</ul> 
</li> 
<li class='item5'><span><a href='#' style='cursor:default !important;'>Join<br>Us</a></span> 
	<ul id='5'> 
	<li><a href='../login'>Login</a>		</li>
	<li id='A7'><a href='../register'>Register</a>
		<ol>
			<li><a href='../joinus'>Join us</a></li>
		</ol>
		</li>
	</ul>
<li class='item6'><span><a href='../contact'>Contact<br>us</a></span></li> 
	</ul> 
</li> 
</ul> </nav> </div> </div> </header>	
					
					
			<div id='lowerNav'>
					<li><a href='#payments' id='payments'>Payments</a></li>
					<li><a href='#members' id='member'>Users</a></li>
					<li><a href='#comments' id='comments'>Comments</a></li>
					<li><a href='#newsletter' id='newsletter' >News letter</a></li>
					<li><a href='#programs' id='programs' >Programs</a></li>
					<li><a href='#settings' id='settings'>Daily message</a></li>
					<li><a href='#coupons' id='coupons'>Coupons</a></li>
			</div>			
		<div id='main'>
			<div id='paymentMain'>
				" . $payment . "
			</div>
			<div id='memberMain'>
				" . $members . "
			</div>
			<div id='commentsMain'>
				" . $comments . "
			</div>
			<div id='newsletterMain'>
				" . $newsLetter . "
			</div>
			<div id='settingsMain'>
			 " . $settings . "
			</div>
			<div id='couponsMain'> " . $listCoupon . "

			 " . $coupons . "
			</div>
			<div id='programsMain'>
				<div id='selectPrograms'>
					<div id='createProgram' class='create'>
						<p class='special'>Add Programs</p>
						" . $programs . "
					</div>
						
						<div id='editProgram' class='edit'>
						<p class='special'>Edit Programs</p>
						" . $editPrograms . "
					</div>
				</div>
			</div>
			
		</div>";
		if(isset($_POST["setting"])){
		
		
			if($_POST["setting"]== "All paid members"){
				$users = mysqli_query($conn, "SELECT * FROM members WHERE purchases !=' ' AND newsletter='t'");
				while($row = mysqli_fetch_assoc($users)){
				/*$emailTo = $emailTo . $row["email"] . ",";
				$emailTo = $emailTo . "flyingpiechicken@gmail.com";*/
					$to      = $row["email"];
					$subject = $_POST["title"];
					$message = $_POST["text"];
					$headers = 'From: newsletter@buildmeblocks.com' . "\r\n" .
					    'Reply-To: newsletter@buildmeblocks.com' . "\r\n" .
					    'X-Mailer: PHP/' . phpversion();
					
					mail($to, $subject, $message, $headers);
					header("location:../memberPage/");
				}
			}
			
			else if($_POST["setting"]== "All users"){
				$users = mysqli_query($conn, "SELECT * FROM members");
				while($row = mysqli_fetch_assoc($users)){
				/*$emailTo = $emailTo . $row["email"] . ",";
				$emailTo = $emailTo . "flyingpiechicken@gmail.com";*/
					$to      = $row["email"];
					$subject = $_POST["title"];
					$message = $_POST["text"];
					$headers = 'From: newsletter@buildmeblocks.com' . "\r\n" .
					    'Reply-To: newsletter@buildmeblocks.com' . "\r\n" .
					    'X-Mailer: PHP/' . phpversion();
					
					mail($to, $subject, $message, $headers);
					header("location:../memberPage/");
				}
				$users = mysqli_query($conn, "SELECT * FROM members WHERE purchases ==' '");
				while($row = mysqli_fetch_assoc($users)){
				/*$emailTo = $emailTo . $row["email"] . ",";
				$emailTo = $emailTo . "flyingpiechicken@gmail.com";*/
					$to      = $row["email"];
					$subject = $_POST["title"];
					$message = $_POST["text"];
					$headers = 'From: newsletter@buildmeblocks.com' . "\r\n" .
					    'Reply-To: newsletter@buildmeblocks.com' . "\r\n" .
					    'X-Mailer: PHP/' . phpversion();
					
					mail($to, $subject, $message, $headers);
					header("location:../memberPage/");
				}
			}
			
			else{
			
			
			}
		}
		
		}else{
		header("location:../about/");
		}
		
		/*
		*/
	}else{
		header("location:../about/");
		}
	
	include "memberPage2.php";
?>