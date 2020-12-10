<?php
$pw = array();

//========== CHANGE PASSWORD [active user] ==========//
if($zernLink == 'change-password'){
	require oUTIL.'auth.php';
	if(empty($_POST)){$pw['oCODE'] = 'E100A1';}
	else {
		$filter = array('password', 'newpassword', 'confirmpassword');
		$input = oInput::prep('oPOST', $filter);
		if(empty($input)){$pw['oCODE'] = 'E400A1';}
		elseif(empty($input['password'])){$pw['oCODE'] = 'E400A2';}
		elseif(empty($input['newpassword'])){$pw['oCODE'] = 'E400A3';}
		elseif(empty($input['confirmpassword'])){$pw['oCODE'] = 'E400A4';}
		elseif($input['newpassword'] != $input['confirmpassword']){$pw['oCODE'] = 'E400A5';}
		else {
			$pw = $zernAuth->updatePassword($_SESSION['oUSER'], $input['password'], $input['newpassword']);
		}
	}

	/*process error code responses module is not empty*/
	if(!empty($pw)){$pw = response($pw, $zernLink);}
}
//========== CHANGE PASSWORD ~end ==========//


/*Include UI*/
include oDESIGN.'main.php';
?>