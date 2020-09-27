<?php
if($fuxRoute == 'app'){
	if(empty($_POST)){
		oSession::restart();
		$oRecord ['code'] = 'E100A1';
	}
	else {
		$filter = array('userid', 'password');
		$input = oInput::prep('post', $filter);

		#Required
		if(empty($input)){$oRecord['code'] = 'E400A1';}
		elseif(empty($input['userid'])){$oRecord['code'] = 'E400A2';}
		elseif(empty($input['password'])){$oRecord['code'] = 'E400A3';}
		else {
			$oRecord = $fuxAuth->login($input['userid'], $input['password']);
			if($oRecord['code'] != 'E200A1'){oSession::restart();}
			else {
				oURL::redirect('./dashboard');
			}
		}
	}

	$oRecord = oHelper::response($oRecord, 'login');
	include oDESIGN . 'login.php';
} //APP
?>