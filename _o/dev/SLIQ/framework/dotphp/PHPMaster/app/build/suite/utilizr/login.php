<?php
function uLogin($method='post'){
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
	if(empty($userid) && empty($password)){$resp['code'] = 'E400A1';}
	elseif(empty($userid)){$resp['code'] = 'E400A2';}
	elseif(empty($password)){$resp['code'] = 'E400A3';}
	else {
		$userid = Utility::cleanInput($userid);
		$userid = Utility::username($userid);
		$password = Utility::cleanInput($password);

		global $odao;
		$login = $odao->login($userid, $password);

		if($login === false){
			Utility::sessionRestart();
			$resp['code'] = 'E405A1';
		}
		elseif($login == 'NO_RECORD'){
			Utility::sessionRestart();
			$resp['code'] = 'E401A1';
		}
		elseif($login == 'PASSWORD_INCORRECT'){
			Utility::sessionRestart();
			$resp['code'] = 'E401A2';
		}
		elseif(!empty($login['puid'])){
			Utility::sessionStart();
			$_SESSION['user_puid'] = $login['puid'];
			$resp['code'] = 'E200A1';
			$resp['data'] = $login;
		}
		else { #For improper case - unknown error - confirm why $login['puid'] is not returned
			#Todo ~ log this case and log the debug
			Utility::sessionRestart();
			$resp['code'] = 'E600';
		}
	}
	return $resp;
}?>