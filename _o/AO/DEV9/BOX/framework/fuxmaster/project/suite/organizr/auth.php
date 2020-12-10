<?php
require oUTIL.'error.php';
if(URL::uri() == 'logout'){
	global $fuxAuth;
	$fuxAuth->logout();
}
elseif(URL::uri() == 'login'){
	$oRecord = array();
	if(empty($_POST)){
		Session::restart();
		$oRecord['code'] = 'E100A1';
	}
	else {
		include oUTIL.'login.php';
		$oRecord = login('post');
		if(!empty($oRecord['data'])){
			URL::redirect('dashboard');
		}
	}

	$oRecord['msg'] = isErrorMsg($oRecord['code']);
	$oRecord = Helper::prepResp($oRecord);
	include oUTLINE.'access.php';
}
?>