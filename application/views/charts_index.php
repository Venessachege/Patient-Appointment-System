<html>
<head>
<title>Dynamic Graphs with JQuery and FusionCharts</title>
<script language="JavaScript" src="/public/js/FusionCharts.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
<script language="JavaScript">
function drawChart(chartSWF, strXML, chartdiv) {
	//Create another instance of the chart.
	var chart = new FusionCharts(chartSWF, "chart1Id", "400", "300", "0", "0"); 
	chart.setDataXML(strXML);
	chart.render(chartdiv);
}
function updateChart() {
	//call the CI data url
	$.get('/charts/getData/'+$('#changeData').val(), function(data) {
		if ($('#changeChart').val()==='3d') {
			drawChart("/public/fscharts/FCF_Column3D.swf", data,"chart1div");
		} else {
			drawChart("/public/fscharts/FCF_Column2D.swf", data,"chart1div");
		}
	});
}
$(document).ready(function(){
	//create the chart initially
	$.get('/charts/getData/', function(data) {
		drawChart("/public/fscharts/FCF_Column3D.swf", data, "chart1div");
	});
	//update the chart if the dropdown selection changes
	$('#changeChart').change(function() {
		updateChart();
	});
	$('#changeData').change(function() {
		updateChart();
	});
	
});
</script>
</head>
<body>
<select name="changeData" id="changeData">
	<option value="2010" selected>2010</option>
	<option value="2009">2009</option>
</select>
<select name="changeChart" id="changeChart">
	<option value="3d">3D Version</option>
	<option value="2d">2D Version</option>
</select><br>
<div id="chart1div" align="left">The chart will appear within this DIV. This text will be replaced by the chart.</div>
</body>
</html>