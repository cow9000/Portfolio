<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../css/login.css" type="text/css">
		<link rel="stylesheet"  href="../css/reset.css" type="text/css">
		<title>Planet2K</title>
	</head>
	<body>
		<div class="outer-wrapper">
			<div class="inner-wrapper">
				<div class="body">
					<div class="container">
						<form action="loginScript/index.php" method="POST" class="login">
							<h3>Administrative login</h3>
							<h1><?php echo $error; ?></h1>
							<input type="text" name="username" placeholder="Username"></input>
							<input type="text" name="password" placeholder="Password"></input>
							<input type="submit" value="Login" class="button"></input>
							<h2>Need username and password? Contact Derek Vawdrey at Flyingpiechicken@gmail.com.</h2>
						</form>
					</div>
				</div>
			</div>		
		</div>
	</body>
</html>