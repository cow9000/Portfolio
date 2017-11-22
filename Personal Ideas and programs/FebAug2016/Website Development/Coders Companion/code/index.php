<?php

//Establish Connection with server
$link = mysqli_connect('localhost', 'root', 'thechickenninja');

//Starts the session so it can get the username and logged in information
session_start();

//check if it encoded
if(!mysqli_set_charset($link, 'utf8')){

$connectionFail = "Unable to set database connection encoding.";
include 'code.php';
exit();


}
//Check if connection worked
if (!$link)
{
	$connectionFail = "Unable to connect to the database.";
	include 'code.php';
	exit();
}
//connect to certain database
if(!mysqli_select_db($link, "users")){

	$connectionFail = "Unable to connect to users database";
	include 'code.php';
	exit();


}





//For the project selection screen
function display(){
	//Check if user is logged into the accounts
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
		//Check if the user has selected the project
		if(!isset($_POST['project'])){
			return "block";
		}else{
			//if they have display nothing from the project selection screen.
			return "none";
		}	
	}else{
		//If the user is not logged in, allow them to save using cookies. Or a local save
		return "none";
	}
	


}



if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	$username = $_SESSION['username'];
	
	
	/*
	This gets the names of all the projects 
	
	$getProjects gets everything that has to do with the users name
	$arrayProjects compiles them into an array
	
	*/
	$getProjects = mysqli_query($link, "SELECT * FROM code WHERE name='". $username ."'");
	$arrayProjects = mysqli_fetch_assoc($getProjects);
	
	/*
		
	
	
	
	*/
	
	//USED TO OUTPUT THE VALUES TO TEXT.
	$value = $arrayProjects["projectname"];
	$i = 0;
	//Changes cow to an array
	$cow = [];
	$cow[$i] = $value;
	$moreOptions = "";
	
	while ($arrayProjects = mysqli_fetch_assoc($getProjects)) {
		$value = $arrayProjects["projectname"];
		$i = $i + 1;
		$cow[$i] = $value;
	}

	function getProject($project){
	
		global $cow;
		global $moreOptions;
		
		//allows you to select the project.
		for ($i = $project; ;$i++) {
			if (!isset($cow[$i])) {
				$moreOptions .= "<option name = 'add'>Add project</option>\n";
				break;
			}else{
				$moreOptions .= "<option value = '" . $cow[$i] . "' name = " . $cow[$i] . ">" . $cow[$i] . "</option>\n";
			}
		}
		
	};
	
	
	if(isset($_POST['project'])){
	
		$htmlText = mysqli_query($link, "SELECT htmltext FROM code WHERE projectname='". $_POST['project'] ."'");
		$htmlText2 = mysqli_fetch_assoc($htmlText);
		$htmlText3 = $htmlText2["htmltext"];
		
		$cssText = mysqli_query($link, "SELECT csstext FROM code WHERE projectname='". $_POST['project'] ."'");
		$cssText2 = mysqli_fetch_assoc($cssText);
		$cssText3 = $cssText2["csstext"];
		
		$jsText = mysqli_query($link, "SELECT jstext FROM code WHERE projectname='". $_POST['project'] ."'");
		$jsText2 = mysqli_fetch_assoc($jsText);
		$jsText3 = $jsText2["jstext"];
		
		
	}else{
		$htmlText3 = "";
		$cssText3 = "";
		$jsText3 = "";

	}
	
	
	
		/*htmlText = mysqli_query($link, "SELECT htmltext FROM textBox WHERE username='". $username ."'");
		$htmlText2 = mysqli_fetch_assoc($htmlText);
		$htmlText3 = $htmlText2["htmltext"];
		
		$cssText = mysqli_query($link, "SELECT csstext FROM textBox WHERE username='". $username ."'");
		$cssText2 = mysqli_fetch_assoc($cssText);
		$cssText3 = $cssText2["csstext"];
		
		$jsText = mysqli_query($link, "SELECT javascripttest FROM textBox WHERE username='". $username ."'");
		$jsText2 = mysqli_fetch_assoc($jsText);
		$jsText3 = $jsText2["javascripttest"];*/
		
	
}
include 'text.php';


?>