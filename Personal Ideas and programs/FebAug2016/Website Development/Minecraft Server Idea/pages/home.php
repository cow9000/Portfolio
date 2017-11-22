<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="js/slideshow.js"></script>
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
					
					<div class="news">
					
					
					
						<div id="container" class="size3">
							<p class="title">Blog</p>
							<?php echo $news;?>
						</div>
					</div>
					
				</div>
			
			
				<div id="footer"></div>
			
			</div>
		</body>
</html>