<?php
$input = array('username' => '', 'email' => '', 'phone' => '',  'password' => '', 'type' => '');
$response['status'] = 'failed';

if(isset($_REQUEST)){
	if(!empty($_REQUEST['username'])){$input['username'] = $_REQUEST['username'];} else {$input['username'] = brux::randomiz('suid');}
	if(!empty($_REQUEST['email'])){$input['email'] = $_REQUEST['email'];}
	if(!empty($_REQUEST['phone'])){$input['phone'] = $_REQUEST['phone'];}
	if(!empty($_REQUEST['password'])){$input['password'] = $_REQUEST['password'];}
	if(!empty($_REQUEST['type'])){$input['type'] = $_REQUEST['type'];}
}

#REQUIRED
if(empty($input['email'])){$response['code'] = 'E400A1';}
elseif(empty($input['password'])){$response['code'] = 'E400A2';}
elseif(empty($input['phone'])){$response['code'] = 'E400A3';}
elseif(empty($input['type'])){$response['code'] = 'E400A4';}

else {
	$register = $app->register($input);
	if($register === FALSE){$response['code'] = 'E200F9';}
	elseif($register == 'email_exist'){$response['code'] = 'E40901';}
	elseif($register == 'username_exist'){$response['code'] = 'E40902';}
	elseif($register == 'phone_exist'){$response['code'] = 'E40903';}
	elseif(!empty($register['bind'])){
		$_SESSION['userbind'] = $register['bind'];
		$response['status'] = 'success';
		$response['response'] = array('userbind' => $register['bind']);
	} else {$response['code'] = 'E520';}
}
?>