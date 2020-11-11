<?php
function ao_signup($WOWApp){
	$input = oInput::method('iRequest');

	$required_fields = ['username', 'email', 'phone', 'password', 'religion'];
	$is_required = oInput::required($input, $required_fields);
	if(!empty($is_required)){
		$resp['status'] = 'F9';
		$resp['reason'] = array('summary' => 'required input', 'details' => $is_required);
		return $resp;
	}

	$input = oInput::sanitize($input);

	#prepare data
	if(!oString::is_empty($input['username'])){$input['username'] = strtolower($input['username']);}
	if(!oString::is_empty($input['email'])){$input['email'] = strtolower($input['email']);}
	if(!oString::is_empty($input['phone'])){}#@TODO:remove + from phone
	if(!oString::is_empty($input['religion'])){$input['religion'] = ucfirst(strtolower($input['religion']));}

	#@TODO: check if data exists on current DB
	#@TODO: check if data exists on new DB

	#prep data for new DB
	$input_new = $input;
	$input_new['activity'] = 'signup';
	$input_new['step'] = 1;
	$input_new['ip'] = oServer::IP();

	#send data to new DB
	$signup_new = $WOWApp->signup_new($input_new);
	if(isset($signup_new['error'])){
		#when error occurs in db operation
		$resp['status'] = 'F9';
		$resp['reason'] = array('summary' => 'error occurred', 'details' => $signup_new);
		return $resp;
	}

	elseif(isset($signup_new['bind'])){
		$resp['status'] = 'OK';
		$resp['response'] = $signup_new;

		#prepare data for current DB
		$input_old = $input;
		$input_old['suid'] = $signup_new['bind'];
		$input_old['language']  = 'english';
		$input_old['joined'] = time();
		$input_old['active'] = 1;
		$input_old['phone_number'] = $input_new['phone'];
		$input_old['type'] = 'user';
		$input_old['registered'] = date('n').'/'. date("Y");
		$input_old['lastseen'] = time();
		$input_old['ip_address'] = oServer::IP();
		$input_old['src'] = 'AO_'.ucfirst($input_new['oplatform']);
		$input_old['email_code'] = md5(rand(1111, 9999).time());

		unset($input_old['euid']);
		unset($input_old['puid']);
		unset($input_old['okey']);
		unset($input_old['phone']);
		unset($input_old['religion']);
		unset($input_old['oplatform']);

		#send data to current DB
		$signup_old = $WOWApp->signup_old($input_old);
		if($signup_old === false){
			#failed to copy data to old DB
		}
		return $resp;
	}
	return false;
}