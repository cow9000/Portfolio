<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="js/slideshow.js"></script>
		<script type="text/javascript" src="js/chat.js"></script>
	</head>
		<body>
			<div id="wrapper">
				<div id="header">
					<div class="loginbar">
						<?php echo $memberInfo; ?>
					</div>
					
					<div class="linkBar">
						<?php echo $nav; ?>
					</div>
					
				</div>
				
				<div id="main">
					<div id="slideshow">
							<img id="image" src="Images/slideshow/1.jpg"></img>
							<div class="cover"></div>
							
							<div class="desc">
								<div id="title">Title</div>
								<div id="text">Text of box</div>
							</div>
							<div class="timer">
								<div id="timer">
								
								</div>
							</div>
						
					</div>
					
					<div class="login">
					
					
						<div id="container" class="size2">
							<p class="title">Login</p>
							<form method="POST" action="login.php">
							
							
							</form>
						</div>
						<div id="container" class="size2">
							<p class="title">Register</p>
							<form method="POST" action="login.php">
							
							
							</form>
						</div>
					</div>
					
				</div>
			
			
				<div id="footer"></div>
			
			</div>
		</body>
</html>