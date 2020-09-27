<?php
imposeSSL();
error_reporting (E_ALL ^ E_DEPRECATED);
date_default_timezone_set("Europe/London");

// DATABASE CONNECTION
$hostname = "fdb17.runhosting.com"; $database = "2383936_db"; $username = "2383936_db"; $password = "jMJm2806zi#";
$connect = mysql_connect($hostname, $username, $password) or trigger_error(mysql_error(), E_USER_ERROR);
mysql_select_db($database, $connect);
?>