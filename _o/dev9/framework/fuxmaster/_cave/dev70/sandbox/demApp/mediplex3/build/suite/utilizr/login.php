<?php
function aLogin($method='post'){
	$userid = ''; $password ='';

	if(!empty($method))
	{
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
	if(empty($userid)){$resp['code'] = 'E400A1'; $resp['data'] = array('reason' => 'Your UserID is required');}
	elseif(empty($password)){$resp['code'] = 'E400A2'; $resp['data'] = array('reason' => 'Your password is required');}
	else {
		$userid = strip_tags(trim($userid));
		$password = strip_tags(trim($password));
		oFile::load('auth','modelizr');
		$login = auth::login($userid, $password, 'staff');
		if($login === FALSE){
			oSession::restart();
			$resp['code'] = 'E405F1';
			$resp['data'] = array('reason' => 'Authentication error');
		}
		elseif($login == 'NO_RECORD'){
			oSession::restart();
			$resp['code'] = 'E401F1';
			$resp['data'] = array('reason' => 'Incorrect login information');
		}
		elseif(!empty($login['ruid'])){
			oSession::start();
			$_SESSION['user_ruid'] = $login['ruid'];
			$resp['status'] = 'success';
			$resp['data'] = $login;
		}
		else { #For improper case - unknown error - confirm why $login['ruid'] is not returned
			#Todo ~ log this case and log the debug
			oSession::restart();
			$resp['code'] = 'E600';
			$resp['data'] = array('reason' => 'an error occurred');
		}
	}
	return $resp;
}?>