<?php
#DEFINE VARIABLES
$input = array('user' => '');

if(isset($_REQUEST)){
	if(!empty($_REQUEST['ouser'])){$input['user'] = $_REQUEST['ouser'];}
}

#REQUIRED
if(empty($input['user'])){$response['code'] = 'E400A1'; $response['response'] = array('reason' => 'oUSER Required');}


#PROCESS
else {
	$userTest = oList::userInvestigation($input['user']);
	if($userTest === 'NO_RECORD'){$response['code'] = 'E200F9'; $response['response'] = array('reason' => 'no record found', 'request' => 'denied');}
	elseif($userTest === FALSE){
		$response['code'] = 'E520';
		$response['response'] = array('reason' => 'unknown', 'request' => 'denied');
	}
	else {
		$response['action'] = 'success';
		$response['code'] = 'E200';

		$response['response'] = array();
		if(is_array($userTest)){
			$response['response'] = array_merge($userTest, $response['response']);
		}
	}
}
?>