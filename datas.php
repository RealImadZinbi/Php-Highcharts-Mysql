<?php
	$dbhost='localhost';
	$dbname ='csv_db';
	$dbuser='root';
	$dbpass='';
	try{
		$dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,
			$dbpass);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE,	PDO::ERRMODE_EXCEPTION);

	}catch(PDOException $ex){
		die($ex->getMessage());
	}

	$stmt=$dbcon->prepare("SELECT 
		* FROM rdv where Jour='04/03/2019'");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		extract($row);
	//	echo $used;
	//	echo $free; //1300220032404350
		$json[] = [(int)$used, (int)$free];
	}
	//echo json_encode($json);
	echo json_encode($json);
	