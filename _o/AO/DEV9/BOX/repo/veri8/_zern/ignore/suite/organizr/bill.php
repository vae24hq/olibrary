<?php
if($fuxRoute == 'app'){

	//BEGIN - BILL (list of bills for a particular patient)
	if($fuxURI == 'bill'){
		if(!empty($_GET['card'])){
			$input = oInput::clean($_GET['card']);
			$oRecord['data'] = Bill::viewList($input);
			$oPatient = cardView($_GET['card']);
			if(empty($oRecord['data']) || $oRecord == 'NO_RECORD'){$oRecord['code'] = 'E400A2';}
		}
	}//END - BILL


	//BEGIN - PAYMENT for bill
	if($fuxURI == 'bill-payment'){
		if(!empty($_GET['card'])){
			$input = oInput::clean($_GET['card']);
			$oRecord['data'] = Bill::view($input);
			if(!empty($_POST)){
				#Update invoice as paid
				global $fuxCRUD;
				$inv['status'] = 'paid';
				$inv['balance'] = 'NIL';
				$condInv['puid'] = $input;
				if($fuxCRUD->updateSQL($inv, 'invoice', $condInv, 1)){
					$oRecord['code'] = 'E200A1';
				}
			}
		}
	}//END - PAYMENT


	$oRecord = oHelper::response($oRecord, $fuxURI);
	include oDESIGN . 'main.php';

} //APP
?>