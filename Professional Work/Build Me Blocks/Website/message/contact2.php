<!DOCTYPE html>
<html lang="en">
<head>
<title>Build ME Blocks - Contact us</title>
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
    <script src="../js/forms.js" type="text/javascript"></script>  
	<script src="../js/custom.js" type="text/javascript"></script> 
    <script type="text/javascript">
		$(function(){
			$('#contact-form').forms({
				ownerEmail:'mail@companyname.com'
			})
            });		
	</script> 
  	<!--[if lt IE 7]> 
		<div style=' clear: both; text-align:center; position: relative;'> <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" alt="" /></a></div>  
	<![endif]-->
 		<!--[if lt IE 9]>
         	<script type="text/javascript" src="../js/html5.js"></script>
            <link rel="stylesheet" href="../css/ie.css" type="text/css" media="screen">
     	<![endif]-->
</head>
<body id="page6">
<?php echo $navagation; ?>
<!--==============================content================================-->
    <section id="content">
    	<div class="container_12">
        	<div class="wrapper">
                <div class="grid_12">
                	<div class="block type3">
                    	<div class="inner">
                        	<h3 id='bigT'>Write to us!</h3>
                        	<p class="large_text p1">Write to Us! Watch for your messages to be posted on our blog.  
                        	We look forward to hearing about your fun missions. 
                        	
                        	<Br><br>*Remember to get your parent’s permission to write to us first. 
                        	
                        	<br><br>-Max & Elena</p>
                            <form action="../contact/" method="post">
                            <div  id="contact-form">
                                  <input type="text" style='color:white;' placeholder='Name' name="name"></input>
                                  <p><br></p>
                                  <textarea style='color:white;' name="message"></textarea>
                                  <p><br></p>
                                <div class="clear"></div>
                                
                                <input type='submit' value="Send Message"></input>
                                
                                </div>
                            </form>
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