<?php
class Card {
	private static $instance;
	// public static $odao;

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





	public static function search($search=''){
		$SQL = "SELECT * FROM `card`";
		if(!empty($search)){
			$SQL .=" WHERE `cardno` = '".$search."' OR `phone` = '".$search."' OR `dob` = '".$search."' OR CONCAT(surname,firstname) LIKE '%".$search."%'";
		}
		$SQL .= " ORDER BY `created` DESC LIMIT 1000";

		global $fuxCRUD;
		$result = $fuxCRUD->runSQL($SQL, 'record');
		if(!isset($result['QUERY_FAILED'])){
			if(is_array($result)){
				$return['status'] = 'RECORD_FOUND';
				$return['data'] = $result;
			}
			elseif($result == 'NO_RECORD'){
				$return['status'] = 'NO_RECORD';
			}
			return $return;
		}
		return false;
	}

	public static function getRecord($return='puid'){
		if(!empty($_GET['card'])){
			$condition['puid'] = $_GET['card'];
			global $fuxCRUD;
			$record = $fuxCRUD->findSQL($return, 'card', $condition, 'record');
			if(!isset($record['QUERY_FAILED'])){
				if(is_array($record) && !empty($record[$return])){
					return $record[$return];
				}
			}
		}
		return false;
	}
























/*
==================================================================
BEGIN CARD RELATED METHODS
==================================================================
*/

	public static function isNo($cardno){
		global $fuxCRUD;
		$record = $fuxCRUD->recordSQL('cardno', 'card', 'cardno', $cardno);
		if($record == 'NO_RECORD'){return false;}
		return $record;
	}


	public static function isFlag($condition, $return='puid'){
		#Flag if DOB, Surname & First Name & Other Name exist
		global $fuxCRUD;
		$record = $fuxCRUD->findSQL($return, 'card', $condition, 'affected_rows');
		if($record > 0){return true;}
		else {return false;}
	}


	public static function isRecord($condition, $return='puid'){
		global $fuxCRUD;
		$record = $fuxCRUD->findSQL($return, 'card', $condition, 'affected_rows');
		if($record > 0){return true;}
		else {return false;}
	}


	public static function hasRecord($column, $input=''){
		if(!empty($input)){
			$condition[$column] = $input;
			return self::isRecord($condition);
		}
		return false;
	}


	public static function newNo(){
		global $fuxCRUD;
		$sql = 'SELECT MAX(cardno)+1 AS `newCardNo` from card';
		$cardNo = $fuxCRUD->runSQL($sql);
		if(!isset($cardNo['QUERY_FAILED'])){
			if($cardNo['newCardNo'] == NULL){$cardNo['newCardNo'] = 1;}
			$isCardNo = self::isNo($cardNo['newCardNo']);
			if($isCardNo === false){return $cardNo['newCardNo'];}
		}
		return false;
	}


	//-------------- create new card  ---------------
	public static function create($data='', $return='puid'){
		global $fuxCRUD;
		$result = $fuxCRUD->createSQL($data,'card', $return);
		if(!isset($result['QUERY_FAILED'])){
			return $result;
		}
		return false;
	}


	public static function listSearch($keyword=''){
		$SQL = "SELECT * FROM `card`";
		if(!empty($keyword)){
			$SQL .=" WHERE `cardno` = '".$keyword."' OR `phone` = '".$keyword."' OR `dob` = '".$keyword."' OR CONCAT(surname,firstname) LIKE '%".$keyword."%'";
		}
		$SQL .= " ORDER BY `created` DESC LIMIT 1000";

		global $fuxCRUD;
		$result = $fuxCRUD->runSQL($SQL, 'record');
		if(!isset($result['QUERY_FAILED'])){
			return $result;
		}
		return false;
	}


	public static function record($limit=1000){
		$SQL = "SELECT * FROM `card` ORDER BY `created` DESC";
		if(!empty($limit)){$SQL .= " LIMIT ".$limit;}
		global $fuxCRUD;
		$result = $fuxCRUD->runSQL($SQL, 'record');
		if(!isset($result['QUERY_FAILED'])){
			return $result;
		}
		return false;
	}


	public static function view($puid=''){
		if(!empty($puid)){
			$SQL = "SELECT * FROM `card` WHERE `puid` = '".$puid."' LIMIT 1";
			global $fuxCRUD;
			$result = $fuxCRUD->runSQL($SQL, 'record');
			if(!isset($result['QUERY_FAILED'])){
				return $result;
			}
		}
		return false;
	}


	public static function update($data='', $puid='', $return='puid'){
		$condition['puid'] = $puid;		
		global $fuxCRUD;
		$card = $fuxCRUD->updateSQL($data, 'card', $condition, 1);
		if(!isset($card['QUERY_FAILED'])){
			if($card > 0){return 'RECORD_UPDATED';}
			else {return 'NO_CHANGES';}
			return $result;
		}
		return false;
	}






/*
==================================================================
BEGIN CASE RELATED METHODS
==================================================================
*/

	//-------------- create new case file  ---------------
	public static function newCase($data='', $return='puid'){
		global $fuxCRUD;
		$result = $fuxCRUD->createSQL($data,'case', $return);
		if(!isset($result['QUERY_FAILED'])){
			return $result;
		}
		return false;
	}

}?>