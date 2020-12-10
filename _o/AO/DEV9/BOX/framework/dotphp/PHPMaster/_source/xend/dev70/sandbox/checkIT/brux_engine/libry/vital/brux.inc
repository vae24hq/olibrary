<?php
/* BRUX™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by ODAO™ OSAWERE [@iamodao - www.osawere.com] using PHP, SQL, HTML, CSS, JS & derived technology.
 * © June 2018 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | class•Brux ~ main class
 */

class Brux {
	private static $instance;

	public static $firm;
	public static $abbr;
	public static $brand;
	public static $acronym;
	public static $slogan;
	public static $url;
	public static $path;
	public static $domain;
	public static $email;
	public static $phone;
	public static $address;

	public static $useDB;
	public static $DBHost;
	public static $DBName;
	public static $DBUser;
	public static $DBPassword;
	public static $DBDriver;

	public static $imposeSSL;
	public static $rewriteURL;
	public static $mode;
	public static $environ;

	public static $site;

	//-------------- Prevent multiple instances ---------------
	private function __construct(){return;}

	//-------------- Prevent duplication ---------------
	private function __clone(){return;}

	//-------------- Returns a single instance ---------------
	public static function instantiate($app='o_app', $db='o_db'){
		if(is_null(self::$instance)){
			self::$instance = new self();
			self::set($app, $db);
		}
		return self::$instance;
	}

	//-------------- Prepare & Set Variables ---------------
	public static function set($app='o_app', $db='o_db'){
		#ToDo ~ validation
		if($app == 'o_app'){global $o_app; $app = $o_app;}
		if($db == 'o_db'){global $o_db; $db = $o_db;}

		/**PARSE SELECTED VALUES AS CLASS VARIABLE**/
		$list = array(
			'firm','abbr', 'brand', 'acronym', 'slogan',
			'url', 'path', 'domain', 'email', 'phone', 'address',
			'useDB', 'imposeSSL', 'rewriteURL', 'mode', 'environ');
		foreach ($app as $label => $value){
			if(in_array($label, $list) && !empty($value)){
				self::${$label} = $value;

				#For database enabled application
				if($label == 'useDB' && $value == 'yeah'){
					$dblist = array('host', 'name', 'user', 'password', 'driver');
					foreach ($db as $dblabel => $dbvalue){
						if(in_array($dblabel, $dblist)){
							self::${'DB'.ucfirst($dblabel)} = $dbvalue;
						}
					}
				}
			}
		}

		/**AUTO INPUT VALUE FOR SELECTED (empty) SETTINGS**/
		if(empty(self::$url)){self::$url = Base::url();}
		if(empty(self::$domain)){self::$domain = url2domain(self::$url);}
		if(empty(self::$email)){self::$email = 'info@'.self::$domain;}

		/**PREPARE SITE FULL URL**/
		$site = '';
		if(self::$imposeSSL == 'yeah'){$site .= 'https://';} else {$site .= 'http://';}
		$site .= self::$url;
		if(!empty(self::$path)){$site .= self::$path;}
		self::$site = $site;
	}


	//-------------- Prepare route ---------------
	public static function route($location=''){
		if($location == ''){
			$route = 'index';
			if(isset($_GET['route']) && !empty($_GET['route'])){
				$route = strtolower($_GET['route']);
			}
		}
		#ToDo (RunCheck ~ against pages such as /sub/page.php)
		elseif($location == 'o_self'){
			$route = $_SERVER['PHP_SELF'];
			$route = Text::swap($route, '/', '', 'o_first');
			$route = str_replace('.php', '', $route);
		}
		else {
			$route = $location;
		}

		#Change possible route URL [object/subject-action!status] to [object_subject-action!status]
		$route = Text::swap($route, '/', '_');

		$result['route'] = $route;


		/**PREPARE STATUS**/
		$status = $route;
		if(Text::in($status,'!')){$status = Text::after($status,'!');}
		if(!$status || empty($status)){$status = 'default';}
		$result['status'] = $status;




		/**PREPARE OBJECT**/
		#Remove status if found
		// if($status != 'default'){$subject = Text::swap($subject, '!'.$status, '');}
		// if(Text::in($subject, '_')){$object = Text::before($route, '_');}

		// if(!$object){$object = $route;}
		// $result['object'] = $object;



		// /**PREPARE SUBJECT**/
		// $subject = $route;

		// #Remove object
		// $subject = Text::swap($route, $object, '');

		// #Remove status if found
		// if($status != 'default'){$subject = Text::swap($subject, '!'.$status, '');}

		// #make sure subject exists
		// if(Text::in($subject, '_')){
		// 	$subject = Text::after($subject, '_');
		// 	#Remove action & others if found
		// 	if(Text::in($subject, '-')){
		// 		$subject = Text::before($subject, '-');
		// 	}
		// }


		// if(Text::in($subject, $object)){$subject = Text::swap($subject, $object, '', 'o_first');}
		// if(Text::in($subject, '_')){$subject = Text::after($subject, '_');}
		// // if(Text::in($subject, '-')){$subject = Text::before($subject, '-');}
		// // if(Text::in($subject, '!')){$subject = Text::before($subject, '!');}
		// $result['subject'] = $subject;

		// /**PREPARE ACTION**/
		// $action = $route;
		// #Remove object
		// $action = Text::swap($route, $object, '');
		// if(Text::in($action, '_')){$action = Text::swap($action, '_', '', 'o_first');}

		// #Remove status if found
		// if($status != 'default'){$action = Text::swap($action, '!'.$status, '');}

		// #Remove subject if found
		// if(Text::notempty($subject) && Text::in($action, $subject)){$action = Text::swap($action, $subject, '');}

		// #if(Text::in($action, '!')){$action = Text::swap($action, '!', '', 'o_first');}
		// // if(Text::in($action, '-')){$action = Text::after($action, '-');}
		// if(Text::isempty($action)){$action = 'default';}
		// $result['action'] = $action;







		return $result;
	}

	//-------------- Prepare subject ---------------
	public static function subject($location=''){
		$object = self::object($location);

		$action = string::swap($action, '/', '', 'first');
		$action = string::swap($action, '/', '-');
		if($string = string::before($action, '!')){$action = $string;}
		if(empty($action)){$action = 'default';}
		return $action;
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
}// END OF CLASS - Brux
?>