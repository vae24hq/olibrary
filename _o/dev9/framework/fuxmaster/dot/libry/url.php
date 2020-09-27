<?php
class URL {
	private static $instance;

	//-------------- Prevent multiple instances ---------------
	private function __construct(){return;}

	//-------------- Prevent duplication ---------------
	private function __clone(){return;}

	//-------------- Returns a single instance ---------------
	public static function instantiate(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}





/**
 * ===================================================================
 *  [BEGIN] DEVELOPER
 * ===================================================================
 */

	public static function isIP($host='oGET'){
		if($host=='oGET'){$host = $_SERVER['HTTP_HOST'];}
		if(!empty($host)){
			$parts = parse_url($host);
			if(isset($parts['host'])){
				$isIP = (bool)ip2long($parts['host']);
			} else {
				$isIP = (bool)ip2long($host);
			}
			if($isIP === true){return 'yeap';}
		}
		return 'nope';
	}

	public static function route($route=''){
		if(empty($route)){
			if(URL::isIP() == 'yeap'){$route = 'ipaddress';}
			elseif(isset($_GET['route'])){$route = $_GET['route'];}
		}
		if(empty($route)){$route = 'site';}
		return strtolower($route);
	}

	public static function uri($uri=''){
		if(empty($uri) && isset($_GET['uri'])){$uri = $_GET['uri'];}
		if(empty($uri)){$uri = 'index';}
		$uri = rtrim($uri, '/');
		$uri = str_replace("/", ".", $uri);
		return strtolower($uri);
	}

	//-------------- URL redirect ---------------
	public static function redirect($dest='', $delay=0){
		if(empty($dest)){return false;}

		if(headers_sent($filename, $linenum)){
			$task = '<meta http-equiv="refresh" content="'.$delay.'; url='.$dest.'">';
			echo $task;
		}
		elseif($delay == 0){
			header('Location: '.$dest);
			exit;
		}
		else {
			header("Refresh:".$delay.";URL=".$dest);
		}
	}

//-------------- Clean up a URL & return domain ---------------
	public static function url2domain($url){
		$domain = $url;
		$domain = self::swap($domain, 'https://', '', 'first');
		$domain = self::swap($domain, 'http://', '', 'first');

		#remove sub-directory if available
		if(self::in($domain, '/')){
			$domain = self::before($domain, '/', 'yeah');
		}

		#remove [known] sub-domain *ToDO [use library]
		$domain = self::swap($domain, 'www.', '', 'first');
		$domain = self::swap($domain, 'en.', '', 'first');
		$domain = self::swap($domain, 'ng.', '', 'first');

		return $domain;
	}



} // END HELPER CLASS
?>