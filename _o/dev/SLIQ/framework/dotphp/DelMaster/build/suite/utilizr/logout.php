<?php
function aLogout($uri='login'){
	#Todo ~ collect user and record logout information
	oSession::start();
	oSession::delete('user_ruid');
	oSession::restart();
	if(!empty($uri)){
		oRedirect($uri);
	}
}
?>