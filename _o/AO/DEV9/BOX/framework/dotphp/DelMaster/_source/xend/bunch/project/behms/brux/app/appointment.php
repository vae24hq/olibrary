<?php
class appointment {
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

	public static function all(){
		$result = db::all('*', 'appointment');
		if(isset($result['HAS_ERROR'])){dbug($result);}
		elseif($result == 'NO_RECORD'){return FALSE;}
		else {return $result;}
	}

	public static function listNew(){
		$result = db::record('*', 'appointment','status', 'new');
		if(isset($result['HAS_ERROR'])){dbug($result);}
		elseif($result == 'NO_RECORD'){return FALSE;}
		else {return $result;}
	}

	public static function listTest(){
		$result = db::record('*', 'appointment','status', 'labtest');
		if(isset($result['HAS_ERROR'])){dbug($result);}
		elseif($result == 'NO_RECORD'){return FALSE;}
		else {return $result;}
	}

	public static function create(){
		return db::create($_POST, 'appointment');
	}
}
?>