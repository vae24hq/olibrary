<?php
/**ZERN™ Framework ~ an evolving, robust platform for rapid & efficient development of modem responsive applications and APIs;
 * Built by ODAO™ [www.osawere.com] using PHP, SQL, HTML, CSS, JS & derived technology.
 * © July 2019 | beta 1.0
 * ===================================================================================================================
 * Dependency » ~
 * PHP | auth::organizer ~ authentication [login, logout, locked, etc]
 **/

$auth = array();

//========== LOGIN ==========//
if($zernLink == 'login'){
	if(empty($_POST)){
		oSession::restart();
		if(empty($_GET['zern'])){$auth ['oCODE'] = 'E100A1';}
		else {
			if($_GET['zern'] == 'logout'){$auth['oCODE'] = 'E200A2';}
		}
	}
	else {
		$filter = array('userid', 'password');
		$input = oInput::prep('oPOST', $filter);
		if(empty($input)){$auth['oCODE'] = 'E400A1';}
		elseif(empty($input['userid'])){$auth['oCODE'] = 'E400A2';}
		elseif(empty($input['password'])){$auth['oCODE'] = 'E400A3';}
		else {
			$input['userid'] = strtolower($input['userid']);
			$auth = $zernAuth->login($input['userid'], $input['password']);
			if($auth['oCODE'] == 'E200A1'){
				$zernApp->redirect('dashboard');
			}
		}
	}
}
//========== LOGIN ~end ==========//




//========== LOCKED ==========//
if($zernLink == 'locked'){
	require oUTIL.'auth.php';
	if(empty($_POST)){
		if(empty($_SESSION['oUSERID'])){$zernApp->redirect('login');}
		else {
			$_SESSION['oLOCKED'] = 'oYEAP';
			if(empty($_GET['zern'])){$auth ['oCODE'] = 'E100A1';}
			else {
				if($_GET['zern'] == 'password-changed'){$auth['oCODE'] = 'E200A3';}
			}
		}
	}
	else {
		$filter = array('password');
		$input = oInput::prep('oPOST', $filter);
		if(!empty($_SESSION['oUSERID'])){$input['userid'] = $_SESSION['oUSERID'];}
		if(empty($input)){$zernApp->redirect('login');}
		elseif(empty($input['userid'])){$zernApp->redirect('login');}
		elseif(empty($input['password'])){$auth['oCODE'] = 'E400A3';}
		else {
			$auth = $zernAuth->login($input['userid'], $input['password']);
			if($auth['oCODE'] == 'E200A1'){$zernApp->redirect('dashboard');}
		}
	}
}
//========== LOCKED ~end ==========//




//========== LOCKED ==========//
if($zernLink == 'logout'){
	$zernAuth->logout();
}
//========== LOCKED ~end ==========//

/*Include UI if module is not empty*/
if(!empty($auth)){
	$auth = response($auth, $zernLink);
	require oDESIGN.'auth.php';
}
?>