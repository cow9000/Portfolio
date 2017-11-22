<?php


	$conn = mysqli_connect("localhost","buildm10_bmb","!billsyall@.c","buildm10_bmb");
	$blog = "";
	$followed = "";
	header("location:https://buildmeblocks.wordpress.com/");
	session_start();
	$comments = "";
	$admin = "f";
	$recentPosts = "
            	<div class='grid_4'>
                	<div class='block colorBlack'>
                    	<div class='inner'>
                    		<p>Want to follow this blog? Everytime a new blog post is posted you will be notified via email.</p>
                    		<form action='../blog/' method='POST'>
                    			<input type='text' name='followEmail' placeholder='Email'></input>
                    			<input type='submit' value='Follow'></input>
                    			
                    			
                    		</form><br>
				<a href='../archives' style='font-size:18px;'>Archives</a>
                    		<br><br>
                    		<p>Search categories</p>
                    		<form action='../blog/' method='POST'>

                                        <input type='checkbox' name='cate[]' value='Education' />Education<br />
                                        <input type='checkbox' name='cate[]' value='Motivation' />Motivation<br />
                                        <input type='checkbox' name='cate[]' value='Parents' />Parents<br />
                                        <input type='checkbox' name='cate[]' value='Books' />Books<br />
                                        <input type='checkbox' name='cate[]' value='Book Reviews' />Book Reviews<br />
                                        <input type='checkbox' name='cate[]' value='How to' />How to<br />
                                        <input type='checkbox' name='cate[]' value='Max & Elena' />Max & Elena<br />
                                        <input type='checkbox' name='cate[]' value='Special Agent Kids' />Special Agent Kids<br />
                                        <input type='checkbox' name='cate[]' value='Max & Elena Travel Adventures' />Max & Elena Travel Adventures<br />
                                        <input type='checkbox' name='cate[]' value='Special Agent Kid Letters' />Special Agent Kid Letters<br />
                                        <input type='checkbox' name='cate[]' value='Ideas' />Ideas<br />
                                        <input type='checkbox' name='cate[]' value='Quotes' />Quotes<br />
                                        <input type='checkbox' name='cate[]' value='Family' />Family<br />
                                        <input type='checkbox' name='cate[]' value='Activities' />Activities<br />
                                        <input type='checkbox' name='cate[]' value='Kid Fitness' />Kid Fitness<br />
                                        <input type='checkbox' name='cate[]' value='Family Fitness' />Family Fitness<br />
                                        <input type='checkbox' name='cate[]' value='Summer Fun' />Summer Fun<br />
                                        <input type='checkbox' name='cate[]' value='Thoughts' />Thoughts<br />
					<input type='submit' value='search'></input>
				</form>
				<br>
				<p style='font-size:24px;'>About</p>
                                
				<a href='http://Melissapurcell.com'>Information</a>
                                <br><br>
				<p style='font-size:24px;'>Contact</p>
                                <dt>Build Me Blocks<br>PO Box 1813<br>Sandy, UT 84091</dt>
                                <br>
                                <dd>E-mail: melissa@buildmeblocks.com</dd>
                                <br>
								<dd>E-mail 2: maxandelena@specialagentmission.com</dd>
                                <br>
								<dd>Phone Number - 801.983.6767</dd>
                            </dl>
				<br>
				<br>
				<p style='font-size:24px;'>Blogroll</p>
                    	</div>
                    	</div>
                   </div>
	";
	$i = 0;
	$deletePost = "";
	$edit = "";
	$commentNum = 0;
	$styling = "";
	
	if(isset($_SESSION["username"])){
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
	
	
	}if($i > 5 && $i < 7){
	$i = 123123;
		$recentPosts = $recentPosts . "
			</div>
                    </div>
                </div>
	";
	}
	
	if($admin === "t"){
		$deletePost = "<a style='color:black;' href='?delete=" . $row["id"] . "'>Delete Post</a>";
		$edit = "<a style='color:black;' href='?edit=" . $row["id"] . "'>Edit Post</a>";
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
		
		$string = $row["text"];
		$truncated = (strlen($string) > 850) ? substr($string, 0, 850) . "...<br><a style='color:black;' href='../blog/?post=" . $row["title"] . "' >" . "Click here to see more" . "</a>" : $string;
	$blog = $blog ."
    <div class='block colorBlack'>
        <div class='inner'>
			<div id='blogPost'>
				<div id='title'>
					<a href='../blog/?post=" . $row["title"] . "' id='blogTitle'>" . $row["title"] . "</a>
					<br>
					<p id='poster'>" . $row["poster"] . "</p>
					<p id='date'>" . $row["date"] . "</p>
				</div>
				<div id='main'>
					" . $truncated . "
				</div>
				
				<br>
				<div id='comments'>
					" . $comments . "
				</div>
				
			</div>
				<a href='http://www.facebook.com/sharer.php?u=http://buildmeblocks.com/../blog/?post=" . $row["title"] . "'><i class='fa fa-facebook-official' id='fb'></i></a>
				<a href='https://plus.google.com/share?url=http://buildmeblocks.com/../blog/?post=" . $row["title"] . "' onclick='javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;'><i class='fa fa-google-plus-square' id='g'></i></a>
				<a href='http://twitter.com/share?text=Found%20this%20awesome%20blog%20post!&url=http://buildmeblocks.com/../blog/?post=" . $row["title"] . "'><i class='fa fa-twitter-square' id='tw'></i></a>
			<br>" . $deletePost . "<br>" . $edit . "
		</div>
	</div>
	";
	}else{
	$blog = $blog ."
    <div class='block colorBlack'>
        <div class='inner'>
			<div id='blogPost'>
				<div id='title'>
					<a href='../blog/?post=" . $row["title"] . "' id='blogTitle'>" . $row["title"] . "</a>
					<br>
					<p id='poster'>" . $row["poster"] . "</p>
					<p id='date'>" . $row["date"] . "</p>
				</div>
				<div id='main'>
					" . $row["text"] . "
				</div>
				<br>
				<a href='?comment=" . $row["id"] . "' style='color:black;'>Post a comment</a>
				" . $deletePost . "
				<div id='comments'>
					" . $comments . "
					<a href='?post=" . $row["title"] . "' style='color:black;'>Load all comments</a>
				</div>
			</div>
				<a href='http://www.facebook.com/sharer.php?u=http://buildmeblocks.com/../blog/?post=" . $row["title"] . "'><i class='fa fa-facebook-official' id='fb'></i></a>
				<a href='https://plus.google.com/share?url=http://buildmeblocks.com/../blog/?post=" . $row["title"] . "' onclick='javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;'><i class='fa fa-google-plus-square' id='g'></i></a>
				<a href='http://twitter.com/share?text=Found%20this%20awesome%20blog%20post!&url=http://buildmeblocks.com/../blog/?post=" . $row["title"] . "'><i class='fa fa-twitter-square' id='tw'></i></a>
				<a href='https://www.pinterest.com/pin/create/button/?url=http%3A%2F%2Fbuildmeblocks.com/../blog/?post=" . $row["title"] . "&description=Next%20stop%3A%20Pinterest&media=http%3A%2F%2Ffarm8.staticflickr.com%2F7027%2F6851755809_df5b2051c9_z.jpg'><div class='fa fa-instagram' id='fb'></div></a>
		</div>
	</div>";
	}
	
	$commentNum = 0;
	$comments = "";
	
	}
	
	if(isset($_SESSION["username"])){
	
		if(isset($_POST["followEmail"])){
			$checkEmail = mysqli_query($conn, "SELECT * FROM follow WHERE email='" . mysqli_real_escape_string($conn, $_POST['followEmail']) . "'");
			if($checkEmail->num_rows === 0){
				mysqli_query($conn, "INSERT INTO follow(username,email) VALUES ('" . $_SESSION['username'] . "','" . mysqli_real_escape_string($conn, $_POST['followEmail']) . "')");
				header("location:../blog/");
			}
		}
	
	
	
		if($admin === "t"){
			$blog = "			
				<a style='color:black;' href='?createpost'>Create blog post</a>
			" . $blog;
if(isset($_GET["edit"])){
				$get = mysqli_query($conn, "SELECT * FROM blog WHERE id=" . $_GET["edit"]);
				$info = mysqli_fetch_assoc($get);
				$blog = "
				<div class='grid_12'>
				<div class='block colorBlack'>
				<div class='inner'>
				<p id='blogTitle'>Edit the blog post</p>
				<br>
				<br>
				<form action='../blog/' method='post'>
					<br>
					<input id='hidden' type='hidden' value='" . $_GET["edit"] ."' name='id'></input>
					<input name='Etitle' type='text' placeholder='Title' id='BlogInputTitle' style='color:black;' value='" . $info["title"] . "'></input>
					<br>
					<input id='hidden' type='hidden' value='" . $info["time"] . "' name='date'></input>
					<input name='name' type='text' placeholder='Posters name' id='BlogInputTitle' style='color:black;' value='" . $info["poster"] ."'></input>
					<div id='editingContainer'>
						<input id='bold' type='button' value='&#xf032;'></input>
						<input id='italic' type='button' value='&#xf033;'></input>
						<input id='left' type='button' value='&#xf036;'></input>
						<input id='center' type='button' value='&#xf037;'></input>
						<input id='right' type='button' value='&#xf038;'></input>
						<li style='display:inline; list-style:none;'>
						<input id='createImg' type='button' value='&#xf1c5;'></input>
						<input id='createVid' type='button' value='&#xf1c8;'></input>
<select class='text'><option style='font-family:Georgia, serif;' value='Georgia, serif'>Georgia</option><option style='font-family:Palatino, serif;' value='Palatino, serif'>Palatino</option><option style='font-family:Times, serif;' value='Times, serif'>Times</option><option style='font-family:Arial, Helvetica, sans-serif;' value='Arial, Helvetica, sans-serif'>Arial</option><option style='font-family:cursive, sans-serif;' value='cursive, sans-serif'>Comic sans</option><option style='font-family:Courier, monospace;' value='Courier, monospace'>Monospace</option></select>
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
					&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203;&#8203; " . $info["text"] . "
					</div>
					<textarea name='text' placeholder='Text of blog' id='BlogText'></textarea>
					<p>Categories</p>
                                        <input type='checkbox' name='cat[]' value='Education' />Education<br />
                                        <input type='checkbox' name='cat[]' value='Motivation' />Motivation<br />
                                        <input type='checkbox' name='cat[]' value='Parents' />Parents<br />
                                        <input type='checkbox' name='cat[]' value='Books' />Books<br />
                                        <input type='checkbox' name='cat[]' value='Book Reviews' />Book Reviews<br />
                                        <input type='checkbox' name='cat[]' value='How to' />How to<br />
                                        <input type='checkbox' name='cat[]' value='Max & Elena' />Max & Elena<br />
                                        <input type='checkbox' name='cat[]' value='Special Agent Kids' />Special Agent Kids<br />
                                        <input type='checkbox' name='cat[]' value='Max & Elena Travel Adventures' />Max & Elena Travel Adventures<br />
                                        <input type='checkbox' name='cat[]' value='Special Agent Kid Letters' />Special Agent Kid Letters<br />
                                        <input type='checkbox' name='cat[]' value='Ideas' />Ideas<br />
                                        <input type='checkbox' name='cat[]' value='Quotes' />Quotes<br />
                                        <input type='checkbox' name='cat[]' value='Family' />Family<br />
                                        <input type='checkbox' name='cat[]' value='Activities' />Activities<br />
                                        <input type='checkbox' name='cat[]' value='Kid Fitness' />Kid Fitness<br />
                                        <input type='checkbox' name='cat[]' value='Family Fitness' />Family Fitness<br />
                                        <input type='checkbox' name='cat[]' value='Summer Fun' />Summer Fun<br />
                                        <input type='checkbox' name='cat[]' value='Thoughts' />Thoughts<br />
					<input type='submit' value='Post blog' id='postBlog' class='postBlog'></input>
				</form>
				</div>
				</div>
				</div>
				";
				
			
			}
			if(isset($_GET["createpost"])){
				$blog = "
				<div class='grid_12'>
				<div class='block colorBlack'>
				<div class='inner'>
				<p id='blogTitle'>Create a blog post</p>
				<br>
				<br>
				<form action='../blog/' method='post'>
					<input name='title' type='text' placeholder='Title' id='BlogInputTitle' style='color:black;'></input>
					<br>
					<input name='name' type='text' placeholder='Posters name' id='BlogInputTitle' style='color:black;'></input>
					<div id='editingContainer'>
						<input id='bold' type='button' value='&#xf032;'></input>
						<input id='italic' type='button' value='&#xf033;'></input>
						<input id='left' type='button' value='&#xf036;'></input>
						<input id='center' type='button' value='&#xf037;'></input>
						<input id='right' type='button' value='&#xf038;'></input>
						<li style='display:inline; list-style:none;'>
						<input id='createImg' type='button' value='&#xf1c5;'></input>
						<input id='createVid' type='button' value='&#xf1c8;'></input>
<select class='text'><option style='font-family:Georgia, serif;' value='Georgia, serif'>Georgia</option><option style='font-family:Palatino, serif;' value='Palatino, serif'>Palatino</option><option style='font-family:Times, serif;' value='Times, serif'>Times</option><option style='font-family:Arial, Helvetica, sans-serif;' value='Arial, Helvetica, sans-serif'>Arial</option><option style='font-family:cursive, sans-serif;' value='cursive, sans-serif'>Comic sans</option><option style='font-family:Courier, monospace;' value='Courier, monospace'>Monospace</option></select>
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
					<p>Categories</p>
                                        <input type='checkbox' name='cat[]' value='Education' />Education<br />
                                        <input type='checkbox' name='cat[]' value='Motivation' />Motivation<br />
                                        <input type='checkbox' name='cat[]' value='Parents' />Parents<br />
                                        <input type='checkbox' name='cat[]' value='Books' />Books<br />
                                        <input type='checkbox' name='cat[]' value='Book Reviews' />Book Reviews<br />
                                        <input type='checkbox' name='cat[]' value='How to' />How to<br />
                                        <input type='checkbox' name='cat[]' value='Max & Elena' />Max & Elena<br />
                                        <input type='checkbox' name='cat[]' value='Special Agent Kids' />Special Agent Kids<br />
                                        <input type='checkbox' name='cat[]' value='Max & Elena Travel Adventures' />Max & Elena Travel Adventures<br />
                                        <input type='checkbox' name='cat[]' value='Special Agent Kid Letters' />Special Agent Kid Letters<br />
                                        <input type='checkbox' name='cat[]' value='Ideas' />Ideas<br />
                                        <input type='checkbox' name='cat[]' value='Quotes' />Quotes<br />
                                        <input type='checkbox' name='cat[]' value='Family' />Family<br />
                                        <input type='checkbox' name='cat[]' value='Activities' />Activities<br />
                                        <input type='checkbox' name='cat[]' value='Kid Fitness' />Kid Fitness<br />
                                        <input type='checkbox' name='cat[]' value='Family Fitness' />Family Fitness<br />
                                        <input type='checkbox' name='cat[]' value='Summer Fun' />Summer Fun<br />
                                        <input type='checkbox' name='cat[]' value='Thoughts' />Thoughts<br />
					<input type='submit' value='Post blog' id='postBlog' class='postBlog'></input>
				</form>
				</div>
				</div>
				</div>
				";
			}
			if(isset($_POST["Etitle"])){
				$date = date('jS \of F');
				$poster = mysqli_real_escape_string($conn, $_POST["name"]);
				$title = mysqli_real_escape_string($conn, $_POST["Etitle"]);
				$text = mysqli_real_escape_string($conn, $_POST["text"]);
				$text = strip_tags($text,'<b><strong><i><img><br><span><div><iframe>');
				$tags = mysqli_real_escape_string($conn, $_POST["tags"]);
				$time = $_POST["date"];
				$categor = mysqli_real_escape_string($conn, $_POST["cat"]);
				$putPost = mysqli_query($conn,"UPDATE blog SET title = '" . $title . "', poster = '" . $poster . "', text = '" .$text. "', date = '" .$date. "',  time='" . $time . "', other = '" .$tags. "', categor='" . $categor . "' WHERE id='" . $_POST["id"] . "'
				");
				$users = mysqli_query($conn, "SELECT * FROM follow");
				while($row = mysqli_fetch_assoc($users)){
				/*$emailTo = $emailTo . $row["email"] . ",";
				$emailTo = $emailTo . "flyingpiechicken@gmail.com";*/
					$to      = $row["email"];
					$subject = "Build ME Blocks blog - " . $title;
					$message = "There has been a new blog post posted on buildmeblocks.com.<br> <a href='http://buildmeblocks.com/blog?post=" . $title ."'>" . $title . "</a>";
					$headers = 'From: newsletter@buildmeblocks.com' . "\r\n" .
					    'Reply-To: newsletter@buildmeblocks.com' . "\r\n" .
					    'X-Mailer: PHP/' . phpversion();
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
					mail($to, $subject, $message, $headers);
					header("location:../memberPage");
				}
				header("location:../blog/");
			}
			if(isset($_POST["title"])){
				$date = date('jS \of F');
				$poster = mysqli_real_escape_string($conn, $_POST["name"]);
				$title = mysqli_real_escape_string($conn, $_POST["title"]);
				$text = mysqli_real_escape_string($conn, $_POST["text"]);
				$text = strip_tags($text,'<b><strong><i><img><br><span><div><iframe>');
				$tags = mysqli_real_escape_string($conn, $_POST["tags"]);
				$time = date('Y-m-d H:i:s');
				$N = count($_POST["cat"]);
				for($i=0; $i < $N; $i++)
				{
					$catList = $catList . $_POST["cat"][$i] . ",";
				}
				$categor = mysqli_real_escape_string($conn, $catList);
				$putPost = mysqli_query($conn,"INSERT INTO blog(title,poster,text,date,time,other,categor) VALUES (
				'" . $title . "',
				'" . $poster . "',
				'" .$text. "',
				'" .$date. "',
				'" . $time . "',
				'" .$tags. "',
				'" . $categor . "'
				)");
				$users = mysqli_query($conn, "SELECT * FROM follow");
				while($row = mysqli_fetch_assoc($users)){
				/*$emailTo = $emailTo . $row["email"] . ",";
				$emailTo = $emailTo . "flyingpiechicken@gmail.com";*/
					$to      = $row["email"];
					$subject = "Build ME Blocks blog - " . $title;
					$message = "There has been a new blog post posted on buildmeblocks.com.<br> <a href='http://buildmeblocks.com/blog?post=" . $title ."'>" . $title . "</a>";
					$headers = 'From: newsletter@buildmeblocks.com' . "\r\n" .
					    'Reply-To: newsletter@buildmeblocks.com' . "\r\n" .
					    'X-Mailer: PHP/' . phpversion();
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
					mail($to, $subject, $message, $headers);
					header("location:../memberPage");
				}
				header("location:../blog/");
			}
			
			
			if(isset($_GET["delete"])){
				$delete = mysqli_query($conn,"DELETE FROM blog WHERE id=" . $_GET["delete"]);
				header("location:../blog/");
			}	
			
		}
		
		if(isset($_GET["comment"])){
		
			$getPost = mysqli_query($conn, "SELECT * FROM blog WHERE id=" . $_GET["comment"]);
			if(mysqli_num_rows($getPost) != 0){
				$row = mysqli_fetch_assoc($getPost);
			
				$blog = "
				<div class='block colorBlack'>
					<div class='inner'>
						<div id='blogPost'>
							<div id='title'>
								<a href='../blog/?post=" . $row["title"] . "' id='blogTitle'>" . $row["title"] . "</a>
								<br>
								<p id='poster'>" . $row["poster"] . "</p>
								<p id='date'>" . $row["date"] . "</p>
							</div>
							<div id='main'>
								" . $row["text"] . "
							</div>
							<br>
							<form method='post' action='../blog/?comment= " . $_GET["comment"] . "'>
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
				header("location:../blog/");
				
				
			
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
				$deletePost = "<a style='color:black;' href='?delete=" . $row["id"] . "'>Delete Post</a>";
			}
	
			if(isset($_SESSION["username"])){
			$blog = "
			<div class='block colorBlack'>
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
							<form method='post' action='../blog/?comment= " . $row["id"] . "'>
								<textarea name='Commenttext' placeholder='Text of comment' id='BlogText'></textarea>
								<input type='submit' value='Post comment' id='postBlog'></input>
							</form>
						
							" . $comments. "
						</div>
						
					</div>
				<a href='http://www.facebook.com/sharer.php?u=http://buildmeblocks.com/blog?post=" . $row["title"] . "'><i class='fa fa-facebook-official' id='fb'></i></a>
				<a href='https://plus.google.com/share?url=http://buildmeblocks.com/blog?post=" . $row["title"] . "' onclick='javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;'><i class='fa fa-google-plus-square' id='g'></i></a>
				<a href='http://twitter.com/share?text=Found%20this%20awesome%20blog%20post!&url=http://buildmeblocks.com/blog?post=" . $row["title"] . "'><i class='fa fa-twitter-square' id='tw'></i></a>
				</div>
			</div>
			";
			$recentPosts = "";
			$styling = "style='width:95%;'";
			}else{
			$blog = "
			<div class='block colorBlack' style='width:100% !important;'>
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
				<a href='http://www.facebook.com/sharer.php?u=http://buildmeblocks.com/blog?post=" . $row["title"] . "'><i class='fa fa-facebook-official' id='fb'></i></a>
				<a href='https://plus.google.com/share?url=http://buildmeblocks.com/blog?post=" . $row["title"] . "' onclick='javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;'><i class='fa fa-google-plus-square' id='g'></i></a>
				<a href='http://twitter.com/share?text=Found%20this%20awesome%20blog%20post!&url=http://buildmeblocks.com/blog?post=" . $row["title"] . "'><i class='fa fa-twitter-square' id='tw'></i></a>
				</div>
			</div>
			";
			$recentPosts = "";
			$styling = "style='width:95%;'";
			}
		}else{
			header("location:../blog/");
		
		}
	}
	
	if(isset($_POST['cate'])){
		$blog = "";
		
		$N = count($_POST["cate"]);
		for($i=0; $i < $N; $i++)
		{
		$search = mysqli_query($conn,"SELECT * FROM blog WHERE categor LIKE '%{$_POST['cate'][$i]}%'");
		while($row = mysqli_fetch_assoc($search)){
			$blog = $blog . "<div class='block colorBlack'>
					<div class='inner'>
						<div id='blogPost'>
							<div id='title'>
								<a href='../blog/?post=" . $row["title"] . "' id='blogTitle'>" . $row["title"] . "</a>
								<br>
								<p id='poster'>" . $row["poster"] . "</p>
								<p id='date'>" . $row["date"] . "</p>
							</div>
							<div id='main'>
								" . $row["text"] . "
							</div>
							<br>
						</div>
				<a href='http://www.facebook.com/sharer.php?u=http://buildmeblocks.com/blog?post=" . $row["title"] . "'><i class='fa fa-facebook-official' id='fb'></i></a>
				<a href='https://plus.google.com/share?url=http://buildmeblocks.com/blog?post=" . $row["title"] . "' onclick='javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;'><i class='fa fa-google-plus-square' id='g'></i></a>
				<a href='http://twitter.com/share?text=Found%20this%20awesome%20blog%20post!&url=http://buildmeblocks.com/blog?post=" . $row["title"] . "'><i class='fa fa-twitter-square' id='tw'></i></a>
					</div>
				</div>";
		}
		}

	}
	
	include "../footer.php";
	include "../navagation.php";
	include "blog2.php";
?>