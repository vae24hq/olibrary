<?php
error_reporting (E_ALL ^ E_DEPRECATED);
$hostname_ifund = "fdb15.runhosting.com";
$database_ifund = "2145368_db";
$username_ifund = "2145368_db";
$password_ifund = "mWQc3Vlb2V";
$ifund = mysql_connect($hostname_ifund, $username_ifund, $password_ifund) or trigger_error(mysql_error(),E_USER_ERROR);
?>