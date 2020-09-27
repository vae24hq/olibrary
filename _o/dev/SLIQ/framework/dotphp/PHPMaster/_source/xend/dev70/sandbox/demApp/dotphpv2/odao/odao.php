<?php
class odao {
	private static $instance;
	private static $status;

	public static $config;

	//-------------- Prevent multiple instances ---------------
	private function __construct(){return;}

	//-------------- Prevent duplication ---------------
	private function __clone(){return;}

	//-------------- Returns a single instance ---------------
	public static function instantiate($config=''){
		if(is_null(self::$instance)){
			self::$instance = new self();
			self::setting($config);
		}
		return self::$instance;
	}

	//-------------- SETTING ---------------
	public static function setting($config=''){
		if(empty($config)){
			global $AppConfig;
			if(isset($AppConfig)){$config = $AppConfig;}
		}
		if(isset($config) && !empty($config) && is_array($config)){
			self::$config = $config;
		}
		else {
			die ('Configuration required');
		}
	}

	//-------------- Return specific information ---------------
	public static function info($output=''){
		$config = self::$config;
		if(!empty($output) && array_key_exists($output, $config)){
			return $config[$output];
		}
		else {
			return $config;
		}
	}

	//-------------- Run Application ---------------
	public static function runApp($link='', $route=''){
		if(helper::oempty($link)){$link = helper::link();}
		if(helper::oempty($route)){$route = helper::route();}
		if($route!='site'){
			$organizrFile = ofile::load($link, 'organizr');
			if($organizrFile == 'FILE404'){
				ofile::load('organizr', 'organizr', 'strict');
				if(!class_exists('organizr')){
					#Todo ~ error handling for organizer class
					die('CLASS: [organizr] is not available');
				} else {
					$organizr = organizr::instantiate();
					if(method_exists($organizr, $link)){$run = $organizr->$link($route);}
					else {
					#Todo ~ error handling for organizer's method
					die('METHOD: ['.$link.'] is not available on class-ORGANIZR');
					}
				}
			}
		}
		else {
			ofile::load($link, 'viewzr');
		}
		return;
	}
}
?>