<?php
if(!empty($_POST)){
	$_POST['oplatform'] = 'AOWeb';
	$_POST['okey'] = '2020AOWP';
	$resp = ao_signup($wow, $_POST);
	if(isset($resp['status']) && $resp['status'] == 'F9'){
		$isError = $resp['reason']['details'];
	}
	elseif($resp['status'] == 'OK'){
		$_SESSION['UserInReg'] = $resp['response'];
		oRedirect::oExit('https://www.wowcatholic.com/');
		// oRedirect::oExit('profile/update-2');
	}
}


#Load View ~ @TODO: use template engine
oFile::exist($routa['viewzr']);
require $routa['viewzr'];