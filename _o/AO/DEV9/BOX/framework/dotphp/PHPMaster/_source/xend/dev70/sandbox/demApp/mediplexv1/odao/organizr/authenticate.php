<?php
require ORGANIZR.'logout.php';

function oAuthenticate(){
	#Get current location
	$uri = fileInfo('o_self', 'filename');

	if($uri == 'index'){oRedirect('dashboard');}
	elseif($uri == 'login'){
		require ORGANIZR.'login.php';
		$oLogin = oLogin();
		return $oLogin;
	}
	else {
		#require login
		session::start();
		if(!isset($_SESSION['userbind']) || empty($_SESSION['userbind'])){oRedirect('login');}
		else {
			#validate active user & return information
			$user = auth::user($_SESSION['userbind']);
			if($user === FALSE){
				#Todo ~ log when IMPROBABLE CASE Occurs
				oRedirect('index');
			}
			elseif($user == 'NO_RECORD'){
				#logout, clear session & return to login
				oLogout();
				oRedirect('login');
			}
			return $user;
		}
	}
}

# To prevent repetitive calls but exclude for login view
$location = fileInfo('o_self', 'filename');
if($location != 'login'){
$oActiveUser = oAuthenticate();
}

function oActiveUser($info=''){
	global $oActiveUser;
	if(is_array($oActiveUser) && isset($oActiveUser[$info])){
		return $oActiveUser[$info];
	}
	else {
		return $oActiveUser;
	}
}
?>