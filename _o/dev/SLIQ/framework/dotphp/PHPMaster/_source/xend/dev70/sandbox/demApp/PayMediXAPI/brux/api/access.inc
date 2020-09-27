<?php
if(!empty($_REQUEST['token'])){
	$token = $_REQUEST['token'];
	
	if($token == '3956023041538729147'){#Android
		$response['action'] = 'success';
		$response['code'] = 'okay';
		$sessionkey = mt_rand().date('His');
		$response['response'] = array('token' => 'valid', 'request' => 'authorized', 'sessionkey' => $sessionkey);
	}
	else {
		$response['code'] = 'E406';
		$response['response'] = array('reason' => 'invalid token', 'request' => 'denied');
	}
}
else {
	$response['code'] = 'E400';
	$response['response'] = array('reason' => 'token required', 'request' => 'denied');
}
?>