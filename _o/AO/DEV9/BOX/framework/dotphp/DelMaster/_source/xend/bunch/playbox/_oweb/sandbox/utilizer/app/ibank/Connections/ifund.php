<?php
error_reporting (E_ALL ^ E_DEPRECATED);
$hostname_ifund = "localhost";
$database_ifund = "ibdb";
$username_ifund = "root";
$password_ifund = "";
$ifund = mysql_connect($hostname_ifund, $username_ifund, $password_ifund) or trigger_error(mysql_error(),E_USER_ERROR);
?>