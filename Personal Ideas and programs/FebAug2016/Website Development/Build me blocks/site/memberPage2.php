<html>
	<head>
		<link rel="stylesheet" href="memberStyle.css" type="text/css">
		<link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.min.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
			
			
				$("#payments").click(function(){
					//$("#paymentMain").css("opacity","1");
					$("#paymentMain").css("z-index","1");
					$("#paymentMain").css("top","0px");
					
					$("#memberMain").css("top","-1500px");
					$("#memberMain").css("z-index","-50000");
					//$("#memberMain").css("opacity","0");
					
					
					$("#commentsMain").css("z-index" , "-50000;");
					$("#commentsMain").css("top","-1500px");
					
					$("#newsletterMain").css("z-index" , "-50000;");
					$("#newsletterMain").css("top","-1500px");
					
					$("#settingsMain").css("z-index" , "-50000;");
					$("#settingsMain").css("top","-1500px");
				});
				$("#member").click(function(){
					//$("#paymentMain").css("opacity","0");
					$("#paymentMain").css("z-index","-50000");
					$("#paymentMain").css("top","-1500px");
					
					$("#memberMain").css("top","-175px");
					$("#memberMain").css("z-index","1");
					
					
					$("#commentsMain").css("z-index" , "-50000;");
					$("#commentsMain").css("top","-1500px");
					
					$("#newsletterMain").css("z-index" , "-50000;");
					$("#newsletterMain").css("top","-1500px");
					
					$("#settingsMain").css("z-index" , "-50000;");
					$("#settingsMain").css("top","-1500px");
					//$("#memberMain").css("opacity","1");
				});
				$("#comments").click(function(){
					$("#paymentMain").css("z-index","-50000");
					$("#paymentMain").css("top","-1500px");
					
					$("#memberMain").css("top","-1500px");
					$("#memberMain").css("z-index","-50000");
					
					
					$("#commentsMain").css("z-index" , "1");
					$("#commentsMain").css("top","-375px");
					
					$("#newsletterMain").css("z-index" , "-50000;");
					$("#newsletterMain").css("top","-1500px");
					
					$("#settingsMain").css("z-index" , "-50000;");
					$("#settingsMain").css("top","-1500px");
				});
				$("#settings").click(function(){
					$("#paymentMain").css("z-index","-50000");
					$("#paymentMain").css("top","-1500px");
					
					$("#memberMain").css("top","-1500px");
					$("#memberMain").css("z-index","-50000");
					
					
					$("#commentsMain").css("z-index" , "-50000;");
					$("#commentsMain").css("top","-1500px");
					
					$("#newsletterMain").css("z-index" , "-50000;");
					$("#newsletterMain").css("top","-1500px");
					
					$("#settingsMain").css("z-index" , "1");
					$("#settingsMain").css("top","-375px");
				});
				$("#newsletter").click(function(){
					$("#paymentMain").css("z-index","-50000");
					$("#paymentMain").css("top","-1500px");
					
					$("#memberMain").css("top","-1500px");
					$("#memberMain").css("z-index","-50000");
					
					
					$("#commentsMain").css("z-index" , "-50000;");
					$("#commentsMain").css("top","-1500px");
					
					$("#newsletterMain").css("z-index" , "-50000;");
					$("#newsletterMain").css("top","-1500px");
					
					$("#newsletterMain").css("z-index" , "1");
					$("#newsletterMain").css("top","-375px");
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