<?php
	include "../footer.php";
	include "../navagation.php";
	
	$sortBlog = mysqli_query($conn, "SELECT * FROM blog GROUP BY YEAR(time) DESC, MONTH(time), DAY(time)");
	$yearId = 0;
	$previousMonth = 0;
	$sorted = "";
	while($row = mysqli_fetch_assoc($sortBlog)){
		list($year, $month, $day) = array_values(date_parse($row["time"]));
		
		if($year == $yearId){
			if($previousMonth == $month){
				$previousMonth = $month;
				$month = date('F', mktime(0, 0, 0, $month, 10));
				$sorted = $sorted . "<br><a href='http://www.buildmeblocks.com/blog/?post=" . $row["title"] . "' style='color:white;'>" . $row["title"] . "</a><br>";
			}else{
				$previousMonth = $month;
				$month = date('F', mktime(0, 0, 0, $month, 10));
				$sorted = $sorted .  "<br><p style='color:white; font-size:20px;'>Month - " . $month  . "</p><br><a href='http://www.buildmeblocks.com/blog/?post=" . $row["title"] . "' style='color:white;'>" . $row["title"] . "</a><br>";
			}
		}else{
			
			$yearId = $year;
			$previousMonth = $month;
			$month = date('F', mktime(0, 0, 0, $month, 10));
			$sorted = $sorted . "<br><br><br><br><p style='color:white; font-size:20px;'>Year - " . $year . "</p><br><p style='color:white; font-size:20px;'>Month - " . $month . "</p><br><a href='http://www.buildmeblocks.com/blog/?post=" . $row["title"] . "' style='color:white;'>" . $row["title"] . "</a><br>";
		}
	}
	
	
	include "archives2.php";
?>