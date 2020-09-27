<?php



//-------------- Check if array is multi-dimentional ---------------
function isArrayMulti($data){
	if(is_array($data)){
		$result = array_filter($data,'is_array');
		if(count($result)>0) return true;
	}
	#return (count($array) != count($array, 1)); # ~ confirm what this code does, it maybe a replacement for the above

	return false;
}


//-------------- Check PHP version ---------------
function isPHP($process='version'){
	$result = 'e204';
	if($process=='version'){$result = phpversion();}

	if(isset($result)){return $result;}
}


//-------------- Check Apache version ---------------
function isApache($process='version'){
	$result = 'e204';
	if($process=='version'){$result = apache_get_version();}

	if(isset($result)){return $result;}
}





//-------------- JSON output ---------------
function jsonResp($data){
	if(!empty($data)){
		header('Content-Type: application/json');
		echo json_encode($data);
	}
}

//-------------- Print output ---------------
function printInfo($info, $ifEmpty=''){
	if(!empty($info)){echo $info;}
	else {echo $ifEmpty;}
}


//-------------- Process error ---------------
function isError($code, $source='', $return='oMSG'){
	global $oErrorConfig;
	if(!empty($oErrorConfig) && !empty($oErrorConfig[$source]) && is_array($oErrorConfig[$source])){
		$error = $oErrorConfig[$source];
		if($return == 'oMSG' && array_key_exists($code, $error)){return $error[$code];}
	}
	return '';
}


//-------------- Out message ---------------
function printMsg($data='', $process='export'){
	if($process=='export'){
		echo '<tt><pre>'.var_export($data,TRUE).'</pre></tt>';
		return;
	}
}

//-------------- Prepare isError response ---------------
function response($resp='', $source=''){
	$output['oSTATUS'] = ''; $output['oCODE'] = ''; $output['oMSG'] =''; $output['oDATA'] = '';
	if(!empty($resp['oSTATUS'])){$output['oSTATUS'] = $resp['oSTATUS'];}
	if(!empty($resp['oCODE'])){
		$output['oCODE'] = $resp['oCODE'];
		$resp['oMSG'] = isError($output['oCODE'], $source);
	}
	if(!empty($resp['oMSG'])){$output['oMSG'] = $resp['oMSG'];}
	if(!empty($resp['oDATA'])){$output['oDATA'] = $resp['oDATA'];}
	return $output;
}

//-------------- Debugging ---------------



function lang($lang=''){
	if(empty($lang)){
		if(!empty($_GET['lang'])){$_SESSION['lang'] = $_GET['lang'];}
		if(empty($_SESSION['lang'])){$_SESSION['lang'] = 'en';}
		$lang = $_SESSION['lang'];
	}
	return $lang;
}




function formatNum($num=''){
	if(is_numeric($num)){
		return number_format($num, 2);
	}
	else {
		return $num;
	}
}

function formatSize($size=''){
	if(is_empty($size)){return FALSE;}
	if($size>=1073741824){$format = number_format($size / 1073741824 , 2) . 'GB';}
	elseif($size>=1048576){$format = number_format($size / 1048576 , 2) . 'MB';}
	elseif($size>=1024){$format = number_format($size / 1024 , 2) . 'KB';}
	elseif($size>1){$format = $size . ' bytes';}
	elseif($size==1){$format = $size . ' byte';}
	else {$format = '0';}
 	return $format;
}

function currencyToSymbol($currency=''){
	$currency = strtolower($currency); $symbol = '';
	if($currency == 'dollar'){$symbol = '$';}
	if($currency == 'pound'){$symbol = '£';}
	if($currency == 'euro'){$symbol = '€';}
	if($currency == 'yen'){$symbol = '¥';}
	if($currency == 'rupee'){$symbol = '₹';}
	if($currency == 'naira'){$symbol = '₦';}
	return $symbol;
}

function formatAmount($currency, $amount){
	if(!isEmpty($currency) && !isEmpty($amount)){
		$symbol = currencyToSymbol($currency);
		$amount = formatNum($amount);
		return $symbol.$amount;
	}
}


//-------------- Detect HTTPS & Return true or false ---------------
function hasSSL($answer='detect'){
	$resolve = false;
	if($answer == 'oYEAP'){$resolve = true;}
	elseif($answer == 'oNOPE'){$resolve = false;}
	else {//detect from server
		$https = 'oNOHTTPS';
		if(isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS'])){$https = $_SERVER['HTTPS'];}
		if($https !== 'oNOHTTPS'){$https == 'oHTTPS';}

		$port = 'oDEFAULT';
		if(isset($_SERVER['SERVER_PORT']) && !empty($_SERVER['SERVER_PORT'])){$port = $_SERVER['SERVER_PORT'];}

		if($https == 'oHTTPS' || $port == 443){$resolve = true;}
		elseif(!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'oHTTPS'){$resolve = true;}
	}
	return $resolve;
}

//-------------- Force URL to run HTTPS ---------------
function imposeSSL($permanent='oNOPE'){
	if(empty($_SESSION['imposeSSL'])){
		$protocol = hasSSL() ? 'https' : 'http';
		if($protocol != 'https'){
			$url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			$_SESSION['imposeSSL'] = 'oYEAP';
			if($permanent == 'oYEAP'){header('HTTP/1.1 301 Moved Permanently');}
			oURL::redirect($url);
			exit;
		}
	}
}
?>
