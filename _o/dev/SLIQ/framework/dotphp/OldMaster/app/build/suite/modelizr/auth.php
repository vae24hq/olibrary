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

	public static function login($userid, $password, $account){
		$query = "SELECT `puid`, `ruid`, `type` FROM `user` WHERE '".$userid."' IN (`username`,`email`,`phone`) AND `password` = '".$password."' AND `account` = '".$account."' LIMIT 1";
		$login = db::runSQL($query);

		if(!isset($login['QUERY_ERROR'])){
			if(is_array($login)){$login['isLogin'] = 'yeap';}
			return $login;
		}
		else {
			#Todo ~ log error resulting from QUERY [on production, die on development]
		}
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