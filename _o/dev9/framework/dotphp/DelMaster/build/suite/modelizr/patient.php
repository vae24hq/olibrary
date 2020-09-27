<?php
class patient {
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

	// public static function all($column='*'){
	// 	// $condition = "`type` <> 'patient'";
	// 	$patient = database::find($column, 'patient');
	// 	if(!isset($login['HAS_ERROR'])){
	// 		return $patient;
	// 	}
	// 	#Todo ~ log error [on production, die on development]
	// 	return FALSE;
	// }

	// public static function byStaff($column='*', $bind){
	// 	$condition = "`author` = '$bind'";
	// 	$patient = database::find($column, 'patient', $condition);
	// 	if(!isset($login['HAS_ERROR'])){
	// 		return $patient;
	// 	}
	// 	#Todo ~ log error [on production, die on development]
	// 	return FALSE;
	// }


	// public static function create($output='ruid'){
	// 	#check if hospitalno exists

	// 	if(!empty($_POST['hospitalno'])){
	// 		$hospitalno_check = database::has('patient', 'hospitalno', $_POST['hospitalno']);dbug($hospitalno_check);
	// 		if(!$hospitalno_check){return $res['HAS_HOSPITALNO'] = $_POST['hospitalno'];}
	// 	}


	// 	#create patient
	// 	$patientColumn = array(
	// 		'hospitalno', 'surname', 'firstname', 'othername', 'occupation', 'phone', 'email', 'nationality', 'tribe', 'religion', 'hmo', 'birthday', 'sex', 'address', 'city', 'state',
	// 		'nok','nokrelationship', 'nokphone');
	// 	$insertRecord = array();
	// 	foreach ($_POST as $column => $value){
	// 		if(in_array($column, $patientColumn)){
	// 			$insertRecord[$column] = $value;
	// 		}
	// 	}
	// 	$insertRecord['author'] = oActiveUser('bind');
	// 	$insertRecord['bind'] = oRandomiz('bind');
	// 	$insertRecord['puid'] = oRandomiz('puid');
	// 	$insertRecord['suid'] = oRandomiz('suid');

	// 	if(database::create($insertRecord, 'patient')){
	// 		return TRUE;
	// 	}

	// 	#Todo ~ log error [on production, die on development]
	// 	return FALSE;
	// }

	// public static function update($data, $bind){
	// 	$condition['bind'] = $bind;
	// 	if(database::update($data, 'patient', $condition)){return TRUE;}
	// }

	// public static function record($bind){
	// 	$condition['bind'] = $bind;
	// 	return database::find('*', 'patient', $condition);
	// }


	public static function isHospitalNo($hospitalno){
		$record = oDB::record('hospitalno', 'patient', 'hospitalno', $hospitalno);
		if($record == 'NO_RECORD'){return FALSE;}
		return $record;
	}

	public static function isHospitalNo($hospitalno){
		$record = oDB::record('hospitalno', 'patient', 'hospitalno', $hospitalno);
		if($record == 'NO_RECORD'){return FALSE;}
		return $record;
	}
}
?>