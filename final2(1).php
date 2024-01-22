
<!DOCTYPE html>

<html>

   <head>

      <meta charset = "utf-8">
	  
      <title>Flight Tracker</title>
	  <style type="text/css">
	nav a {
    color: inherit; //移除超連結顏色 
    display: block;
    font-size: 1.5rem;
    padding: 5px;
    text-decoration: none;  //移除超連結底線 
}

nav > ul {
    background-color: rgb(230, 230, 230);
    list-style: none;   /* 移除項目符號 */
    margin: 0;
    padding: 0;
}

/* 滑鼠移到 <a> 時變成深底淺色 */
nav a:hover {
    background-color: rgb(115, 115, 115);
    color: white;
}
.flex-nav {
    display: flex;
	justify-content: center;
}
</style>
	  
	   <style type = "text/css">

         body  { font-family: sans-serif;

                 background-color: lightyellow; }

         table { background-color: #CCDDFF;

                 border-collapse: collapse;

                 border: 1px solid gray; }

         td    { width: 70px; padding: 5px; }

         tr:nth-child(odd) { background-color: white; }
		 .roll {
			width:420px;
			height:450px;
			overflow-y:scroll; 
			overflow-x:none;
		} 

		 
		 div {float:left;
		 }
		 
	

		</style>
	  
      <script type="text/javascript"

          src="https://www.google.com/jsapi?autoload={

            'modules':[{

              'name':'visualization',

              'version':'1',

              'packages':['corechart']

            }]

          }"></script>
		<script src="//code.jquery.com/jquery-2.2.4.min.js"></script>
      <script>
		var i=0;
		var j=0;
		var row=new Array;
		var result=[["DAY","ENTRY","OUTBOUND"]];
		
		function start(){
			document.getElementById("arrival").setAttribute("href","arrival.php?condition=0");
			document.getElementById("depart").setAttribute("href","depart.php?condition=0");
			document.getElementById("line chart").setAttribute("href","line chart.php?condition=0");
			document.getElementById("final21").setAttribute("href","javascript:void(0);");
			document.getElementById("list").setAttribute("href","list.html?condition=0");
			var value = "<?php echo $_GET['condition'];?>";
			if(value=="1"){
				document.getElementById("7").setAttribute("style","display:block");
				var str="快要完成教學囉^_^"
				window.alert(str);
			}
			
		}
		window.addEventListener( "load", start, false );
		function progress(a){
			
			var su = a.val();
			$.ajax({
			
				url:"final2.php",

				data:{

					m:su

				},

				type:"POST",

				datatype:"html",
				
				success:function(output){

					$("#out").html(output);
					
					
				},

				error:function(){

					alert("Request failed.");

				}

			});
			
			$.ajax({
			
				url:"final2.1.php",

				data:{

					m:su

				},

				type:"POST",

				datatype:"html",
				
				success:function(output){

					//$("#out1").html(output);
					row=output.split("a");
					for(i=0,j=0;i<row.length/3-1;j+=3,i++){
						result[i+1]=[row[j],parseInt(row[j+1]),parseInt(row[j+2])];
					}
					
					$(function(){

						var data = google.visualization.arrayToDataTable(result);

						var options = {

							title: 'Company Performance',

							curveType: 'function',

							legend: { position: 'bottom' }

						};

						var chart = new google.visualization.LineChart(document.getElementById('out1'));

						chart.draw(data, options);

					});
					
					
				},

				error:function(){

					alert("Request failed.");

				}

			});
			
		}
		
		
			$(document).ready(function(){
				$("#m1").click(function(e){
					e.preventDefault();
					progress($(this));
				});

				$("#m2").click(function(e){
					e.preventDefault();
					progress($(this));
				});
				
				$("#m3").click(function(e){
					e.preventDefault();
					progress($(this));
				});
				
				$("#m4").click(function(e){
					e.preventDefault();
					progress($(this));
				});
				
				$("#m5").click(function(e){
					e.preventDefault();
					progress($(this));
				});
				
				$("#m6").click(function(e){
					e.preventDefault();
					progress($(this));
				});
				
				$("#m7").click(function(e){
					e.preventDefault();
					progress($(this));
				});

				$("#m8").click(function(e){
					e.preventDefault();
					progress($(this));
				});
				
				$("#m9").click(function(e){
					e.preventDefault();
					progress($(this));
				});
				
				$("#m10").click(function(e){
					e.preventDefault();
					progress($(this));
				});
				
				$("#m11").click(function(e){
					e.preventDefault();
					progress($(this));
				});
				
				$("#m12").click(function(e){
					e.preventDefault();
					progress($(this));
				});
			});
			
		
			
      </script>

      <style type = "text/css">

         body  { font-family: sans-serif;​

                 background-color: white; }​

         table { background-color: lightblue;​

                 border-collapse: collapse;​

                 border: 1px solid gray; }​

         td    { padding: 5px; }​

         tr:nth-child(odd) { background-color: white; }​

      </style>​

   </head>​
   <body>​
   
   <nav>
    <ul class="flex-nav">
        <li style="font-family:'微軟正黑體';color:#0088A8;"><a href="arrival.php" id="arrival"> |  入境航班即時資訊   |</a></li>
        <li style="font-family:'微軟正黑體';color:#0088A8;"><a href="depart.php" id="depart">   |出境航班即時資訊   |</a></li>
        <li style="font-family:'微軟正黑體';color:#0088A8;"><a href="line chart.php" id="line chart">  | 2019年出入境統計   |</a></li>
        <li style="font-family:'微軟正黑體';color:#0088A8;"><a href="javascript:void(0);" id="final21">   |2019年每月人數報表  | </a></li>
		<li id="l" style="font-family:'微軟正黑體';color:#0088A8;"><a href="list.html" id="list">   |回首頁| </a></li>
    </ul>
</nav>
<img src="7.png" style="display:none;margin-top:100px;" id="7">
      <form method = "post" action = "#">​
		
         <p style="font-size:20pt;color:black;margin-left:100px;" text-shadow: 2px 3px 5px> 

			<strong>Please Select A Month</strong>
		</p>


		<p style="margin-left:100px;">
				<button id = "m1"  type = "button" value = "1"><img  src="month/1.png" style="width:90px;height:60px;"></button>
				<button id = "m2"  type = "button" value = "2"><img  src="month/2.png" style="width:90px;height:60px;"></button>
				<button id = "m3"  type = "button" value = "3"><img  src="month/3.png" style="width:90px;height:60px;"></button>
				<button id = "m4"  type = "button" value = "4"><img  src="month/4.png" style="width:90px;height:60px;"></button>
				<button id = "m5"  type = "button" value = "5"><img  src="month/5.png" style="width:90px;height:60px;"></button>
				<button id = "m6"  type = "button" value = "6"><img  src="month/6.png" style="width:90px;height:60px;"></button>
				<button id = "m7"  type = "button" value = "7"><img  src="month/7.png" style="width:90px;height:60px;"></button>
				<button id = "m8"  type = "button" value = "8"><img  src="month/8.png" style="width:90px;height:60px;"></button>
				<button id = "m9"  type = "button" value = "9"><img  src="month/9.png" style="width:90px;height:60px;"></button>
				<button id = "m10"  type = "button" value = "10"><img  src="month/10.png" style="width:90px;height:60px;"></button>
				<button id = "m11"  type = "button" value = "11"><img  src="month/11.png" style="width:90px;height:60px;"></button>
				<button id = "m12"  type = "button" value = "12"><img  src="month/12.png" style="width:90px;height:60px;"></button>

		</p>

 

      </form>​

      <div class="roll" style="overflow: auto;margin-left:100px;"id="out"></div>
	  <div id="out1" style = " width: 900px; height: 450px"></div>	

   </body>​

</html>​

        