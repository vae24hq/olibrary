<?php
#DB CONFIG
function dbconfig(){
	$config_db['database'] = '247medic';
	$config_db['username'] = 'root';
	$config_db['password'] = '';
	$config_db['server'] = 'localhost';
	return $config_db;
}

require 'brux/brux.php';
require 'brux/app.php';
require 'brux/tool.php';
$response = array();

$app = app::instantiate();
$app->site('domain');

$response['status'] = 'success';
$response['code'] = 'OKAY';

#ROUTING
$route = $app->route();
$response['source'] = $route;
if(file_exists('brux/api/'.$route.'.php')){
	include('brux/api/'.$route.'.php');
} elseif($route != 'index') {
	$response['status'] = 'failed';
	$response['code'] = 'E404';
	$response['response'] = array('reason' => 'unavailable');
} else {
	$response['response'] = array('ping' => 'okay', 'version' => '0.0.1');
}

jsonAPI($response);
?>