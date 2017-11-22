<html>
	<head>
		<script type="text/javascript" src="js/storyline.js"></script>
		<style>
		
			@font-face {
				font-family: "8bit";
				src: url("font/8.ttf");
			}
			body{
				background: #101010;
				min-width:640px;
				min-height:640px;
			}
			*{
				margin:0 auto;
				padding:0;
			}
			#wrapper{
				min-width:640px;
				min-height:640px;
				position:absolute;
				width:100%;
				height:100%;
			}
			
			#textBox{
				font-size:16px;
				font-family:"8bit";
				padding:35px; 
				height:15%; 
				bottom:0; 
				left:0; 
				right:0;
				background: #101010;
				color: white;
				background-image: url('images/top_left_border.png'), url('images/top_right_border.png'), url('images/top_border.png'), url('images/left_border.png'), url('images/right_border.png');
				background-position: left top, right top, left top, left top, right top;
				background-repeat: no-repeat, no-repeat, repeat-x, repeat-y, repeat-y;
			}
			
		</style>
		
		
	</head>
		<body>
		
			<audio id="play" style="display:none;" src="sounds/typing.mp3"></audio>
			<!--Actual page-->
			<div id="wrapper">
				<div style="width:100%; height:78%;" id="upper"></div>
				<div style="" id="textBox"></div>
			</div>
		</body>
</html>