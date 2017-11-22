<!DOCTYPE html>
<html lang="en">
<head>
<title>Build ME Blocks - Buy Programs</title>
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
<body id="page3">
<!--==============================header=================================-->
<?php echo $navagation; ?>
<!--==============================content================================-->
    <section id="content">
    	<div class="container_12">
        	<div class="wrapper">
                <div class="grid_8" style="width:95%;">
                	<div class="block type3">
                    	<div class="inner type2">
							<h3 id="bigT">Products</h3>
								<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
								
								<!-- Identify your business so that you can collect the payments. -->
								<input type="hidden" name="business" value="melissa@buildmeblocks.com">
								
								<!-- Specify a Buy Now button. -->
								<input type="hidden" name="cmd" value="_xclick">
								
								<!-- Specify details about the item that buyers will purchase. -->
								<input type="hidden" name="item_name" class="item_name" value="XXXX">
								<input type="hidden" name="currency_code" value="USD">
								
								<input type="hidden" name="custom" id='custom' value=<?php echo $username; ?>>
								<!-- Provide a dropdown menu option field. -->
								<input type="hidden" id="coupon" value=""/>
								<input type="hidden" name="on0" value="Type">Select the program <br />
								<select name="os0" class='selector'>
									<?php echo $value;?>
								</select> <br />
								<h4 style='color:white;'>Refferal Code</h4>
								<input id='refer' placeholder = ""></input>
								<?php echo $v;?>
								<h4 style='color:white;'>Coupon code</h4>
								<input class='coupon' placeholder = ""></input>
								<br>
								<!-- Display the payment button. -->
								<input  id="referbutton" type="image" name="submit" border="0"
								src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
								alt="PayPal - The safer, easier way to pay online">
								
								<img alt="" border="0" width="1" height="1"
								src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
								
								
								
								</form>
								
								<div class='desc' style='color:white; font-size:18px;'>Description</div>
								<div class='price' style='color:white; font-size:18px;'>Price</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--==============================footer=================================-->
    <?php echo $footer; ?>
</body>
</html>