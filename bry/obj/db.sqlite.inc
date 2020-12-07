<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oSQLite ~ SQLIte Utility • DEPENDENCY»
 */
class oSQLite {
	private $database;

	#CONSTRUCT • Connection
	public function __construct($setting='', $use_db=false){
		if(!empty($setting)){
			$this->init($setting, $use_db);
			if($use_db === true){$this->connect();}
			else {$this->connect($setting);}
			return true;
		}
		return;
	}





	#oEXIT • Report error & exit program
	public function oExit($i='', $v=''){
		if(!empty($i)){
			return oExit::Run('oSQLite', $i, $v);
		}
		return;
	}





	#CONNECT • Initiate connection
	public function connect($data=''){
		if(!empty($data)){
			$name = ''; $host = '';
			if(is_array($data)){
				if(!empty($setting['name'])){$name = $setting['name'];}
				if(!empty($setting['host'])){$host = $setting['host'];}
			}
			else {
				$name = $data;
			}
			$this->useDB($name, $host);
		}
		if(!isset($this->database)){
			return $this->oExit('connection failed', 'database required');
		}
		$stmt = new SQLite3($this->database);
		if($this->error($stmt) === false){
			$this->connection = $stmt;
			return true;
		}
	}





	#CONNECTION • Set connection for particular query
	public function connection($connection=''){
		if(!empty($connection)){
			//@TODO - check if connection is valid SQLITE3 object
		}
		elseif(isset($this->connection)){
			return $this->connection;
		}
		return $this->oExit('connection error', 'no valid database connection');
	}





	#IS DB • Check if database exist & is accessible
	public function isDB($name, $report=false){
		if(!file_exists($name)){
			if($report === true){return false;}
			return $this->oExit('database unavailable', $name);
		}
		if(!is_writable($name)){
			if($report === true){return false;}
			return $this->oExit('database inaccessible', $name);
		}
		return true;
	}





	#CREATE DB • Create database
	public function createDB($name='', $host=''){
		if(empty($name)){return $this->oExit('database required');}
		$db = $host.strtolower($name);
		#make sure database does not exist to avoid overwriting
		if($this->isDB($db, true) === false){
			$this->database = $db;
			$stmt = new SQLite3($this->database);
			if($this->error($stmt) === false){
				$this->connection = $stmt;
				return true;
			}
		}
		return $this->oExit('database already exist', $db);
	}





	#USE DB • Use database
	public function useDB($name='', $host=''){
		if(empty($name)){return $this->oExit('database required');}
		$db = $host.strtolower($name);
		if($this->isDB($db) === true){
			$this->database = $db;
			return true;
		}
		return false;
	}





	#INIT • Initialize configuration
	public function init($data, $use_db=true){
		if(!class_exists('SQLite3')){return $this->oExit('driver unavailable', 'SQLite3');}
		if(empty($data['host'])){return $this->oExit('server required', 'config error');}
		if($use_db === true){
			$name = '';
			if(!empty($data['name'])){$name = $data['name'];}
			$this->useDB($name, $data['host']);
		}
		return true;
	}




	#ERROR • Report error
	public function error($dbo, $type='iError'){
		if($dbo->lastErrorCode() !== 0){
			if($type == 'iErrorMsg'){
				return $dbo->lastErrorMsg();
			}
			elseif($type == 'iErrorCode'){
				return $dbo->lastErrorCode();
			}
			else {
				$e['code'] = $dbo->lastErrorCode();
				$e['message'] = $dbo->lastErrorMsg();
				return $e;
			}
			return false;
		}
	}






	#REPORT DBO • Return report/result for DBO operation
	public function reportDBO($type, $dbo='', $sql=''){
		$dbo = $this->connection($dbo);
		$error = $this->error($dbo);
		$e = array();
		if($error !== false){
			if(!empty($sql)){$e['query'] = $sql;}
			if(is_array($error)){$e = array_merge($e, $error);}
			else {$e['message'] = $error;}
			if(!empty($e)){return array('SQL_ERROR' => $e);}
		}
		/**NO DATABASE QUERY ERROR, CONTINUE**/

			#Returns the number of rows modified (inserted/deleted) by the most recent SQL statement
		elseif($type == 'iRowsAffected'){
			return $dbo->changes();
		}

			#Returns the row ID of the most recent INSERT into the database
		elseif($type == 'iLastID'){
			return $dbo->lastInsertRowID();
		}

			#Returns the row ID of the most recent INSERT into the database
		elseif($type == 'iVersion'){
			return $dbo->version();
		}
		return false;
	}






	#RESULT • Prepare & Return result
	public function result($res, $ret='', $dbo='', $sql=''){
		return $res;
	}






	#EXEC • Executes a result-less query against a given database [INSERT|UPDATE|DELETE]
	public function exec($sql, $dbo=''){
		$dbo = $this->connection($dbo);
		$res = $dbo->exec($sql);
		if($res === false){
			return $this->reportDBO('iError', $dbo, $sql);
		}
		return $res;
	}





	#QUERY • Run SQL query
	public function query($sql, $ret='iPrepare', $dbo=''){
		$dbo = $this->connection($dbo);

		#check if query is
		if(!is_array($sql)){
		}

		#Returns a single result
		if($ret == 'iSingleRow'){
			$res = $dbo->querySingle($sql, true);
		}
		elseif($ret == 'iQuery'){
			$res = $dbo->query($sql);
		}
		elseif($ret == 'iPrepare'){
			$stmt = $db->prepare('SELECT bar FROM foo WHERE id=:id');
			$stmt->bindValue(':id', 1, SQLITE3_INTEGER);

			$stmt = $db->prepare("INSERT INTO foo VALUES (:bar)");
			$stmt->bindParam(':bar', $bar, SQLITE3_TEXT);

			$res = $dbo->query($sql);
		}

		if($res === false){
			return $this->reportDBO('iError', $dbo, $sql);
		}
		else {
			return $this->result($res, $ret, $dbo, $sql);
		}
		return false;
	}





	#RUN • Run prepared query
	public function run($sql, $param, $dbo=''){
		$dbo = $this->connection($dbo);
		if(!is_array($sql)){
		}

		$stmt = $dbo->prepare($sql);
		foreach($param as $key => $value){
			$stmt->bindParam(':'.$key, $value, SQLITE3_TEXT);
		}
		$res = $stmt->execute();

		if($res === false){
			return $this->reportDBO('iError', $dbo, $sql);
		}
		else {
			return $this->result($res, 'iResult', $dbo, $sql);
		}
		return false;
	}





	#BACKUP • Backup one database to another database [#returns TRUE/FALSE]
	public function backup($i){
		$backup = new SQLite3($i);
		return $this->connection->backup($backup);
	}

} #EndOfClass - oSQLite