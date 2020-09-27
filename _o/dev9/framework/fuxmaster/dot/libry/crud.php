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