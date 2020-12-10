<?php
class dot {
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

	public static function runApp(){
		return addFile('o_auto','link');
	}

}// END OF CLASS - dot
?>