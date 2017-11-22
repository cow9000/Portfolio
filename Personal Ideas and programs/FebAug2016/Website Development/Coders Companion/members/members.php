	<html>
		<head>
			<title>Sign up</title>
			<link rel="stylesheet" href="Styles/style.css" type="text/css">
            <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Josefin Slab">
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		</head>
			<body>
                <div id="top">
					<p class="biglink">Coders Island</p>
					<a href="#" style="top:0; right:0; position:absolute; margin-top:32px; margin-right:32px; color:white;">
					</a>
                </div>
					<div id="top2">
						<span id="tester">
						<a href="../home" id="htmlB">Home</a>
						<a href="../code" id="cssB">Code</a>
						<a href="#" id="jsB">Upgrade</a>
						</span>
					</div>
						<div id="bigText"><?php echo "Settings - " . $username; ?></div>
						<div id="outer">
						<div id="border"></div>
						<?php
							echo $settings;
						?>
						
			</body>
</html>