<?php


	$conn = mysqli_connect("localhost","root","thechickenninja","bmb");
	$blog = "";
	
	
	session_start();
	$welcomeUser = "<a href='login.php'>Member Login</a> / <a href='register.php'>register</a>";
	$comments = "";
	$admin = "f";
	$recentPosts = "
            	<div class='grid_4'>
                	<div class='block type1'>
                    	<div class='inner'>
                        	<h3 id='bigT'>Recent posts</h3>
                            <ul class='list-1 indent2'>
	";
	$i = 0;
	$deletePost = "";
	$commentNum = 0;
	$styling = "";
	
	if(isset($_SESSION["username"])){
		$welcomeUser = "Welcome back <a href='settings.php'>" . $_SESSION["username"] . "</a><br><a href='logout.php'>Logout here</a>";
		$getAdmin = mysqli_query($conn, "SELECT admin FROM members WHERE username='" . $_SESSION["username"] . "'");
		$getAdmin2 = mysqli_fetch_assoc($getAdmin);
		$admin = $getAdmin2["admin"];	
	}
	
	$query = "SELECT id FROM blog";
	$result = mysqli_query($conn, $query);
	if(empty($result)){
		$createBlogTable = mysqli_query($conn,"CREATE TABLE blog(
		id INT(11) PRIMARY KEY AUTO_INCREMENT,
		title VARCHAR(255) NOT NULL,
		poster VARCHAR(255) NOT NULL,
		text VARCHAR(25500) NOT NULL,
		date VARCHAR(250),
		time TIMESTAMP,
		other VARCHAR(2000) NOT NULL
		
		
		
		
		
		)");
	}
	
	$query = "SELECT id FROM comments";
	$result = mysqli_query($conn, $query);
	if(empty($result)){
		$createCommentTable = mysqli_query($conn,"CREATE TABLE comments
		(
		id INT(25) PRIMARY KEY AUTO_INCREMENT,
		poster VARCHAR(50) NOT NULL,
		text VARCHAR(750) NOT NULL,
		date VARCHAR(250) NOT NULL,
		blogid INT(25) NOT NULL,
		spam VARCHAR(20) NOT NULL,
		approved VARCHAR(2) DEFAULT 'f' NOT NULL
		)
		");
	
	}
	
	$query = "SELECT id FROM following";
	$result = mysqli_query($conn, $query);
	if(empty($result)){
		$createCommentTable = mysqli_query($conn,"CREATE TABLE following
		(
		id INT(25) PRIMARY KEY AUTO_INCREMENT,
		email VARCHAR(255) NOT NULL
		)
		");
	
	}

	
	$result = mysqli_query($conn, "SELECT * FROM blog ORDER BY time DESC");
	while($row = mysqli_fetch_assoc($result)){
	if($i < 6){
	$i ++;
	$recentPosts = $recentPosts . "<li><a href='blog.php?post=" . $row["title"] . "'>" . $row["title"] . "</a></li>";
	
	}if($i > 5 && $i < 7){
	$i = 123123;
		$recentPosts = $recentPosts . "
	
							</ul>
                            <a href='#' class='link-1'>more</a>
                        </div>
                    </div>
                </div>
	";
	}
	
	if($admin === "t"){
		$deletePost = "<a style='color:white;' href='?delete=" . $row["id"] . "'>Delete Post</a>";
	}
	
		$getComments = mysqli_query($conn, "SELECT * FROM comments WHERE blogid=" . $row["id"] . " AND approved = 't'");
		while($row2 = mysqli_fetch_assoc($getComments)){
			$comments = "
			<div id='comment'>
				<p id='poster'>" . $row2["poster"] . "</p>
				<br>
				<p id='text'>" . $row2["text"] . "</p>
			</div>" . $comments;
			$commentNum += 1;
			if($commentNum > 2){
				break;
			}
		}
		if($commentNum < 2){
	$blog = $blog ."
    <div class='block type3'>
        <div class='inner'>
			<div id='blogPost'>
				<div id='title'>
					<a href='blog.php?post=" . $row["title"] . "' id='blogTitle'>" . $row["title"] . "</a>
					<br>
					<p id='poster'>" . $row["poster"] . "</p>
					<p id='date'>" . $row["date"] . "</p>
				</div>
				<div id='main'>
					" . $row["text"] . "
				</div>
				
				<br>
				<div id='comments'>
					" . $comments . "
				</div>
				
			</div>
				<a href='http://www.facebook.com/sharer.php?u=http://localhost:8080/build%20me%20blocks/site/blog.php?post=" . $row["title"] . "'><i class='fa fa-facebook-official' id='fb'></i></a>
				<a href='https://plus.google.com/share?url=http://localhost:8080/build%20me%20blocks/site/blog.php?post=" . $row["title"] . "' onclick='javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;'><i class='fa fa-google-plus-square' id='g'></i></a>
				<a href='http://twitter.com/share?text=Found%20this%20awesome%20blog%20post!&url=http://localhost:8080/build%20me%20blocks/site/blog.php?post=" . $row["title"] . "'><i class='fa fa-twitter-square' id='tw'></i></a>
			<br>" . $deletePost . "
		</div>
	</div>
	";
	}else{
	$blog = $blog ."
    <div class='block type3'>
        <div class='inner'>
			<div id='blogPost'>
				<div id='title'>
					<a href='blog.php?post=" . $row["title"] . "' id='blogTitle'>" . $row["title"] . "</a>
					<br>
					<p id='poster'>" . $row["poster"] . "</p>
					<p id='date'>" . $row["date"] . "</p>
				</div>
				<div id='main'>
					" . $row["text"] . "
				</div>
				<br>
				<a href='?comment=" . $row["id"] . "' style='color:white;'>Post a comment</a>
				" . $deletePost . "
				<div id='comments'>
					" . $comments . "
					<a href='?post=" . $row["title"] . "' style='color:white;'>Load all comments</a>
				</div>
			</div>
				<a href='http://www.facebook.com/sharer.php?u=http://localhost:8080/build%20me%20blocks/site/blog.php?post=" . $row["title"] . "'><i class='fa fa-facebook-official' id='fb'></i></a>
				<a href='https://plus.google.com/share?url=http://localhost:8080/build%20me%20blocks/site/blog.php?post=" . $row["title"] . "' onclick='javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;'><i class='fa fa-google-plus-square' id='g'></i></a>
				<a href='http://twitter.com/share?text=Found%20this%20awesome%20blog%20post!&url=http://localhost:8080/build%20me%20blocks/site/blog.php?post=" . $row["title"] . "'><i class='fa fa-twitter-square' id='tw'></i></a>
		</div>
	</div>";
	}
	
	$commentNum = 0;
	$comments = "";
	
	}
	
	if(isset($_SESSION["username"])){
	
		
	
	
	
		if($admin === "t"){
			$blog = "			
				<a style='color:black;' href='?createpost'>Create blog post</a>
			" . $blog;
			if(isset($_GET["createpost"])){
				$blog = "
				<div class='block type2'>
				<div class='inner'>
				<p id='blogTitle'>Create a blog post</p>
				<br>
				<br>
				<form action='blog.php' method='post'>
					<input name='title' type='text' placeholder='Title' id='BlogInputTitle'></input>
					<div id='editingContainer'>
						<input id='bold' type='button' value='&#xf032;'></input>
						<input id='italic' type='button' value='&#xf033;'></input>
						<input id='left' type='button' value='&#xf036;'></input>
						<input id='center' type='button' value='&#xf037;'></input>
						<input id='right' type='button' value='&#xf038;'></input>
						<li style='display:inline; list-style:none;'>
						<input id='createImg' type='button' value='&#xf1c5;'></input>
						<input id='createVid' type='button' value='&#xf1c8;'></input>
							<div id='prompt'>
								Image url - <input type='text' id='imgText' placeholder='Enter picture url'></input>
								Width - <input type='text' id='imgWidth' placeholder='Enter Width'></input>
								Height - <input type='text' id='imgHeight' placeholder='Enter Height'></input>
								
								Image alt - <input type='text' id='imgAlt' placeholder='Enter Alt'></input>
								<input type='button' id='img' value='Insert Image'></input>
							</div>
							<div id='prompt2'>
								Youtube url - <input type='text' id='vidText' placeholder='Enter ending video url'></input>
								EXAMPLE - zeN66VKNOmY<br>
								Width - <input type='text' id='vidWidth' placeholder='Enter Width'></input>
								Height - <input type='text' id='vidHeight' placeholder='Enter Height'></input>
								<input type='button' id='vid' value='Insert Image'></input>
							</div>
						</li>
						
					</div>
					
					<div id='div-textarea' contenteditable=true>
					&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;
					</div>
					<textarea name='text' placeholder='Text of blog' id='BlogText'></textarea>
					<input name='tags' type='text' placeholder='Tags' id='BlogTag'></input>
					<input type='submit' value='Post blog' id='postBlog' class='postBlog'></input>
				</form>
				</div>
				</div>
				";
			}
			
			if(isset($_POST["title"])){
				$date = date('jS \of F');
				$poster = mysqli_real_escape_string($conn, $_SESSION["username"]);
				$title = mysqli_real_escape_string($conn, $_POST["title"]);
				$text = mysqli_real_escape_string($conn, $_POST["text"]);
				$text = strip_tags($text,'<b><strong><i><img><br><span><div><iframe>');
				$tags = mysqli_real_escape_string($conn, $_POST["tags"]);
				$time = date('Y-m-d H:i:s');
				$putPost = mysqli_query($conn,"INSERT INTO blog(title,poster,text,date,time,other) VALUES (
				'" . $title . "',
				'" . $poster . "',
				'" .$text. "',
				'" .$date. "',
				'" . $time . "',
				'" .$tags. "'
				)");
				header("location:blog.php");
			}
			
			
			if(isset($_GET["delete"])){
				$delete = mysqli_query($conn,"DELETE FROM blog WHERE id=" . $_GET["delete"]);
				header("location:blog.php");
			}	
			
		}
		
		if(isset($_GET["comment"])){
		
			$getPost = mysqli_query($conn, "SELECT * FROM blog WHERE id=" . $_GET["comment"]);
			if(mysqli_num_rows($getPost) != 0){
				$row = mysqli_fetch_assoc($getPost);
			
				$blog = "
				<div class='block type3'>
					<div class='inner'>
						<div id='blogPost'>
							<div id='title'>
								<a href='blog.php?post=" . $row["title"] . "' id='blogTitle'>" . $row["title"] . "</a>
								<br>
								<p id='poster'>" . $row["poster"] . "</p>
								<p id='date'>" . $row["date"] . "</p>
							</div>
							<div id='main'>
								" . $row["text"] . "
							</div>
							<br>
							<form method='post' action='blog.php?comment= " . $_GET["comment"] . "'>
								<textarea name='Commenttext' placeholder='Text of comment' id='BlogText'></textarea>
								<input type='submit' value='Post comment' id='postBlog'></input>
							</form>
							<div id='comments'>
								" . $comments. "
							</div>
						</div>
					</div>
				</div>
				";
				$recentPosts = "";
			}
			
			if(isset($_POST["Commenttext"])){
				$blogid = mysqli_real_escape_string($conn, $_GET["comment"]);
				$d = date("F j, Y");
				$p =  mysqli_real_escape_string($conn, $_SESSION["username"]);
				$t = mysqli_real_escape_string($conn, $_POST["Commenttext"]);
				$t = strip_tags($t,'<b><strong><i>');
				$postComment = mysqli_query($conn,"INSERT INTO comments(poster,text,date,blogid,spam,approved)
				VALUES(
					'" . $p . "', 
					'" . $t . "', 
					'" . $d . "', 
					" . $blogid . ",
					'f',
					'f'
				)
				");
				header("location:blog.php");
				
				
			
			}
		
		}
		
		
		
	}
	
	
	if(isset($_GET["post"])){
	
		$getPost = mysqli_query($conn, "SELECT * FROM blog WHERE title='" . $_GET["post"] . "'");
		if(mysqli_num_rows($getPost) != 0){
			$row = mysqli_fetch_assoc($getPost);
			
	
		$getComments = mysqli_query($conn, "SELECT * FROM comments WHERE blogid=" . $row["id"] . " AND approved = 't'");
		while($row2 = mysqli_fetch_assoc($getComments)){
			$comments = "
			<div id='comment'>
				<p id='poster'>" . $row2["poster"] . "</p>
				<br>
				<p id='text'>" . $row2["text"] . "</p>
			</div>" . $comments;
		}
	
			
			
			if($admin === "t"){
				$deletePost = "<a style='color:white;' href='?delete=" . $row["id"] . "'>Delete Post</a>";
			}
	
			if(isset($_SESSION["username"])){
			$blog = "
			<div class='block type3'>
				<div class='inner'>
					<div id='blogPost'>
						<div id='title'>
							<p id='blogTitle'>" . $row["title"] . "</p>
							<br>
							<p id='poster'>" . $row["poster"] . "</p>
							<p id='date'>" . $row["date"] . "</p>
						</div>
						<div id='main'>
							" . $row["text"] . "
						</div>
						<br>
						" . $deletePost . "
						<div id='comments'>
							<form method='post' action='blog.php?comment= " . $row["id"] . "'>
								<textarea name='Commenttext' placeholder='Text of comment' id='BlogText'></textarea>
								<input type='submit' value='Post comment' id='postBlog'></input>
							</form>
						
							" . $comments. "
						</div>
						
					</div>
				<a href='http://www.facebook.com/sharer.php?u=http://localhost:8080/build%20me%20blocks/site/blog.php?post=" . $row["title"] . "'><i class='fa fa-facebook-official' id='fb'></i></a>
				<a href='https://plus.google.com/share?url=http://localhost:8080/build%20me%20blocks/site/blog.php?post=" . $row["title"] . "' onclick='javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;'><i class='fa fa-google-plus-square' id='g'></i></a>
				<a href='http://twitter.com/share?text=Found%20this%20awesome%20blog%20post!&url=http://localhost:8080/build%20me%20blocks/site/blog.php?post=" . $row["title"] . "'><i class='fa fa-twitter-square' id='tw'></i></a>
				</div>
			</div>
			";
			$recentPosts = "";
			$styling = "style='width:95%;'";
			}else{
			$blog = "
			<div class='block type3' style='width:100% !important;'>
				<div class='inner'>
					<div id='blogPost'>
						<div id='title'>
							<p id='blogTitle'>" . $row["title"] . "</p>
							<br>
							<p id='poster'>" . $row["poster"] . "</p>
							<p id='date'>" . $row["date"] . "</p>
						</div>
						<div id='main'>
							" . $row["text"] . "
						</div>
						<br>
						<a href='login.php'>Login to post a comment</a>
						" . $deletePost . "
						<div id='comments'>
							" . $comments. "
						</div>
						
					</div>
				<a href='http://www.facebook.com/sharer.php?u=http://localhost:8080/build%20me%20blocks/site/blog.php?post=" . $row["title"] . "'><i class='fa fa-facebook-official' id='fb'></i></a>
				<a href='https://plus.google.com/share?url=http://localhost:8080/build%20me%20blocks/site/blog.php?post=" . $row["title"] . "' onclick='javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;'><i class='fa fa-google-plus-square' id='g'></i></a>
				<a href='http://twitter.com/share?text=Found%20this%20awesome%20blog%20post!&url=http://localhost:8080/build%20me%20blocks/site/blog.php?post=" . $row["title"] . "'><i class='fa fa-twitter-square' id='tw'></i></a>
				</div>
			</div>
			";
			$recentPosts = "";
			$styling = "style='width:95%;'";
			}
		}else{
			header("location:blog.php");
		
		}
	}
	
	
	
	
	
	include "blog2.php";
?>