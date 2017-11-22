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
					<?php echo $register; ?>
					<?php echo $login; ?>
				</ul>
			</div>
			
			<div class="inner-wrapper">
				
				<div class="body">
					<h1><span>Login</span></h1>
					<h2 style="color:transparent;">_</h2>
					<form action="../home/index.php" method="POST">
						
						<h2>Email</h2>
						<input type="text" name="email"></input>
						<h2>Password</h2>
						<input type="password" name="password"></input>
						<input type="submit" value="Login"></input>
						<a href="../login/">Forgot your password?</a>
					</form>
					
				</div>
			</div>		
		</div>
	</body>
</html>