<?php

//-------------- Process error ---------------
function isError($code, $source='', $return='oMSG'){
	global $oErrorConfig;
	if(!empty($oErrorConfig) && !empty($oErrorConfig[$source]) && is_array($oErrorConfig[$source])){
		$error = $oErrorConfig[$source];
		if($return == 'oMSG' && array_key_exists($code, $error)){return $error[$code];}
	}
	return '';
}

//-------------- Prepare isError response ---------------
function response($resp='', $source=''){
	$output['oSTATUS'] = ''; $output['oCODE'] = ''; $output['oMSG'] =''; $output['oDATA'] = '';
	if(!empty($resp['oSTATUS'])){$output['oSTATUS'] = $resp['oSTATUS'];}
	if(!empty($resp['oCODE'])){
		$output['oCODE'] = $resp['oCODE'];
		$resp['oMSG'] = isError($output['oCODE'], $source);
	}
	if(!empty($resp['oMSG'])){$output['oMSG'] = $resp['oMSG'];}
	if(!empty($resp['oDATA'])){$output['oDATA'] = $resp['oDATA'];}
	return $output;
}

//-------------- Debugging ---------------



?>
