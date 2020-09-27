<?php
class staff {
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


	public static function create($output='ruid'){
		$_POST['cardno'] = oRandomiz('cardno');
		$_POST['type'] = 'staff';
		if(db::create($_POST, 'user')){
			if(!empty($output)){
				$result = db::record($output,'user','cardno',$_POST['cardno']);
				if(isset($result[$output])){return $result[$output];}
			}
			return $_POST['cardno'];
		}
		return FALSE;
	}

}
?>