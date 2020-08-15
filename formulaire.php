<?php
session_start();
  $dbconn=mysqli_connect("localhost","root","","csv_db");

if(isset($_POST['submit'])) {
$_SESSION['Jour']=$_POST['Jour'];
$_SESSION['Operateur']=$_POST['Operateur'];
$Jour=$_SESSION['Jour'];
$Operateur=$_SESSION['Operateur'];

$url="data.php?Jour=$Jour&Operateur=$Operateur";
header('location:' .$url);
session_destroy();
} 
?>

  <!DOCTYPE html>
<title>Operateur et date du rendez vous</title>

<h1>Veuillez choisir votre operateur de Manutention <br>Et la date du rendez vous</br></h1>
<head>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<form action ="index.php" method="post">

  <div class="group">
    <input type="text" name="Operateur" required>
    <label>Operateur de manutention</label>
  </div>
  <div class="group">

    
    <label for="Jour">Date du rendez vous:</label>
    <br>  
    <br>
    <input type="date" name="Jour" min="2019-01-01" max="2019-7-31" required />
  </div>
  <button type="submit" name ="submit">Confirmer</button>
</form>
