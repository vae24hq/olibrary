<?php
#DEFINE VARIABLES
$input = array(
	'bind' => ''
);

if(isset($_REQUEST)){
	if(!empty($_REQUEST['ouser'])){$input['bind'] = $_REQUEST['ouser'];}
	if(!empty($_REQUEST['email'])){$input['email'] = $_REQUEST['email'];}
	if(!empty($_REQUEST['username'])){$input['username'] = $_REQUEST['username'];}
	if(!empty($_REQUEST['phone'])){$input['phone'] = $_REQUEST['phone'];}
}

#REQUIRED
if(empty($input['bind'])){$response['code'] = 'E400A1'; $response['response'] = array('reason' => 'oUSER Required');}


#PROCESS
else {
	$search = 'suid, bind, username, email, phone, firstname, surname, othername, birthday, sex, location, type, photo, lastseen, isonline';
	$user = $app->find($search, 'user', $input);
	if($user === 'NO_RECORD'){$response['code'] = 'E200F9'; $response['response'] = array('reason' => 'no record found', 'request' => 'denied');}
	elseif($user === FALSE){
		$response['code'] = 'E520';
		$response['response'] = array('reason' => 'unknown', 'request' => 'denied');
	}
	elseif(!empty($user['bind'])){
		$response['action'] = 'success';
		$response['code'] = 'E200';

		$response['response'] = array('userbind' => $user['bind']);
		if(is_array($user)){
			unset($user['bind']);
			$response['response'] = array_merge($user, $response['response']);
		}
	}
}
?>