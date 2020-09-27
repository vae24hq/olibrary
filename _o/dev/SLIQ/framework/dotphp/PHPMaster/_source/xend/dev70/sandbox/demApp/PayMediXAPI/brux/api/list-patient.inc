<?php
#PROCESS
$result = oList::patient();
if($result === 'NO_RECORD'){
	$response['code'] = 'E200F9';
	$response['response'] = array('reason' => 'no record found', 'request' => 'denied');
}
elseif($result === FALSE){
	$response['code'] = 'E520';
	$response['response'] = array('reason' => 'unknown', 'request' => 'denied');
}
else {
	$response['action'] = 'success';
	$response['code'] = 'E200';

	$response['response'] = array();
	if(is_array($result)){
		$response['response'] = array_merge($result, $response['response']);
	}
}
?>