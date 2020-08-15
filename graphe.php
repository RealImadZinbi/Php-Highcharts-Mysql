<!DOCTYPE html>

<html>
	<title>Tableau de bords de Tcs programmés RDV</title>
	<head>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
		<script
		  src="https://code.jquery.com/jquery-3.4.1.min.js"   integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  		<script src="https://code.highcharts.com/highcharts.js"></script>


	</head>
	<body>
		<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

		<script type="text/javascript">
$(document).ready(function(){
							var options ={

    chart: {
        type: 'column'
    },
    title: {
        text: 'Stacked column chart'
    },
    
  
    tooltip: {
        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
        shared: true
    },
    plotOptions: {
        column: {
            stacking: 'percent'
        }
    },
    					
series: [{}]

};
					$.getJSON('datas.php',function(data){
					options.series[0].data = data;
					var chart = new Highcharts.chart(options);
});		
</script>	
	</body>


	</html>