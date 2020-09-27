<?php
$userid = ''; $password ='';
$response['status'] = 'failed';

if(isset($_REQUEST)){
	if(!empty($_REQUEST['userid'])){$userid = $_REQUEST['userid'];}
	if(!empty($_REQUEST['password'])){$password = $_REQUEST['password'];}
}

#REQUIRED
if(empty($userid)){$response['code'] = 'E400A1';}
elseif(empty($password)){$response['code'] = 'E400A2';}

else {
	$login = $app->login($userid, $password);
	if($login === FALSE){$response['code'] = 'E200F9';}
	elseif(!empty($login['bind'])){
		$_SESSION['userbind'] = $login['bind'];
		$response['status'] = 'success';
		$response['response'] = array('userbind' => $login['bind']);
	}
}
?>