<?php
class oList extends app {
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


	//-------------- LIST OF DOCTORS ---------------
	public static function doctor($record =''){
		if(empty($record)){
				$record='suid, bind, username, email, phone, firstname, surname, othername, practice, sex, location, type, isonline, lastseen, firebasekey, photo';
		}
		$search['type'] = 'doctor';
		return self::find($record, 'user', $search);
	}


	//-------------- LIST OF PATIENTS ---------------
	public static function patient($record ='surname,firstname'){
		$search['type'] = 'patient';
		return self::find($record, 'user', $search);
	}

	//-------------- LIST OF SCIENTIST ---------------
	public static function scientist($record ='bind, surname,firstname'){
		$search['type'] = 'scientist';
		return self::find($record, 'user', $search);
	}

	//-------------- LIST OF INVESTIGATIONS (available) ---------------
	public static function investigation($record=''){
		if(empty($record)){$record='suid, bind, title, acronym, type, department, price, resultis, status';}
		$search['status'] = 'available';
		return self::find($record, 'investigation', $search);
	}

	
	//-------------- LIST OF MEDICAL LABS (available) ---------------
	public static function lab($record=''){
		if(empty($record)){$record='suid, bind, title, acronym, type, address, location, status';}
		$search['status'] = 'available';
		return self::find($record, 'lab', $search);
	}

	//-------------- LIST OF HOSPITALS (available) ---------------
	public static function hospital($record=''){
		if(empty($record)){$record='suid, bind, title, acronym, type, address, location, status';}
		$search['status'] = 'available';
		return self::find($record, 'hospital', $search);
	}

	//-------------- LIST OF PHARMACIES (available) ---------------
	public static function pharmacy($record=''){
		if(empty($record)){$record='suid, bind, title, acronym, type, address, location, status';}
		$search['status'] = 'available';
		return self::find($record, 'pharmacy', $search);
	}

	//-------------- LIST OF A USER's INVESTIGATIONS ---------------
	public static	function userInvestigation($user){
		$labtest_column = (
			'labtest.`suid`, labtest.`bind`, labtest.`user`, labtest.`investigation`, labtest.`location`, labtest.`period`,
			labtest.`comment`, labtest.`result`, labtest.`status`, labtest.`entry` AS `entryDate`
			');
		$sql = "SELECT ".$labtest_column.", ";
		$sql .= "investigation.`title` AS `investigationTitle`, investigation.`acronym` AS `investigationAcronym`, investigation.`price` AS `investigationPrice`";
		$sql .= " FROM `labtest`";
		$sql .= " LEFT JOIN investigation ON labtest.`investigation` = investigation.`bind`";
		$sql .= " WHERE labtest.`user` = '".$user."'";
		return self::runSQL($sql);
	}


	//-------------- LIST OF LABTEST ---------------
	public static function labtest($status='O_OFF', $condition =''){
		$sql = "SELECT * FROM `labtest`";

		#FILTA
		$sql .= " WHERE ";

		if(!empty($condition) && is_array($condition)){
			#condition to be UPDATED
			foreach ($condition as $cond_key => $cond_value){
				if(!empty($condition[$cond_key])){
					$sql .= " `".$cond_key."` = '".$condition[$cond_key]."' AND";
				}
			}

			$sql = rtrim($sql, ' AND');
		}

		#STATUS
		if($status == 'new'){$sql .= "`status` = 'new'";}
		if($status == 'assigned'){$sql .= "`status` = 'assigned'";}	
		if($status == 'pending'){$sql .= "`status` = 'pending'";}
		if($status == 'result'){$sql .= "`status` = 'result'";}
		if($status == 'notnew'){$sql .= "`status` <> 'new'";}

		return self::runSQL($sql);
	}
}
?>
