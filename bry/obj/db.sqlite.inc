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
			if($use_db === true){
				$this->connect();
			}
			else {
				$this->connect($setting);
			}
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
				$this->conn = $stmt;
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




	public function error($stmt){
		if($stmt->lastErrorCode() !== 0){
			$o['code'] = $stmt->lastErrorCode();
			$o['message'] = $stmt->lastErrorMsg();
			return $o;
		}
		return false;
	}





	public function report($stmt, $type=''){
		if($type == 'iLastID'){
			return $stmt->lastInsertRowID();
		}
		if($type == 'iRowsAffected'){
			return $stmt->lastInsertRowID();
		}
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
			$this->conn = $stmt;
			return true;
		}
	}










	#BACKUP • Backup one database to another database [#returns TRUE/FALSE]
	public function backup($i){
		$backup = new SQLite3($i);
		return $this->conn->backup($backup);
	}

} #EndOfClass - oSQLite