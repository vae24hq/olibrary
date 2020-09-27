<?php
/* PYPE™ - web development framework [HTML/CSS/PHP/SQL/JS/MORE]
 * PHP | dbconnect
 * Dependency » *
 */
	error_reporting (E_ALL ^ E_DEPRECATED);
	$dbconnect = mysql_pconnect(DBHost, DBUser, DBPassword) or trigger_error(mysql_error(),E_USER_ERROR);
	mysql_select_db(DBName, $dbconnect);
	$dblink = mysqli_connect(DBHost, DBUser, DBPassword, DBName);
?>