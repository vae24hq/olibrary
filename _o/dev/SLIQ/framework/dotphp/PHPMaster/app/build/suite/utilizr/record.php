<?php
function uRecordNewCard($return='puid', $method=''){
	$requestAs = 'post';
	if(!empty($method)){
		if($method == 'request' && isset($_REQUEST)){$requestAs = $_REQUEST;}
		elseif($method == 'get' && isset($_GET)){$requestAs = $_GET;}
		elseif($method == 'post' && isset($_POST)){$requestAs = $_POST;}
	}
	if(isset($requestAs['submitBTN'])){unset($requestAs['submitBTN']);}
	#REQUIRED

	if(!empty($requestAs)){
		#check hospital number
		$check = record::isHospitalNo($requestAs['hospitalno']);
		if($check != FALSE){$resp['code'] = 'E400B1';}
		else {
			#check if possible flag
			if(!empty($requestAs['surname'])){$flagCond['surname'] = $requestAs['surname'];}
			if(!empty($requestAs['firstname'])){$flagCond['firstname'] = $requestAs['firstname'];}
			if(!empty($requestAs['othername'])){$flagCond['othername'] = $requestAs['othername'];}
			if(!empty($requestAs['birthdate'])){$flagCond['birthdate'] = $requestAs['birthdate'];}
			if(empty($flagCond)){return $resp['code'] = 'E400B3';}
			$flagcheck = record::isFlag($flagCond, 'puid');
			if($flagcheck != FALSE){$resp['code'] = 'E400B2';}

			#create the record
			Utility::sessionStart();
			$requestAs['author'] = $_SESSION['user_puid'];
			$newpatient = record::createCard($requestAs, 'puid');
			if(!empty($newpatient['puid'])){
				$newpatient['isCreated'] = 'yeap';
				$resp['data'] = $newpatient;
				$resp['code'] = 'E200A1';
			}
		}
	}

	return $resp;
}



function uRecordUpdateCard($return='puid', $method='', $puid){
	#Handle Method
	$requestAs = Utility::setMethod($method);

	#Remove form button from data
	$requestAs = Utility::removePostBTN($requestAs);

	#If submitted data is empty
	if(empty($requestAs)){
		$resp['code'] = 'E400A1';
	}
	#If submitted data is NOT empty
	else {

		#HospitalNumber Check
		$rowHospNo = record::isCard($puid, 'hospitalno');
		if($requestAs['hospitalno'] != $rowHospNo['hospitalno']){
			$checkHosp = record::isHospitalNo($requestAs['hospitalno']);

			if($checkHosp != false){
				$resp['code'] = 'E400B1';
				return $resp;
			}
		}

		#Required Check
		if(!empty($requestAs['surname'])){$flagCond['surname'] = $requestAs['surname'];}
		if(!empty($requestAs['firstname'])){$flagCond['firstname'] = $requestAs['firstname'];}
		if(!empty($requestAs['othername'])){$flagCond['othername'] = $requestAs['othername'];}
		if(!empty($requestAs['birthdate'])){$flagCond['birthdate'] = $requestAs['birthdate'];}
		if(empty($flagCond)){return $resp['code'] = 'E400A2';}

		#Run FLAG Check
		$flagcheck = record::isFlag($flagCond, 'puid');
		if($flagcheck != false && ($flagcheck['puid'] != $puid)){
			$resp['code'] = 'E400B2';
		}

		#Update Record
		$update = record::updateCard($requestAs, $puid, 'puid');
		if($update == 1){
			$card['isUpdated'] = 'yeap';
			$resp['code'] = 'E200A1';
		}
		elseif ($update > 1) {
			#TODO Log there is an impossible case problem
			$resp['code'] = 'E600Z1';
		}
		#Update was successful but no record was modified
		elseif($update === false || $update == 0){
			$resp['code'] = 'E601A1';
		}
	}

	return $resp;
}




function uRecordNewHistory($puid=''){
	$page = $_POST['page'];
	$date = $_POST['date'];
	$description = $_POST['description'];
	$fee = $_POST['fee'];

	#check if multiple records are entered
	if(is_array($fee)){

	}
	else {
		$data['page'] = $page;
		$data['date'] = $date;
		$data['description'] = $description;
		$data['fee'] = $fee;
		$data['record'] = $puid;
	}

	if(!empty($data['description'])){
		Utility::sessionStart();
		$data['author'] = $_SESSION['user_puid'];
		global $odao;
		$mark = $odao->createSQL($data,'history');
	}

	return $mark;

	#Utility::redirect('add-history?card='.$puid);

	// Utility::dbog($fee);
	// foreach ($fee as $key => $value) {
	// 	$data['date'] = $date[$key];
	// 	$data['description'] = $description[$key];
	// 	$data['fee'] = $fee[$key];
	// 	if(!empty($puid)){$data['patient'] = $puid;}

	// 	if(!empty($data['description'])){
	// 		oSession::start();
	// 		$data['author'] = $_SESSION['user_puid'];
	// 		global $odao;
	// 		$odao->createSQL($data,'patient_history');
	// 	}
	// }
	// oRedirect('patient-card?patient='.$puid);
}
?>