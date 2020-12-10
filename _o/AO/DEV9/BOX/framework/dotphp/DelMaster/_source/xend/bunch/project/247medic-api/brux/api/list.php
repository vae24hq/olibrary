<?php
$input = array('bind' => '');
if(isset($_REQUEST)){
	if(!empty($_REQUEST['bind'])){$input['bind'] = $_REQUEST['bind'];}
	if(!empty($_REQUEST['email'])){$input['email'] = $_REQUEST['email'];}
	if(!empty($_REQUEST['username'])){$input['username'] = $_REQUEST['username'];}
	if(!empty($_REQUEST['phone'])){$input['phone'] = $_REQUEST['phone'];}

	if(!empty($_REQUEST['type'])){$input['type'] = $_REQUEST['type'];}
}

$user = $app->find('*', 'user', $input);
if($user === FALSE){$response['bruxRes'] = 'failed';}
else {
	$response = array_merge($user, $response);
	$response['bruxRes'] = 'success';
}
?>