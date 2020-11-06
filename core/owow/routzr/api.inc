<?php
$response = array();

#INDEX ~
if($routa['model'] == 'index'){
}



#REGISTER
if($routa['model'] == 'register'){
	oFile::exist($routa['utilizr']);
	require $routa['utilizr'];
	if(!empty($_REQUEST)){ #TODO: change to POST
		$resp = uRegister($wow);
	}
}



#PREPARE RESPONSE
if(isset($resp)){
	if(is_array($resp)){$response = array_merge($response, $resp);}
}



#OUTPUT RESPONSE
if(!isset($_REQUEST['ojson'])){
	echo oPrint::neat($response);
	return;
} else {
	return oJson::display($response);
}