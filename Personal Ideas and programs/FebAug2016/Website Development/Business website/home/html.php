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
					<li class="selected"><a href="../home">Home</a></li>
					<li><a href="">Membership</a></li>
					<?php echo $register; ?>
					<?php echo $login; ?>
				</ul>
			</div>
			
			<div class="inner-wrapper">
				
				<div class="body">
					<h1><span>Projects</span></h1>
					<h2>that were created by other peoples inspiration</h2>
					<div class="proContainer">
                        <div class="profile">
							<div class="title"><?php echo $username; ?></div>
							<div class="description">Needs work, just for representation. Will include picture and profile pic</div>
                        </div>
						<div class="project">
                            <!--Store file paths in database and not actual picture-->
                            <img class="picture" src="https://img.ifcdn.com/images/8d5b70228fb96b68d6da00c05c30fb4e3c0dd4145b2ae21630c90da6e5bf6697_1.gif"></img>
                            <div class="user">cow9000</div>
							<div class="title">Title here</div>
							<div class="description">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra.</div>
                            <div class="tags"></div>
                        </div>
						<div class="project">
                            <!--Store file paths in database and not actual picture-->
                            <img class="picture" src="http://i.imgur.com/QMMtsAt.gif"></img>
                            <div class="user">Hamch222</div>
							<div class="title">Chinese chickens</div>
							<div class="description">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra.</div>
                            <div class="tags"></div>
                        </div>
                        <div class="project">
                            <!--Store file paths in database and not actual picture-->
                            <img class="picture" src="http://www.pandora.com/img/content-area/albumart-treatment-previous.png"></img>
                            <div class="user">hax0r333</div>
							<div class="title">Creating a robot</div>
							<div class="description">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra.</div>
                            <div class="tags"></div>
                        </div>
					</div>
				</div>
			</div>		
		</div>
	</body>
</html>