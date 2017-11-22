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
	<script src="js/custom.js" type="text/javascript"></script> 
  	<!--[if lt IE 7]> 
		<div style=' clear: both; text-align:center; position: relative;'> <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" alt="" /></a></div>  
	<![endif]-->
 		<!--[if lt IE 9]>
         	<script type="text/javascript" src="js/html5.js"></script>
            <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
     	<![endif]-->
</head>
<body id="page4">
<?php echo $navagation; ?>
<!--==============================content================================-->
    <section id="content">
        <div class="container">
        	<div class="block type3">
            	<div class="inner">
                	<h3 class="t_left p3">Member login</h3>
                    <div class="wrapper p1">
                        <article class="col-3">
                        	<form action="../fps?id=<?php echo $_GET['id']?>/" method="post">
								New password:    <input type='password' name="password" placeholder="Password"></input>
								<Br>
								retype password: <input type='password' name="repassword" placeholder="Password"></input>
								<input type="submit" value="Change password"></input>
							</form>
							
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