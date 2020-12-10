<?php
class oupdate extends app {
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


	//-------------- UPDATE LABTEST ---------------
	public static function labtest($data, $filter){
		$user = app::findLabtest($filter['bind'],'bind');
		if($user != 'NO_RECORD'){
			return self::update($data, 'labtest', $filter);
		}
		return $user;
	}
}
?>