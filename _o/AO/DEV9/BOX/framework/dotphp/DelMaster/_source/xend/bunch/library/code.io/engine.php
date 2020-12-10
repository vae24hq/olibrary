<?php
// DATABASE CONNECTION
function dbconnect($data){
	$dsn = 'mysql:dbname='.$data["database"].';host='.$data["host"]; #Data Source Name

	try {$connection = new PDO($dsn, $data["user"], $data["password"]);}
	catch (PDOException $e){die('Connection failed: ' . $e->getMessage());}

	return $connection;
}

$db = dbconnect($dbconfig);

function insertDB($data, $table){
	$column = ''; $param = ''; $bind = array();
	foreach($data as $key => $value){
		$column .= $key.', ';
		$param .= ':'.$key.', ';
	}
	$column = trimEdge($column, ',');
	$param = trimEdge($param, ',');
	
	global $db;
	$statement = $db->prepare("INSERT INTO $table($column) VALUES($param)");
	$execute = $statement->execute($data);
	if($execute){return $execute;}
	else {return $statement->errorInfo()[2];}	
}
?>