<?php
$user_ip = $_SERVER['REMOTE_ADDR'];
//Global - global varname
function echo_ip(){
	global $user_ip
	$string = "Your ip is " . $user_ip;
	echo $string;
}

echo_ip();

?>