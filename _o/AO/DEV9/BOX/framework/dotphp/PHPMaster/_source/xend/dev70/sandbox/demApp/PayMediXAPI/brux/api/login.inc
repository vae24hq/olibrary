<?php
#DEFINE VARIABLES
$userid = ''; $password ='';

if(isset($_REQUEST)){
	if(!empty($_REQUEST['userid'])){$userid = $_REQUEST['userid'];}
	if(!empty($_REQUEST['password'])){$password = $_REQUEST['password'];}
}

#REQUIRED
if(empty($userid)){$response['code'] = 'E400A1'; $response['response'] = array('reason' => 'userid required', 'request' => 'denied');}
elseif(empty($password)){$response['code'] = 'E400A2'; $response['response'] = array('reason' => 'password required', 'request' => 'denied');}

#PROCESS
else {
	$login = $app->login($userid, $password);
	if($login === 'NO_RECORD'){$response['code'] = 'E200F9'; $response['response'] = array('reason' => 'invalid credentials', 'request' => 'denied');}
	elseif(!empty($login['bind'])){
		$response['action'] = 'success';
		$response['code'] = 'E200';
		$response['response'] = array('userbind' => $login['bind'], 'account' => $login['type'], 'status' => $login['status'], 'firstname' => $login['firstname'], 'surname' => $login['surname']);
	}
	else {
		$response['code'] = 'E520';
		$response['response'] = array('reason' => 'unknown', 'request' => 'denied');
	}
}
?>