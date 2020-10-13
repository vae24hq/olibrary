<?php
$log = array();
$log['action'] = $model;
$log['platform'] = $_REQUEST['platform'];

if($state == 'failed'){
	$response['status'] = 'F9';
	$response['reason'] = 'ping failed';
	$response['message'] = 'A failure response was initiated';

	$log['standing'] = 'failed';
	$log['summary'] = $response['message'];
}
elseif($state == 'success'){
	$response['status'] = 'OK';
	$response['record'] = 1;
	$response['recordset'] = array('project' => $harvest->project['name'], 'version' => $harvest->project['version']);

	$log['standing'] = 'success';
	$log['summary'] = $harvest->project['name'].' - '.$harvest->project['version'];
}
$harvest->CreateLog($log);