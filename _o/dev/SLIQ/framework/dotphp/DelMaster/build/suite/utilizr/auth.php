<?php
oFile::load('logout','utilizr');

function aAuth(){
	#require login
	oSession::start();
	if(empty($_SESSION['user_ruid'])){
		oRedirect('login');
	}
	else {
		#validate active user & return information
		$user = auth::user($_SESSION['user_ruid']);
		if($user === FALSE){
			#Todo ~ log when IMPROBABLE CASE Occurs
			oRedirect('index');
		}
		elseif($user == 'NO_RECORD'){
			#logout, clear session & return to login
			aLogout();
			oRedirect('login');
		}
		return $user;
	}
}

function doAuth(){
	# To prevent repetitive calls but exclude for login view
	$location = oRoute::URILink();
	if($location != 'login'){return aAuth();}
}
?>