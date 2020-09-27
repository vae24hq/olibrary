<?php
error_reporting (E_ALL ^ E_DEPRECATED);
$hostname_ifund = "fdb7.biz.nf";
$database_ifund = "2063675_db";
$username_ifund = "2063675_db";
$password_ifund = "bizNexi16";
$ifund = mysql_connect($hostname_ifund, $username_ifund, $password_ifund) or trigger_error(mysql_error(),E_USER_ERROR);
?>