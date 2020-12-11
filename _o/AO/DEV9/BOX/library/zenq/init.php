<?php
$oDBData = array(
	'host' => 'localhost',
	'user' => 'root',
	'password' => '',
	'database' => 'lapo'
);
require 'libry/session.php';
oSession::start();
require 'libry/data.php';
require 'libry/route.php';
require 'libry/method.php';
require 'libry/database.php';
require 'app.php';
?>