<?php
/**ZERN™ Framework ~ an evolving, robust platform for rapid & efficient development of modem responsive applications and APIs;
 * Built by ODAO™ [www.osawere.com] using PHP, SQL, HTML, CSS, JS & derived technology.
 * © July 2019 | beta 1.0 | Apache License, Version 2.0
 * ===================================================================================================================
 * Dependency » ~
 * PHP | kit::class ~ utility class
 **/

class oKit {




	//========== ERROR HANDLER [prepare & process] ==========//
	public static function isError($code, $source='', $return='oMSG'){
		global $oErrorConfig;
		if(!empty($oErrorConfig) && !empty($oErrorConfig[$source]) && is_array($oErrorConfig[$source])){
			$error = $oErrorConfig[$source];
			if($return == 'oMSG' && array_key_exists($code, $error)){return $error[$code];}
		}
		return '';
	}
	//========== ERROR HANDLER ~end ==========//



	//========== RESPONSE [prepare & return] ==========//
	public static function response($resp='', $source=''){
		$o['oSTATUS'] = ''; $o['oCODE'] = ''; $o['oMSG'] =''; $o['oDATA'] = '';
		if(!empty($resp['oSTATUS'])){$o['oSTATUS'] = $resp['oSTATUS'];}
		if(!empty($resp['oCODE'])){
			$o['oCODE'] = $resp['oCODE'];
			$resp['oMSG'] = self::isError($o['oCODE'], $source);
		}
		if(!empty($resp['oMSG'])){$o['oMSG'] = $resp['oMSG'];}
		if(!empty($resp['oDATA'])){$o['oDATA'] = $resp['oDATA'];}
		return $o;
	}
	//========== RESPONSE ~end ==========//



}














function lang($lang=''){
	if(empty($lang)){
		if(!empty($_GET['lang'])){$_SESSION['lang'] = $_GET['lang'];}
		if(empty($_SESSION['lang'])){$_SESSION['lang'] = 'en';}
		$lang = $_SESSION['lang'];
	}
	return $lang;
}







function currencyToSymbol($currency=''){
	$currency = strtolower($currency); $symbol = '';
	if($currency == 'pound'){$symbol = '£';}
	if($currency == 'euro'){$symbol = '€';}
	if($currency == 'yen'){$symbol = '¥';}
	if($currency == 'rupee'){$symbol = '₹';}
	return $symbol;
}

function formatAmount($amount, $currency='naira', $digit=''){
	if(!isEmpty($currency) && !isEmpty($amount)){
		$symbol = currencyToSymbol($currency);
		$amount = formatNum($amount, $digit);
		return $symbol.$amount;
	}
}



?>
