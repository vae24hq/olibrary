<?php
class Helper {
	private static $instance;
	private static $config;

	//-------------- Prevent multiple instances ---------------
	private function __construct(){return;}

	//-------------- Prevent duplication ---------------
	private function __clone(){return;}

	//-------------- Returns a single instance ---------------
	public static function instantiate($config = 'o_config'){
		if(is_null(self::$instance)){
			self::$instance = new self();
			self::config($config);
		}
		return self::$instance;
	}

	private static function config($config = 'o_config'){
		if($config == 'o_config'){
			global $o_config;
			if(!empty($o_config)){$config = $o_config;}
		}
		
		if(!empty($config)){return $config;}
		return false;
	}



	//-------------- Return boolean on actual empty check ('0' is not empty) ---------------
	public static function isEmpty($input){
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

	//-------------- Display Message in choice format ---------------
	public static function output($msg, $format='export'){
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

	//-------------- Return True (if array is multi-dimensional) or False ---------------
	public static function isMultiDi($array){
		return (count($array) != count($array, 1));
	}

	//-------------- Detect HTTPS & Return True or False ---------------
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

	//-------------- Force URL to run HTTPS ---------------
	public static function imposeSSL($permanent='nope'){
		if(!isset($_SESSION['imposeSSL']) || $_SESSION['imposeSSL'] != 'imposed'){
			$protocol = self::hasSSL() ? 'https' : 'http';
			if($protocol != 'https'){
				$url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
				if($permanent == 'yeah'){header('HTTP/1.1 301 Moved Permanently');}
				$_SESSION['imposeSSL'] = 'imposed';
				header('Location: ' . $url);
				exit;
			}
		}
	}

	//-------------- Set, Prepare & Return language ---------------
	public static function lang($lang=''){
		#prepare language
		if(empty($lang)){
			if(empty($_REQUEST['lang'])){
				if(!isset($_SESSION['lang']) || empty($_SESSION['lang'])){
					$lang = 'en';
				} else {$lang = $_SESSION['lang'];}
			} else {$lang = $_REQUEST['lang'];}
		}

		#pass lang to session
		if(!empty($lang)){$_SESSION['lang'] = $lang;}
		return $lang;
	}

	//-------------- Returns organized random generated value ---------------
	public static function randomize($type ='random'){
		if($type == 'bind'){
			$alphaCAP = range('A', 'Z');
			shuffle($alphaCAP);
			return $alphaCAP[2].$alphaCAP[5].mt_rand(100,999).date('dmYHis').mt_rand(10,9999);
		}
		if($type == 'suid'){
			return mt_rand(100000000, 999999999);
		}
		if($type == 'puid'){
			$alpha = range('a', 'z'); $alphaCAP = range('A', 'Z'); $number = range(0, 9);
			$list = array_merge($alpha, $alphaCAP, $number);
			shuffle($list);
			$randNo = mt_rand(12,36);
			$value = '';
			for ($i=0; $i < $randNo; $i++){
				$value .= $list[$i];
			}
			return $value.mt_rand(10,999);
		}
		if($type == 'password'){
			$alpha = range('a', 'z'); $alphaCAP = range('A', 'Z'); $number = range('0', '9'); $symbol = range('#', '@');
			shuffle($alpha); shuffle($alphaCAP); shuffle($number); shuffle($symbol);
			return $alpha[2].$alphaCAP[4].$alphaCAP[7].$symbol[3].$alpha[9].date('d').$alpha[13].$alphaCAP[20].$number[5].$number[7].$symbol[1];
		}
		if($type == 'random'){return mt_rand();}
	}

	//-------------- Returns document information ---------------
	public static function fileInfo($file='self', $return='name'){
		#prepare & return result
		if($file == 'self'){$file = $_SERVER['PHP_SELF'];}
		$info = pathinfo($file);

		$dirname = $info['dirname'];
		$filename = $info['filename'];
		$extension = '.'.$info['extension'];
		$basename = $filename.$extension;

		if($return =='dirname'){$result = $dirname;}
		if($return =='basename'){$result = $basename;}
		if($return =='filename'){$result = $filename;}
		if($return =='extension'){$result = $extension;}

		return $result;
	}


	/*======================================
		BEGIN CLEANUP/FORMATING METHOD
	======================================*/

	//-------------- Returns domain from URL ---------------
	public static function urlToDomain($url){
		$domain = $url;
		$domain = Character::swap($domain, 'https://', '', 'first');
		$domain = Character::swap($domain, 'http://', '', 'first');

		#remove sub-directory if available
		if(Character::in($domain, '/')){
			$domain = Character::before($domain, '/', 'yeah');
		}

		#remove [known] sub-domain *ToDO [use library]
		$domain = Character::swap($domain, 'www.', '', 'first');
		$domain = Character::swap($domain, 'en.', '', 'first');
		$domain = Character::swap($domain, 'ng.', '', 'first');

		return $domain;
	}

	//-------------- Returns clean string from input ---------------
	public static function clean($input){
		$search = array(
			'@<script[^>]*?>.*?</script>@si',   // Strip out javascript
			'@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
			'@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
			'@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
		);
		$clean = preg_replace($search, '', $input);
		return $clean;
	}




	/*======================================
		BEGIN AUXILIARY METHOD
	======================================*/

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

	//-------------- Returns remote directory ---------------
	public static function baseDir(){
		return strtolower($_SERVER['DOCUMENT_ROOT']);
	}

	//-------------- Returns base URL ---------------
	public static function baseURL(){
		return strtolower($_SERVER['HTTP_HOST']);
	}

	//-------------- Returns base Domain ---------------
	public static function baseDomain(){
		$baseURL = self::baseURL();
		return self::urlToDomain($baseURL);
	}

	//-------------- Returns referrer URL ---------------
	public static function refererURL(){
		if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){return $_SERVER['HTTP_REFERER'];}
		else {return false;}
	}

	//-------------- Run & Load Error Document ---------------
	public static function runErrorDoc(){
		//Process Error Document
		if(!empty($_REQUEST['o_error'])){
			$link = $_REQUEST['o_error'];
			if($link == '404'){include VIEW.'o_e404.php';}
			elseif($link == '403'){include VIEW.'o_e403.php';}
			else {include VIEW.'o_eunknown.php';}
			exit;
		}
	}

}
// END OF CLASS - Helper
?>