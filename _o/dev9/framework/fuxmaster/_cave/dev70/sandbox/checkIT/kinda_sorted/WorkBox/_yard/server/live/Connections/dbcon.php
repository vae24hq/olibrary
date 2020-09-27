<?php
  error_reporting(E_ALL & ~E_DEPRECATED);
# error_reporting(0);
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_dbcon = "localhost";
$database_dbcon = "whoscoc_erko";
$username_dbcon = "whoscoc_erko_who";
$password_dbcon = "erkowhosco2014";
$dbcon = mysql_pconnect($hostname_dbcon, $username_dbcon, $password_dbcon) or trigger_error(mysql_error(),E_USER_ERROR); 
?>