<?php
function ao_profileupdate($WOWApp, $input='', $upload=''){
	if(empty($input)){$input = oInput::method('iRequest');}

	$required_fields = ['id', 'activity', 'step'];
	$is_required = oInput::required($input, $required_fields);
	if(!empty($is_required)){
		$resp['status'] = 'F9';
		$resp['reason'] = array('summary' => 'required input', 'details' => $is_required);
		return $resp;
	}

	$input = oInput::sanitize($input);


	if(!empty($upload)){
		if($upload == 'dp'){
			if(empty($_FILES['dp'])){
				$resp['status'] = 'F9';
				$resp['reason'] = array('summary' => 'no file', 'details' => 'no file sent for upload');
				return $resp;
			}

			$conFigUpload = array('fileName' => oRandom::Create('iFile').oRandom::Create('iFile').'.jpg', 'filesAllowed' => array('jpg', 'jpeg', 'png', 'gif'), 'fileDir' => oCLOUD);
			$ofileupload = oFile::upload($_FILES['dp'], $conFigUpload);

			$uploadedFilePath = $conFigUpload['fileDir'].$ofileupload['fileName'];
			#compress
			oFile::compress_image($uploadedFilePath, $conFigUpload['fileDir'].'md-'.$ofileupload['fileName'], 70);
			oFile::compress_image($uploadedFilePath, $conFigUpload['fileDir'].'sm-'.$ofileupload['fileName'], 40);

			if(!empty($ofileupload['fileName'])){
				$input['dp'] = $ofileupload['fileName'];
			}
			else {
				$resp['status'] = 'F9';
				$resp['reason'] = array('summary' => 'DP upload error occurred', 'details' => $ofileupload);
				return $resp;
			}
			if(isset($input['oupload'])){unset($input['oupload']);}
		}
	}


	#prepare data for new DB
	if(!empty($input['email'])){$input['email'] = strtolower($input['email']);}
	if(!empty($input['username'])){$input['username'] = strtolower($input['username']);}
	if(!empty($input['firstname'])){$input['firstname'] = ucwords($input['firstname']);}
	if(!empty($input['lastname'])){$input['lastname'] = ucwords($input['lastname']);}
	if(!empty($input['gender'])){$input['gender'] = ucfirst($input['gender']);}
	if(!empty($input['marital'])){$input['marital'] = ucwords($input['marital']);}
	if(!empty($input['dob'])){$input['dob'] = oTime::date('iSQL', $input['dob']);}
	if(!empty($input['location'])){$input['location'] = ucwords($input['location']);}
	if(!empty($input['interest'])){$input['interest'] = ucwords($input['interest']);}
	if(!empty($input['id'])){$filta['suid'] = $input['id']; unset($input['id']);}

	#@TODO: make sure user BIND exist

	#send data to new DB
	$update_new = $WOWApp->update_new($input, $filta);
	if(isset($update_new['error'])){
		#when error occurs in db operation
		$resp['status'] = 'F9';
		$resp['reason'] = array('summary' => 'error occurred', 'details' => $update_new);
		return $resp;
	}

	elseif(isset($update_new['bind'])){
		$resp['status'] = 'OK';
		$resp['response'] = $update_new;

		#prepare data for current DB
		if(!empty($input['firstname'])){$input['first_name'] = $input['firstname']; unset($input['firstname']);}
		if(!empty($input['lastname'])){$input['last_name'] = $input['lastname']; unset($input['lastname']);}
		if(!empty($input['location'])){$input['address'] = $input['location']; unset($input['location']);}
		if(!empty($input['bio'])){$input['about'] = $input['bio']; unset($input['bio']);}
		if(!empty($input['dob'])){$input['birthday'] = $input['dob']; unset($input['dob']);}
		if(!empty($input['phone'])){$input['phone_number'] = $input['phone']; unset($input['phone']);}



		if(!empty($input['interest'])){unset($input['interest']);}
		if(!empty($input['okey'])){unset($input['okey']);}
		if(!empty($input['oplatform'])){unset($input['oplatform']);}
		if(!empty($input['step'])){unset($input['step']);}
		if(!empty($input['activity'])){unset($input['activity']);}
		if(!empty($input['marital'])){unset($input['marital']);}
		if(!empty($input['religion'])){unset($input['religion']);}
		if(!empty($input['dp'])){$input['avatar'] = $input['dp']; unset($input['dp']);}


		#send data to current DB
		$update_old = $WOWApp->update_old($input, array('suid' => $update_new['bind']));
		if($update_old === false){
			#failed to copy data to old DB
		}
		return $resp;
	}
	return false;
}