<?php

function EchoName() {
	echo 'Name';
}

echo "Hi";
EchoName();

function user($name, $password){
	echo $name . $password;
}

//Returning
function returnName($Num, $Num2){
	return $Num + $Num2;
}
echo returnName(10,1250);

?>
