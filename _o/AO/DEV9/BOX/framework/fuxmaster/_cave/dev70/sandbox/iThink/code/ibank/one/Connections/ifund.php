<?php
error_reporting (E_ALL ^ E_DEPRECATED);
$hostname_ifund = "localhost";
$database_ifund = "alliedirish_db";
$username_ifund = "alliedirish_dba";
$password_ifund = "#.SaveQuin16";
$ifund = mysql_connect($hostname_ifund, $username_ifund, $password_ifund) or trigger_error(mysql_error(),E_USER_ERROR);
?>