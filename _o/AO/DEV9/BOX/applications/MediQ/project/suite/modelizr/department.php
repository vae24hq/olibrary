<?php
class Department {
	private static $instance;
	private static $db;
	private static $table;


	//-------------- Prevent multiple instances ---------------
	private function __construct(){
		global $zernDB;
		if(!empty($zernDB) && is_object($zernDB)){
			self::$db = $zernDB;
			self::$table = 'deptx';
		}
		return;
	}

	//-------------- Prevent duplication ---------------
	private function __clone(){return;}

	//-------------- Returns a single instance ---------------
	public static function instantiate(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}


	//========== CREATE HMO ==========//
	public static function create(array $data, $return='puid'){
		if(!empty($data)){
			return self::$db->createSQL(self::$table, $data, $return);
		}
		return false;
	}

	//========== READ HMO [all or with conditions] ==========//
	public static function read($column='*', $condition='NO_COND', $return='oRECORD'){
		if(!empty($column)){
			return self::$db->selectSQL($column, self::$table, $condition, 'NO_LIMIT', $return);
		}
		return false;
	}


	//========== READ HMO [by puid] ==========//
	public static function readPUID($puid, $column='*', $return='oRECORD'){
		if(!empty($puid) && !empty($column)){
			$condition['puid'] = $puid;
			return self::$db->selectSQL($column, self::$table, $condition, 1, $return);
		}
		return false;
	}


	//========== UPDATE HMO [by puid] ==========//
	public static function updatePUID($puid, array $data, $return='oNUMROW'){
		if(!empty($puid) && !empty($data)){
			$condition['puid'] = $puid;
			return self::$db->updateSQL(self::$table, $data, $condition, 1, $return);
		}
	}


	//========== DELETE HMO [by puid] ==========//
	public static function deletePUID($puid, $return='oNUMROW'){
		if(!empty($puid)){
			$condition['puid'] = $puid;
			return self::$db->deleteSQL(self::$table, $condition, 1, $return);
		}
		return false;
	}


	//========== DELETE HMO [by ruid] ==========//
	public static function deleteRUID($ruid, $return='oNUMROW'){
		if(!empty($ruid)){
			$condition['ruid'] = $ruid;
			return self::$db->deleteSQL(self::$table, $condition, 1, $return);
		}
		return false;
	}


	//========== DELETE HMO [by auid] ==========//
	public static function deleteID($auid, $return='oNUMROW'){
		if(!empty($auid)){
			$condition['auid'] = $auid;
			return self::$db->deleteSQL(self::$table, $condition, 1, $return);
		}
		return false;
	}

	//========== WIPE HMO [and reset table index] ==========//
	public static function deleteAll($confirm){
		if($confirm == 'oYEAP'){
			return self::$db->expunge(self::$table);
		}
		return false;
	}
}?>