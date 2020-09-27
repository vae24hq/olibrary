<?php
function cardView($puid=''){
	$resp['code'] = 'E100V1';
	if(!empty($puid) && !is_array($puid)){
		$puid = oInput::clean($puid);
		$cards = Card::view($puid);
		if($cards !== false){
			$resp['code'] = 'E100R1';
			$resp['data'] = $cards;
		}
		return $resp;
	}
}

function cardUpdate($puid='', $method='post'){ #post|get|request|dataArray [input]
	$resp = false;

	$filter = array(
			'cardno', 'author', 'surname', 'firstname', 'othername', 'occupation', 'phone', 'tribe', 'religion', 'dob', 'sex', 'hmo', 'address', 'email');
		$input = oInput::prep('post', $filter);

		#Required
		if(empty($input)){$resp['code'] = 'E400A1';}
		elseif(empty($input['surname']) && empty($input['firstname']) && empty($input['othername']) && ($input['dob'])){$resp['code'] = 'E400A2';}
		elseif(empty($input['surname'])){$resp['code'] = 'E400A3';}
		elseif(empty($input['firstname'])){$resp['code'] = 'E400A4';}
		elseif(empty($input['phone'])){$resp['code'] = 'E400A5';}
		#elseif(empty($input['cardno'])){$resp['code'] = 'E400A6';}
		else {
			#Update the record
			$updateCard = Card::update($input, $puid, 'puid');
			if($updateCard == 'RECORD_UPDATED' || $updateCard == 'NO_CHANGES'){
				$resp['data'] = $updateCard;
				$resp['code'] = 'E200A1';
			}
		}

	return $resp;
}

function cardListSearch($keyword=''){
	$resp['code'] = 'E100S1';
	if(!empty($keyword) && !is_array($keyword)){
		$keyword = oInput::clean($keyword);
		$cards = Card::listSearch($keyword);
		if($cards !== false){
			$resp['code'] = 'E100R1';
			$resp['data'] = $cards;
		}
		return $resp;
	}
}

function cardList($limit=500){
	$resp['code'] = 'E100S1';
	$cards = Card::record($limit);
	if($cards !== false){
		$resp['code'] = 'E100R1';
		$resp['data'] = $cards;
	}
	return $resp;
}
?>