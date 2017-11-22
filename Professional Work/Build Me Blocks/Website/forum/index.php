<?php
	include "../footer.php";
	include "../navagation.php";
	
	$categories = "";
	//Checking if categories is existing
	$check = mysqli_query($conn,"SELECT * FROM categories");
	//If not create table
	if(empty($check)){
		mysqli_query($conn,"CREATE TABLE categories(
			id INT(6) AUTO_INCREMENT PRIMARY KEY,
			category VARCHAR(350),
			description VARCHAR(350)
		
		
		
		
		
		)");
		//If caregories does not exist also create forum comments, and posts
		mysqli_query($conn, "CREATE TABLE forumPosts(
			id INT(6) AUTO_INCREMENT PRIMARY KEY,
			poster VARCHAR(150),
			title VARCHAR(350),
			category VARCHAR(350),
			text VARCHAR(7500)
		
		
		
		
		
		)");
		//The way the posts will work is that when a user clicks on a category it will say in the url buildmeblocks.com/forum/?category=categoryid&createPost=true
	}
	
	
	
	
	include "forum2.php";
?>