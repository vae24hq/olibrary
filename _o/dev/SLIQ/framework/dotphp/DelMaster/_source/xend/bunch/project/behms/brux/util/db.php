<?php
class db {
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


	//-------------- DATABASE CONNECTION ---------------
	public static function connect(){
		$data = konfig('db_konfig');
		if(!isset($data['database'])){$data['database'] = '';}
		if(!isset($data['username'])){$data['username'] = '';}
		if(!isset($data['password'])){$data['password'] = '';}
		if(!isset($data['server'])){$data['server'] = 'localhost';}
		$dsn = 'mysql:dbname='.$data['database'].';host='.$data['server'];
		try {
			$connection = new PDO($dsn, $data['username'], $data['password']);
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); #turn off on production
		} catch (PDOException $e){
			die('Connection failed: '.$e->getMessage());
		}
		return $connection;
	}

	//-------------- RUN SQL QUERY ---------------
	public static function runSQL($sql){
		$db = self::connect();
		$statement = $db->prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		$error = $statement->errorInfo();
		if(!isset($error[2]) || empty($error[2])){
			if(count($result) == 0 || empty($result)){$result = 'NO_RECORD';}
			elseif(is_array($result) && count($result) == 1){$result = $result[0];}
			return $result;
		}
		else {
			$error['HAS_ERROR'] = 'yeah';
			return $error;
		}
	}

	public static function execSQL($sql){
		$db = self::connect();
		$result = $db->exec($sql);
		if(count($result) < 1){return FALSE;}
		return $result;
	}

	public static function insertRUID($table){
		$string = 'INSERT INTO `'.$table."` SET `ruid` = '".oRandomiz('ruid')."'";
		return $string;
	}

	public static function create($data='', $table=''){
		$sql = self::insertRUID($table);
		foreach($data as $key => $value){
			if(!empty($value)){
				$sql .= ", `".$key."` = '".$value."'";
			}
		}
		$db = self::connect();
		$result = $db->exec($sql);
		if($result < 1){return FALSE;}
		return $result;
	}

	public static function all($info='id', $table=''){
		if(!empty($info) && !empty($table)){
			$sql = "SELECT ".$info.' FROM `'.$table."`";
			return self::runSQL($sql);
		}
		return FALSE;
	}

	public static function record($info='id', $table='', $filter='', $value=''){
		if(!empty($info) && !empty($table) && !empty($filter) && !empty($value)){
			$sql = "SELECT ".$info.' FROM `'.$table.'` WHERE `'.$filter."` = '".$value."'";
			return self::runSQL($sql);
		}
		return FALSE;
	}

	public static function find($column='*', $table='', $condition=''){
		if(!empty($column) && !empty($table)){
			$sql = "SELECT ".$column.' FROM `'.$table.'`';

			#condition to be UPDATED
			if(!empty($condition)){
			$sql .= ' WHERE ';
			foreach ($condition as $cond_key => $cond_value){
				if(!empty($condition[$cond_key])){
					$sql .= " `".$cond_key."` = '".$condition[$cond_key]."' AND";
				}
			}

			$sql = rtrim($sql, ' AND');
			}

			return self::runSQL($sql);
		}
		return FALSE;
	}


	public static function remove($info='id', $table='', $filter='', $value=''){
		if(!empty($info) && !empty($table) && !empty($filter) && !empty($value)){
			$sql = "DELETE FROM `".$table.'` WHERE `'.$filter."` = '".$value."'";
			$db = self::connect();
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