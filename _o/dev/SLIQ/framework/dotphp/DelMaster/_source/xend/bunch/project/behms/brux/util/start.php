<?php
function startApp(){
	$route = oRoute();
	if($route == 'index'){oRedirect('/behms/sign-in');}
	elseif(!isLoggedIn() && ($route != 'index' && $route != 'sign-in' && $route != 'go')){oRedirect('/behms/sign-in');}
}


function isLoggedIn(){
	if(isset($_SESSION['isLoggedIn'])){return TRUE;}
	return FALSE;
}

function login($userid, $password){
	$sql = "SELECT `ruid`, `type`, `status` FROM `user` WHERE '".$userid."' IN (`username`,`email`,`phone`) AND `password` = '".$password."' LIMIT 1";
	$login = db::runSQL($sql);
	if($login == 'NO_RECORD'){
		return FALSE;
	} elseif($login !== FALSE){
		$_SESSION['isLoggedIn'] = $login['ruid'];
		return $login;
	}
}

function activeUser($record=''){
	if(isset($_SESSION['isLoggedIn'])){
		$filta['ruid'] = $_SESSION['isLoggedIn'];
		$user = db::find('*', 'user', $filta);
		if(isset($user[$record])){return $user[$record];}
	}
}
?>