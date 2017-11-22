<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">    
    <script src="js/jquery-1.6.min.js" type="text/javascript"></script> 
    <script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
    <script src="js/superfish.js" type="text/javascript"></script>            
    <script src="js/script.js" type="text/javascript"></script>
    <script src="js/cufon-refresh.js" type="text/javascript"></script>   
    <script src="js/jquery.jcarousel.js" type="text/javascript"></script> 
	<script src="js/custom.js" type="text/javascript"></script> 
    <script type="text/javascript">
		$(document).ready(function() {
			$(".carousel_box").jcarousel({
										 });
		});
	</script>        
  	<!--[if lt IE 7]> 
		<div style=' clear: both; text-align:center; position: relative;'> <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" alt="" /></a></div>  
	<![endif]-->
 		<!--[if lt IE 9]>
         	<script type="text/javascript" src="js/html5.js"></script>
            <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
     	<![endif]-->
</head>
<body id="page2">
<!--==============================header=================================-->
<header> <div class="inner"> <div class="main"> <h1><a href="index.html">School</a></h1> <div class="address"> <?php echo $welcomeUser; ?><br> Daily quote </div> <nav> <ul class="menu"> <li class="item1"><span><a href="about.php">About</a></span> <ul> <li><a href="philosophy.php">Philosophy</a></li> <li><a href="faq.php">FAQ's</a></li> </ul> </li> <li class="item2"><span><a href="programs.php">Programs</a></span> <ul id="2"> <li><a href="sam.php">secret agent mission</a></li> </ul> </li> <li class="item3"><span><a href="resources.php">Resources</a></span> <ul id="3"> <li><a href="resources.php?selection=1#slider1">Websites</a></li> </ul> </li> <li class="item4"><span><a href="blog.php">Blog</a></span> <ul id="4"> <li><a href="share.php">Share</a></li> <li><a href="forum.php">Forum</a></li> </ul> </li> <li class="item5"><span><a href="contact.php">Contact<br>us</a></span></li> <li class="item6"><span><a href="joinus.php">Join<br>Us</a></span> <ul id="6"> <li><a href="member.php">Becoming a member</a></li> <li><a href="login.php">Login</a></li> <li><a href="register.php">Register</a></li> </ul> </li> </ul> </nav> </div> </div> </header>
<!--==============================content================================-->
    <section id="content">
    	<div class="container_12 p5">
        	<div class="wrapper">
            	<div class="grid_4">
                	<div class="block type1">
                    	<div class="inner">
                        	<h3 id="bigT"></h3>
                            <figure><img src="images/page2_img1.jpg" alt="" /></figure>
                            <p class="large_text p1">Want access to this program?</p>
                            <p class="p5">If you want access to this program, you can buy it by clicking the "Buy now" link.</p>
                            <a href="buy.php" class="link-1">Buy now</a>
                        </div>
                    </div>
                </div>
                <div class="grid_8">
                	<div class="block type2">
                    	<div class="inner">
                        	<h3 id="bigT">Programs</h3>
							Create! With a few simple materials you are able to take the everyday task of repetitive teaching to anew level with interactive games for you and your child.  Go from lack of motivation to getting thingsdone to completing a task with a sense of purpose and an “I Did It!” attitude.  Help your child realize their potential, growth and the importance of hard work.  Establish an earning system to help keep your child motivated and to encourage that with hard work, persistence and dedication count.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--==============================footer=================================-->
    <footer>	
    	<div class="container">
        	<div class="wrapper">
                <ul class="footer_menu">
                    <li><a href="about.php" class="active">About</a></li>
					<li><a href="blog.php">Blog</a></li>
					<li><a href="programs.php">Programs</a></li>
					<li><a href="resources.php">Resources</a></li>
					<li><a href="login.php">Login</a></li>
					<li><a href="memberPage.php">Member page</a></li>
					<li><a href="faq.php">FAQ</a></li>
					<li><a href="forum.php">Forum</a></li>
					<li><a href="joinus.php">Join Us</a></li>
					<br>
					<li><a href="philosophy.php">Philosophy</a></li>
					<li><a href="tos.php">Terms of Service</a></li>
					<li><a href="settings.php">Settings</a></li>
                </ul>
                <div class="copy">
						BuildMEBlocks&copy;2015 <a href="privacy.php" class="link">Privacy Policy</a>
					</div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
