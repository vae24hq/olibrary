<?php
if($fuxRoute == 'app'){
	if(empty($_POST)){
		oSession::start();
		$oRecord ['code'] = 'E100A1';
	}
	else {
		$filter = array('password', 'newpassword', 'confirmpassword');
		$input = oInput::prep('post', $filter);

		#Required
		if(empty($input)){$oRecord['code'] = 'E400A1';}
		elseif(empty($input['password'])){$oRecord['code'] = 'E400A2';}
		elseif(empty($input['newpassword'])){$oRecord['code'] = 'E400A3';}
		elseif(empty($input['confirmpassword'])){$oRecord['code'] = 'E400A4';}
		elseif($input['newpassword'] != $input['confirmpassword']){$oRecord['code'] = 'E400A5';}
		else {
			$oRecord = $fuxAuth->passwordUpdate($_SESSION['user'], $input['password'], $input['newpassword']);
		}		
	}

	$oRecord = oHelper::response($oRecord, $fuxURI);
	#oHelper::dbug($oRecord);
	include oDESIGN . 'main.php';
} //APP
?>