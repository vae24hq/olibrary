<?php
class orun extends app {
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


	//-------------- REQUEST LABTEST ---------------
	public static function labtest($data=''){
		if(empty($data) || !is_array($data)){return FALSE;}

		#Create Record
		$columns = array('isapp', 'isby', 'author', 'user', 'investigation', 'location', 'period');
		$sql = self::insertRUID('labtest');
		foreach ($columns as $key){
			if(!empty($data[$key])){
				$sql .= ", `".$key."` = '".$data[$key]."'";
			}
		}
		return self::execSQL($sql);
	}
}
?>