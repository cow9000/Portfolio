    <html>
        <head>
            <title>Coders Paradise</title>
            <link rel="stylesheet" href="../Styles/style.css" type="text/css">
            <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Josefin Slab">
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
            <script src="../Scripts/Javascript.js"></script>
			<script src="../Scripts/cookie.js"></script>
			
        </head>
            <body>
				<!--<?php
					echo "<div id='projectName' style='display:" . display() . ";'>";
					echo "<div id='entranceText' style='display:" . display() . ";'>Please select a project</div>";
					
					echo "<div>
					<form action='index.php' method='post'>
							<select name='project'>
							" . getProject(0) . "
							" . $moreOptions . "
							</select>
							<input type='submit' value='Open project'/>
					</form>
					</div>";
					
					echo "</div>";
				?>-->
                <div id="top">
                <p class="biglink">Coders Companion</p>
                </div>
                <div id="top2">
                <span id="tester">
                    <a href="#" id="htmlB">HTML</a>
                    <a href="#" id="cssB">CSS</a>
                    <a href="#" id="jsB">Javascript</a>
                </span>
                </div>
                <div id="top3">
                    <a href="#" id="buttonFont">Fonts</a>
                    <a href="#" id="buttonThemes">Themes</a>
                    <a href="#" id="buttonAbout">About</a>
                    <a href="#" id="buttonContact">Contact</a>
                    <a href="#" class="saveFile">Save</a>
                </div>
                <div id="main"></div>
                <div id="textarea">
                    <div id="textareaR">
                <div class="HoverOver">HTML</div>
                <textarea id="html"><?php echo $htmlText3; ?></textarea>
                <textarea id="css"><?php echo $cssText3; ?></textarea>
                <textarea id="js"><?php echo $jsText3; ?></textarea>
				<!--
				Code for syntax highlighting
				
				
				<p id = "line1"></p>
				<p id = "line2"></p>
				<p id = "line3"></p>
				ect........
				
				if(check if code is line# doesnt exist){
				Create a line 
				}
				-->
                    </div>
                <iframe id="prev"></iframe>
				<div id="hidePrev"></div>
                </div>
                
                <div id="saveText">File has been saved!</div>
                
                
                
                
                
                
                
                
                
                
             </body>
</html>