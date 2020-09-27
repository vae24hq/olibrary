<?php
function uCPassW($puid='', $method='post'){
	$passw = ''; $newpassw = ''; $confirmpassw = '';

	if(!empty($method))
	{
		if($method == 'request'){
			if(isset($_REQUEST)){
				if(!empty($_REQUEST['currentpassword'])){$passw = $_REQUEST['currentpassword'];}
				if(!empty($_REQUEST['newpassword'])){$newpassw = $_REQUEST['newpassword'];}
				if(!empty($_REQUEST['confirmpassword'])){$confirmpassw = $_REQUEST['confirmpassword'];}
			}
		}
		elseif($method == 'get'){
			if(isset($_GET)){
				if(!empty($_GET['currentpassword'])){$passw = $_GET['currentpassword'];}
				if(!empty($_GET['newpassword'])){$newpassw = $_GET['newpassword'];}
				if(!empty($_GET['confirmpassword'])){$confirmpassw = $_GET['confirmpassword'];}
			}
		}
		elseif($method == 'post'){
			if(isset($_POST)){
				if(!empty($_POST['currentpassword'])){$passw = $_POST['currentpassword'];}
				if(!empty($_POST['newpassword'])){$newpassw = $_POST['newpassword'];}
				if(!empty($_POST['confirmpassword'])){$confirmpassw = $_POST['confirmpassword'];}
			}
		}
	}

	#REQUIRED
	if(empty($passw) && empty($newpassw) && empty($confirmpassw)){$resp['code'] = 'E400A1';}
	elseif(empty($passw)){$resp['code'] = 'E400A2';}
	elseif(empty($newpassw)){$resp['code'] = 'E400A3';}
	elseif(empty($confirmpassw)){$resp['code'] = 'E400A4';}
	elseif($newpassw != $confirmpassw){$resp['code'] = 'E400A5';}
	else {
		$passw = Utility::cleanInput($passw);
		$newpassw = Utility::cleanInput($newpassw);

		global $odao;
		$cpassw = $odao->cpassw($puid, $passw, $newpassw);
		if($cpassw === false){
			// Utility::sessionRestart();
			$resp['code'] = 'E405A1';
		}
		elseif($cpassw == 'NO_RECORD'){
			// Utility::sessionRestart();
			$resp['code'] = 'E401A1';
		}
		elseif($cpassw == 'PASSWORD_INCORRECT'){
			$resp['code'] = 'E401A2';
		}
		elseif(!empty($cpassw['puid'])){
		// 	Utility::sessionStart();
			$resp['code'] = 'E200A1';
			$resp['data'] = $cpassw;
		}
		elseif($cpassw == 'PASSWORD_CHANGE_FAILED'){
			$resp['code'] = 'E601A1';
		}

		else {#For improper case - unknown error - confirm why $cpassw['puid'] is not returned
		// 	#Todo ~ log this case and log the debug
			Utility::sessionRestart();
			$resp['code'] = 'E600';
		}
	}
	return $resp;
}?>