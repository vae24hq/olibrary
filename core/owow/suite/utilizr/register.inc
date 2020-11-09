<?php
function uRegister($wow){
	#get input data
	$input = oInput::method('iRequest');



	#@TODO: check for required input
	$required = ['username', 'email', 'phone', 'password', 'religion'];
	$isrequired = oInput::required($input, $required);
	if(!empty($isrequired)){
		$resp['status'] = 'F9';
		$resp['reason'] = array('summary' => 'required input', 'details' => $isrequired);
		return $resp;
	}



	#sanitize data
	$input = oInput::sanitize($input);

		#@TODO: prepare input
	// if(isset($input['surname'])){$input['lastname'] = $input['surname']; unset($input['surname']);}

	// if(isset($input['name'])){
	// 	#split using [,]
	// 	if(oString::in($input['name'],',')){
	// 		$input['firstname'] = oString::before($input['name'], ',');
	// 		$input['lastname'] = oString::after($input['name'], ',');
	// 	}
	// unset($input['name']);
	// }



	#process input & return result
	$signupInput = $input;
	if(isset($signupInput['okey'])){unset($signupInput['okey']);}
	if(isset($signupInput['oplatform'])){unset($signupInput['oplatform']);}

	$result = $wow->signup($signupInput);
	if(isset($result['bind'])){
		$resp['status'] = 'OK';
		$resp['response'] = $result;

		$signupInput['suid'] = $result['bind'];
		#REGISTER ON OLD WOWCATHOLIC
		$signupOnOld = $wow->signupOnOld($signupInput);
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