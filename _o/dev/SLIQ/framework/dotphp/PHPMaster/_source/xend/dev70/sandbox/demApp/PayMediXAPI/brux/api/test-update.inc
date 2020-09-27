<?php
#DEFINE VARIABLES
$input = array('bind' => '');
$update = array();

if(isset($_REQUEST)){
	if(!empty($_REQUEST['otest'])){$input['bind'] = $_REQUEST['otest'];}
	if(!empty($_REQUEST['oscientist'])){$update['scientist'] = $_REQUEST['oscientist'];}
	if(!empty($_REQUEST['status'])){$update['status'] = $_REQUEST['status'];}
}

#REQUIRED
if(empty($input['bind'])){$response['code'] = 'E400A1'; $response['response'] = array('reason' => 'oTEST required');}
elseif(empty($update)){$response['code'] = 'E400A2'; $response['response'] = array('reason' => 'no record is provided for update');}


#PROCESS
else {
	$user = oupdate::labtest($update, $input);
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