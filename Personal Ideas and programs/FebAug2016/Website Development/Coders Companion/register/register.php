	<html>
		<head>
			<title>Sign up</title>
			<link rel="stylesheet" href="Styles/style.css" type="text/css">
            <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Josefin Slab">
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
			<script src="Script/javascript.js"></script>
		</head>
			<body>
                <div id="top">
					<p class="biglink">Coders Island</p>
                </div>
					<div id="top2">
						<span id="tester">
						<a href="../code" id="htmlB">Code</a>
						<a href="../home" id="cssB">Home</a>
						</span>
					</div>
						<div id="bigText">Login / Sign up</div>
						<div id="outer">
						<div id="border"></div>
						</div>
						<p id="smallT"></p>
						
						<form action='index.php' method="post">
						
						<center>
						<div id="Signup">
							<?php 
								echo $usernameProblem; 
								echo $passwordProblem;
								echo $emailProblem;
							?>
							
							<div>
								<label for="username" id="username">
								<input type="text" placeholder="Username" name="username" id="username" value="<?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?>"/>
								</label>
							</div>
							
							
							<div>
								<label for="password">
								<input type="password" placeholder="Password" name="password" id="password" value="<?php echo htmlspecialchars($password, ENT_QUOTES, 'UTF-8'); ?>"/>
								</label>
							</div>
							
							<span style="background-color:#D0E9FD; width:64px; height:64px; display:block;"></span>
							<span style="background-color:#9DC1D4; width:64px; height:64px; display:block;"></span>
							<span style="background-color:#588EA7; width:64px; height:64px; display:block;"></span>
							<span style="background-color:#789189; width:64px; height:64px; display:block;"></span>
							<span style="background-color:#F5E8C2; width:64px; height:64px; display:block;"></span>
							
							<div>
								<label for="rpassword">
								<input type="password" placeholder="Retype Password" name="rpassword" id="rpassword" value="<?php echo htmlspecialchars($rpassword, ENT_QUOTES, 'UTF-8'); ?>"/>
								</label>
							</div>
							
							
							
							<div>
								<label for="email">
								<input type="text" placeholder="Email" name="email" id="email" value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>"/>
								</label>
							</div>
							
							
							
							
							
							<div>
								<input type="submit" value="Sign up!"/>
							</div>
						</form>
						</div>
						
						<div id="login">
						
							<?php 
								echo $signInError; 
							?>
						<form action='index.php' method="post">
							<div>
								<label for="usernameSign">
								<input type="text" name="usernameSign" id="usernameSign" placeholder="Username" value="<?php echo htmlspecialchars($usernameSign, ENT_QUOTES, 'UTF-8'); ?>"/>
								</label>
							</div>
							
							<div>
								<label for="passwordSign">
								<input type="password" name="passwordSign" id="passwordSign" placeholder="Password" value="<?php echo htmlspecialchars($passwordSign, ENT_QUOTES, 'UTF-8'); ?>"/>
								</label>
							</div>
							<div>
								<input type="submit" name="login" value="Log in"/>
							</div>
						</form>
						</div>
						
						
						<div id="loginButton">Login</div>
						<div id="registerButton">Register</div>
						
						
						
						</center>
						
						
						<div id="outer">
						
						</div>
			</body>
</html>