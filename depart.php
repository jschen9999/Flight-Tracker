<!DOCTYPE html>
<!--
Generic treemap, based on http://bost.ocks.org/mike/treemap/

-->
<html>
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
<script src="//code.jquery.com/jquery-2.2.4.min.js"></script>
      <script>
	  
		function start(){
			document.getElementById("arrival").setAttribute("href","arrival.php?condition=0");
			document.getElementById("depart").setAttribute("href","javascript:void(0);");
			document.getElementById("line chart").setAttribute("href","line chart.php?condition=0");
			document.getElementById("final21").setAttribute("href","final2(1).php?condition=0");
			document.getElementById("list").setAttribute("href","list.html?condition=0");
			
			document.getElementById("l").setAttribute("style","color:black;");
			document.getElementById("depart").setAttribute("href","line chart.php?condition=0");
			var value = "<?php echo $_GET['condition'];?>";
			if(value=="1"){
				document.getElementById("4").setAttribute("style","display:block");
				//document.getElementById("5").setAttribute("style","display:block");
				
				document.getElementById("arrival").setAttribute("href","javascript:void(0);");
				document.getElementById("depart").setAttribute("href","javascript:void(0);");
				document.getElementById("final21").setAttribute("href","javascript:void(0);");
				document.getElementById("list").setAttribute("href","javascript:void(0);");
				
				document.getElementById("l").setAttribute("style","color:black;background-color:#FFBB66;");
				document.getElementById("line chart").setAttribute("href","line chart.php?condition=1");
			}
			
		}
		function progress() {

			var aq = $("#ac").val();
			
            $.ajax({

				url: "airline.json",

				type: "GET",

				datatype: "json",

				success: function( data ) {

					var output = document.getElementById( "out" );
					
					$.each(data,function(i,item){
						var value=null;
						
						if(aq==item["AirlineID"]){
							value=item["AirlineName"];
							output.innerHTML=value.En;
						}

					});
				
				},

				error : function(){

					alert( "Request failed." );

				}

			});

		}

			function progress1() {
			
				var city = $("#city").val();

				$.ajax({

					url: "city.json",

					type: "GET",

					datatype: "json",

					success: function( data ) {

						var output = document.getElementById( "out1" );
					
						$.each(data,function(i,item){
							var value=null;
						
							if(city==item["AirportID"]){
								value=item["AirportName"];
								output.innerHTML=value.En;
							}

						});
				
					},

					error : function(){

						alert( "Request failed." );

					}

				});
			}
			window.addEventListener( "load", start, false );
      </script>

      <style type = "text/css">

         body  { font-family: sans-serif;
			 background-image: url(background/p1.png);
			 background-repeat:no-repeat;
			background-size:cover;
				background-position:center center;
					background-attachment:fixed;}

         table { background-color: lightblue;

                 border-collapse: collapse;

                 border: 1px solid gray; }

         td    { padding: 5px; }

         tr:nth-child(odd) { background-color: white; }
		 
		 .c {float:left;}

      </style>​
<style>

#chart {
  background: #fff;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  margin-left: 225px;
}

.title {
    font-weight: bold;
    font-size: 30px;
    text-align: center;
    margin-top: 20px;
    margin-bottom: 60px;
}
text {
  pointer-events: none;
  font-weight: bold;
  font-size: 24px;
  text-align:center;
}

.grandparent text {
  font-weight: bold;
  text-align:center;

}

rect {
  fill: none;
  stroke: #fff;
}

rect.parent,
.grandparent rect {
  stroke-width: 2px;
}

rect.parent {
    pointer-events: none;
}

.grandparent rect {
  fill: orange;
}

.grandparent:hover rect {
  fill: #ee9700;
}

.children rect.parent,
.grandparent rect {
  cursor: pointer;
}

.children rect.parent {
  fill: #bbb;
  fill-opacity: .5;
}

.children:hover rect.child {
  fill: #bbb;
}

</style>
</head>

<body>

<nav>
    <ul class="flex-nav">
        <li><a href="arrival.php" id="arrival"> |  入境航班即時資訊   |</a></li>
        <li><a href="javascript:void(0);" id="depart">   |出境航班即時資訊   |</a></li>
        <li id="l" style="color:black;"><a href="line chart.php" id="line chart">  | 2019年出入境統計   |</a></li>
        <li><a href="final2(1).php" id="final21">   |2019年每月人數報表  | </a></li>
		<li><a href="list.html" id="list">   |回首頁  | </a></li>
    </ul>
</nav>
<img src="4.png" style="display:none" id="4">

<div id="chart"></div>
<div class="c" style="margin-top:30px;margin-left:225px;">
      <form method = "get" action = "#">

         <p  style="font-size:20px;">請輸入航空公司代號:​
				<input type="text" id="ac" />
				<input id = "submit" type="button" value = "Send Query" onclick="progress()"></p>

      </form>
	  <div style="margin-top:-10px;font-size:30px;"class="c" id="out"></div>
	  
	</div>
	<div class="c" style="margin-top:30px;margin-left:225px;">
      <form method = "get" action = "#">

         <p  style="font-size:20px;">請輸入機場代號:​
				<input type="text" id="city" />
				<input id = "submit" type="button" value = "Send Query" onclick="progress1()"></p>

      </form>
	  <div style="margin-top:-10px;font-size:30px;"class="c" id="out1"></div>
	  </div>

<script src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
<script src="https://d3js.org/d3.v3.min.js"></script>
<script>


window.addEventListener('message', function(e) {
    var opts = e.data.opts,
        data = e.data.data;

    return main(opts, data);
});

var defaults = {
    margin: {top: 30, right: 0, bottom: 0, left: 0},
    rootname: "TOP",
    format: ",d",
    title: "",
    width: 960*1.1,
    height: 500*1.1
};

function main(o, data) {
  var root,
      opts = $.extend(true, {}, defaults, o),
      formatNumber = d3.format(opts.format),
      rname = opts.rootname,
      margin = opts.margin,
      theight = 36 + 16;

  $('#chart').width(opts.width).height(opts.height);
  var width = opts.width - margin.left - margin.right,
      height = opts.height - margin.top - margin.bottom - theight,
      transitioning;
  
  var color = d3.scale.category20c();
  
  var x = d3.scale.linear()
      .domain([0, width])
      .range([0, width]);
  
  var y = d3.scale.linear()
      .domain([0, height])
      .range([0, height]);
  
  var treemap = d3.layout.treemap()
      .children(function(d, depth) { return depth ? null : d._children; })
      .sort(function(a, b) { return a.Terminal - b.Terminal; })
      .ratio(height / width * 0.5 * (1 + Math.sqrt(5)))
      .round(false);
  
  var svg = d3.select("#chart").append("svg")
      .attr("width", width + margin.left + margin.right)
      .attr("height", height + margin.bottom + margin.top)
      .style("margin-left", -margin.left + "5px")
      .style("margin.right", -margin.right + "5px")
    .append("g")
      .attr("transform", "translate(" + margin.left + "," + margin.top + ")")
      .style("shape-rendering", "crispEdges");
  
  var grandparent = svg.append("g")
      .attr("class", "grandparent");
  
  grandparent.append("rect")
      .attr("y", -margin.top)
      .attr("width", width)
      .attr("height", margin.top);
	  
  
  grandparent.append("text")
      .attr("x", 6)
      .attr("y", 6 - margin.top)
      .attr("dy", ".75em");

  if (opts.title) {
    $("#chart").prepend("<p class='title'>" + opts.title + "</p>");
  }
  if (data instanceof Array) {
    root = { ActualDepartureTime: rname, values: data };
  } else {
    root = data;
  }
    
  initialize(root);
  accumulate(root);
  layout(root);
  console.log(root);
  display(root);

  if (window.parent !== window) {
    var myheight = document.documentElement.scrollHeight || document.body.scrollHeight;
    window.parent.postMessage({height: myheight}, '*');
  }

  function initialize(root) {
    root.x = root.y = 0;
    root.dx = width;
    root.dy = height;
    root.depth = 0;
  }

  // Aggregate the values for internal nodes. This is normally done by the
  // treemap layout, but not here because of our custom implementation.
  // We also take a snapshot of the original children (_children) to avoid
  // the children being overwritten when when layout is computed.
  function accumulate(d) {
    return (d._children = d.values)
        ? d.value = parseInt(d.values.reduce(function(p, v) { return p + accumulate(v); }, 0))
        : d.value = parseInt(d.Terminal);
  }

  // Compute the treemap layout recursively such that each group of siblings
  // uses the same size (1×1) rather than the dimensions of the parent cell.
  // This optimizes the layout for the current zoom state. Note that a wrapper
  // object is created for the parent node for each group of siblings so that
  // the parent’s dimensions are not discarded as we recurse. Since each group
  // of sibling was laid out in 1×1, we must rescale to fit using absolute
  // coordinates. This lets us use a viewport to zoom.
  function layout(d) {
    if (d._children) {
      treemap.nodes({_children: d._children});
      d._children.forEach(function(c) {
        c.x = d.x + c.x * d.dx;
        c.y = d.y + c.y * d.dy;
        c.dx *= d.dx;
        c.dy *= d.dy;
        c.parent = d;
        layout(c);
      });
    }
  }

  function display(d) {
    grandparent
        .datum(d.parent)
        .on("click", transition)
      .select("text")
        .text(name(d));

    var g1 = svg.insert("g", ".grandparent")
        .datum(d)
        .attr("class", "depth");

    var g = g1.selectAll("g")
        .data(d._children)
      .enter().append("g");

    g.filter(function(d) { return d._children; })
        .classed("children", true)
        .on("click", transition);

    var children = g.selectAll(".child")
        .data(function(d) { return d._children || [d]; })
      .enter().append("g");

    children.append("rect")
        .attr("class", "child")
        .call(rect)
      .append("title")
        .text(function(d) { 
			if(d.DepartureRemark=="出發DEPARTED")
			return "已出發_實際出發時間："+d.ActualDepartureTime
			if(d.DepartureRemark=="準時ON TIME")
			return "尚未出發_表定出發時間："+d.ScheduleDepartureTime
			if(d.DepartureRemark=="取消CANCELLED") return "班機取消"
		});
    children.append("text")
        .attr("class", "ctext")
        .text(function(d) { 
			if(d.DepartureRemark=="出發DEPARTED")
			return "已出發_實際出發時間："+d.ActualDepartureTime
			if(d.DepartureRemark=="準時ON TIME")
			return "尚未出發_表定出發時間："+d.ScheduleDepartureTime
			if(d.DepartureRemark=="取消CANCELLED") return "班機取消"
		})
        .call(text2);

    g.append("rect")
        .attr("class", "parent")
        .call(rect);

    var t = g.append("text")
        .attr("class", "ptext")
        .attr("dy", ".75em")

    t.append("tspan")
        .text(function(d) { return d.key; });
    t.append("tspan")
        .attr("dy", "1.0em");
    t.call(text);

    g.selectAll("rect")
        .style("fill", function(d) { return color(d.key); });

    function transition(d) {
      if (transitioning || !d) return;
      transitioning = true;

      var g2 = display(d),
          t1 = g1.transition().duration(750),
          t2 = g2.transition().duration(750);

      // Update the domain only after entering new elements.
      x.domain([d.x, d.x + d.dx]);
      y.domain([d.y, d.y + d.dy]);

      // Enable anti-aliasing during the transition.
      svg.style("shape-rendering", null);

      // Draw child nodes on top of parent nodes.
      svg.selectAll(".depth").sort(function(a, b) { return a.depth - b.depth; });

      // Fade-in entering text.
      g2.selectAll("text").style("fill-opacity", 0);

      // Transition to the new view.
      t1.selectAll(".ptext").call(text).style("fill-opacity", 0);
      t1.selectAll(".ctext").call(text2).style("fill-opacity", 0);
      t2.selectAll(".ptext").call(text).style("fill-opacity", 1);
      t2.selectAll(".ctext").call(text2).style("fill-opacity", 1);
      t1.selectAll("rect").call(rect);
      t2.selectAll("rect").call(rect);

      // Remove the old node when the transition is finished.
      t1.remove().each("end", function() {
        svg.style("shape-rendering", "crispEdges");
        transitioning = false;
      });
    }

    return g;
  }

  function text(text) {
    text.selectAll("tspan")
        .attr("x", function(d) { return x(d.x) + 6; })
    text.attr("x", function(d) { return x(d.x) + 6; })
        .attr("y", function(d) { return y(d.y) + 6; })
        .style("opacity", function(d) { return this.getComputedTextLength() < x(d.x + d.dx) - x(d.x) ? 1 : 0; });
  }

  function text2(text) {
    text.attr("x", function(d) { return x(d.x + d.dx) - this.getComputedTextLength() - 6; })
        .attr("y", function(d) { return y(d.y + d.dy) - 6; })
        .style("opacity", function(d) { return this.getComputedTextLength() < x(d.x + d.dx) - x(d.x) ? 1 : 0; });
  }

  function rect(rect) {
    rect.attr("x", function(d) { return x(d.x); })
        .attr("y", function(d) { return y(d.y); })
        .attr("width", function(d) { return x(d.x + d.dx) - x(d.x); })
        .attr("height", function(d) { return y(d.y + d.dy) - y(d.y); });
  }

  function name(d) {
    return d.parent
        ? name(d.parent) 
        : d.ActualDepartureTime ;
  }
}

if (window.location.hash === "") {
    d3.json("https://ptx.transportdata.tw/MOTC/v2/Air/FIDS/Airport/Departure/TPE?$format=JSON", function(err, res) {
        if (!err) {
            console.log(res);
            var data = d3.nest()
				.key(function(d) { return d.FlightDate; })
				.key(function(d) { return d.AirlineID; })
				.key(function(d) { return d.ArrivalAirportID; })
				.key(function(d) { return d.FlightNumber; })
				.entries(res);
            main({title: "出境航班即時資訊"}, {ActualDepartureTime: "桃園中正機場->日期->航空公司->目的地->班機編號&出發狀態", values: data});
        }
    });
}

</script>
</body>
</html>