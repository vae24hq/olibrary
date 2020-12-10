<?php
imposeSSL();
error_reporting (E_ALL ^ E_DEPRECATED);

// DATABASE CONNECTION
$hostname = "localhost"; $database = "ingfk"; $username = "ingfk"; $password = "SmallGai19";
$connect = mysql_connect($hostname, $username, $password) or trigger_error(mysql_error(), E_USER_ERROR);
mysql_select_db($database, $connect);

$sql = 'SELECT `timezone` FROM `firm` WHERE `id` = 1';
$result = mysql_query($sql, $connect);
$row = mysql_fetch_assoc($result);
date_default_timezone_set($row['timezone']);
?>