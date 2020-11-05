<?php
function PlatformIsValid($i=''){
	$keys = array('webapi', 'ios', 'android');
	if(empty($i) && !empty($_REQUEST['platform'])){$i = $_REQUEST['platform'];}
	if(empty($i)){
		$resp['status'] = 'F9';
		$resp['reason'] = 'Platform is Required';
		return $resp;
	}
	elseif(!in_array($i, $keys)){
		$resp['status'] = 'F9';
		$resp['reason'] = 'Platform Unknown ['.$i.']';
		return $resp;
	}
	return true;
}