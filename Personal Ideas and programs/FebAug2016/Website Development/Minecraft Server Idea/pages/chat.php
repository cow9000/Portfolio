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
					
					<div class="chat">
					
					
						<form action="javascript:">
							<input type="text" id="chatInput"></input>
							<input type="submit" onclick="getChatInput()" value="Send message"></input>
						</form>
						<div id="container" class="size2">
							<p class="title">Server Chat - <?php if(getIp("serenityus.noip.me",25566)){echo "<span class='online'>Online</span>";}else{echo"<span class='offline'>Offline</span>";}  ?></p>
							<div id="chat">
								
							</div>
							<input type="hidden" id="player"></input>
							
						</div>
						
						<div id="container" class="size2">
								<p class="title">Online players - </p>
								<div id="online">
								
								</div>
						</div>
						
					</div>
					
				</div>
			
			
				<div id="footer"></div>
			
			</div>
		</body>
</html>