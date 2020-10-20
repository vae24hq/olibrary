<?php
// connect dabase with UTF-8
$connect = new PDO(
	"mysql:host=$host;dbname=$db;charset=utf8",
	$user,
	$pass,
	array(
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
	)
);