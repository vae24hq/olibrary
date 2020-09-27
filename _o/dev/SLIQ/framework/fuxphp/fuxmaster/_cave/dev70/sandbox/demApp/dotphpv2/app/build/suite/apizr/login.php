<?php
function callAPI(){
	$userid = ''; $password ='';

	if(isset($_REQUEST)){
		if(!empty($_REQUEST['userid'])){$userid = $_REQUEST['userid'];}
		if(!empty($_REQUEST['password'])){$password = $_REQUEST['password'];}
	}

	#REQUIRED
	if(empty($userid)){$resp['code'] = 'E400A1'; $resp['data'] = array('reason' => 'userid required');}
	elseif(empty($password)){$resp['code'] = 'E400A2'; $resp['data'] = array('reason' => 'password required');}
	else {
		$login = $app->login($userid, $password);
		if($login === FALSE){$resp['code'] = 'E200F9';}
		elseif(!empty($login['bind'])){
			$_SESSION['userbind'] = $login['bind'];
			$resp['status'] = 'success';
			$resp['data'] = array('userbind' => $login['bind']);
		}
	}
	return $resp;
}
?>