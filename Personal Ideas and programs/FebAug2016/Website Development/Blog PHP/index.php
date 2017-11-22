<?php
    $blog = $mysqli_connect("localhost","root","thechickenninja","blog");
    
    session_start();
    
    
    if(!$conn){
        echo "Could not connect to the blogging database";
    }
    
    //Blog user database - id, username, password, posts, admin, verified, datejoined.
    //blog table - id, poster, title, text, date.
    //blog comments - id, name, text, blogid, date
    
    //Blog id in comments is used to link the comment to the post.
    $username = "";
    $blog = "";
    
    
    if(isset($_POST["text"])){
        
        $poster = $_SESSION["username"];
        $text = $_POST["text"];
        $title = $_POST["title"];
        $date = date("F j, Y, g:i a");
        
        
        //IN HERE PUT IN VALUES INTO DATABASE - 
        $putInto = mysqli_query($blog, "INSERT INTO users ('') VALUES ()");
        
        
        
        
        
        header("location:../blog");
        //This will reset values.
    }
    
    
    $titlePost = "";
    $textPost = "";
    
    if(isset($_GET["edit"])){
        $id = $_GET["edit"];
    }
    
    
    if(isset($_SESSION["username"])){
        $username = $_SESSION["username"];
        $getAdmin = mysqli_query($blog, "SELECT admin FROM users WHERE username = '" . $username . "'");
        $getAdmin2 = mysqil_fetch_assoc($getAdmin);
        $admin = $getAdmin2["admin"];
        
        
        
        if($admin == "t"){
            //Check if the browser contains ?post='true' Or something on that line
            if($_GET["post"] == "true"){
                
                // #cover is the thing that will cover the entire page so you can add a editing thing.
                
                //NOTE TO SELF - Create safe threading so you can do :image='url',width='100',height='100':
                //How to do this create an array and go through all the letters if it = : then check if the letters after it create image. Then check the width, height, ect.
                
                
                $cover = "
                    <div id='cover'>
                        <form method='post' action='index.php'>
                            
                            <input id='blogTitle' type='text' name='title' placeholder='Title of post' value='" . $titlePost . "'></input>
                            <textarea id='blogText' name='text'>" . $textPost . "</textarea>
                            <input type='submit' value='Post blog'></input>
                            
                        </form>
                    </div>                
                ";
            }
        }
        
    }
    
    for($i = 0; $i < 600; $i++){

        $getPost = mysqli_query($conn, "SELECT id FROM table WHERE id=" . $i . "");
        if($getBlog || mysqli_num_rows($getBlog) != 0){
            
            
            $getAll = mysqli_query($conn, "SELECT * FROM table WHERE id=" . $i . "");
            $getAll2 = mysqli_fetch_assoc($getAll);
            
			$title = $getAll2["title"];
			$text = $getAll2["text"];
			$poster = $getAll2["poster"];
			$date = $getAll2["date"];
			
            $blog = 
            
            "
            <div id='blogPost' class='" . $i ."'>
                <div id='title'>" . $title . " 
                <div id='poster'>" . $poster . "</div>
                <div id='date'>" . $date . "</div>
                </div>
                <div id='text'>" . $text . "</div>
            </div>
            " . $blog;
        
        }
        
    }
    
    //Down here display all the blog posts, using for loop.
    
    
    

?>