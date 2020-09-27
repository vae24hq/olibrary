<?php
#DEFINE VARIABLES
$input = array(
	'bind' => '',
	'firebasekey' => ''
);

if(isset($_REQUEST)){
	if(!empty($_REQUEST['userbind'])){$input['bind'] = $_REQUEST['userbind'];}
	if(!empty($_REQUEST['firebasetoken'])){$input['firebasekey'] = $_REQUEST['firebasetoken'];}
}

#REQUIRED
if(empty($input['bind'])){$response['code'] = 'E400A1'; $response['response'] = array('reason' => 'userbind required');}
if(empty($input['firebasekey'])){$response['code'] = 'E400A1'; $response['response'] = array('reason' => 'firebase token required');}


#PROCESS
$search = 'bind';
$filta['bind'] = $input['bind'];

#Find User Record
$user = $app->find($search, 'user', $filta);
if($user === 'NO_RECORD'){$response['code'] = 'E200F9'; $response['response'] = array('reason' => 'no user found', 'request' => 'denied');}
elseif($user === FALSE){
	$response['code'] = 'E520';
	$response['response'] = array('reason' => 'unknown', 'request' => 'denied');
}
elseif(!empty($user['bind'])){
	#Update firebase token
	$updateRecord['firebasekey'] = $input['firebasekey'];
	$update = $app->update($updateRecord, 'user', $filta);

	if($update === FALSE){
		$response['code'] = 'E520B';
		$response['response'] = array('reason' => 'update failed', 'request' => 'denied');
	}

	$response['action'] = 'success';
	$response['code'] = 'E200';
	$response['response'] = array('userbind' => $user['bind']);
}
?>