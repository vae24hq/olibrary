<?php
$dbconfig = array(
	'host' => "localhost",
	// 'host' => "fdb17.freehostingeu.com",
	'user' => "root",
	'password' => "OpenDB",
	'database' => "trackdb"
);

//-------------- Define separators ---------------
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('PS') ? null : define('PS', '/');

require_once 'utility.php';
require_once 'u_loop.php';
require_once 'application.php';
session::start();
?>