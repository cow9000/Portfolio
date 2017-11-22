<?php
	//In navagation have a script that gets the title, and body content. Based on the folder name.
	include "../navagation.php";
	include "../footer.php";
	
	$isAdmin = mysqli_query($conn,"SELECT * FROM members WHERE admin='t' AND username='" . $_SESSION["username"] . "'");
	if(mysqli_num_rows($isAdmin) >= 1){
	//Start off $values with a form 
	
	//Delete function
	function Delete($path)
	{
	    if (is_dir($path) === true)
	    {
	        $files = array_diff(scandir($path), array('.', '..'));
	
	        foreach ($files as $file)
	        {
	            Delete(realpath($path) . '/' . $file);
	        }
	
	        return rmdir($path);
	    }
	
	    else if (is_file($path) === true)
	    {
	        return unlink($path);
	    }
	
	    return false;
	}


	//Check if table for pages are created if not create it.
	$check = mysqli_query($conn,"SELECT * FROM pages");
	if(empty($check)){
		
		//Create table
		mysqli_query($conn,"CREATE TABLE pages(
		id INT(6) PRIMARY KEY AUTO_INCREMENT,
		name VARCHAR(150),
		title VARCHAR(550),
		body VARCHAR(50000),
		hasNav VARCHAR(1) DEFAULT 't',
		hasFoot VARCHAR(1) DEFAULT 't',
		grid VARCHAR(2) DEFAULT '12'
		)");
		
		
		
	}
	
//Grid 1-12
	//Each higher number makes it bigger 
	// 1=small, 12 = entire page.
	//You will get the grid from the database
	
	if(isset($_POST["info"])){
		$title = $_POST["title"];
		$info = base64_encode($_POST["info"]);
		mysqli_query($conn, "UPDATE pages SET title='" . $title . "', body='" . $info . "' WHERE name='" . $_POST["page"] . "'");
		echo "<script type='text/javascript'>window.location.href = '../CMS';</script>";
        	exit();
	}
	
	if(isset($_POST["del"])){
		//$files = glob("../" . $_POST["del"]); // get all file names
		Delete("../" . $_POST["del"]);
		mysqli_query($conn, "DELETE FROM pages WHERE name='" . $_POST["del"] . "'");
		echo "<script type='text/javascript'>window.location.href = '../CMS';</script>";
        	exit();
	}
	
	if(isset($_POST["create"])){
	
	
		if (!is_dir("../" . $_POST["create"])) {
		mkdir("../" . $_POST["create"]);
	
	
	
		file_put_contents("../" . $_POST["create"] . "/index.php","<?php
	include '../navagation.php';
	include '../footer.php';
	include 'page.php';?>");
	
		file_put_contents("../" . $_POST["create"] . "/page.php", "
		
<html>
	<head>
		<title><?php echo $" . "title; ?></title>
		<!--Does not have to make any modifications to the scripting-->
		<meta name='Description' content='Build ME Blocks discovered in 2011 brought to life in 2015 focuses on helping children and parents meet the demands of the world.'>
		<meta name='Keywords' content='Too bad my kids don't come with a manual, Manual for kids, How to guide for parents, About Kids, Books about kids for parent, Books for parents about kids, Parenting Books, Parenting Guide, Teaching kids to love reading, DIY activities for parents and kids, Kids fun, DIY kids games, Educational programs for kids, Education programs for children, Helping children enjoy learning, home preschool, homeschool, Educational games for kids/children, Helping children love reading, Leadership skills for kids/children, Leadership traits for kids/children, Family, Family organization, Kids and Boredom, Activities for Kids/Children, Activities for Parents and Kids, Email for Kids, Calendar for Kids, Leadership Calendar for Kids, Values for Kids, Character traits for kids, Rewards for kids, Motivation for kids,'>
		    <meta charset='utf-8'>
		<script async='' src='//www.google-analytics.com/analytics.js'></script><script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-65508800-1', 'auto');
		  ga('send', 'pageview');
		
		</script>
		    <link rel='stylesheet' href='../css/reset.css' type='text/css' media='screen'>
		    <link rel='stylesheet' href='../css/style.css' type='text/css' media='screen'>
		    <link rel='stylesheet' href='../css/grid.css' type='text/css' media='screen'>    
		    <link rel='stylesheet' href='style.css' type='text/css' media='screen'>   
		    <script src='../js/jquery-1.6.min.js' type='text/javascript'></script> 
		    <script src='../js/jquery.easing.1.3.js' type='text/javascript'></script>
		    <script src='../js/superfish.js' type='text/javascript'></script>       
		    <script src='../js/tms-0.3.js' type='text/javascript'></script>           
		    <script src='../js/tms_presets.js' type='text/javascript'></script>           
		    <script src='../js/script.js' type='text/javascript'></script>         
		    <script src='../js/cufon-refresh.js' type='text/javascript'></script>   
		  	<!--[if lt IE 7]> 
				<div style=' clear: both; text-align:center; position: relative;'> <a href='http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode'><img src='00000000000000' border='0' alt='' /></a></div>  
			<![endif]-->
		 		<!--[if lt IE 9]>
		         	<script type='text/javascript' src='../js/html5.js'></script>
		            <link rel='stylesheet' href='../css/ie.css' type='text/css' media='screen'>
		     	<![endif]-->
		     	
		     	<!--THIS IS THE END OF THE HEADER, NOTHING ELSE GOES IN THE HEAD.-->
			
	</head>
	<!--THIS IS THE BODY-->
	<body>
		<!--Get the body, navagation, and footer.-->
		<!--THIS PAGE DOES NOT NEED NAVAGATION AND FOOTER.-->
		<?php echo $" . "navagation;?>
		<!--NAVAGATION GOES HERE.-->
		<?php echo $" . "body; ?>
		<!--FOOTER  GOES HERE-->
		<?php echo $" . "footer;?>
	</body>
</html>
		
		
		");
		
		
		$page = base64_encode("
		        <div id='getInfo'>	
			<section id='content'>
				<div class='container_12 con'>
				        <div class='wrapper'>
				        <div class='grid_12 g'>
				                <div class='block type3 color'>
				                    <div class='inner type2'>
				                    	<h3 id='bigT' class='title'>Title</h3>
				                    	<div class='geti'>
				                    		<p>THIS SHOULD BE IN A TEXTBOX THING.</p>
				                    	</div>
				                    </div>
				                    </div>
						</div>
						</div>
					</div>
				        </section>
				        </div>");
		$query = "INSERT INTO pages(name,title,body,hasNav,hasFoot,grid) VALUES (
		        		'" . $_POST["create"] . "',
		        		'Build ME Blocks - page',
		        		'" . $page . "',
		        		't',
		        		't',
		        		'12'
		        	)";
		mysqli_query($conn,$query);
		echo "<script type='text/javascript'>window.location.href = '../CMS';</script>";
        	exit();
		}
	}
	








	$path = "../";
	$results = scandir($path);
	$values = "<option value=XXXX>Pick a page</option>";
	foreach ($results as $result) {
	    if ($result === '.' or $result === '..') continue;
	
	    if (is_dir($path . '/' . $result)) {
	    	if($result != "login" && $result != "register" && $result != "js" && $result != "bin" && $result != "cgi-bin" && $result != "font-awesome-4.3.0" && $result != "css" && $result != "fps" && $result != "memberPage" && $result != "message" && $result != "buy" && $result != "php" && $result != "settings" && $result != "CMS" && $result != "forum" && $result != "forgotpass" && $result != "notinuse" && $result != "images" && $result != "contact" && $result != "blog" && $result != "archives" && $result != "uploads"){
	    		//This stops user from getting important/error giving stuff.
		         $values = $values . "<option value=" . $result . ">" . $result . "</option>";
		        
		        //COMMENTED OUT BECAUSE I DO NOT NEED THE ENTIRE DOCUMENTS STUFF. JUST THE NAME FOR NOW.
		        //$url = 'http://www.buildmeblocks.com/' . $result;
		        //echo "<textarea>" . file_get_contents($url) . "</textarea>";
				        
				        
		        $exist = mysqli_query($conn, "SELECT * FROM pages WHERE name='" . $result . "'");
		        if(!(mysqli_num_rows($exist) >= 1)){
		        	//If it does not exist
		        	$page = base64_encode("
		        		<div id='getInfo'>	
					<section id='content'>
				    	<div class='container_12 con'>
				        	<div class='wrapper'>
				                <div class='grid_12 g'>
				                	<div class='block type3 color'>
				                    	<div class='inner type2'>
				                    		<div class='geti'>
				                    			<p>THIS SHOULD BE IN A TEXTBOX THING.</p>
				                    		</div>
				                    	</div>
				                    	</div>
				                </div>
				        	</div>
				        </div>
				        </section>
				        </div>");
				        //TO EXTRACT YOU DO base64_decode()
		        	$query = "INSERT INTO pages(name,title,body,hasNav,hasFoot,grid) VALUES (
		        		'" . $result . "',
		        		'Build ME Blocks - page',
		        		'" . $page . "',
		        		't',
		        		't',
		        		'12'
		        	)";
		        	
		        	mysqli_query($conn, $query);
		        }
		        
	        }
	        
	    }
	}
	$values = "
	<form method='POST' action='index.php'>" . "<select name='edit'>" . $values . "</select>
	<input type='submit' value='Edit page'></input>
	</form>
	<br>
	<form method='POST' action='index.php'>
		<input type='text' name='create'></input>
		<input type='submit' value='Create page'></input>
	</form>
	<br>
	<form method='POST' action='index.php'>" . "<select name='del'>" . $values . "</select>
	<input type='hidden' name='_METHOD' value='DELETE'>
	<input type='submit' value='Delete page'></input>
	</form>
	";
	
	echo $values;
	echo "<br>";
	
	if(isset($_POST["edit"])){
		$get = mysqli_query($conn,"SELECT * FROM pages WHERE name='" . $_POST["edit"] . "'");
		$info = mysqli_fetch_assoc($get);
		$title = $info["title"];
		$body = base64_decode($info["body"]);
		$page = $info["name"];
		include("page.php");
	}
	
	$_POST = array();
	
	
	}else{
		header("location:../home");
	}
	
	
	//Idea for text and such, make a table named 'pages' and then each page will have a row that has a "page name" and they will get that with their folder name.
		

?>