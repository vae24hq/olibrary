<?php
class kreo {
	private static $instance;
	public static $environ;
	public static $stack;

	public static $firm;
	public static $abbr;
	public static $brand;
	public static $acronym;
	public static $slogan;

	public static $path;
	public static $url;
	public static $domain;
	public static $email;

	public static $phone;

	//-------------- Prevent multiple instances ---------------
	private function __construct(){return;}

	//-------------- Returns a single instance ---------------
	public static function instantiate(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}

	//-------------- Prepare settings ---------------
	public static	function setting($stack=''){
		if(!empty($stack) && is_array($stack)){

			/**PARSE SELECTED VALUES AS CLASS VARIABLE**/
			$list = array('firm','abbr', 'brand', 'acronym', 'slogan', 'path', 'url', 'domain', 'email', 'phone', 'environ');
			foreach ($stack as $label => $value){
				if(in_array($label, $list) && !empty($value)){
					self::$$label = $value;
					self::$stack[$label] = self::$$label;
				}
			}

			/**AUTO INPUT VALUE FOR SELECTED (empty) SETTINGS**/
			if(empty($stack['url'])){
				self::$url = baseURL();
				self::$stack['url'] = self::$url;
			}
			if(empty($stack['domain'])){
				self::$domain = url2domain(self::$url);
				self::$stack['domain'] = self::$domain;
			}
			if(empty($stack['email'])){
				self::$email = 'info@'.self::$domain;
				self::$stack['email'] = self::$email;
			}
			return;
		}
		return false;
	}

	//-------------- Prepare stack variables ---------------
	public static function stack($value=''){
		$result = false;
		if(array_key_exists($value, self::$stack)){$result = self::$stack[$value];}
		return $result;
	}


	//-------------- Returns site full URL ---------------
	public static function site(){
		$site = self::$url;
		if(!empty(self::$path)){$site .= self::$path;}
		return $site;
	}


	//-------------- Prepare route ---------------
	public static function route($location=''){
		if($location == ''){
			$route = 'index';
			if(isset($_GET['page']) && !empty($_GET['page'])){$route = strtolower($_GET['page']);}
		}
		elseif($location == 'oSelf'){
			$route = $_SERVER['PHP_SELF'];
			$route = string::swap($route, '/', '', 'first');
			$route = str_replace('.php', '', $route);
		}
		else {
			$route = $location;
		}
		return $route;
	}

	//-------------- Prepare object ---------------
	public static function object($location=''){
		$route = self::route($location);
		$object = string::before($route, '/');
		if(!$object){$object = $route;}
		return $object;
	}

	//-------------- Prepare action ---------------
	public static function action($location=''){
		$route = self::route($location);
		$object = self::object($location);

		$action = string::swap($route, $object, '');
		$action = string::swap($action, '/', '', 'first');
		$action = string::swap($action, '/', '-');
		if($string = string::before($action, '!')){$action = $string;}
		if(empty($action)){$action = 'default';}
		return $action;
	}

	//-------------- Prepare status ---------------
	public static function status($location=''){
		$route = self::route($location);
		$status = string::after($route, '!');
		if(!$status || empty($status)){$status = 'default';}
		return $status;
	}

	//-------------- Prepare route ---------------
	public static function load($route='::route', $type='view'){
		$path = '';
		if($route == '::route'){$route = self::object();}

		if(!empty($route)){
			if($type == 'view'){
				$path .= VIEW;
				if(oLang() != 'en'){$path .= oLang().DS;}
			}
			elseif($type == 'theme'){$path .= THEME;}
			elseif($type == 'bit'){$path .= BIT;}
			elseif($type == 'slice'){$path .= SLICE;}
			$path .= $route.'.php';
		}

		if(self::$environ != 'prod'){
			if(empty($path)){exit(strtoupper($type).'::NameRequired');}
			if(!file_exists($path)){exit(strtoupper($type).'::NotAvailable {'.$path.'}');}
		}
		include($path);
	}
}
?>