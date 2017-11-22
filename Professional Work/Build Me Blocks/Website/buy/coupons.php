<?php
	$conn = mysqli_connect("localhost","buildm10_bmb","!billsyall@.c","buildm10_bmb");
	session_start();
	if(isset($_GET["coupon"])){
	
		$getPercent = mysqli_query($conn,"SELECT * FROM Coupons WHERE couponcode='" . $_GET["coupon"] . "'");
			while($row = mysqli_fetch_assoc($getPercent)){
			if($row){
			        if($row["percent"] == "free"){
			        	if(isset($_GET["click"])){
				        	$name = $_GET["name"];
				        	$user = $_SESSION["username"];
				        	$getMemberInfo = mysqli_query($conn, "SELECT * FROM members WHERE username='" . $user . "'");
						$getStuff = mysqli_fetch_assoc($getMemberInfo);
						
						
						$insertPayment = mysqli_query($conn, "INSERT INTO payment(username,firstname,lastname,product,price,date,coupon) VALUES(
							'" . $user . "',
							'" . $getStuff["firstname"] . "',
							'" . $getStuff["lastname"] ."',
							'" . $_GET["name"] . "',
							'" . "Free" . "',
							NOW(),
							'" . $row["couponcode"] . "'
						
						
						)");
						$makeMember = mysqli_query($conn, "INSERT INTO purchases(username,purchase) VALUES ('" . $user . "','" . $_GET["name"] . "')");
				        	echo "1.0";
				        	return "1.0";
				        	header("location:../bought");
			        	}else{
			        		echo "1.0";
			        		return "1.0";
			        	}
			        	
			        }else{
					if($row["percent"] == "100"){
						echo "1.0";
						return "1.0";
					}else{
					echo  "0." . $row["percent"];
					return "0." . $row["percent"];
					}
				}
			}else{
				echo "false";
				return "false";
			}
			}
		
	}

?>