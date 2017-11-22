<!DOCTYPE html>
<html>
	<head>
		<title>Jordan High School Makers Collective Club - Contact Us</title>
		<link rel="stylesheet" href="styles/reset.css" type="text/css"></link>
		<link rel="stylesheet" href="styles/style.css" type="text/css"></link>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Contact the Jordan High School Makers Collective Club"/>
		<meta name="keywords" content="Makers Collective Club, Makers, Jordan High school, contact makers collective, contact Jordan High School Makers Collective" />
		<meta name="robots" content="index,follow" />
		<?php echo $style; ?>
	</head>
	<body>
		<div id="top">
			<span class='title12'>Jordan High School</span>
			<span class='title2'>Makers Collective</span>
		</div>
		<div id="nav">
			<div class="bottom">
				<li><a href='index.php'>About us</a></li>
				<li><a href='contact.php'>Contact us</a></li>
				<li><a href='member.php'>Members</a></li>
				<li><a href='event.php'>2016 Events</a></li>
				<li><a href='blog.php'>Daily Blog</a></li>
				<li><a href='fund.php'>Fundraising</a></li>
				<li><a href='log.php'>Login</a></li>
			</div>
		</div>
		<div id="wrapper">
			<div id="main">
				<div id="container">
					<div class='content m sh y t11'>
						<div class='inside'>
							<?php echo $events; ?>
						</div>
					</div>
					<div class='content s sh y t12'>
						<div class='inside'>
							<?php echo $anchor; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>