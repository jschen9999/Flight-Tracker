
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
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
  
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="//code.jquery.com/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
	
	
		function start(){
			document.getElementById("arrival").setAttribute("href","arrival.php?condition=0");
			document.getElementById("depart").setAttribute("href","depart.php?condition=0");
			document.getElementById("line chart").setAttribute("href","javascript:void(0);");
			document.getElementById("final21").setAttribute("href","final2(1).php?condition=0");
			document.getElementById("list").setAttribute("href","list.html?condition=0");
		
			document.getElementById("l").setAttribute("style","color: black;");
			document.getElementById("depart").setAttribute("href","final2(1).php?condition=0");
			var value = "<?php echo $_GET['condition'];?>";
			if(value=="1"){
				document.getElementById("6").setAttribute("style","display:block");
				//document.getElementById("7").setAttribute("style","display:block");
				
				document.getElementById("arrival").setAttribute("href","javascript:void(0);");
				document.getElementById("depart").setAttribute("href","javascript:void(0);");
				document.getElementById("line chart").setAttribute("href","javascript:void(0);");
				document.getElementById("list").setAttribute("href","javascript:void(0);");
				
				document.getElementById("l").setAttribute("style","color:black;background-color:#FFBB66;");
				document.getElementById("final21").setAttribute("href","final2(1).php?condition=1");
			}
			
		}
	
	
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
	  data.addColumn('number', 'Month');
      data.addColumn('number', '出境');
      data.addColumn('number', '入境');


      data.addRows([
        [1,  1943310,      2057706],
          [2,  1889970,      1930695],
          [3,  2099027,       2056959],
          [4,  2107752,      2020234],
		  [5,  1981276,      2056463],
          [6,  1959778,      2050180],
          [7,  2119400,       2072081],
          [8,  2128036,      2158163],
		  [9,  1850011,      1798243],
          [10,  2044258,      2042653],
          [11,  1975925,       1948603],
          [12,  2008381,      1921472]
      ]);

      var options = {
        chart: {
          title: '2019年出入境統計', 
          subtitle: ' '
        },
		titleTextStyle: {
		 fontSize:30,
		},
        width: 1200*0.8,
        height: 600*0.8,
        axes: {
          x: {
            0: {side: 'top'}
          }
        }
      };

      var chart = new google.charts.Line(document.getElementById('line_top_x'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
	window.addEventListener( "load", start, false );
  </script>

</head>
<body>

<nav>
    <ul class="flex-nav">
        <li><a href="arrival.php" id="arrival"> |  入境航班即時資訊   |</a></li>
        <li><a href="depart.php" id="depart">   |出境航班即時資訊   |</a></li>
        <li><a href="javascript:void(0);" id="line chart">  | 2019年出入境統計   |</a></li>
        <li id="l" style="color:black;"><a href="final2(1).php" id="final21">   |2019年每月人數報表  | </a></li>
		<li><a href="list.html" id="list">   |回首頁  | </a></li>
    </ul>
</nav>
<img src="6.png" style="display:none" id="6">

  <div style="margin-top:100px;" id="wrapper">
    <!-- start header -->
	<div id="line_top_x" align="center"></div>
	
</body>
    <!-- end header -->


