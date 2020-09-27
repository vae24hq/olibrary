<?php
class auth {
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

	public static function login($userid, $password){
		$query = "SELECT `bind`, `type`, `ruid` FROM `staff` WHERE '".$userid."' IN (`username`,`email`,`phone`) AND `password` = '".$password."' LIMIT 1";
		$login = database::runSQL($query);
		if(!isset($login['HAS_ERROR'])){
			if(is_array($login)){$login['o_isLogin'] = 'o_yeap';}
			return $login;
		}
		#Todo ~ log error [on production, die on development]

		return FALSE;
	}


	public static function user($bind, $column='*'){
		$condition['bind'] = $bind;
		$user = database::find($column, 'staff', $condition);
		if(!isset($login['HAS_ERROR'])){
			return $user;
		}
		#Todo ~ log error [on production, die on development]
		return FALSE;
	}
}
?>