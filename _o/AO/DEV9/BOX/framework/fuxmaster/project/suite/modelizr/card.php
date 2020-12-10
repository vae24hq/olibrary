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


	public static function isCardNo($cardno){
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

	public static function genNum(){
		global $fuxCRUD;
		$sql = 'SELECT MAX(cardno)+1 AS `newCardNo` from card';
		$cardNo = $fuxCRUD->runSQL($sql);
		if(!isset($cardNo['QUERY_FAILED'])){
			if($cardNo['newCardNo'] == NULL){$cardNo['newCardNo'] = 1;}
			$isCardNo = self::isCardNo($cardNo['newCardNo']);
			if($isCardNo === false){return $cardNo['newCardNo'];}
		}
		return false;
	}

	public static function create($data='', $return='puid'){
		$input = array();
		$dataset = array('cardno', 'author', 'surname', 'firstname', 'othername', 'occupation', 'phone', 'tribe', 'religion', 'dob', 'sex', 'hmo', 'address');
		$input = Data::doFilter($data, $dataset);
		global $fuxCRUD;
		$card = $fuxCRUD->createSQL($input,'card', $return);
		if(!isset($card['QUERY_FAILED'])){
			$result[$return] = $card;
			return $result;
		}
		return false;
	}

	public static function update($data='', $puid='', $return='puid'){
		$input = array();
		$dataset = array('cardno', 'author', 'surname', 'firstname', 'othername', 'occupation', 'phone', 'tribe', 'religion', 'dob', 'sex', 'hmo', 'address');
		$input = Data::doFilter($data, $dataset);
		$condition['puid'] = $puid;
		global $fuxCRUD;
		$card = $fuxCRUD->updateSQL($input, 'card', $condition, 1);
		if(!isset($card['QUERY_FAILED'])){
			if($card > 0){return 'RECORD_UPDATED';}
			else {return 'NO_CHANGES';}
			return $result;
		}
		return false;
	}

	public static function record500(){
		$SQL = "SELECT * FROM `card` ORDER BY `created` DESC LIMIT 500";
		global $fuxCRUD;
		$result = $fuxCRUD->runSQL($SQL, 'record');
		if(!isset($result['QUERY_FAILED'])){
			return $result;
		}
		return false;
	}

	public static function listSearch($search=''){
		$SQL = "SELECT * FROM `card`";
		if(!empty($search)){
			$SQL .=" WHERE `cardno` = '".$search."' OR `phone` = '".$search."' OR `dob` = '".$search."' OR CONCAT(surname,firstname) LIKE '%".$search."%'";
		}
		$SQL .= " ORDER BY `created` DESC LIMIT 1000";

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






}?>