<?php
$response = array();
$response['terminus'] = $routa['model'];
$response['status'] = 'F9';
oFile::Inc(oRoute::path('utilizr').'api.inc');

#API Security Checks [Keys, Platform & Request]
$iskey = utilAPI::isKey();
$isplatform = utilAPI::isPlatform();
$requests = ['ping', 'register', 'profile'];
if($iskey !== true){
	$response = array_merge($response, $iskey);
}

elseif($isplatform !== true){
	$response = array_merge($response, $isplatform);
}
elseif(!in_array($routa['model'], $requests)){
	$response['reason'] = array('summary' => 'Request Unknown', 'details' => 'Your request is unrecognized [request: '.$routa['model'].']');
	// $response['reason'] = array('summary' => 'Forbidden Request', 'details' => 'A forbidden request was made to the API');
}
else {

	#PING
	if($routa['model'] == 'ping'){
		oFile::exist($routa['utilizr']);
		require $routa['utilizr'];
		$resp = uPing($wow, $routa['state']);
	}



	#REGISTER
	if($routa['model'] == 'register'){
		oFile::exist($routa['utilizr']);
		require $routa['utilizr'];
		if(!empty($_REQUEST)){
			$resp = ao_signup($wow);
		}
	}


	#PROFILE
	if($routa['model'] == 'profile'){
		oFile::exist($routa['utilizr']);
		require $routa['utilizr'];

		#UPDATE
		if($routa['action'] == 'update'){
			if(!empty($_REQUEST)){
				#check if its upload
				if(isset($_REQUEST['oupload'])){
					$resp = ao_profileupdate($wow, '', $_REQUEST['oupload']);
				}
				else {
					$resp = ao_profileupdate($wow);
				}
			}
		}
	}



	#PREPARE RESPONSE
	if(isset($resp)){
		if(is_array($resp)){
			$response = array_merge($response, $resp);
		}
	}
}


#OUTPUT RESPONSE
if(!isset($_REQUEST['ojson'])){
	echo oPrint::neat($response);
	return;
} else {
	return oJson::display($response);
}