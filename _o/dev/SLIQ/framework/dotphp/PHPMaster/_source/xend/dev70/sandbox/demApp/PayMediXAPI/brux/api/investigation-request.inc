<?php
#DEFINE VARIABLES
$input = array('isby' => '', 'author' => '', 'user' => '', 'investigation' => '', 'location' => '', 'period' => '');

if(isset($_REQUEST)){
	if(!empty($_REQUEST['by'])){$input['isby'] = $_REQUEST['by'];}
	if(!empty($_REQUEST['oauthor'])){$input['author'] = $_REQUEST['oauthor'];}
	if(!empty($_REQUEST['ouser'])){$input['user'] = $_REQUEST['ouser'];}
	if(!empty($_REQUEST['oinvestigation'])){$input['investigation'] = $_REQUEST['oinvestigation'];}
	if(!empty($_REQUEST['location'])){$input['location'] = $_REQUEST['location'];}
	if(!empty($_REQUEST['period'])){$input['period'] = $_REQUEST['period'];}
}

#REQUIRED
if(empty($input['isby'])){$response['code'] = 'E400A1'; $response['response'] = array('reason' => 'oAUTHOR ACCOUNT_TYPE Required');}
elseif(empty($input['author'])){$response['code'] = 'E400A2'; $response['response'] = array('reason' => 'oAUTHOR Required');}
elseif(empty($input['user'])){$response['code'] = 'E400A3'; $response['response'] = array('reason' => 'oUSER Required');}
elseif(empty($input['investigation'])){$response['code'] = 'E400A4'; $response['response'] = array('reason' => 'oINVESTIGATION Required');}
elseif(empty($input['location'])){$response['code'] = 'E400A5'; $response['response'] = array('reason' => 'Location Required');}
elseif(empty($input['period'])){$response['code'] = 'E400A6'; $response['response'] = array('reason' => 'Period Required');}


#PROCESS
else {
	$input['isapp'] = $app->info('app');
	$result = orun::labtest($input);
	if($result !== FALSE){
		$response['action'] = 'success';
		$response['code'] = 'E200';
		$response['response'] = array('userbind' => $input['user']);
	}
	else {
		$response['code'] = 'E520';
		$response['response'] = array('reason' => 'unknown', 'request' => 'denied');
	}
}
?>