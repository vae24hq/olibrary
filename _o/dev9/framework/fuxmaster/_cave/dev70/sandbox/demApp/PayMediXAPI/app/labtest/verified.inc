<?php
#DEFINE VARIABLES
$input = array('user' => '', 'verified' => '');

if(isset($_REQUEST)){
	if(!empty($_REQUEST['userbind'])){$input['user'] = $_REQUEST['userbind'];}
	if(!empty($_REQUEST['verified'])){$input['verified'] = $_REQUEST['verified'];}
}

#REQUIRED
if(empty($input['user'])){$response['code'] = 'E400A1'; $response['response'] = array('reason' => 'user bind required');}
elseif(empty($input['verified'])){$response['code'] = 'E400A2'; $response['response'] = array('reason' => 'verification type required');}


else {
	$verified = $app->verified($input['user'], $input['verified']);
	if($verified === FALSE){$response['code'] = 'E200F9';}
	else {
		$response['code'] = 'okay';
		$response['action'] = 'success';
		$response['response'] = array('userbind' => $input['user']);
	}
}
?>