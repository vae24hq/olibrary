<?php
function KeyIsValid($i=''){
	$keys = array('5tMmoDgiJ301edHRj2T5', '40zqD0deYpGQIHumiXsn');
	if(empty($i) && !empty($_REQUEST['okey'])){$i = $_REQUEST['okey'];}
	if(empty($i)){
		$resp['status'] = 'F9';
		$resp['reason'] = 'API Key Required';
		return $resp;
	}
	elseif(!in_array($i, $keys)){
		$resp['status'] = 'F9';
		$resp['reason'] = 'API Key Invalid';
		return $resp;
	}
	return true;
}