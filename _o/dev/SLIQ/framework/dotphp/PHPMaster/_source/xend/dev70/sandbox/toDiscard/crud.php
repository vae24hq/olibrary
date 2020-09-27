<?php
class CRUD {
	private static $instance;
	private static $connection;

	//-------------- Prevent multiple instances ---------------
	private function __construct($driver='MySQL', $dbconfig=''){
		if($driver == 'MySQL'){
			self::$connection = MySQLDB::instantiate($dbconfig);
		}
	}

	//-------------- Prevent duplication ---------------
	private function __clone(){}

	//-------------- Returns a single instance ---------------
	public static function instantiate($driver='MySQL', $dbconfig=''){
		if(is_null(self::$instance)){
			self::$instance = new self($driver, $dbconfig);
		}
		return self::$instance;
	}

	//-------------- Auto populate dataset with puid|suid|bind ---------------
	public static function uig($dataset){
		if(!array_key_exists('bind', $dataset)){$dataset['bind'] = oRandomize('bind');}
		if(!array_key_exists('puid', $dataset)){$dataset['puid'] = oRandomize('puid');}
		if(!array_key_exists('suid', $dataset)){$dataset['suid'] = oRandomize('suid');}
		return $dataset;
	}

	//-------------- Query database ---------------
	public static function query($query, $boolean='nope'){
		return MySQLDB::query($query, $boolean);
	}

	//-------------- Create record ---------------
	public static function create($table, $dataset){
		$dataset = self::uig($dataset);
		$result = self::$connection->insert($table, $dataset);
		if($result === true){return $result;}
		return false;
	}

//-------------- Read record ---------------
	public static function read($table, $field, $condition='oall', $boolean='nope'){
		$query = "SELECT ".$field." FROM `".$table.'`';
		if(!empty($condition) && $condition != 'oall'){$query .= ' '.$condition;}
		$result = self::$connection->query($query, $boolean);
		return $result;
	}

	//-------------- Delete record ---------------
	public static function remove($table, $condition, $limit){
		$query = "DELETE FROM `".$table.'`';
		if(!empty($condition) && $condition != 'oall'){$query .= ' '.$condition;}
		if(!empty($limit) && $limit != 'onone'){$query .=' LIMIT '.$limit;}
		$result = self::$connection->query($query);
		if($result === true){return true;}
		return false;
	}

	//-------------- Delete all records in table ---------------
	public static function expunge($table){
		$query = "TRUNCATE `".$table.'`';
		$result = self::$connection->query($query);
		if($result === true){return true;}
		return false;
	}

	//-------------- Update records in table ---------------
	public static function update($table, $dataset, $condition=''){
		$result = self::$connection->update($table, $dataset, $condition);
		if($result === true){return true;}
		return false;
	}

	//-------------- Delete records from table using bind ---------------
	public static function removeBind($table, $bind){
		$condition = "WHERE `bind` = '".$bind."'";
		return self::remove($table, $condition, 1);
	}

	//-------------- Delete records from table using id ---------------
	public static function removeID($table, $id){
		$condition = "WHERE `id` = '".$id."'";
		return self::remove($table, $condition, 1);
	}

	//-------------- Delete records from table using puid ---------------
	public static function removePuid($table, $puid){
		$condition = "WHERE `puid` = '".$puid."'";
		return self::remove($table, $condition, 1);
	}

	//-------------- Delete records from table using suid ---------------
	public static function removeSuid($table, $suid){
		$condition = "WHERE `suid` = '".$suid."'";
		return self::remove($table, $condition, 1);
	}

	//-------------- Check records existence in table ---------------
	public static function exist($table, $column, $record, $limit='onone', $return='boolean'){
		$query = "SELECT '".$column."' FROM `".$table."` WHERE `".$column."` = '".$record."'";
		if(!empty($limit) && $limit != 'onone'){$query .=' LIMIT '.$limit;}
		$result = self::$connection->query($query, 'nope');
		$count = self::$connection->numRows($result);
		if($count != 0){
			if($return == 'count'){return $count;}
			elseif($return == 'record'){return $result;}
			else {return true;}
		}
		return false;
	}
}
?>