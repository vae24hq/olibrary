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

	public static function all($column='*'){
		// $condition = "`type` <> 'patient'";
		$staff = database::find($column, 'staff');
		if(!isset($login['HAS_ERROR'])){
			return $staff;
		}
		#Todo ~ log error [on production, die on development]
		return FALSE;
	}

	public static function create($output='ruid'){

		#create staff
		$staffColumn = array(
			'employeeno', 'username', 'password', 'surname', 'firstname', 'othername', 'phone', 'email', 'nationality', 'type', 'station', 'birthday', 'sex', 'address', 'city', 'state',
			'nok','nokrelationship', 'nokphone');
		$insertRecord = array();
		foreach ($_POST as $column => $value){
			if(in_array($column, $staffColumn)){
				$insertRecord[$column] = $value;
			}
		}
		$insertRecord['author'] = oActiveUser('bind');
		$insertRecord['bind'] = oRandomiz('bind');
		$insertRecord['puid'] = oRandomiz('puid');
		$insertRecord['suid'] = oRandomiz('suid');

		if(database::create($insertRecord, 'staff')){
			return TRUE;
		}

		#Todo ~ log error [on production, die on development]
		return FALSE;
	}
}
?>