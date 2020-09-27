<?php
function login($method='post'){
	$userid = ''; $password ='';
	$request = Form::setMethod($method);
	if(!empty($request['userid'])){$userid = $request['userid'];}
	if(!empty($request['password'])){$password = $request['password'];}

	#REQUIRED
	if(empty($userid) && empty($password)){$resp['code'] = 'E400A1';}
	elseif(empty($userid)){$resp['code'] = 'E400A2';}
	elseif(empty($password)){$resp['code'] = 'E400A3';}
	else {
		$userid = Form::cleanInput($userid);
		$password = Form::cleanInput($password);
		$userid = Auth::crypt($userid);

		global $fuxAuth;
		$login = $fuxAuth->login($userid, $password);

		if($login === false){Session::restart(); $resp['code'] = 'E405A1';}
		elseif($login == 'NO_RECORD'){Session::restart(); $resp['code'] = 'E401A1';}
		elseif($login == 'PASSWORD_INCORRECT'){Session::restart(); $resp['code'] = 'E401A2';}
		elseif(!empty($login['puid'])){Session::start(); $resp['code'] = 'E200A1'; $_SESSION['user_puid'] = $login['puid']; $resp['data'] = $login;}
		else { #For improper case - unknown error - confirm why $login['puid'] is not returned
			#Todo ~ log this case and log the debug
			Session::restart();
			$resp['code'] = 'E600B1';
		}
	}
	return $resp;
}?>