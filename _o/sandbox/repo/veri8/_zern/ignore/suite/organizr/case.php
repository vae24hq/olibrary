<?php
if($fuxRoute == 'app'){

	//BEGIN - NEW CASE
	if($fuxURI == 'new-case'){
		if(!empty($_GET['card'])){
			$oRecord = cardView($_GET['card']);
			if(!empty($_POST) && !empty($oRecord['data'])){
				$oCard = $oRecord['data'];
				$filter = array(
				'card', 'author', 'note', 'type', 'location', 'next');
				$input = oInput::prep('post', $filter);
				if(empty($input['card'])){$input['card'] = $oCard['puid'];}

				
				
				$caseDetail = array('puid','card');
				$newCase = Card::newCase($input, $caseDetail);

				if(!empty($newCase['puid'])){
					#create new card bill
					$billInfo['number'] = mt_rand();
					$billInfo['cardno'] = $oCard['cardno'];
					$billInfo['patient'] = $oCard['puid'];
					if(!empty($oCard['phone'])){$billInfo['phone'] = $oCard['phone'];}
					$billInfo['name'] = '';
					if(!empty($oCard['surname'])){$billInfo['name'] .= $oCard['surname'].' ';}
					if(!empty($oCard['firstname'])){$billInfo['name'] .= $oCard['firstname'].' ';}
					if(!empty($oCard['othername'])){$billInfo['name'] .= $oCard['othername'].' ';}
					if($billInfo['name']){$billInfo['name'] = trim($billInfo['name']);}
					$billInfo['item'] = 'Consultation';

					global $fuxCRUD;
					$billCatCond['puid'] = '020l7025545004439191591376829VPY';
					$billCatSelect = array('puid','amount');
					$billingCat = $fuxCRUD->findSQL($billCatSelect, 'category_bill', $billCatCond, 'record');
					if(!empty($billingCat['puid'])){
						$billInfo['category'] = $billingCat['puid'];
						$billInfo['amount'] = $billingCat['amount'];
					}

					$newBill = Bill::new($billInfo);
					$oRecord['data'] = $newBill;
					$oRecord['code'] = 'E200A1';
				}
			}
		}
		else {
			$oRecord['code'] = 'E400A1';
		}
	}//END - NEW CASE






	$oRecord = oHelper::response($oRecord, $fuxURI);
	include oDESIGN . 'main.php';

} //APP
?>