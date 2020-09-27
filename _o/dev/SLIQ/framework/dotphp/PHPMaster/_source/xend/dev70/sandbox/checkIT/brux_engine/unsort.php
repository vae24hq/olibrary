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

?>


<?php
if(!isset($_SESSION)){session_start();}

//Error reporting settings
function oErrorReport(){
	global $oCIData;
	if(isset($oCIData['environ']) && !empty($oCIData['environ'])){
		$environ = $oCIData['environ'];
		if($environ == 'prod'){error_reporting(0);}
		elseif($environ == 'dbug'){error_reporting(E_ALL & ~E_DEPRECATED);}
		else {error_reporting(E_ALL | E_STRICT);}
	} else {error_reporting(E_ALL);}
	return;
}

//ImposeSSL settings
function oSSL(){
	global $oCIData;
	if(isset($oCIData['imposeSSL']) && !empty($oCIData['imposeSSL'])){
		$imposeSSL = $oCIData['imposeSSL'];
		if($imposeSSL == 'yeah'){
			oImposeSSL();
		}
	}
	return;
}

	//-------------- Handles URL redirect ---------------
	public static function redirect($location='', $delay='none', $report = 'on'){
		if(!empty($location)){
			$duration = $delay; if($delay=='none'){$duration = 0;}
			if(!headers_sent($filename, $linenum)){
				if($duration !=0){header("Refresh:".$duration.";URL=".$location);}
				else{header('Location: '.$location); exit;}
			} else {
				$operation = '<meta http-equiv="refresh" content="'.$duration.'; url='.$location.'">';
				$content ='<p class="redirect">You are now being redirected. <br>Please wait or <a href="'.$location.'">click here</a>.</p>';
				echo $operation; echo "\n"; if($report=='on'){echo $content;}
				if($duration == 0 && $report == 'on'){exit;}
			}
		}
		else {
			return false;
		}
	}
?>


<?php
//-------------- Set database configuration ---------------
function oDevDB($data='oDBAuto'){
	if($data == 'oDBAuto'){
		global $oCIDB;
		if(oIsEmpty($oCIDB)){
			$data = array();
			$data['host'] = 'localhost';
			$data["database"] = 'devdb';
			$data["user"] = 'root';
			$data["password"] = '';
		}
		elseif(!is_array($oCIDB)){return false;}
		else {
			$data = $oCIDB;
			if(empty($data['host'])){$data['host'] = 'localhost';}
			if(empty($data["database"])){$data["database"] = 'devdb';}
			if(empty($data["user"])){$data["user"] = 'root';}
			if(empty($data["password"])){$data["password"] = '';}
		}
	}
	elseif(empty($data) || !is_array($data)){return false;}
	return $data;
}





	//-------------- Detect HTTPS & Return true or false ---------------
	public static function hasSSL($answer='detect'){
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
			elseif(!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on'){$resolve = true;}
		}
		return $resolve;
	}

	//-------------- Force URL to run HTTPS ---------------
	public static function imposeSSL($permanent='nope'){
		if(!isset($_SESSION['imposeSSL']) || $_SESSION['imposeSSL'] != 'imposed'){
			$protocol = self::hasSSL() ? 'https' : 'http';
			if($protocol != 'http'){
				$url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
				if($permanent == 'yeah'){header('HTTP/1.1 301 Moved Permanently');}
				$_SESSION['imposeSSL'] = 'imposed';
				header('Location: ' . $url);
				exit;
			}
		}
	}


		//-------------- Set SSL as default ---------------
	public static function setSSL(){
		$config = self::config();
		if(isset($config['imposeSSL']) && !empty($config['imposeSSL'])){
			$imposeSSL = $config['imposeSSL'];
			if($imposeSSL == 'yeah'){self::imposeSSL();}
		}
		return;
	}

	//-------------- Set Error Reporting ---------------
	public static function setReport(){
		$config = self::config();
		if(isset($config['environ']) && !empty($config['environ'])){
			$environ = $config['environ'];
			if($environ == 'prod'){error_reporting(0);}
			elseif($environ == 'zbug'){error_reporting(E_ALL & ~E_DEPRECATED);}
			else {error_reporting(E_ALL | E_STRICT);}
		} else {error_reporting(E_ALL);}
		return;
	}


	//-------------- Run & Load Error Document ---------------
	public static function docHTTP(){
		#Process error document
		if(!empty($_REQUEST['route']) && Text::in($_REQUEST['route'], 'ohttp-')){
			$route = $_REQUEST['route'];
			if($route == 'ohttp-404'){include VIEW.'http-404.php';}
			elseif($route == 'ohttp-403'){include VIEW.'http-403.php';}
			else {include VIEW.'http-unknown.php';}
			exit;
		}
	}
?>