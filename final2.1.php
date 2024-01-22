<?php

	$month=$_POST["m"];
	$query = "SELECT * FROM `cd`";
	
	if(!($database=mysqli_connect("localhost","1081431","sharon20010813")))
		die("Could not connect to database</body></html>");
	if(!mysqli_select_db($database,"final"))
		die("Could not open cd database</body></html>");
	if(!($result = mysqli_query($database,$query))){
		print("<p>Could not excute query!</p>");
		die(mysqli_error()."</body></html>");
	}
	
	
   while ( $row = mysqli_fetch_row( $result ) )

   {	
		if($row[1]==$month){
			print("$row[2]a$row[3]a$row[4]a");
		}
   }

 
	
?>