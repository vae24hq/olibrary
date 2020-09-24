<?php
class Bill {
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



	//-------------- create new bill  ---------------
	public static function new($data='', $return='puid'){
		global $fuxCRUD;
		$result = $fuxCRUD->createSQL($data,'invoice', $return);
		if(!isset($result['QUERY_FAILED'])){
			return $result;
		}
		return false;
	}

	public static function viewList($puid=''){
		if(!empty($puid)){
			$SQL = "SELECT * FROM `invoice` WHERE `status` <> 'paid' AND `patient` = '".$puid."'";
			global $fuxCRUD;
			$result = $fuxCRUD->runSQL($SQL, 'record');
			if(!isset($result['QUERY_FAILED'])){
				return $result;
			}
		}
		return false;
	}

	public static function view($puid=''){
		if(!empty($puid)){
			$SQL = "SELECT * FROM `invoice` WHERE `puid` = '".$puid."'";
			global $fuxCRUD;
			$result = $fuxCRUD->runSQL($SQL, 'record');
			if(!isset($result['QUERY_FAILED'])){
				return $result;
			}
		}
		return false;
	}





}?>