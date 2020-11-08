<?php
function uProfileUpdate($wow, $input=''){
	if(empty($input)){$input = oInput::method('iRequest');}
	if(isset($input['oupload'])){unset($input['oupload']);}

	$required = ['id', 'activity', 'step'];
	$isrequired = oInput::required($input, $required);
	if(!empty($isrequired)){
		$resp['status'] = 'F9';
		$resp['reason'] = array('summary' => 'required input', 'details' => $isrequired);
		return $resp;
	}

	#sanitize data
	$input = oInput::sanitize($input);

	#Clean Date Of Birth
	if(!empty($input['dob'])){$input['dob'] = oTime::date('iSQL', $input['dob']);}

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




function uProfileUpdateDP($wow){
	$input = oInput::method('iRequest');
	$required = ['id', 'activity', 'step'];
	$isrequired = oInput::required($input, $required);
	if(!empty($isrequired)){
		$resp['status'] = 'F9';
		$resp['reason'] = array('summary' => 'required input', 'details' => $isrequired);
		return $resp;
	}

	if(empty($_FILES['dp'])){
		$resp['status'] = 'F9';
		$resp['reason'] = array('summary' => 'no file', 'details' => 'no file sent for upload');
		return $resp;
	}

	$conFigUpload = array('fileName' => oRandom::Create('iFile').oRandom::Create('iFile'), 'filesAllowed' => array('jpg', 'jpeg', 'png', 'gif'), 'fileDir' => oCLOUD);
	$ofileupload = oFile::upload($_FILES['dp'], $conFigUpload);
	if(!empty($ofileupload['fileName'])){
		$input['dp'] = $ofileupload['fileName'];
		$resp = uProfileUpdate($wow, $input);
	}
	else {
		$resp['status'] = 'F9';
		$resp['reason'] = array('summary' => 'dp upload error occurred', 'details' => $ofileupload);
	}
	return $resp;
}