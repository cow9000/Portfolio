<!DOCTYPE html>
<html lang="en">
<head>
<title>Build ME Blocks - Login</title>
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
        <div class="container">
        	<div class="block type3">
            	<div class="inner">
                	<h3 class="t_left p3">Login</h3>
                    <div class="wrapper p1">
                        <article class="col-3">
							<?php echo $error; ?>
                        	<form action="../login/" method="post">
                        		<p>Username</p>
								<input type='text' name="username" placeholder="Username"></input>
								<br>
								<p>Password</p>
								<input type="password" name="password" placeholder="Password"></input>
								<br>
								<input type="submit" value="Log in"></input>
							</form>
							<a href="../forgotpass" style="color:white;">Forgot password? Click here</a>
							<Br>
							<a href="../register" style="color:white;">Create an account.</a>
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