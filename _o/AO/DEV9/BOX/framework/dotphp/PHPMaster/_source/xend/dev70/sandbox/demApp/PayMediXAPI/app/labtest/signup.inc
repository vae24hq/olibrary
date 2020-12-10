<?php
#DEFINE VARIABLES
$input = array('username' => '', 'email' => '', 'phone' => '');

if(isset($_REQUEST)){
	if(!empty($_REQUEST['username'])){$input['username'] = $_REQUEST['username'];} else {$input['username'] = brux::randomiz('username');}
	if(!empty($_REQUEST['email'])){$input['email'] = $_REQUEST['email'];}
	if(!empty($_REQUEST['phone'])){$input['phone'] = $_REQUEST['phone'];}
}

#REQUIRED
if(empty($input['email'])){$response['code'] = 'E400A1'; $response['response'] = array('reason' => 'email required');}
elseif(empty($input['phone'])){$response['code'] = 'E400A2'; $response['response'] = array('reason' => 'phone number required');}


#PROCESS
else {
	$input['regvia'] = 'labtest';
	$signup = $app->signupVeriGen($input);
	if($signup == 'EMAIL_EXIST'){$response['code'] = 'E409A1'; $response['response'] = array('reason' => 'email address already exist');}
	elseif($signup == 'PHONE_EXIST'){$response['code'] = 'E409A2'; $response['response'] = array('reason' => 'phone number already exist');}
	elseif($signup == 'USERNAME_EXIST'){$response['code'] = 'E409A3'; $response['response'] = array('reason' => 'username already exist');}
	elseif(!empty($signup['user'])){
		$response['action'] = 'success';
		$response['code'] = 'E200';
		$response['response'] = array('userbind' => $signup['user'], 'phonecode' => $signup['phonecode'], 'emailcode' => $signup['emailcode'], 'bothcode' => 'BDEMO2018');
	}
	else {
		$response['code'] = 'E520';
		$response['response'] = array('reason' => 'unknown', 'request' => 'denied');
	}
}
?>