<?php
if($fuxRoute == 'app'){
	if(empty($_POST)){
		$oRecord ['code'] = 'E100A1';
	}
	else {
		$filter = array(
			'cardno', 'author', 'surname', 'firstname', 'othername', 'occupation', 'phone', 'tribe', 'religion', 'dob', 'sex', 'hmo', 'address', 'email');
		$input = oInput::prep('post', $filter);

		#Required
		if(empty($input)){$oRecord['code'] = 'E400A1';}
		elseif(empty($input['surname']) && empty($input['firstname']) && empty($input['othername']) && ($input['dob'])){$oRecord['code'] = 'E400A2';}
		elseif(empty($input['surname'])){$oRecord['code'] = 'E400A3';}
		elseif(empty($input['firstname'])){$oRecord['code'] = 'E400A4';}
		elseif(empty($input['phone'])){$oRecord['code'] = 'E400A5';}
		else {
			if(empty($input['cardno'])){$input['cardno'] = Card::newNo();}
			if(empty($input['author']) && !empty($_SESSION['user'])){$input['author'] = $_SESSION['user'];}

			
			#check cardno
			$hasCardNo = Card::isNo($input['cardno']);
			if($hasCardNo === true){$oRecord['code'] = 'E400B1';}
			else {
				#check if possible flag
				if(!empty($input['surname'])){$flagCond['surname'] = $input['surname'];}
				if(!empty($input['firstname'])){$flagCond['firstname'] = $input['firstname'];}
				if(!empty($input['othername'])){$flagCond['othername'] = $input['othername'];}
				if(!empty($input['dob'])){$flagCond['dob'] = $input['dob'];}

				$phonecheck = Card::hasRecord('phone', $input['phone']);
				$emailcheck = false;
				if(!empty($input['email'])){$emailcheck = Card::hasRecord('email', $input['email']);}

				$flagcheck = Card::isFlag($flagCond, 'puid');
				if($flagcheck === true){$oRecord['code'] = 'E400B2';}
				elseif($phonecheck === true){$oRecord['code'] = 'E400B3';}
				elseif($emailcheck === true){$oRecord['code'] = 'E400B4';}
				else {
					#create the record
					$cardDetail = array('puid', 'surname', 'firstname', 'othername', 'phone', 'cardno');
					$newCard = Card::create($input, $cardDetail);					
					if(!empty($newCard['puid'])){
						#create new card bill
						$billInfo['number'] = mt_rand();
						$billInfo['cardno'] = $newCard['cardno'];
						$billInfo['patient'] = $newCard['puid'];
						if(!empty($newCard['phone'])){$billInfo['phone'] = $newCard['phone'];}
						$billInfo['name'] = '';
						if(!empty($newCard['surname'])){$billInfo['name'] .= $newCard['surname'].' ';}
						if(!empty($newCard['firstname'])){$billInfo['name'] .= $newCard['firstname'].' ';}
						if(!empty($newCard['othername'])){$billInfo['name'] .= $newCard['othername'].' ';}
						if($billInfo['name']){$billInfo['name'] = trim($billInfo['name']);}
						$billInfo['item'] = 'New Card Registration';

						global $fuxCRUD;
						$billCatCond['puid'] = 'd51H46p891250678391989150099018';
						$billCatSelect = array('puid','amount');
						$billingCat = $fuxCRUD->findSQL($billCatSelect, 'category_bill', $billCatCond, 'record');
						if(!empty($billingCat['puid'])){
							$billInfo['category'] = $billingCat['puid'];
							$billInfo['amount'] = $billingCat['amount'];
						}

						$newBill = Bill::new($billInfo);
						$oRecord['data'] = $newCard;
						$oRecord['code'] = 'E200A1';
					}
				}
			}
		}
	}

	$oRecord = oHelper::response($oRecord, $fuxURI);
	include oDESIGN . 'main.php';
} //APP
?>