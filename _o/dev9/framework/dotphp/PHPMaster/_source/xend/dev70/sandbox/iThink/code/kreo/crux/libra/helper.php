<?php
function oHasSSL($answer='detect'){
	$resolve = false;
	if($answer == 'yeah'){$resolve = true;}
	elseif($answer == 'nope'){$resolve = false;}
	else {//detect from server
		$https = 'off';
		if(isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS'])){$https = $_SERVER['HTTPS'];}
		if($https !== 'off'){$https == 'on';}

		$port = 'default';
		if(isset($_SERVER['SERVER_PORT']) && !empty($_SERVER['SERVER_PORT'])){$port = $_SERVER['SERVER_PORT'];}

		if($https == 'on' || $port == 443){$resolve = true;}
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on'){$resolve = true;}
	}
	return $resolve;
}

function oImposeSSL($as=''){
	if(!isset($_SESSION['imposeSSL']) || $_SESSION['imposeSSL'] != 'imposed'){
		$protocol = oHasSSL() ? 'https' : 'http';
		if($protocol != 'https'){
			$url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
			if($as == 'permanent'){header('HTTP/1.1 301 Moved Permanently');}
			$_SESSION['imposeSSL'] = 'imposed';
			header('Location: ' . $url);
			exit();
		}
	}
}

//Prints message in choice format
function oPrintMsg($msg, $format='export'){
	if($format == 'dump'){var_dump($msg);}
	elseif($format == 'export'){echo '<tt><pre>'.var_export($msg, true).'</pre></tt>';}
	elseif($format == 'echo'){
		if(!is_array(($msg))){echo $msg;}
		else {
			foreach ($msg as $key => $value){
				echo $key.': '.$value."<br>";
			}
		}
	}
	else {print_r($msg);}
	return;
}

//Checks if an array is multi-dimensional ~ Returns boolean
function oIsMultiDi($array) {
	return (count($array) != count($array, 1));
}


//-------------- Return boolean on actual empty check ('0' is not empty) ---------------
function oIsEmpty($input){
	if(!isset($input)){return true;}
	else {
		if(is_array($input)){
			if(empty($input)){return true;}
		} else {
			$input = trim($input);
			$length = strlen($input);
			if($length < 1){return true;}
		}
	}
	return false;
}

//-------------- Set, Prepare & Return language ---------------
function oLang($lang=''){
	#prepare language
	if(empty($lang)){
		if(empty($_GET['lang'])){
			if(!isset($_SESSION['lang']) || empty($_SESSION['lang'])){
				$lang = 'en';
			} else {$lang = $_SESSION['lang'];}
		} else {$lang = $_GET['lang'];}
	}

	#pass lang to session
	if(!empty($lang)){$_SESSION['lang'] = $lang;}
	return $lang;
}
?>