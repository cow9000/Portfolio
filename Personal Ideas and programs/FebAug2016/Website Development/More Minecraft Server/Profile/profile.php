<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../Styles/style.css" type="text/css">
		<title>Roluikcraft - Profile page</title>
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
						
							<div id="right">
								<?php echo $rl;?>
							</div>
						
					</div>
				</div>
			
				<div id="main"> <!--Main content-->
					
					
					
					<div class="profile">
						<?php echo $src; ?>
						<div class="username"><?php echo $user; ?></div>
						<?php echo $settings; ?>
					</div>
					
					
					
					<div class="stat">
						<p class="bigText">Stats</p>
						<p>Level - <?php echo $level ?></p>
						
						<p style="display:inline;">Bio - <?php echo $bio ?></p>
						<?php echo $setBio; ?>
					</div>
					
				</div>
				
				<div id="footer"> <!--At bottom of page-->
					
					
				</div>
			</div>
		</body>
</html>