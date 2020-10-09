<?php
class CRUD {
	var $name;
	var $user;
	var $password;
	var $host;
	var $driver;

	var $db;

	public function __construct(){
		global $fuxApp;
		if(!empty($fuxApp->db_name)){$this->name = $fuxApp->db_name;}
		if(!empty($fuxApp->db_user)){$this->user = $fuxApp->db_user;}
		if(!empty($fuxApp->db_password)){$this->password = $fuxApp->db_password;}
		if(!empty($fuxApp->db_host)){$this->host = $fuxApp->db_host;}
		if(!empty($fuxApp->db_driver)){$this->driver = $fuxApp->db_driver;}

		if(!empty($this->name)){
			if(empty($this->driver)){$this->driver = 'PDO';}

			#MySQLi Connection
			if($this->driver == 'MySQLi'){
				$connection = new mysqli($this->host, $this->user, $this->password, $this->name);
				if($connection->connect_errno){
					die('Connection Failed: ('.$connection->connect_errno.') '.$connection->connect_error);
				}
				$this->db = $connection;
				return $this->db;
			}

			#PDO Connection
			if($this->driver == 'PDO'){
				$dsn = 'mysql:dbname='.$this->name.';host='.$this->host;
				try {
					$connection = new PDO($dsn, $this->user, $this->password);
				} catch (PDOException $e){
					die('Connection Failed: ('.$e->getMessage().')');
				}
				$this->db = $connection;
				return $this->db;
			}
		}
	}

	public function disconnect(){
		#MySQLi close
		if($this->driver == 'MySQLi'){
			return $this->db->close();
		}

		#PDO close
		if($this->driver == 'PDO'){
			return $this->db = NULL;
		}
	}

	public function runSQL($sql, $return = 'record'){
		#Using MySQLi
		if($this->driver == 'MySQLi'){
			$mysqli = $this->db;
			$result = $mysqli->query($sql);

			if(!$result){
				$error['QUERY_FAILED'] = 'yeap';
				$error['SQL'] = $sql;
				$error['ERROR'] = $mysqli->error;
				return $error;
			}
			else {
				if($return == 'affected_rows'){return $mysqli->affected_rows;}
				elseif(is_object($result)){
					if((isset($result->num_rows) && $result->num_rows < 1) && $return != 'boolean'){return 'NO_RECORD';}
					else {
						if($return == 'boolean'){return true;}
						elseif($return == 'count'){return $result->num_rows;}
						elseif($return == 'record'){
							$record = $result->fetch_all(MYSQLI_ASSOC);
							if(is_array($record) && count($record) == 1){$record = $record[0];}
							return $record;
						}
					}
				}

			}

			return $result;
		}


		#Using PDO
		if($this->driver == 'PDO'){
			$pdo = $this->db;
			$statement = $pdo->prepare($sql);
			$statement->execute();
			$record = $statement->fetchAll(PDO::FETCH_ASSOC);
			$report = $statement->errorInfo();
			if(!empty($report[2])){
				$error['QUERY_FAILED'] = 'yeap';
				$error['SQL'] = $sql;
				$error['ERROR'] = $report[2];
				return $error;
			}
			else {

				if($return == 'affected_rows'){return $statement->rowCount();}
				elseif((count($record) == 0 || empty($record)) && $return != 'boolean'){return 'NO_RECORD';}
				else {
					if($return == 'boolean'){return true;}
					elseif($return == 'count'){return count($record);}
					elseif($return == 'record'){
						if(is_array($record) && count($record) == 1){$record = $record[0];}
						return $record;
					}
				}
			}
			return $record;
		}
	}

	public function findSQL($column='*', $table='', $condition='', $return='boolean'){
		if(!empty($column) && !empty($table)){
			$sql = "SELECT ";
			if(!is_array($column)){$sql .= '`'.$column.'`';}
			else {
				foreach($column as $value){
					$sql .= '`'.$value.'`, ';
				}
				$sql = rtrim($sql, ', ');
			}
			$sql .= ' FROM `'.$table.'`';

			#condition to be UPDATED
			if(!empty($condition)){
				$sql .= ' WHERE ';
				if(is_array($condition)){
					foreach ($condition as $cond_key => $cond_value){
						if(!empty($condition[$cond_key])){
							$sql .= " `".$cond_key."` = '".$condition[$cond_key]."' AND";
						}
					}

					$sql = rtrim($sql, ' AND');
				}
				else {$sql .= ' '.$condition;}
			}

			return $this->runSQL($sql, $return);
		}
		return false;
	}

	public function recordSQL($info='id', $table='', $filter='', $value='', $limit=''){
		if(!empty($info) && !empty($table) && !empty($filter) && !empty($value)){
			$sql = "SELECT ".$info.' FROM `'.$table.'` WHERE `'.$filter."` = '".$value."'";
			if(!empty($limit)){$sql .= ' LIMIT '.$limit;}
			return $this->runSQL($sql);
		}
		return false;
	}

	public function recordAltSQL($column='*', $table='', $condition='', $filter='', $return='record'){
		if(!empty($column) && !empty($table)){
			$sql = "SELECT ";
			if(!is_array($column)){$sql .= $column;}
			else {
				foreach($column as $value){
					$sql .= '`'.$value.'`, ';
				}
				$sql = rtrim($sql, ', ');
			}
			$sql .= ' FROM `'.$table.'`';

			#condition to be UPDATED
			if(!empty($condition)){
				$sql .= ' WHERE ';
				if(is_array($condition)){
					foreach ($condition as $cond_key => $cond_value){
						if(!empty($condition[$cond_key])){
							$sql .= " `".$cond_key."` = '".$condition[$cond_key]."' AND";
						}
					}

					$sql = rtrim($sql, ' AND');
				}
				else {$sql .= ' '.$condition;}
			}
			if(!empty($filer)){$sql .= ' '.$filer;}
			return $this->runSQL($sql, $return);
		}
		return false;
	}
	public function insertGID($table){
		$puid = Helper::randomiz('puid');
		$ruid = Helper::randomiz('ruid');
		$sql = "INSERT INTO `".$table."` SET `puid` = '".$puid."'";
		$sql .= ", `ruid` = '".$ruid."'";

		$return['sql'] = $sql;
		$return['ruid'] = $ruid;
		$return['puid'] = $puid;
		return $return;
	}

	public function createSQL($data='', $table='', $return='boolean'){
		$insertGID = $this->insertGID($table);
		$sql = $insertGID['sql'];
		foreach($data as $key => $value){
			$sql .= ", `".$key."` = '".$value."'";
		}

		$result = $this->runSQL($sql, 'boolean');
		if(!isset($result['QUERY_FAILED'])){
			if($return == 'puid'){return $insertGID['puid'];}
			elseif($return == 'ruid'){return $insertGID['ruid'];}
			elseif($result == 'boolean'){return true;}
		}
		return $result;
	}

	public function updateSQL($data='', $table='', $condition='', $limit=''){
		if(!empty($data) || !empty($table) || !empty($condition)){
			$SQL = "UPDATE `".$table."` SET `revised` = 'Y'";

			#data to be UPDATED
			foreach ($data as $key => $value){
				if(!empty($data[$key])){
					$SQL .= ", `".$key."` = '".$value."'";
				}
			}

			$SQL .= " WHERE ";

			#condition to be UPDATED
			foreach ($condition as $condKey => $condValue){
				if(!empty($condition[$condKey])){
					$SQL .= " `".$condKey."` = '".$condValue."' AND";
				}
			}

			$SQL = rtrim($SQL, ' AND');

			if(!empty($limit)){$SQL = $SQL.' LIMIT '.$limit;}
			return $this->runSQL($SQL, 'affected_rows');

		}
		return false;
	}










}
?>











































<?php
class CRUD {
	private static $instance;
	public static $connection;

	//-------------- Prevent multiple instances ---------------
	private function __construct($driver='MySQL', $dataset='o_auto'){
		if($driver == 'MySQL'){
			require_once 'mysql_pdo.php';
			return self::$connection = MySQLPDO::instantiate($dataset);
		}
		return;
	}

	//-------------- Prevent duplication ---------------
	private function __clone(){return;}

	//-------------- Returns a single instance ---------------
	public static function instantiate($driver='MySQL', $dataset='o_auto'){
		if(is_null(self::$instance)){
			self::$instance = new self($driver, $dataset);
		}
		return self::$instance;
	}

	//-------------- Auto populate dataset with puid|suid|bind ---------------
	public static function guid($dataset){
		$data = array();
		if(empty($dataset)){$dataset = array();}
		if(!array_key_exists('bind', $dataset)){$data['bind'] = Helper::randomize('bind');}
		if(!array_key_exists('puid', $dataset)){$data['puid'] = Helper::randomize('puid');}
		if(!array_key_exists('suid', $dataset)){$data['suid'] = Helper::randomize('suid');}
		return array_merge($data, $dataset);
	}

	//--------------Return single row from recordset  ---------------
	public static function row($recordset){
		return self::$connection->fetchRow($recordset,'ASSOC');
	}

	//-------------- Return all row from recordset ---------------
	public static function rows($recordset){
		return self::$connection->fetchRows($recordset,'ASSOC');
	}

	//-------------- Return number of rows from recordset ---------------
	public static function numRows($recordset){
		return self::$connection->numRows($recordset);
	}

	//-------------- Query Database ---------------
	public static function query($query, $boolean='nope'){
		return self::$connection->query($query, $boolean);
	}

	//-------------- Create Record ---------------
	public static function create($table, $dataset, $boolean='yeah'){
		$dataset = self::guid($dataset);
		$result = self::$connection->insert($table, $dataset, $boolean);
		return $result;
	}

	//-------------- Read Record ---------------
	public static function read($table, $field, $condition='o_all', $boolean='nope'){
		$query = "SELECT ".$field." FROM `".$table.'`';
		if(!empty($condition) && $condition != 'o_all'){$query .= ' '.$condition;}
		$result = self::$connection->query($query, $boolean);
		return $result;
	}

	//-------------- Find records from table ---------------
	public static function find($table, $field, $dataset, $boolean='nope'){
		return self::$connection->select($table, $field, $dataset, $sym='=', $boolean);
	}

	//-------------- Update Record in table ---------------
	public static function update($table, $dataset, $condition='', $boolean='nope'){
		$result = self::$connection->update($table, $dataset, $condition, $boolean);
		return $result;
	}

	//-------------- Delete record ---------------
	public static function remove($table, $condition, $limit, $boolean='nope'){
		$query = "DELETE FROM `".$table.'`';
		if(!empty($condition) && $condition != 'o_all'){$query .= ' '.$condition;}
		if(!empty($limit) && $limit != 'o_none'){$query .=' LIMIT '.$limit;}
		$result = self::$connection->query($query, $boolean);
		if($result === true){return true;}
		return false;
	}

	//-------------- Delete records from table using id ---------------
	public static function removeID($table, $id, $boolean='nope'){
		$condition = "WHERE `id` = '".$id."'";
		return self::remove($table, $condition, 1, $boolean);
	}

	//-------------- Delete records from table using bind ---------------
	public static function removeBIND($table, $bind, $boolean='nope'){
		$condition = "WHERE `bind` = '".$bind."'";
		return self::remove($table, $condition, 1, $boolean);
	}

	//-------------- Delete records from table using puid ---------------
	public static function removePUID($table, $puid, $boolean='nope'){
		$condition = "WHERE `puid` = '".$puid."'";
		return self::remove($table, $condition, 1, $boolean);
	}

	//-------------- Delete records from table using suid ---------------
	public static function removeSUID($table, $suid, $boolean='nope'){
		$condition = "WHERE `suid` = '".$suid."'";
		return self::remove($table, $condition, 1, $boolean);
	}



	//-------------- Check records existence in table ---------------
	public static function exist($table, $column, $record, $limit='o_none', $return='boolean'){
		$query = "SELECT '".$column."' FROM `".$table."` WHERE `".$column."` = '".$record."'";
		if(!empty($limit) && $limit != 'o_none'){$query .=' LIMIT '.$limit;}
		$result = self::$connection->query($query, 'nope');
		$count = self::$connection->numRows($result);
		if($count != 0){
			if($return == 'count'){return $count;}
			elseif($return == 'record'){return $result;}
			else {return true;}
		}
		return false;
	}

	//-------------- Delete all records in table ---------------
	public static function expunge($table){
		$query = "TRUNCATE `".$table.'`';
		$result = self::$connection->query($query, 'yeah');
		if($result === true){return true;}
		return false;
	}
}
// END OF CLASS - CRUD
?>



























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