<?php
define('MACHINE_IS', 'dev'); #prod|dev

$oConfig = array();

$oConfig['project'] = 'MediQ';
$oConfig['ver'] = '1.0';

// Database Configuration
$oConfig['db'] = array(
	'name' => 'mediq',
	'user' => 'mediq',
	'password' => 'OpenMediQ',
	'host' => 'localhost',
	'driver' => 'MySQLi' #MySQLi/PDO
);

// Allowed URIs
$oConfig['uri_allowed'] = array(
	'_oMain' => 'main',
	'_build' => 'main',
	'index' => '',
	'logout' => 'auth',
	'login' => 'auth',
	'dashboard' => 'main',
	'modify-password' => 'main',

	'new-card' => 'main',
	'manage-card' => 'main',
	'manage-card_' => '',

	'view-card' => '',
	'update-card' => '',

	'new-case' => '',

	'tony' => '',

);
?>