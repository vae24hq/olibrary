<?php
class record {
	private static $instance;
	private static $status;
	public static $odao;

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


	//========== HMO METHOD ==========//
	public static function allHMO($column='`puid`, `name`, `brand`'){
		global $odao;
		$record = $odao->findSQL($column, 'hmo');
		return $record;
	}





	//========== CARDS METHOD ==========//

	//-------------- Returns no of card pages entered by user ---------------
	public static function countCard($puid, $count='page', $time=''){
		$query = '';
		if($count=='page'){$query .= "SELECT DISTINCT `record`,`page` FROM `history`";}
		elseif($count=='patient'){$query .= "SELECT DISTINCT `record` FROM `history`";}
		$query .= " WHERE `author` = '".$puid."'";
		if($time=='today'){
			$query .= ' AND DATE(`created`) = CURDATE()';
		}
		global $odao;
		$record = $odao->runSQL($query, 'count');
		if(is_int($record)){return $record;}
	}


	public static function cards($column_statment='', $filter='', $filervalue=''){
		global $odao;
		$query = "SELECT ";
		if(!empty($column_statment)){$query .= $column_statment;}
		else {
			$query .= "record.auid AS recordID, record.puid AS recordPuid, record.ruid AS recordRuid, DATE_FORMAT(record.created, '%d-%b-%Y') AS recordCreated, record.sex AS recordSex, record.hospitalno AS recordHospitalNo, record.surname AS recordSurname, record.firstname AS recordFirstname, record.othername AS recordOthername, user.username AS `username` ";
		}
		$query .="FROM `record` INNER JOIN `user` ON `record`.`author` = `user`.`puid`";
		if($filter == 'adhoc'){
			$query .= " WHERE `record`.`author` = '".$filervalue."'";
		}
		$query .=" ORDER BY `recordID` DESC LIMIT 200";
		$record = $odao->runSQL($query);
		return $record;
	}


	public static function all($column='*'){
		global $odao;
		$record = $odao->findSQL($column, 'record');
		return $record;
	}


	public static function allList($column='*'){
		global $odao;
		$sql = "SELECT patient.*, user.username AS `user` FROM patient INNER JOIN `user` ON `patient`.`author` = `user`.`puid`";
		$record = $odao->runSQL($sql);
		return $record;
	}

	// public static function byStaff($column='*', $bind){
	// 	$condition = "`author` = '$bind'";
	// 	$patient = database::find($column, 'record', $condition);
	// 	if(!isset($login['HAS_ERROR'])){
	// 		return $patient;
	// 	}
	// 	#Todo ~ log error [on production, die on development]
	// 	return FALSE;
	// }
	// public static function update($data, $bind){
	// 	$condition['bind'] = $bind;
	// 	if(database::update($data, 'record', $condition)){return TRUE;}
	// }

	// public static function record($bind){
	// 	$condition['bind'] = $bind;
	// 	return database::find('*', 'record', $condition);
	// }

	public static function isCard($puid, $find=''){
		global $odao;
		$record = $odao->recordSQL($find, 'record', 'puid', $puid);
		if($record == 'NO_RECORD'){return FALSE;}
		return $record;
	}

	public static function isHospitalNo($hospitalno){
		global $odao;
		$record = $odao->recordSQL('hospitalno', 'record', 'hospitalno', $hospitalno);
		if($record == 'NO_RECORD'){return false;}
		return $record;
	}

	public static function isFlag($condition, $return='puid'){
		#Flag if DOB, Surname & First Name & Other Name exist
		global $odao;
		$record = $odao->findSQL($return, 'record', $condition);
		if($record == 'NO_RECORD'){return FALSE;}
		return $record;
	}

	public static function createCard($data, $return='puid'){
		global $odao;
		$card = $odao->createSQL($data,'record', $return);
		if($card === FALSE){return FALSE;}
		else {
			$result[$return] = $card;
			return $result;
		}
	}

	public static function updateCard($data, $puid, $return='puid'){
		global $odao;
		$cond['puid'] = $puid;
		$result = $odao->updateSQL($data,'record', $cond);
		if($result === FALSE){return FALSE;}
		else {
			#$result[$return] = $card;
			return $result;
		}
	}

	public static function cardInfo($column='*', $puid=''){
		global $odao;
		$record = $odao->recordSQL($column, 'record', 'puid', $puid, 1);
		return $record;
	}

	public static function cardHistory20($column='*', $puid=''){
		global $odao;
		$query = "SELECT `puid`, `record`, `page`, `fee`, `description`, DATE_FORMAT(`date`, '%d-%b-%Y') AS `date` FROM `history` WHERE `record` = '".$puid."' ORDER BY `auid` DESC LIMIT 20";
		$record = $odao->runSQL($query);
		return $record;
	}

	public static function history($card_puid=''){
		$query = "SELECT `puid`, `record`, `page`, `fee`, `description`, DATE_FORMAT(`date`, '%d-%b-%Y') AS `date` FROM `history`";
		if(!empty($card_puid)){$query .= " WHERE `record` = '".$card_puid."'";}
		$query .= " ORDER BY `auid`";
		global $odao;
		$record = $odao->runSQL($query);
		return $record;
	}

	public static function deleteCardHistory($history_puid=''){
		if(!empty($history_puid)){
			global $odao;
			return $odao->removeSQL('history', 'puid', $history_puid);
		}
	}

}
?>