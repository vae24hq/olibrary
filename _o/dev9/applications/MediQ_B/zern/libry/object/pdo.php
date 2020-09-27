<?php
class oPDO {
	var $name;
	var $user;
	var $pass;
	var $host;
	var $userx;
	var $pdo;

	//-------------- Collect connection parameters and initiate connection ---------------
	public function __construct($db=''){
		if(empty($db)){
			$config = zernConfig();
			if(!empty($config['db'])){$db = $config['db'];}
		}

		if(!empty($db) && is_array($db)){
			if(!empty($db['name'])){$this->name = $db['name'];}
			if(!empty($db['user'])){$this->user = $db['user'];}
			if(!empty($db['pass'])){$this->pass = $db['pass'];}
			if(!empty($db['host'])){$this->host = $db['host'];}
			if(!empty($db['userx'])){$this->userx = $db['userx'];}
			return $this->connect();
		}
	}

	//-------------- Create SQL connection ---------------
	private function connect(){
		#PDO Connection
		$dsn = 'mysql:dbname=' . $this->name . ';host=' . $this->host;
		try {
			$connect = new PDO($dsn, $this->user, $this->pass);
		} catch (PDOException $e) {
			die('Connection Failed: ('.$e->getMessage().')');
		}
		$this->pdo = $connect;
		return $this->pdo;
	}


	//-------------- Prepare & return SQL error ---------------
	private function errorSQL($stmt, $sql, $report='oMSG')
	{
		$error = $stmt->errorInfo();

		$resp['oACT'] = 'F9';
		if($report == 'oMSG'){$resp['oERROR'] = $error[2];}
		else {$resp['oERROR'] = $error;}

		$resp['oQUERY'] = $sql;
		return $resp;
	}

	private function resultSQL($stmt, $sql, $return)
	{
		if($return == 'oBOOL'){return true;}
		else {
			$record = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if(empty($record)){return 'oNORECORD';}
			else {
				if($return == 'oNUMROW'){
					return $stmt->rowCount();
				}
				elseif($return == 'oRECORD'){
					if(is_array($record) && count($record) == 1){$record = $record[0];}
					return $record;
				}
				elseif($return == 'oRESULTSET'){
					return $record;
				}
				else {
					return $this->record($stmt, $record, $sql, $return);
				}
			}
		}
	}


	private function record($stmt, $result, $query, $return)
	{
		if ($result === false) {
			return $this->errorSQL($stmt, $query);
		}
		else {
			if(is_array($result)){
				$output = array();
				if(count($result) == 1){
					$result = $result[0];
					if(is_array($return)){
						foreach($return as $column){
							if(array_key_exists($column, $result)){
								$output[$column] = $result[$column];
							}
						}
					}
					elseif(array_key_exists($return, $result)){
						$output[$return] = $result[$return];
					}
				}
				else {
					#ToDo
				}

				if(!empty($output)){return $output;}
			}
			else {
				#ToDo
			}

			return $result;
		}
	}


	//-------------- Prepare SQL condition statement ---------------
	private function conditionSQL(array $filter, $operator='=')
	{
		if(!empty($filter) && !empty($operator)){
			$sql = '';
			foreach ($filter as $key => $value) {
				if (!empty($filter[$key])) {
					$sql .= " `" . $key . "` {$operator} '" . $value . "' AND";
				}
			}
			if(!empty($sql)){
				$sql = rtrim($sql, ' AND');
			}
			return $sql;
		}
		return false;
	}


	//-------------- Prepare SQL column statement ---------------
	private function columnSQL($column)
	{
		if(!empty($column)){
			$sql = '';

			#prepare column(s)
			$coln = '';
			if (is_array($column)) {
				foreach ($column as $col) {
					$coln .= '`' . $col . "`, ";
				}
				$coln = rtrim($coln, ', ');
			} elseif (is_string($column)) {
				$coln = $column;
			}

			$sql = $coln;
			return $sql;
		}
		return false;
	}


	//-------------- Prepare SQL insert GID statement ---------------
	public function insertGID($table)
	{
		if($table == 'oUSERX'){$table = $this->userx;}
		if (!empty($table)) {
			$puid = randomiz('oPUID');
			$ruid = randomiz('oRUID');
			$sql = "INSERT INTO `" . $table . "` SET `puid` = '" . $puid . "'";
			$sql .= ", `ruid` = '" . $ruid . "'";

			$run['sql'] = $sql;
			$run['ruid'] = $ruid;
			$run['puid'] = $puid;
			return $run;
		}
		return false;
	}




	//-------------- Select record using Bind ---------------
	public function select($column, string $table, $condition, $limit, $return='oRECORD')
	{
		if($table == 'oUSERX'){$table = $this->userx;}
		if (!empty($table) && !empty($column) && !empty($condition)) {
			$table = oInput::clean($table);

			#prepare column(s)
			$coln = $this->columnSQL($column);

			if(!empty($coln)){
				$pdo = $this->pdo;
				$sql = "SELECT {$coln} FROM `{$table}`";

				#prepare condition
				if($condition != 'NO_COND'){
					$sql .= " WHERE ";
					if(is_string($condition)){$sql .= " {$condition}";}
					elseif(is_array($condition)){
						$param = ''; $datalist = array();
						foreach ($condition as $key => $value) {
							$param .= $key . ' = :' . $key . ' AND ';
							$datalist[':' . $key] = $value;
						}
						$param = rtrim($param, ' AND');

						$sql .= " {$param}";
					}
				}

				#prepare limit
				if($limit != 'NO_LIMIT'){$sql .= " LIMIT {$limit}";}

				$stmt = $pdo->prepare($sql);
				$run = $stmt->execute($datalist);

				if ($run !== false) {
					if($return == 'oBOOL'){return true;}
					else {
						return $this->resultSQL($stmt, $sql, $return);
					}
				}
				else {
					return $this->errorSQL($stmt, $sql);
				}
				return $run;
			}
		}
		return false;
	}


	//-------------- Run SQL Query [WHEN IT CAN RETURN RESULTSET] ---------------
	public function runSQL(string $sql, $return='oRECORD')
	{
		if(!empty($sql)){
			$pdo = $this->pdo;
			if(oText::in($sql, 'oUSERX')){
				$sql = oText::swap($sql, 'oUSERX', $this->userx);
			}
			$stmt = $pdo->prepare($sql);
			$run = $stmt->execute();
			if ($run !== false) {
				if($return == 'oBOOL'){return true;}
				elseif($return == 'oNUMROW'){
					return $stmt->rowCount();
				}
				else {
					$record = $stmt->fetchAll(PDO::FETCH_ASSOC);
					if(!empty($record)){
						if($return == 'oRECORD'){
							if(is_array($record) && count($record) == 1){$record = $record[0];}
							return $record;
						}
						elseif($return == 'oRECORDSET'){
							return $record;
						}
						else {
							return $this->record($stmt, $record, $sql, $return);
						}
					}
					else {
						return 'oNORECORD';
					}
				}
			}
			else {
				return $this->errorSQL($stmt, $sql);
			}
			return $run;
		}
		return false;
	}


	//-------------- Insert new record using Bind ---------------
	public function insertSQL(string $table, array $data)
	{
		if($table == 'oUSERX'){$table = $this->userx;}
		if (!empty($table) && !empty($data)) {
			$table = oInput::clean($table); #cleanup

			#prepare GID
			$puid = randomiz('oPUID');
			$ruid = randomiz('oRUID');
			$column = 'puid, ruid, ';
			$param = ':puid, :ruid, ';
			$datalist = array (':puid' => $puid, ':ruid' => $ruid);

			#prepare query
			foreach ($data as $key => $value){
				#$sqlPlain = ", `" . $key . "` = '" . $value . "'";  #[Changed to BIND PARAMETERS]
				$column .= $key.', ';
				$param .= ':'.$key . ', ';
				$datalist[':'.$key] = $value;
			}
			$column = oText::trimEdge($column, ',');
			$param = oText::trimEdge($param, ',');

			$resp = array();

			$pdo = $this->pdo;
			$sql = 'INSERT INTO ' . $table . '(' . $column . ') VALUES(' . $param . ')';
			$stmt = $pdo->prepare($sql);
			$run = $stmt->execute($datalist);
			if($run !== false) {
				$resp['oACT'] = 'OK';
				$resp['oROWS'] = $stmt->rowCount();
				$resp['oID'] = $pdo->lastInsertId();
			}
			else {
				$resp['oACT'] = 'F9';
				$resp['oERROR'] = $stmt->errorInfo()[2];
			}
			return $resp;
		}
		return false;
	}


	//-------------- Create Record (SQL) ---------------
	public function createSQL(string $table, array $data, $return='oBOOL')
	{
		if($table == 'oUSERX'){$table = $this->userx;}
		if (!empty($table) && !empty($data)) {
			$table = oInput::clean($table); #cleanup
			$insertGID = $this->insertGID($table); #prepare GID
			$sql = $insertGID['sql'];
			foreach ($data as $key => $value){
				$sql .= ", `".$key. "` = '" .$value."'";
				if(is_array($return) && in_array($key, (array)$return)){
					$row[$key] = $value;
				}
				elseif($return == $key){$row[$key] = $value;}
			}
			$result = $this->runSQL($sql, $return);
			if(!isset($result['oERROR']) && $result !== false){
				if($return == 'oBOOL'){return true;}
				elseif($return == 'puid' || $return == 'ruid'){return $insertGID[$return];}
				elseif(!empty($row)){
					if(in_array('puid', (array)$return)){$row['puid'] = $insertGID['puid'];}
					if(in_array('ruid', (array)$return)){$row['ruid'] = $insertGID['ruid'];}
					return $row;
				}
			}
			return $result;
		}
		return false;
	}


	//-------------- Update Record (SQL) ---------------
	public function updateSQL(string $table, array $data, $condition, $limit=1, $return='oNUMROW') #return [oBOOL|oNUMROW]
	{
		if($table == 'oUSERX'){$table = $this->userx;}
		if (!empty($data) && !empty($table) && !empty($condition)) {
			$table = oInput::clean($table);
			$sql = "UPDATE `{$table}` SET ";

			#data to be updated
			foreach ($data as $key => $value) {
				if (!empty($data[$key])) {
					$sql .= "`{$key}` = '{$value}', ";
				}
			}
			$sql = rtrim($sql, ', ');

			#prepare condition
			if($condition != 'NO_COND'){
				$sql .= " WHERE ";
				if(is_string($condition)){$sql .= " {$condition}";}
				elseif(is_array($condition)){$sql .= $this->conditionSQL($condition);}
			}

			#prepare limit
			if($limit != 'NO_LIMIT'){$sql .= " LIMIT {$limit}";}

			#Run & Return $sql;
			return $this->runSQL($sql, $return);
		}
		return false;
	}


	//-------------- Delete Record (SQL) ---------------
	public function deleteSQL(string $table, $condition, $limit=1, $return='oNUMROW')
	{
		if($table == 'oUSERX'){$table = $this->userx;}
		if (!empty($table) && !empty($condition) && !empty($limit)) {
			$table = oInput::clean($table);
			$sql = "DELETE FROM `{$table}`";

			#prepare condition
			if($condition != 'NO_COND'){
				$sql .= " WHERE ";
				if(is_string($condition)){$sql .= " {$condition}";}
				elseif(is_array($condition)){$sql .= $this->conditionSQL($condition);}
			}

			#prepare limit
			if($limit != 'NO_LIMIT'){$sql .= " LIMIT {$limit}";}

			#Run & Return $sql;
			return $this->runSQL($sql, $return);
		}
		return false;
	}


	//-------------- Select Record (SQL) ---------------
	public function selectSQL($column, string $table, $condition, $limit, $return='oRECORD')
	{
		if($table == 'oUSERX'){$table = $this->userx;}
		if (!empty($column) && !empty($table) && !empty($condition)) {
			$table = oInput::clean($table);

			#prepare column(s)
			$coln = $this->columnSQL($column);

			if(!empty($coln)){
				$sql = "SELECT {$coln} FROM `{$table}`";

				#prepare condition
				if($condition != 'NO_COND'){
					$sql .= " WHERE ";
					if(is_string($condition)){$sql .= " {$condition}";}
					elseif(is_array($condition)){$sql .= $this->conditionSQL($condition);}
				}

				#prepare limit
				if($limit != 'NO_LIMIT'){$sql .= " LIMIT {$limit}";}

				#Run & Return $sql;
				return $this->runSQL($sql, $return);
			}
		}
		return false;
	}


	//-------------- Select SQL Record ---------------
	public function readSQL($column, string $table, $filterLabel, $filterValue, $limit, $return='oRECORD')
	{
		if($table == 'oUSERX'){$table = $this->userx;}
		if (!empty($column) && !empty($table) && !empty($filterLabel) && !empty($filterValue)) {
			$condition ="`{$filterLabel}` = '{$filterValue}'";
			return $this->selectSQL($column, $table, $condition, $limit, $return);
		}
		return false;
	}


	//-------------- Delete All Records ---------------
	public function removeAll(string $table, $limit='NO_LIMIT')
	{
		if($table == 'oUSERX'){$table = $this->userx;}
		if (!empty($table)) {
			return $this->deleteSQL($table, 'NO_COND', $limit);
		}
		return false;
	}


	//-------------- Truncate Table (just like delete all but reset table) ---------------
	public function expunge(string $table)
	{
		if($table == 'oUSERX'){$table = $this->userx;}
		if (!empty($table)) {
			$name = oInput::clean($table);
			$sql = "TRUNCATE `{$table}`";
			$pdo = $this->pdo;
			$run = $pdo->exec($sql);
			if($run === false && $run != 0){return $this->errorSQL($pdo, $sql);}
			return true;
		}
		return false;
	}


	//-------------- Create Database ---------------
	public function createDB($database, $subtle = 'YEAP')
	{
		if (!empty($database) && !is_array($database)) {
			$name = (string)$database;
			$name = oInput::clean($name);
			if ($subtle != 'YEAP') {
				$sql = "CREATE DATABASE `{$database}`";
			} else {
				$sql = "CREATE DATABASE IF NOT EXISTS `{$database}`";
			}
			$pdo = $this->pdo;
			$run = $pdo->exec($sql);
			if($run === false){return $this->errorSQL($pdo, $sql);}
			return true;
		}
		return false;
	}


	//-------------- Drop Database ---------------
	public function deleteDB(string $database, $subtle = 'YEAP')
	{
		if (!empty($database)) {
			$name = oInput::clean($database);
			if ($subtle != 'YEAP') {
				$sql = "DROP DATABASE `{$database}`";
			} else {
				$sql = "DROP DATABASE IF EXISTS `{$database}`";
			}
			$pdo = $this->pdo;
			$run = $pdo->exec($sql);
			if($run === false){return $this->errorSQL($pdo, $sql);}
			return true;
		}
		return false;
	}


	//-------------- Disconnect SQL connection ---------------
	public function disconnect()
	{
		unset($this->name);
		unset($this->user);
		unset($this->pass);
		unset($this->host);
		unset($this->userx);
		unset($this->pdo);
		return;
	}
}
?>