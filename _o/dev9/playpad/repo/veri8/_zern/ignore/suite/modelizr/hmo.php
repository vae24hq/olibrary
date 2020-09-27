<?php
class HMO {
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


	//========== HMO METHOD ==========//
	public static function all($column='`puid`, `name`, `brand`'){
		global $fuxCRUD;
		$record = $fuxCRUD->recordAltSQL($column, 'hmo', '', 'ORDER BY `name` ASC');
		return $record;
	}
}?>