<?php
class MySQLPDO {
	private static $instance;
	private static $db; #database configuration

	public static $connection;

	//-------------- Prevent multiple instances ---------------
	private function __construct($dataset='o_auto'){
		return self::connect($dataset);
	}

	//-------------- Prevent duplication ---------------
	private function __clone(){return;}

	//-------------- Returns a single instance ---------------
	public static function instantiate($dataset='o_auto'){
		if(is_null(self::$instance)){
			self::$instance = new self($dataset);
		}
		return self::$instance;
	}

	//-------------- Open Connection ---------------
	public static function connect($dataset='o_auto'){
		self::$db = dbase($dataset);

		$dsn = 'mysql:dbname='.self::$db["database"].';host='.self::$db["host"];
		try {$connect = new PDO($dsn, self::$db["user"], self::$db["password"]);}
		catch (PDOException $e){exit('Connection failed: ' . $e->getMessage());}
		self::$connection = $connect;
		return self::$connection;
	}

	//-------------- Close connection ---------------
	public static function disconnect(){
		if(isset(self::$connection)){
			self::$connection = null;
			unset(self::$connection);
		}
	}

	//-------------- Returns PDO error report ---------------
	public static function report($statement){
		if(Tiny::$environ == 'prod'){return $statement->errorCode();}
		elseif(Tiny::$environ == 'zbug'){
			$error = $statement->errorInfo();
			$report = 'Query failed: '.$error[2];
			return $report;
		}
		return $statement->errorInfo();
	}

	//-------------- Fetch next single row from recordset  ---------------
	public static function fetchRow($recordset, $fetch ='ASSOC'){#ASSOC|NUM|BOTH
		if(is_bool($recordset)){die('Fetch failed: on boolean result');}

		if($fetch == 'ASSOC'){return $recordset->fetch(PDO::FETCH_ASSOC);}
		if($fetch == 'NUM'){return $recordset->fetch(PDO::FETCH_NUM);}
		if($fetch == 'BOTH'){return $recordset->fetch(PDO::FETCH_BOTH);}
	}

	//-------------- Fetch all row from recordset ---------------
	public static function fetchRows($recordset, $fetch ='ASSOC'){#ASSOC|NUM|BOTH
		if(is_bool($recordset)){die('FetchAll failed: on boolean result');}

		if($fetch == 'ASSOC'){return $recordset->fetchAll(PDO::FETCH_ASSOC);}
		if($fetch == 'NUM'){return $recordset->fetchAll(PDO::FETCH_NUM);}
		if($fetch == 'BOTH'){return $recordset->fetchAll(PDO::FETCH_BOTH);}
	}

	//-------------- Count number of rows from recordset ---------------
	public static function numRows($recordset){#ASSOC|NUM|BOTH
		return $recordset->rowCount();
	}

	//-------------- Handle SQL query ---------------
	public static function query($query, $boolean='yeah'){
		$statement = self::$connection->prepare($query);
		if($statement->execute()){
			if($boolean === 'yeah'){return true;}
			return $statement;
		}
		else {
			return self::report($statement);
		}
	}

	//-------------- Delete record from table ---------------
	public static function delete($table, $condition, $boolean='yeah'){
		if(!empty($condition)){$condition = ' '.$condition;}

		$query = 'DELETE FROM `'.$table.'`'.$condition;
		$statement = self::$connection->prepare($query);
		if($statement->execute()){
			$row = self::numRows($statement);
			if($row != 0){
				if($boolean == 'yeah'){return true;}
				return $statement;
			}
			return false;
		}
		else {
			return self::report($statement);
		}
	}

	//-------------- Handle database update statement ---------------
	public static function update($table, $dataset, $condition='', $boolean='yeah'){
		$param = ''; $datalist = array();
		if(!empty($dataset) && is_array($dataset)){
			foreach($dataset as $key => $value){
				$param .= $key.' = :'.$key.', ';
				$datalist[':'.$key] = $value;
			}
			$param = Character::trim($param, 'o_char', ',');
		}

		$query = 'UPDATE `'.$table.'` SET '.$param;
		if(!empty($condition)){$query .= ' '.$condition;}
		$statement = self::$connection->prepare($query);
		if($statement->execute($datalist)){
			$row = self::numRows($statement);
			if($row != 0){
				if($boolean == 'yeah'){return true;}
				return $statement;
			}
			return false;
		}
		else {
			return self::report($statement);
		}
	}

	//-------------- Handle database select statement ---------------
	public static function select($table, $field, $dataset, $sym = '=', $boolean='nope'){
		$param = ''; $datalist = array();
		if(!empty($dataset) && is_array($dataset)){
			foreach($dataset as $key => $value){
				$param .= $key.' '.$sym.' :'.$key.' AND ';
				$datalist[':'.$key] = $value;
			}
			$param = Character::trim($param, 'o_char', ' AND');
		}

		$query = 'SELECT '.$field.' FROM `'.$table;
		if(!empty($param)){$query .='` WHERE '.$param;}
		$statement = self::$connection->prepare($query);
		if(!empty($datalist)){$exec = $statement->execute($datalist);}
		else {$exec = $statement->execute();}
		if($exec){
			$row = self::numRows($statement);
			if($row != 0){
				if($boolean == 'yeah'){return true;}
				elseif($row == 1){return self::fetchRow($statement);}
				elseif($row > 1){return self::fetchRows($statement);}
			}
			return false;
		}
		else {
			return self::report($statement);
		}
	}

	//-------------- Handle database insert statement ---------------
	public static function insert($table, $dataset, $boolean='yeah'){
		$column = ''; $param = '';
		foreach($dataset as $key => $value){
			$column .= $key.', ';
			$param .= ':'.$key.', ';
			$datalist[':'.$key] = $value;
		}
		$column = Character::trim($column, 'o_char', ',');
		$param = Character::trim($param, 'o_char', ',');

		$query = 'INSERT INTO '.$table.'('.$column.') VALUES('.$param.')';
		$statement = self::$connection->prepare($query);

		if(!empty($datalist)){$exec = $statement->execute($datalist);}
		else {$exec = $statement->execute();}

		if($exec){
			$row = self::numRows($statement);
			if($row != 0){
				if($boolean == 'yeah'){return true;}
				elseif($row == 1){return self::fetchRow($statement);}
				elseif($row > 1){return self::fetchRows($statement);}
			}
			return false;
		}
		else {
			return self::report($statement);
		}
	}
}
// END OF CLASS - MySQLPDO
?>