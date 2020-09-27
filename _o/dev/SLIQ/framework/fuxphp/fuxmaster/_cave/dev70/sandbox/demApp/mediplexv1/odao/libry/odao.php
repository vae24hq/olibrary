<?php
class odao {
	private static $instance;
	private static $status;

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

	public static function info($output=''){
		global $AppConfig;

		if(is_array($AppConfig)){$data = $AppConfig;}
		if(!empty($output) && array_key_exists($output, $data)){
			return $data[$output];
		}
	}
}
?>