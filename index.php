<?php
session_start();
$dbcon=mysqli_connect("localhost","root","","csv_db");
$_SESSION['Jour']=$_POST['Jour'];
$_SESSION['Operateur']=$_POST['Operateur'];

$Jour=$_SESSION['Jour'];
$Operateur=$_SESSION['Operateur'];
 echo $Jour;
 session_destroy();
?>
<!DOCTYPE html>

<html>

	<title>Tableaux de bord</title>
	<head>
		<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
	</head>
	<body>
		<div id="container" style="width:80%; height:300px;"></div>
		
		<script type="text/javascript">
			$(document).ready(function(){
				var options ={		
					chart: {
						renderTo: 'container',
						type: 'column',

					},
					 title: {
            text: 'Conteneurs utilisés par plage horaire'
        },
         yAxis: {
        min: 0,
        max: 100,		
        title: {
            text: 'Pourcentage des conteneurs utilisés'
        }
    },
    plotOptions: {
        yAxis: {
            stacking: 'percent'
        }
    },
     xAxis: {
        min: 1,
        		
        title: {
            text: 'Nombre de plages horaires'
        }
    },


					series: [{
						 name: 'Pourcentage conteneurs utilisés',
					}]
				};
				$.getJSON('data.php?Jour=2019-03-04&Operateur=$Operateur',function(data){
					options.series[0].data = data;
					var chart = new Highcharts.chart(options);
				});
			});
				</script>
	</body>		
	</html>