<?php
#DEFINE VARIABLES
$input = array('bind' => '', 'firstname' => '', 'surname' => '', 'othername' => '', 'password' => '', 'birthday' => '', 'sex' => '', 'type' => '', 'location' => '');

if(isset($_REQUEST)){
	if(!empty($_REQUEST['userbind'])){$input['bind'] = $_REQUEST['userbind'];}
	if(!empty($_REQUEST['password'])){$input['password'] = $_REQUEST['password'];}
	if(!empty($_REQUEST['type'])){$input['type'] = $_REQUEST['type'];}
	if(!empty($_REQUEST['firstname'])){$input['firstname'] = $_REQUEST['firstname'];}
	if(!empty($_REQUEST['surname'])){$input['surname'] = $_REQUEST['surname'];}
	if(!empty($_REQUEST['othername'])){$input['othername'] = $_REQUEST['othername'];}
	if(!empty($_REQUEST['birthday'])){$input['birthday'] = $_REQUEST['birthday'];}
	if(!empty($_REQUEST['sex'])){$input['sex'] = $_REQUEST['sex'];}
	if(!empty($_REQUEST['location'])){$input['location'] = $_REQUEST['location'];}
}

#REQUIRED
if(empty($input['firstname'])){$response['code'] = 'E400A1'; $response['response'] = array('reason' => 'firstname required');}
elseif(empty($input['surname'])){$response['code'] = 'E400A2'; $response['response'] = array('reason' => 'surname required');}
elseif(empty($input['password'])){$response['code'] = 'E400A3'; $response['response'] = array('reason' => 'password required');}
elseif(empty($input['birthday'])){$response['code'] = 'E400A4'; $response['response'] = array('reason' => 'birtday required');}
elseif(empty($input['sex'])){$response['code'] = 'E400A5'; $response['response'] = array('reason' => 'sex required');}
elseif(empty($input['location'])){$response['code'] = 'E400A6'; $response['response'] = array('reason' => 'location required');}
elseif(empty($input['type'])){$response['code'] = 'E400A7'; $response['response'] = array('reason' => 'type required');}
elseif(empty($input['bind'])){$response['code'] = 'E400A8'; $response['response'] = array('reason' => 'userbind required');}

#PROCESS
else {
	$input['regvia'] = 'labtest';
	$filta['bind'] = $input['bind'];	
	$signup = app::update($input, 'user', $filta);
	if($signup !== FALSE){
		$response['action'] = 'success';
		$response['code'] = 'E200';
		$response['response'] = array('userbind' => $filta['bind']);
	}
	else {
		$response['code'] = 'E520';
		$response['response'] = array('reason' => 'unknown', 'request' => 'denied');
	}
}
?>