<?php
function uProfileUpdate($wow){
	$input = oInput::method('iRequest');

	$required = ['id', 'activity', 'step'];
	$isrequired = oInput::required($input, $required);
	if(!empty($isrequired)){
		$resp['status'] = 'F9';
		$resp['reason'] = array('summary' => 'required input', 'details' => $isrequired);
		return $resp;
	}

	#sanitize data
	$input = oInput::sanitize($input);

	#@TODO: check that user's id [id] is valid  - user exist

	#process input & return result
	$result = $wow->update($input);
	if(isset($result['bind'])){
		$resp['status'] = 'OK';
		$resp['response'] = $result;
		return $resp;
	}
	else {
		#TODO: fix & remove
		$resp['status'] = 'F9';
		$resp['reason'] = array('summary' => 'error occurred', 'details' => $result);
		return $resp;
	}
	return false;
}