<html>
	<head>
		<link rel="stylesheet" href="../Styles/style.css" type="text/css">
	</head>
		<body>
			<div id="wrapper"> <!--Wrapper, keeps everything in place-->
				<div id="nav"> <!--For links-->
					<div class="links"> <!--Link section-->
						<ul>
							<li><a href="../home">Home</a></li>
							<li><a href="../profile">Profile</a></li>
							<li><a href="../forum">Forum</a></li>
							
							
							
						</ul>
						
						
					</div>
				</div>
				
				<div id="main">
					<div id="content">
						<div class="title">Login</div>
							<div id="error">
								<?php echo $signInError; ?>
							</div>
							
							<form method="post" action="index.php">
								<input type="text" name="loginuser" placeholder="Username" value="<?php echo $username; ?>"></input>
								<input type="password" name="loginpass" placeholder="Password" value="<?php echo $password; ?>"></input>
								<input type="submit" name="submit" value = "Log in"></input>
							</form>
					</div>
				</div>
				
				<div id="footer"></div>
			</div>
		</body>
</html>
			
		</body>
</html>