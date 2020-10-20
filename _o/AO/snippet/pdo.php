<?php
// connect database with UTF-8
$connect = new PDO(
	"mysql:host=$host;dbname=$db;charset=utf8",
	$user,
	$pass,
	array(
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
	)
);




$dsn = 'mysql:dbname='.$data["database"].';host='.$data["host"].';charset=utf8'; #Data Source Name
try {$connection = new PDO($dsn, $data["user"], $data["password"], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));}
catch (PDOException $e){die('Connection failed: ' . $e->getMessage());}
return $connection;