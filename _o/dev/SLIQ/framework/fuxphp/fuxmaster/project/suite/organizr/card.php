<?php
// function card(){
// 	global $odao;
// 	// create new card record
// 	if($odao->uri=='record.new-card'){
// 		if(!$_POST){
// 			$mark['code'] = 'E100A1';
// 		}
// 		else {
// 			include oUTIL.'record.php';
// 			$mark = uRecordNewCard('puid','post');
// 			if(!empty($mark['data'])){
// 				$markData = $mark['data'];
// 				if(!empty($markData['isCreated']) && $markData['isCreated'] == 'yeap'){
// 					$histuri = '/record/add-history?card='.$markData['puid'];
// 					Utility::redirect($histuri);
// 				}
// 			}
// 		}
// 		return $mark;
// 	}
// 	// end - create new card record
// }


function cardNew($method='post'){ #post|get|request|dataArray [input]
	$resp = false;
	if(is_array($method)){$input = $method;}
	elseif($method == 'post' || $method == 'get' || $method == 'request'){
		$input = Form::setMethod($method);
		if(empty($input)){$resp['code'] = 'E100A1';}
	}

	if(!empty($input) && is_array($input)){

		$input = Form::cleanData($input);

		#Required
		if(empty($input['surname'])){$resp['code'] = 'E400A3'; return $resp;}
		if(empty($input['firstname'])){$resp['code'] = 'E400A4'; return $resp;}

		#check card number
		if(isset($input['cardno'])){

			if(empty($input['cardno'])){$input['cardno'] = Card::genNum();}

			$check = Card::isCardNo($input['cardno']);
			if($check !== false){$resp['code'] = 'E400B1';}
			else {
				#check if possible flag
				if(!empty($input['surname'])){$flagCond['surname'] = $input['surname'];}
				if(!empty($input['firstname'])){$flagCond['firstname'] = $input['firstname'];}
				if(!empty($input['othername'])){$flagCond['othername'] = $input['othername'];}
				if(!empty($input['dob'])){$flagCond['dob'] = $input['dob'];}
				if(empty($flagCond)){
					$resp['code'] = 'E400A2';
					return $resp;
				}

				$flagcheck = Card::isFlag($flagCond, 'puid');
				if($flagcheck === true){
					$resp['code'] = 'E400B2';
					return $resp;
				}

				#Check duplicate phone number
				if(!empty($input['phone'])){
					$condPhone['phone'] = $input['phone'];
					$checkphone = Card::isRecord($condPhone);
					if($checkphone === true){$resp['code'] = 'E400B3'; return $resp;}
				}

				#Check duplicate email
				if(isset($input['email'])){
					$condEmail['email'] = $input['email'];
					$checkphone = Card::isRecord($condEmail);
					if($checkphone === true){$resp['code'] = 'E400B14'; return $resp;}
				}

				#Author
				if(!empty($_SESSION['user_puid'])){
					$input['author'] = $_SESSION['user_puid'];
				}

				#create the record
				$newCard = Card::create($input, 'puid');

				if(!empty($newCard['puid'])){
					$newCard['isCreated'] = 'yeap';
					$resp['data'] = $newCard;
					$resp['code'] = 'E200A1';
				}
			}
		}
	}

	return $resp;
}

function cardUpdate($puid='', $method='post'){ #post|get|request|dataArray [input]
	$resp = false;
	if(is_array($method)){$input = $method;}
	elseif($method == 'post' || $method == 'get' || $method == 'request'){
		$input = Form::setMethod($method);
		if(empty($input)){$resp['code'] = 'E100A1';}
	}

	if(!empty($input) && is_array($input)){

		$input = Form::cleanData($input);

		#Update the record
		$updateCard = Card::update($input, $puid, 'puid');
		if($updateCard == 'RECORD_UPDATED' || $updateCard == 'NO_CHANGES'){
			$updateCard['isUpdated'] = 'yeap';
			$resp['data'] = $updateCard;
			$resp['code'] = 'E200A1';
		}
	}

	return $resp;
}



function cardList500(){
	$resp['code'] = 'E100S1';
	$cards = Card::record500();
	if($cards !== false){$resp['data'] = $cards;}
	return $resp;
}

function cardListSearch($input=''){
	$resp['code'] = 'E100S1';
	if(!empty($input) && is_array($input)){
		$input = Form::cleanData($input);
	}
	$cards = Card::listSearch($input);
	if($cards !== false){$resp['data'] = $cards;}
	return $resp;
}

function cardView($input=''){
	$resp['code'] = 'E100S1';
	if(!empty($input) && is_array($input)){
		$input = Form::cleanData($input);
	}
	$card = Card::view($input);
	if($card !== false){$resp['data'] = $card;}
	return $resp;
}
?>