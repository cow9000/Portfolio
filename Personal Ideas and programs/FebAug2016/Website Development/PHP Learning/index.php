<?php
$link = mysqli_connect('localhost', 'root', 'thechickenninja');
//check if it encoded
if(!mysqli_set_charset($link, 'utf8')){

$connectionFail = "Unable to set database connection encoding.";
include 'output.php';
exit();


}
//Check if connection worked
if (!$link)
{
	$connectionFail = "Unable to connect to the database.";
	include 'output.php';
	exit();
}
//connect to certain database
if(!mysqli_select_db($link, "ijdb")){

	$connectionFail = "Unable to connect to joke database";
	include 'output.php';
	exit();


}


$connectionFail = "Database connection established.";
include 'output.php';


?>