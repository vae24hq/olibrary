<?php
class Tiny {
	private static $instance;
	private static $stack;

	public static $environ;
	public static $imposeSSL;

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

	public static $dbase;

	//-------------- Prevent multiple instances ---------------
	private function __construct(){return;}

	//-------------- Prevent duplication ---------------
	private function __clone(){return;}

	//-------------- Returns a single instance ---------------
	public static function instantiate($stack=''){
		if(is_null(self::$instance)){
			self::$instance = new self();
			self::setStack($stack);
		}
		return self::$instance;
	}



	//-------------- Prepare & Set Variables ---------------
	public static function setStack($stack='o_config'){

		if(empty($stack)){die('CALL:: $VAR required on TINY - TE01|01|01');}
		if($stack != 'o_config' && !is_array($stack)){die('CALL:: $VAR invalid [array or default] on TINY - TE01|01|02');}
		if($stack == 'o_config'){
			global $o_config;
			if(!isset($o_config) || empty($o_config)){die('CONFIG:: global $VAR required - TE01|02|01');}
			if(!is_array($o_config)){die('CONFIG:: global $VAR invalid [array]- TE01|02|02');}
			$stack = $o_config;
		}
		self::$stack = $stack;

		/**PARSE SELECTED VALUES AS CLASS VARIABLE**/
		$list = array('firm','abbr', 'brand', 'acronym', 'slogan', 'path', 'url', 'domain', 'email', 'phone', 'environ','imposeSSL');
		foreach ($stack as $label => $value){
			if(in_array($label, $list) && !empty($value)){
				self::$$label = $value;
				self::$stack[$label] = self::$$label;
			}
		}

		/**AUTO INPUT VALUE FOR SELECTED (empty) SETTINGS**/
		if(empty(self::$url)){
			self::$url = Helper::baseURL();
			self::$stack['url'] = self::$url;
		}
		if(empty(self::$domain)){
			self::$domain = Helper::urlToDomain(self::$url);
			self::$stack['domain'] = self::$domain;
		}
		if(empty(self::$email)){
			self::$email = 'info@'.self::$domain;
			self::$stack['email'] = self::$email;
		}

		return;
	}

	//-------------- Return start variable ---------------
	public static function stack($value=''){
		$result = false;
		if(array_key_exists($value, self::$stack)){$result = self::$stack[$value];}
		return $result;
	}

	//-------------- Prepare & Return Database Config ---------------
	public static function dbase($dataset='o_auto'){
		$dbase = array();
		if($dataset == 'o_auto'){
			$dataset = self::stack('dbase');
		}
		#ToDO - Validation

		if(empty($dataset['host'])){$dataset['host'] = 'localhost';}
		if(empty($dataset['database'])){$dataset['database'] = 'tinyapp';}
		if(empty($dataset['user'])){$dataset['user'] = 'root';}
		if(empty($dataset['password'])){$dataset['password'] = '';}

		return $dataset;
	}

	//-------------- Return site complete URL ---------------
	public static function site(){
		$site = '';
		if(!empty(self::$imposeSSL) && self::$imposeSSL == 'yeah'){$site .= 'https://';}
		else {$site .= 'http://';}
		$site .= self::$url;
		if(!empty(self::$path)){$site .= self::$path;}
		return $site;
	}

	//-------------- Return Path to Asset ---------------
	public static function path($to='', $dir='o_asset'){
		$path = '/';

		if(!empty(self::$path)){$path .= self::$path;}

		if($dir=='o_asset'){$path .= SOURCE.PS;}
		if($dir=='o_build'){$path .= SOURCE.DS;}

		if($to=='CSS'){$path .= 'css'.PS;}
		if($to=='IMG'){$path .= 'image'.PS;}
		if($to=='JS'){$path .= 'js'.PS;}
		if($to=='MEDIA'){$path .= 'media'.PS;}

		$path = Character::swap($path,'//','/');
		return $path;
	}

	//-------------- Prepare & Return route ---------------
	public static function route($location=''){
		if($location == ''){
			$route = 'index';
			if(isset($_REQUEST['page']) && !empty($_REQUEST['page'])){
				$route = strtolower($_REQUEST['page']);
			}
		}
		elseif($location == 'o_self'){
			$route = $_SERVER['PHP_SELF'];
			$route = Character::swap($route, '/', '', 'first');
			$route = str_replace('.php', '', $route);
		}
		else {
			$route = $location;
		}
		return $route;
	}

	//-------------- Prepare & Return object ---------------
	public static function object($location=''){
		$route = self::route($location);
		$object = Character::before($route, '/');
		if(!$object){$object = $route;}
		return $object;
	}

	//-------------- Prepare & Return action ---------------
	public static function action($location=''){
		$route = self::route($location);
		$object = self::object($location);

		$action = Character::swap($route, $object, '');
		$action = Character::swap($action, '/', '', 'first');
		$action = Character::swap($action, '/', '-');
		if($string = Character::before($action, '!')){$action = $string;}
		if(empty($action)){$action = 'default';}
		return $action;
	}

	//-------------- Prepare & Return status ---------------
	public static function status($location=''){
		$route = self::route($location);
		$status = Character::after($route, '!');
		if(!$status || empty($status)){$status = 'default';}
		return $status;
	}

	//-------------- Prepare Content ---------------
	public static function content($route='o_route', $type='o_view'){
		$file = '';
		if($route == 'o_route'){$route = self::object();}

		if(!empty($route)){
			if($type == 'o_view'){
				$file .= VIEW;
				if(Helper::lang() != 'en'){$file .= Helper::lang().DS;}
			}
			elseif($type == 'o_snippet'){$file .= SNIPPET;}
			elseif($type == 'o_theme'){$file .= THEME;}

			elseif($type == 'o_modelizr'){$file .= MODELIZR;}
			elseif($type == 'o_organizr'){$file .= ORGANIZR;}
			elseif($type == 'o_utilizr'){$file .= UTILIZR;}

			$file .= $route.'.php';
		}
		$content['file'] = $file;
		$content['type'] = $type;
		return $content;
	}

	//-------------- Load Content ---------------
	public static function load($file='o_route', $type='o_view'){
		#ToDO validation

		$content = self::content($file, $type);
		if(!file_exists($content['file'])){
			exit(strtoupper($content['type']).':: Not Available {'.$content['file'].'} - TE01|03|04');
		}
		include $content['file'];
	}
}
// END OF CLASS - Tiny
?>