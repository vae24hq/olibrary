<?php
if(!empty($_POST)){
	$resp = uRegister($wow);
	if(isset($resp['status']) && $resp['status'] == 'F9'){
		$isError = $resp['reason']['details'];
	}
	elseif($resp['status'] == 'OK'){
		$_SESSION['UserInReg'] = $resp['response'];
		oRedirect::oExit('profile/update-2');
	}
}


#Load View ~ @TODO: use template engine
oFile::exist($routa['viewzr']);
require $routa['viewzr'];