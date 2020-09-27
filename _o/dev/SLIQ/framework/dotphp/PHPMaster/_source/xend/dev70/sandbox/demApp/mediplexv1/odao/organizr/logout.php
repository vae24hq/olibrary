<?php
function oLogout($uri='login'){
	#Todo ~ collect user and record logout information
	session::start();
	session::delete('userbind');
	session::restart();
	if(!empty($uri)){
		oRedirect($uri);
	}
}
?>