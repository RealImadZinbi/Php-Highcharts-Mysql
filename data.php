<?php
 session_start();
  set_time_limit(30);

  $dbcon=mysqli_connect("localhost","root","","csv_db");
  $_SESSION['Jour']= $dbcon->real_escape_string($_GET['Jour']);
  $_SESSION['Operateur']=$dbcon->real_escape_string($_GET['Operateur']);

  $Jour = $_SESSION['Jour'];

  $Operateur = $_SESSION['Operateur'];
  

  
  $req=("SELECT Plage,Jour,(used / free) *100 AS percentage FROM rdv where Jour='22/03/2019' and Operateur='$Operateur' ORDER BY Plage ");
 
// on envoie la requête
$res = $dbcon->query($req) or die();
 
// Si on a des lignes...
if ( $res->num_rows > 0 )
{
while($row = mysqli_fetch_array($res)){
      extract($row);

    //echo $id;
    //echo $amount; //1300220032404350
    $json[] = [(String)$Plage, (float)$percentage];
}
    }
else
{
  echo "On n'a aucun résultat";
}

    

  
  echo json_encode($json);


?>