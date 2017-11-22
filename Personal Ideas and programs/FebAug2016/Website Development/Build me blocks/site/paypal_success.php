<?php
	session_start();
	$conn = mysqli_connect("localhost","root","thechickenninja","bmb");
	$amount = $_GET[‘amt’];
	$currency = $_GET[‘cc’];
	$trx_id = $_GET[‘tx’];
	if($amount==$total){
	
	$getMemberInfo = mysqli_query($conn, "SELECT * FROM members WHERE username='" . $_SESSION["username"] . "'")
	$getStuff = mysqli_fetch_assoc($getMemberInfo);
	
	
	$insertPayment = mysqli_query($conn, "INSERT INTO payment(username,firstname,lastname,product,price,date) VALUES(
		'" . $_SESSION["username"] . "',
		'" . $getStuff["firstname"] . "',
		'" . $getStuff["lastname"] ."',
		'" . "bmb" . "',
		'" . $amount . "',
		NOW()
	
	
	
	)");
	
	$makeMember = mysqli_query($conn, "UPDATE members SET purchases='true' WHERE username='" . $_SESSION["username"] . "'");
	}else{
		header("location:about.php");
	
	}
	
?>