<?php
function modifyPW($method='post', $puid=''){#method{post|get|request} OR dataInput{array}
	$resp = false;
	$input = Form::inputData($method);
	if(empty($input)){$resp['code'] = 'E100A1';}
	elseif(empty($puid)){$resp['code'] = 'E501A1';}
	elseif(!empty($input) && is_array($input)){
		if(empty($input['password']) && empty($input['passwordconfirm']) && empty($input['passwordcurrent'])){
			$resp['code'] = 'E400A1';
		}
		elseif(empty($input['passwordcurrent'])){$resp['code'] = 'E400A2';}
		elseif(empty($input['password'])){$resp['code'] = 'E400A3';}
		elseif(empty($input['passwordconfirm'])){$resp['code'] = 'E400A4';}
		elseif($input['password'] != $input['passwordconfirm']){$resp['code'] = 'E400A5';}
		else {
		$password = Form::cleanInput($input['password']);
		$passwordcurrent = Form::cleanInput($input['passwordcurrent']);

		$modifyPW = Auth::passwordModify($puid, $password, $passwordcurrent);
		if($modifyPW === false){
			// Utility::sessionRestart();
			$resp['code'] = 'E405A1';
		}
		elseif($modifyPW == 'NO_RECORD'){
			// Utility::sessionRestart();
			$resp['code'] = 'E401A1';
		}
		elseif($modifyPW == 'PASSWORD_INCORRECT'){
			$resp['code'] = 'E401A2';
		}
		elseif(!empty($modifyPW['puid'])){
		// 	Utility::sessionStart();
			$resp['code'] = 'E200A1';
			$resp['data'] = $modifyPW;
		}
		elseif($modifyPW == 'PASSWORD_CHANGE_FAILED'){
			$resp['code'] = 'E601A1';
		}

		else {#For improper case - unknown error - confirm why $modifyPW['puid'] is not returned
		// 	#Todo ~ log this case and log the debug
			#Utility::sessionRestart();
			$resp['code'] = 'E600';
		}
	}
	}

	return $resp;
}

function modifyActivePW($method='post'){
	if(!empty($_SESSION['user_puid'])){
		return modifyPW($method, $_SESSION['user_puid']);
	}
	return false;
}
?>