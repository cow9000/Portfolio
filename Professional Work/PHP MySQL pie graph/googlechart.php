<?php
	$host = "localhost";
	$username = "conjuredrealm";
	$password = "awesomechickenninja84";
	$database = "conjuredrealm";
	$con = mysqli_connect($host,$username,$password,$database);
	$countryList = array(); 
	$countryNumber = array(); 
	
	$genderList = array(); 
	$genderNumber = array(); 
	
	$data = "['Countries', 'People per country'],";
	
	$get = mysqli_query($con, "SELECT * FROM website_visits");
	
	
	while($row = mysqli_fetch_assoc($get)){
		if(in_array($row["country"], $countryList)){
			$countryNumber[$row["country"]] = $countryNumber[$row["country"]]+1;
		}else{
			array_push($countryList, $row["country"]);
			$countryNumber[$row["country"]] = 1;
		}
        }
        
        
        
        
        $i = 0;
        foreach($countryNumber as $number){
        	$data = $data . "['" . $countryList[$i] . "'," . $number . "],";
        	$i++;
        }
        
        $get = mysqli_query($con, "SELECT * FROM website_visits");
        
        $data2 = "['Gender', 'Gender per person'],";
        while($row = mysqli_fetch_assoc($get)){
		if(in_array($row["gender"], $genderList)){
			$genderNumber[$row["gender"]] = $genderNumber[$row["gender"]]+1;
		}else{
			array_push($genderList, $row["gender"]);
			$genderNumber[$row["gender"]] = 1;
		}
        }
        
        $i = 0;
        foreach($genderNumber as $number){
        	$data2 = $data2 . "['" . $genderList[$i] . "'," . $number . "],";
        	$i++;
        }
        
        include "googlechart2.php";
?>