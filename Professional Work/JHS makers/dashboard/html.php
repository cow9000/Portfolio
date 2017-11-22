<!DOCTYPE html>
<html>
	<head>
		<!--http://www.colorcombos.com/color-schemes/124/ColorCombo124.html-->
		<!--https://www.siteinspire.com/websites/4719-circle-->
		<link rel="stylesheet" href="../css/reset.css" type="text/css">
		<link rel="stylesheet" href="../css/home.css" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script src="../js/scrolling.js" type="text/javascript"></script>
		<script src="../js/project.js" type="text/javascript"></script>
		<title>Planet2K</title>
	</head>
	<body>
		<div class="outer-wrapper">
			
			<div class="navagation">
				<ul>
					<li><a href="../home">Home</a></li>
					<li><a href="">Membership</a></li>
					<li><a href="../register/">Register</a></li>
					<?php echo $login; ?>
				</ul>
			</div>
			
			<div class="inner-wrapper">
				
				<div class="body">
					<h1><span>Login</span></h1>
					<h2>Don't have an account? <a href="../register/">Register</a></h2>
					<form action="../home/index.php" method="POST">
						<input type="text" name="email"></input>
						<input type="text" name="password"></input>
					</form>
				</div>
			</div>		
		</div>
	</body>
</html>