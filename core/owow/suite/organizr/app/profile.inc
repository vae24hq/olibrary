<?php
#UPDATE
if($routa['action'] == 'update'){
	if(!empty($_POST)){
				#check if its upload
		if(isset($_POST['oupload'])){
			$resp = uProfileUpdateDP($wow);
		}
		else {
			$resp = uProfileUpdate($wow);
		}


		if(isset($resp['status']) && $resp['status'] == 'F9'){
			$isError = $resp['reason']['details'];
		}
		elseif($resp['status'] == 'OK'){
			if($routa['state'] == 2){oRedirect::oExit('profile/update-3');}
			elseif($routa['state'] == 3){oRedirect::oExit('profile/update-4');}
		else {oRedirect::oExit('https://www.wowcatholic.com/');}
	}
}
}


#Load View ~ @TODO: use template engine
oFile::exist($routa['viewzr']);
require $routa['viewzr'];