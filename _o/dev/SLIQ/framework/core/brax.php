<?php
/**
 * Brax™ ~ a micro framework for rapid website development © 2018 [Eirvo™]
 * Program -> brax.php - 
 * =============================================================================
 */

class brax {
	private static $instance;

	//-------------- Prevent multiple instances ---------------
	private function __construct(){return;}

	//-------------- Returns a single instance ---------------
	public static function instantiate(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}


	/*======================================
	=            Utility Method            =
	======================================*/

	public static function app($value){
		global $oData;
		$result = false;
		if(array_key_exists($value, $oData)){$result = $oData[$value];}
		return $result;
	}

	public static function lang($lang=''){
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


	public static function route($index='no'){
		if($index == 'no'){
			$route = 'index';
			if(isset($_GET['page']) && !empty($_GET['page'])){$route = strtolower($_GET['page']);}
		} else {
			$route = $_SERVER['PHP_SELF'];
			$route = str_replace('/', '', $route);
			$route = str_replace('.php', '', $route);
		}
		return $route;
	}

	public static function load($file='', $type='layout'){
		$path = '';
		if($file == '::route'){$file = self::route('no');}
		if(!empty($file)){
			if(!empty($type)){
				if($type == 'bit' || $type == 'layout' || $type == 'piece' || $type == 'plug'){
					$path .= oPath('APP').'slice/';
				}
				if($type == 'theme'){$path .= oPath('APP').'theme/';}
				if($type == 'view'){$path .= oPath('APP').'view/';}

				if($type == 'view'){
					if(self::lang() != 'en'){$path .= self::lang().'/';}
				}
				elseif($type != 'theme') {$path .= $type.'.';}
			}
			$path .= $file.'.php';
		}

		if(empty($path)){exit(strtoupper($type).'::NameRequired');}
		if(!file_exists($path)){exit(strtoupper($type).'::NotAvailable {'.$path.'}');}

		include($path);
	}



	//-------------- Checks if an array is multi-dimensional ~ Returns boolean ---------------
	public static function isMultiDi($array) {
		return (count($array) != count($array, 1));
	}


	// performs empty check on a variable
	public static function isEmpty($data=''){
		if(!isset($data)){return TRUE;}
		else {
			if(is_array($data)){
				if(empty($data)){return TRUE;}
			} else {
				$data = trim($data);
				$length = strlen($data);
				if($length<1){return TRUE;}
			}
		}
		return FALSE;
	}


	// check for needle in string
	public static function hasString($string='', $needle=''){
		if(self::isEmpty($string) || self::isEmpty($needle)){return FALSE;}
		if(strpos($string, $needle) !== false){return TRUE;}
		return FALSE;
	}



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
			elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on'){$resolve = true;}
		}
		return $resolve;
	}

	public static function imposeSSL($as=''){
		if(!isset($_SESSION['imposeSSL']) || $_SESSION['imposeSSL'] != 'imposed'){
			$protocol = self::hasSSL() ? 'https' : 'http';
			if($protocol != 'https'){
				$url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
				if($as == 'permanent'){header('HTTP/1.1 301 Moved Permanently');}
				$_SESSION['imposeSSL'] = 'imposed';
				header('Location: ' . $url);
				exit();
			}
		}
	}

	/*=====  End of Utility Method  ======*/

}

?>