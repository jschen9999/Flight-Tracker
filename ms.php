<?php
	
	if(!($database=mysqli_connect("localhost","1081431","sharon20010813")))
		die("Could not connect to database</body></html>");
	if(!mysqli_select_db($database,"final"))
		die("Could not open products database</body></html>");
	
	$fp = fopen("20191231-DailyImmigPort.csv", "r");
	while (($data = fgetcsv($fp, 1000, ",")) !== FALSE) {
		settype($data[0],"integer");
		$a=$data[0]/10000;
		$b=$data[0]%10000/100;
		$c=$data[0]%100;
		$query1 = "INSERT INTO `cd`(`year`,`month`,`day`,`entry`,`outbound`)VALUES($a,$b,$c,$data[2]+$data[5],$data[3]+$data[6])";
		mysqli_query($database,$query1);
	}
	
	mysqli_close($database);
	
?>