<?php
class oDB {
	private static $instance;
	private static $status;
	public static $connection;

	//-------------- Prevent multiple instances ---------------
	private function __construct($config=''){
		return self::connect($config);
	}

	//-------------- Prevent duplication ---------------
	private function __clone(){return;}

	//-------------- Returns a single instance ---------------
	public static function instantiate($config=''){
		if(is_null(self::$instance)){
			self::$instance = new self($config='');
		}
		return self::$instance;
	}


	//-------------- DATABASE CONNECTION ---------------
	public static function connect($config=''){
		$data = array();
		if(empty($config) OR !is_array($config)){
			global $AppConfig;
			if(!empty($AppConfig['db'])){
				$data = $AppConfig['db'];
			}
		}
		else {
			$data = $config;
		}
		if(!isset($data['name'])){$data['name'] = 'db';}
		if(!isset($data['username'])){$data['username'] = 'root';}
		if(!isset($data['password'])){$data['password'] = 'OpenDB';}
		if(!isset($data['host'])){$data['host'] = 'localhost';}
		$dsn = 'mysql:dbname='.$data['name'].';host='.$data['host'];
		try {
			$connection = new PDO($dsn, $data['username'], $data['password']);
		} catch (PDOException $e){
			die('Connection Failed: '.$e->getMessage());
		}
		self::$connection = $connection;
		return self::$connection;
	}



	public static function execSQL($sql){
		$db = self::$connection;
		$count = $db->exec($sql);
		return $count;
	}



	public static function all($info='id', $table=''){
		if(!empty($info) && !empty($table)){
			$sql = "SELECT ".$info.' FROM `'.$table."`";
			return self::runSQL($sql);
		}
		return FALSE;
	}






	public static function remove($info='id', $table='', $filter='', $value=''){
		if(!empty($info) && !empty($table) && !empty($filter) && !empty($value)){
			$sql = "DELETE FROM `".$table.'` WHERE `'.$filter."` = '".$value."'";
			$db = self::$connection;
			$affected_row = $db->exec($sql);
			if($affected_row < 1){return FALSE;}
		}
		return TRUE;
	}

	public static function update($data='', $table='', $condition=''){
		if(!empty($data) || !empty($table) || !empty($condition)){
			$sql = "UPDATE `".$table."` SET `updated` = 'yeah'";

			#data to be UPDATED
			foreach ($data as $update_key => $update_value){
				if(!empty($data[$update_key])){
					$sql .= ", `".$update_key."` = '".$data[$update_key]."'";
				}
			}

			$sql .= " WHERE ";

			#condition to be UPDATED
			foreach ($condition as $cond_key => $cond_value){
				if(!empty($condition[$cond_key])){
					$sql .= " `".$cond_key."` = '".$condition[$cond_key]."' AND";
				}
			}

			$sql = rtrim($sql, ' AND');

			$db = self::database();
			$affected_row = $db->exec($sql);
			if($affected_row < 1){return FALSE;}
		}
		return TRUE;
	}
}
?>