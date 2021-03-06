<?php
//========== APPLICATION CONFIGURATION ==========//
$AppConfig = array();

# Database Setting
$AppConfig['db'] = array(
	'name' => 'app',
	'user' => 'root',
	// 'password' => '',
	'host' => 'localhost',
	'server' => 'MySQL'
);

# Project Setting
$AppConfig['name'] = 'MediPlex';
$AppConfig['project'] = array(
	'type' => 'app',
	'brand' => 'MediPlex',
	'id' => 'MediPlex'
);

# Machine Setting
$AppConfig['envi'] = 'production';
$AppConfig['status'] = 'live';
?>