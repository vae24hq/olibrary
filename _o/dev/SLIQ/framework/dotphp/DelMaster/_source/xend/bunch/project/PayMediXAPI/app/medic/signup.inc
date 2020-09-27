<?php
#DEFINE VARIABLES
$input = array(
	'username' => '', 'email' => '', 'phone' => '', 'password' => '', 'type' => '',
	'firstname' => '', 'surname' => '', 'othername' => '', 'birthday' => '', 'sex' => '', 'location' => ''
);

if(isset($_REQUEST)){
	if(!empty($_REQUEST['username'])){$input['username'] = $_REQUEST['username'];} else {$input['username'] = brux::randomiz('username');}
	if(!empty($_REQUEST['email'])){$input['email'] = $_REQUEST['email'];}
	if(!empty($_REQUEST['phone'])){$input['phone'] = $_REQUEST['phone'];}
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
if(empty($input['email'])){$response['code'] = 'E400A1'; $response['response'] = array('reason' => 'email required');}
elseif(empty($input['password'])){$response['code'] = 'E400A2'; $response['response'] = array('reason' => 'password required');}
elseif(empty($input['phone'])){$response['code'] = 'E400A3'; $response['response'] = array('reason' => 'phone number required');}
elseif(empty($input['type'])){$response['code'] = 'E400A4'; $response['response'] = array('reason' => 'account type required');}
elseif(empty($input['firstname'])){$response['code'] = 'E400A5'; $response['response'] = array('reason' => 'firstname required');}
elseif(empty($input['surname'])){$response['code'] = 'E400A6'; $response['response'] = array('reason' => 'surname required');}
elseif(empty($input['birthday'])){$response['code'] = 'E400A7'; $response['response'] = array('reason' => 'birthday required');}
elseif(empty($input['sex'])){$response['code'] = 'E400A7'; $response['response'] = array('reason' => 'sex required');}
elseif(empty($input['location'])){$response['code'] = 'E400A6'; $response['response'] = array('reason' => 'location required');}

#PROCESS
else {
	$input['regvia'] = 'medic';
	$signup = $app->signup($input);
	if($signup == 'EMAIL_EXIST'){$response['code'] = 'E409A1'; $response['response'] = array('reason' => 'email address already exist');}
	elseif($signup == 'PHONE_EXIST'){$response['code'] = 'E409A2'; $response['response'] = array('reason' => 'phone number already exist');}
	elseif($signup == 'USERNAME_EXIST'){$response['code'] = 'E409A3'; $response['response'] = array('reason' => 'username already exist');}
	elseif(!empty($signup['bind'])){
		$response['action'] = 'success';
		$response['code'] = 'E200';
		$response['response'] = array('userbind' => $signup['bind'], 'account' => $signup['type'], 'status' => $signup['status']);
	}
	else {
		$response['code'] = 'E520';
		$response['response'] = array('reason' => 'unknown', 'request' => 'denied');
	}
}
?>