<?php
function ologin($method='post'){
	$userid = ''; $password ='';

	if(!empty($method)){
		if($method == 'request'){
			if(isset($_REQUEST)){
				if(!empty($_REQUEST['userid'])){$userid = $_REQUEST['userid'];}
				if(!empty($_REQUEST['password'])){$password = $_REQUEST['password'];}
			}
		}
		elseif($method == 'get'){
			if(isset($_GET)){
				if(!empty($_GET['userid'])){$userid = $_GET['userid'];}
				if(!empty($_GET['password'])){$password = $_GET['password'];}
			}
		}
		elseif($method == 'post'){
			if(isset($_POST)){
				if(!empty($_POST['userid'])){$userid = $_POST['userid'];}
				if(!empty($_POST['password'])){$password = $_POST['password'];}
			}
		}
	}


	#REQUIRED
	if(empty($userid)){$resp['code'] = 'E400A1'; $resp['data'] = array('reason' => 'userid required');}
	elseif(empty($password)){$resp['code'] = 'E400A2'; $resp['data'] = array('reason' => 'password required');}
	else {
		ofile::load('auth','modelizr', 'strict');
		$userid = strip_tags(trim($userid));
		$password = strip_tags(trim($password));
		$login = auth::login($userid, $password, 'staff');
		if($login === FALSE){
			$resp['code'] = 'E401F1';
			$resp['data'] = array('msg' => 'login failed');
		}
		elseif($login = 'NO_RECORD'){
			$resp['code'] = 'E401F2';
			$resp['data'] = array('msg' => 'incorrect login');
		}
		// elseif(!empty($login['bind'])){
		// 	session::start();
		// 	$_SESSION['userbind'] = $login['bind'];
		// 	$resp['status'] = 'success';
		// 	$resp['data'] = array('userbind' => $login['bind']);
		// }
	}

	return $resp;
}
$ologin = ologin('request');
helper::jsonResp($ologin);
?>