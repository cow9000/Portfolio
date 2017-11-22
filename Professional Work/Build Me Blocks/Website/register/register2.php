<!DOCTYPE html>
<html lang="en">
<head>
<title>Build ME Blocks - Register</title>
<meta name="Description" content="Build ME Blocks discovered in 2011 brought to life in 2015 focuses on helping children and parents meet the demands of the world.">
<meta name="Keywords" content="Too bad my kids don't come with a manual, Manual for kids, How to guide for parents, About Kids, Books about kids for parent, Books for parents about kids, Parenting Books, Parenting Guide, Teaching kids to love reading, DIY activities for parents and kids, Kids fun, DIY kids games, Educational programs for kids, Education programs for children, Helping children enjoy learning, home preschool, homeschool, Educational games for kids/children, Helping children love reading, Leadership skills for kids/children, Leadership traits for kids/children, Family, Family organization, Kids and Boredom, Activities for Kids/Children, Activities for Parents and Kids, Email for Kids, Calendar for Kids, Leadership Calendar for Kids, Values for Kids, Character traits for kids, Rewards for kids, Motivation for kids,">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="../css/grid.css" type="text/css" media="screen">    
    <script src="../js/jquery-1.6.min.js" type="text/javascript"></script> 
    <script src="../js/jquery.easing.1.3.js" type="text/javascript"></script>
    <script src="../js/superfish.js" type="text/javascript"></script>          
    <script src="../js/script.js" type="text/javascript"></script>
    <script src="../js/cufon-refresh.js" type="text/javascript"></script>   
	<script src="../js/custom.js" type="text/javascript"></script> 
  	<!--[if lt IE 7]> 
		<div style=' clear: both; text-align:center; position: relative;'> <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" alt="" /></a></div>  
	<![endif]-->
 		<!--[if lt IE 9]>
         	<script type="text/javascript" src="../js/html5.js"></script>
            <link rel="stylesheet" href="../css/ie.css" type="text/css" media="screen">
     	<![endif]-->
</head>
<body id="page4">
<?php echo $navagation; ?>
<!--==============================content================================-->
    <section id="content">
    	<!--<div class="container_12">
        	<div class="wrapper">
                	<div class="block type3">
                    	<div class="inner type2">
                        	<h3 id="bigT">Join Us</h3>
                            <div class="wrapper p5">
							<p class='large_text p1'>Be a part of something meaningful! Build ME Blocks is excited for each person that brings the programs into their home.  We know kids love games, need to learn how to interact in the real world and are motivated by earnings and rewards.  Purchase the Build ME Blocks program materials and be on your way to an exciting, fun, learning experience! </p>
							
							</div>
                        </div>
                    </div>
            </div>
        </div>-->
        <div class="container">
        
        	<div class="block type3">
            	<div class="inner">
                	<h3 class="t_left p3">Registration form</h3>
                	<P class="large_text p1">Register to access the Max and Elena Blog</P>
                	<a href="../pricing" class="link-1">Store</a>
                    <div class="wrapper p1">
                        <article class="col-3">
							<?php echo $errors; ?>
							<div id="register">
                        	<form action="../register/" method="post">
								<input type='text' name="username" placeholder="Username" value="<?php echo $userInput?>"></input>
								<input type="password" name="password" placeholder="Password" value="<?php echo $passwordInput?>"></input>
								<input type="password" name="repassword" placeholder="Retype Password" value="<?php echo $repasswordInput?>"></input>
								<input type='text' name="email" placeholder="Email" value="<?php echo $emailInput?>"></input>
								<input type='text' name="fname" placeholder="First name" value="<?php echo $firstnameInput?>"></input>
								<input type='text' name="lname" placeholder="Last name" value="<?php echo $lastnameInput?>"></input>

								<p style='color:white;'>If it is okay to have your Child’s messages randomly selected to post to the Max and Elena blog, click the box below.</p>
								<input type="checkbox" name="kids" value="accepted" style="width:16px; display:inline-block; margin:0; padding:0;">
																<p style='color:white; display:inline;'>I give permission to have my kids messages posted on the Max and Elena blog</p>
								<input type="checkbox" name="newsletterC" value="accepted" style="width:16px; display:inline-block; margin:0; padding:0;">
																<p style='color:white; display:inline;'>I want to recieve newsletters.</p>
								<br>
								<br>
								<p style='color:white;'>By registering, you are agreeing to the <a style='color:white;' href="tos.php">Terms of Service</a> and the <a style='color:white;' href="../privacy">Privacy Policy</a>.</p>
								<br>
								<input style="cursor:pointer;" type="submit" value="Register"></input>
							</form>
							</div>
							</article>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--==============================footer=================================-->
    <?php echo $footer; ?>
</body>
</html>