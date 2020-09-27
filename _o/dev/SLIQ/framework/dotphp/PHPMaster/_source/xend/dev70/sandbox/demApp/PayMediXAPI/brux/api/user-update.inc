<?php
#DEFINE VARIABLES
$input = array('bind' => '');
$update = array();

if(isset($_REQUEST)){
	if(!empty($_REQUEST['ouser'])){$input['bind'] = $_REQUEST['ouser'];}
	if(!empty($_REQUEST['email'])){$update['email'] = $_REQUEST['email'];}
	if(!empty($_REQUEST['username'])){$update['username'] = $_REQUEST['username'];}
	if(!empty($_REQUEST['phone'])){$update['phone'] = $_REQUEST['phone'];}
	if(!empty($_REQUEST['firstname'])){$update['firstname'] = $_REQUEST['firstname'];}
	if(!empty($_REQUEST['surname'])){$update['surname'] = $_REQUEST['surname'];}
	if(!empty($_REQUEST['othername'])){$update['othername'] = $_REQUEST['othername'];}
	if(!empty($_REQUEST['birthday'])){$update['birthday'] = $_REQUEST['birthday'];}
	if(!empty($_REQUEST['sex'])){$update['sex'] = strtolower($_REQUEST['sex']);}
	if(!empty($_REQUEST['location'])){$update['location'] = $_REQUEST['location'];}
	if(!empty($_REQUEST['isonline'])){$update['isonline'] = $_REQUEST['isonline'];}
	if(!empty($_REQUEST['lastseen'])){$update['lastseen'] = $_REQUEST['lastseen'];}
	if(!empty($_REQUEST['photo'])){$update['photo'] = $_REQUEST['photo'];}
}

#REQUIRED
if(empty($input['bind'])){$response['code'] = 'E400A1'; $response['response'] = array('reason' => 'oUSER required');}
elseif(empty($update)){$response['code'] = 'E400A2'; $response['response'] = array('reason' => 'no record is provided for update');}


#PROCESS
else {
	$user = $app->updateUser($update, $input);
	if($user === 'NO_RECORD'){$response['code'] = 'E200F9'; $response['response'] = array('reason' => 'no record found', 'request' => 'denied');}
	elseif($user === FALSE){
		$response['code'] = 'E520';
		$response['response'] = array('reason' => 'unknown', 'request' => 'denied');
	}
	else {
		$response['action'] = 'success';
		$response['code'] = 'E200';

		$response['response'] = array('userbind' => $input['bind']);
		if(is_array($user)){
			$response['response'] = array_merge($user, $response['response']);
		}
	}
}
?>