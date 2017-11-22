<?php
	if(session_status() == 0) session_start();
	if(!isset($_SESSION["username"])){
		header("location:../home");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<!--http://www.colorcombos.com/color-schemes/124/ColorCombo124.html-->
		<link rel="stylesheet" href="../css/reset.css" type="text/css">
		<link rel="stylesheet" href="../css/home.css" type="text/css">
		<title>Planet2K</title>
	</head>
	<body>
		<div class="outer-wrapper">
			<div class="inner-wrapper">
				<div class="navagation">
					<div class="upper">
						<ul>
							<li><a href="#">Login</a></li>
							<li><a href="#">Register</a></li>
							<i></i>
						</ul>
					</div>
					
					<div class="lower">
						<div class="lowest"></div>
						<div class="lowest">
							<ul>
								<li><a href="#">Login</a></li>
								<li><a href="#">Register</a></li>
								<li><a href="#">Login</a></li>
								<li><a href="#">Register</a></li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="body">
					
				</div>
			</div>		
		</div>
	</body>
</html>