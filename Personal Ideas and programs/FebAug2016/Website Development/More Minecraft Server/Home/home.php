<!DOCTYPE html>
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
						
							<div id="right">
								<?php echo $rl;?>
							</div>
						
					</div>
				</div>
					<?php echo $post; ?>
				<div id="main">
					<div id="content">
						<div class="title">News
						</div>
						
						<div id='newsContent'>
						
						<?php echo $news; ?>
						
						</div>
					</div>
				</div>
				
				<div id="footer"></div>
			</div>
		</body>
</html>