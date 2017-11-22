<?php

	$conn = mysqli_connect("localhost","root","thechickenninja","bmb");
	$payment = "";
	$members = "";
	$page = "";
	$memberNames = "";
	$paymentNames = "";
	$members = "";
	$comments = "";
	$commentNames = "";
	$newsLetter = "";
	$settings = "
	<div id='container'></div>
	
	
	";
	session_start();

	
	
	if(isset($_SESSION["username"])){
	
		/*
		Put the normal member stuff here
		*/
		
		$isAdmin = mysqli_query($conn,"SELECT * FROM members WHERE admin='t' AND username='" . $_SESSION["username"] . "'");
		if(mysqli_num_rows($isAdmin) >= 1){
		
			if(isset($_GET["commentdelete"])){
					$deleteComment = mysqli_query($conn, "DELETE FROM comments WHERE id=" . $_GET["commentdelete"]);
					header("location:memberPage.php");
			}
			if(isset($_GET["commentapprove"])){
					$approve = mysqli_query($conn, "UPDATE comments SET approved='t' WHERE id=" . $_GET["commentapprove"]);
					header("location:memberPage.php");
			}
			if(isset($_GET["spam"])){
				$spam = mysqli_query($conn,"UPDATE comments SET spam='t' WHERE id=" . $_GET["spam"]);
				$getPoster = mysqli_query($conn, "SELECT poster FROM comments WHERE id=" . $_GET["spam"]);
				$getPoster2 = mysqli_fetch_array($getPoster);
				$getWarningNum = mysqli_query($conn, "SELECT warning FROM members WHERE username= '" . $getPoster2["poster"] . "'");
				$getNum = mysqli_fetch_array($getWarningNum);
				$warning = mysqli_query($conn,"UPDATE members Set warning=" . $getNum + 1 . " WHERE username='" . $getPoster2["poster"] . "'");
				header("location:memberPage.php");
			}
			if(isset($_GET["delete"])){
					$deleteUser = mysqli_query($conn, "DELETE FROM members WHERE id=" . $_GET["delete"]);
					header("location:memberPage.php");
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
					dailyquotes VARCHR(255) NOT NULL,
				)");
				
				
			}
		
		
		$result = mysqli_query($conn, "SELECT * FROM payment");
		while($row = mysqli_fetch_assoc($result)){
			$paymentNames = "<tr><td>".$row['username']."</td><td>" . $row['firstname'] . "</td><td>" . $row['lastname'] . "</td><td>" . $row["product"] . "</td><td>" . $row["price"] . "</td><td>" . $row["date"] . "</td></tr>" . $paymentNames;
		}
		
		$result = mysqli_query($conn, "SELECT * FROM members");
		while($row = mysqli_fetch_assoc($result)){
		$memberNames = 
			"<tr><td>".$row['username']."</td><td>" . $row['firstname'] . "</td><td>" . $row['lastname'] . "</td><td>" . $row["purchases"] . "</td><td>" . $row["date"] . "</td><td>" . $row["warning"] . "</td><td><a href='?delete=" . $row["id"] . "'><i style='color:red;' class='fa fa-times'></i></a></tr>"  . $memberNames;
		}
		
		$result = mysqli_query($conn, "SELECT * FROM comments WHERE approved = 'f' AND spam='f'");
		if($result){
			while($row = mysqli_fetch_assoc($result)){
				$blogTitle1 = mysqli_query($conn,"SELECT * FROM blog WHERE id = " . $row["blogid"]);
				$blogTitle = mysqli_fetch_assoc($blogTitle1);
				$commentNames = "<tr><td>" .$row["poster"] . "</td><td>" . $row["text"] . "</td><td>" . $blogTitle["title"] . "</td><td>" . $row["date"] . "</td><td>" . "<a href='?commentdelete=" . $row["id"] . "'>Delete</a> <a href='?commentapprove=" . $row["id"] ."'>Accept</a><a href='?spam=" . $row["id"] . "'>Spam</a>" . "</td></tr>" . $commentNames;
			
			}
		}
		
		
			
			
			
			$payment = "<table><tr>
			<th>Username</th>
			<th>First name</th>
			<th>Last name</th>
			<th>Product Bought</th>
			<th>Price payed</th>
			<th>Date bought</th>
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
				<th>Actions</th>
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
		
		
		
		
	$page = "
		<div id='navBar'>
			<div class='btn-group open'>
				<ul>
					<li><a href='#' id='payments'><i class='fa fa-money'></i>Payments</a></li>
					<li><a href='#' class='btn btn-primary' id='member'><i class='fa fa-user fa-fw ' ></i>Users</a></li>
					<li><a href='#' id='comments'><i class='fa fa-list-alt ' ></i>Comments</a></li>
					<li><a href='#' id='newsletter' ><i class='fa fa-paper-plane'></i>News letter</a></li>
					<li><a href='#' id='settings' ><i class='fa fa-cog'></i>Settings</a></li>
				</ul>
			</div>
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
		</div>";
		
		}else{
		header("location:about.php");
		}
		
		/*
		$to      = 'nobody@example.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
		*/
	}else{
		header("location:about.php");
		}
	
	include "memberPage2.php";
?>