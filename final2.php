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
	
	
	print ("<table style = 'border = '1''>");
	print ("<tr><td>年</td><td>月</td><td>日</td><td>入境人數</td><td>出境人數</td></tr>");
   while ( $row = mysqli_fetch_row( $result ) )

   {
		if($row[1]==$month){
			print( "<tr>" );

			foreach ( $row as $value )

				print( "<td>$value</td>" );

			print( "</tr>" );
		}

   }

   print ("</table>");
	
	
	mysqli_close($database);
	
?>