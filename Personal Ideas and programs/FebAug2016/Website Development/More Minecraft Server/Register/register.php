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
						<div class="title">Register</div>
							<div id="errorHolder">
								<?php
									echo $error;
								?>
							</div>
							<form method="post" action="index.php">
								<input type="text" name="username" placeholder="Username" value="<?php echo $username;?>"></input>
								<input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>"></input>
								<input type="password" name="retypepassword" placeholder="Retype your password" value="<?php echo $retypepassword; ?>"></input>
								<input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>"></input>
								<input type="submit" name="submit" value="Submit">
							</form>
							
							<?php
								echo $success;
							?>
					</div>
				</div>
				
				<div id="footer"></div>
			</div>
			
		</body>
</html>