<html>
	<head>
		<title><?php echo $title; ?></title>
		<!--Does not have to make any modifications to the scripting-->
		<meta name="Description" content="Build ME Blocks discovered in 2011 brought to life in 2015 focuses on helping children and parents meet the demands of the world.">
		<meta name="Keywords" content="Too bad my kids don't come with a manual, Manual for kids, How to guide for parents, About Kids, Books about kids for parent, Books for parents about kids, Parenting Books, Parenting Guide, Teaching kids to love reading, DIY activities for parents and kids, Kids fun, DIY kids games, Educational programs for kids, Education programs for children, Helping children enjoy learning, home preschool, homeschool, Educational games for kids/children, Helping children love reading, Leadership skills for kids/children, Leadership traits for kids/children, Family, Family organization, Kids and Boredom, Activities for Kids/Children, Activities for Parents and Kids, Email for Kids, Calendar for Kids, Leadership Calendar for Kids, Values for Kids, Character traits for kids, Rewards for kids, Motivation for kids,">
		    <meta charset="utf-8">
		<script async="" src="//www.google-analytics.com/analytics.js"></script><script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-65508800-1', 'auto');
		  ga('send', 'pageview');
		
		</script>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		    <link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen">
		    <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
		    <link rel="stylesheet" href="../css/grid.css" type="text/css" media="screen">    
		    <link rel="stylesheet" href="style.css" type="text/css" media="screen">   
		    <script src="../js/jquery-1.6.min.js" type="text/javascript"></script> 
		    <script src="../js/jquery.easing.1.3.js" type="text/javascript"></script>
		    <script src="../js/superfish.js" type="text/javascript"></script>       
		    <script src="../js/tms-0.3.js" type="text/javascript"></script>           
		    <script src="../js/tms_presets.js" type="text/javascript"></script>           
		    <script src="../js/script.js" type="text/javascript"></script>         
		    <script src="../js/cufon-refresh.js" type="text/javascript"></script>   
		    <script src="text.js" type="text/javascript"></script>  
		  	<!--[if lt IE 7]> 
				<div style=' clear: both; text-align:center; position: relative;'> <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="00000000000000" border="0" alt="" /></a></div>  
			<![endif]-->
		 		<!--[if lt IE 9]>
		         	<script type="text/javascript" src="../js/html5.js"></script>
		            <link rel="stylesheet" href="../css/ie.css" type="text/css" media="screen">
		     	<![endif]-->
		     	
		     	<!--THIS IS THE END OF THE HEADER, NOTHING ELSE GOES IN THE HEAD.-->
			
	</head>
	<!--THIS IS THE BODY-->
	<body>
			
	
		<br>
		<br>
		<br>
		<br>
		<h3 style='color:black;'>CURRENTLY EDITING - <?php echo $page; ?></h3>
		<br>
		<br>
		<br>
		<br>
		<!--Get the body, navagation, and footer.-->
		<!--THIS PAGE DOES NOT NEED NAVAGATION AND FOOTER.-->
		<!--NAVAGATION GOES HERE.-->
		<?php echo "<div id='pageTitle' contenteditable='true'>" . $title . "</div><div id='pageInfo'>" . $body . "</div><div style='position:fixed; bottom:0;'><form method='POST' action='index.php'><input type='hidden' class='pageText' name='info'></input><input type='hidden' class='pageTitle' name='title'></input><input type='hidden' name='page' value='" . $page ."'></input><input type='submit' value='Save page' class='hover'></input></form></div>"; ?>
		<!--FOOTER GOES HERE-->
		</div>
		
		
	</body>
</html>