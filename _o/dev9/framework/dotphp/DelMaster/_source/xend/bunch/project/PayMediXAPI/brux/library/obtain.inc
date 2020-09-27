<?php
class obtain extends app {
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


	//-------------- INVESTIGATION INFO ---------------
	public static function investigation($bind, $record =''){
		if(empty($record)){$record='suid, bind, title, acronym, type, department, price, resultis, status';}
		$search['bind'] = $bind;
		return self::find($record, 'investigation', $search);
	}


	//-------------- USER INFO ---------------
	public static function user($bind, $record =''){
		if(empty($record)){$record='suid, bind, username, email, phone, firstname, surname, othername, birthday, sex, location, type, photo, lastseen, isonline';}
		$search['bind'] = $bind;
		return self::find($record, 'user', $search);
	}


	//-------------- USER's INVESTIGATION RESULT ---------------
	public static function investigationResult($bind, $record='*'){
		$labtest_column = (
			'labtest.`suid`, labtest.`bind`, labtest.`user`, labtest.`investigation`, labtest.`location`, labtest.`period`,
			labtest.`comment`, labtest.`result`, labtest.`status`, labtest.`entry` AS `entryDate`
			');
		$sql = "SELECT ".$labtest_column.", ";
		$sql .= "investigation.`title` AS `investigationTitle`, investigation.`acronym` AS `investigationAcronym`, investigation.`price` AS `investigationPrice`";
		$sql .= " FROM `labtest`";
		$sql .= " LEFT JOIN investigation ON labtest.`investigation` = investigation.`bind`";
		$sql .= " WHERE labtest.`bind` = '".$bind."'";
		return self::runSQL($sql);
	}
}
?>