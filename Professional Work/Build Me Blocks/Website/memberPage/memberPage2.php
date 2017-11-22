<html>
	<head>
		<link rel="stylesheet" href="memberStyle.css" type="text/css">
		<link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.min.css">
    	<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="../css/grid.css" type="text/css" media="screen">    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../js/jquery-1.6.min.js" type="text/javascript"></script> 
    <script src="../js/jquery.easing.1.3.js" type="text/javascript"></script>
    <script src="../js/superfish.js" type="text/javascript"></script>        
    <script src="../js/script.js" type="text/javascript"></script>
    <script src="../js/cufon-refresh.js" type="text/javascript"></script>   
		
		<script>
			$(document).ready(function(){
								
								
					$(".selector").change(function() {
					
					    var $value = $(this).val();
					
					    var $title = $(this).children('option[value='+$value+']').html();
					
					    alert($title);
					
					    $('input#bacon').val($title).css('border','3px solid blue');
					
					});
					
					
					$imageNumber = 1;
					
					window.addAnother = function(){
						$imageNumber += 1;
						$(".uploadFiles").append("<input name='userfile" + $imageNumber.toString() + "' type='file' onchange='addAnother()'>");
					}
					
			
					if (window.location.href.indexOf("#payments") > -1) {
					$("#paymentMain").css("display","block");
					$("#memberMain").css("display","none");
					$("#commentsMain").css("display","none");
					$("#settingsMain").css("display","none");
					$("#newsletterMain").css("display","none");	
					$("#couponsMain").css("display","none");	
					$("#programsMain").css("display","none");		
					}else if(window.location.href.indexOf("#members") > -1) {
					$("#paymentMain").css("display","none");
					$("#memberMain").css("display","block");
					$("#commentsMain").css("display","none");
					$("#settingsMain").css("display","none");
					$("#newsletterMain").css("display","none");
					$("#couponsMain").css("display","none");
					$("#programsMain").css("display","none");
					}else if(window.location.href.indexOf("#comments") > -1) {
					$("#paymentMain").css("display","none");
					$("#memberMain").css("display","none");
					$("#commentsMain").css("display","block");
					$("#settingsMain").css("display","none");
					$("#newsletterMain").css("display","none");
					$("#couponsMain").css("display","none");
					$("#programsMain").css("display","none");
					}else if(window.location.href.indexOf("#newsletter") > -1) {
					$("#paymentMain").css("display","none");
					$("#memberMain").css("display","none");
					$("#commentsMain").css("display","none");
					$("#settingsMain").css("display","none");
					$("#newsletterMain").css("display","block");
					$("#programsMain").css("display","none");
					$("#couponsMain").css("display","none");
					}else if(window.location.href.indexOf("#programs") > -1) {
					$("#paymentMain").css("display","none");
					$("#memberMain").css("display","none");
					$("#commentsMain").css("display","none");
					$("#settingsMain").css("display","none");
					$("#newsletterMain").css("display","none");
					$("#programsMain").css("display","block");
					$("#couponsMain").css("display","none");
					}else if(window.location.href.indexOf("#coupons") > -1) {
					$("#paymentMain").css("display","none");
					$("#memberMain").css("display","none");
					$("#commentsMain").css("display","none");
					$("#settingsMain").css("display","none");
					$("#newsletterMain").css("display","none");
					$("#programsMain").css("display","none");
					$("#couponsMain").css("display","block");
					}
					
					
					
								
				$("#payments").click(function(){
					$("#paymentMain").css("display","block");
					$("#memberMain").css("display","none");
					$("#commentsMain").css("display","none");
					$("#settingsMain").css("display","none");
					$("#newsletterMain").css("display","none");
					$("#couponsMain").css("display","none");
					$("#programsMain").css("display","none");
				});
				$("#member").click(function(){
					$("#paymentMain").css("display","none");
					$("#memberMain").css("display","block");
					$("#commentsMain").css("display","none");
					$("#settingsMain").css("display","none");
					$("#newsletterMain").css("display","none");
					$("#couponsMain").css("display","none");
					$("#programsMain").css("display","none");
				});
				$("#comments").click(function(){
					$("#paymentMain").css("display","none");
					$("#memberMain").css("display","none");
					$("#commentsMain").css("display","block");
					$("#settingsMain").css("display","none");
					$("#couponsMain").css("display","none");
					$("#newsletterMain").css("display","none");
					$("#programsMain").css("display","none");
				});
				$("#settings").click(function(){
					$("#paymentMain").css("display","none");
					$("#memberMain").css("display","none");
					$("#commentsMain").css("display","none");
					$("#settingsMain").css("display","block");
					$("#couponsMain").css("display","none");
					$("#newsletterMain").css("display","none");
					$("#programsMain").css("display","none");
				});
				$("#newsletter").click(function(){
					$("#paymentMain").css("display","none");
					$("#memberMain").css("display","none");
					$("#commentsMain").css("display","none");
					$("#settingsMain").css("display","none");
					$("#couponsMain").css("display","none");
					$("#newsletterMain").css("display","block");
					$("#programsMain").css("display","none");
				});
				$("#programs").click(function(){
					$("#paymentMain").css("display","none");
					$("#memberMain").css("display","none");
					$("#commentsMain").css("display","none");
					$("#settingsMain").css("display","none");
					$("#couponsMain").css("display","none");
					$("#newsletterMain").css("display","none");
					$("#programsMain").css("display","block");
				});
				$("#coupons").click(function(){
					$("#paymentMain").css("display","none");
					$("#memberMain").css("display","none");
					$("#commentsMain").css("display","none");
					$("#settingsMain").css("display","none");
					$("#couponsMain").css("display","block");
					$("#newsletterMain").css("display","none");
					$("#programsMain").css("display","none");
				});
				
			});
		
		</script>
	</head>
		<body>
			<div id="wrapper">
				<?php
					echo $page;
				?>
			</div>
		</body>
</html>