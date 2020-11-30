<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oSQLite ~ SQLIte Utility • DEPENDENCY»
 */
class oSQLite {

	#CONSTRUCT • Connection
	public function __construct($setting=''){
		$this->init($setting);
		$this->connect();
	}





	#oEXIT • Report error & exit program
	public function oExit($i='', $v=''){
		if(!empty($i)){
			return oExit::Run('oSQLite', $i, $v);
		}
		return false;
	}





	#INIT • Initialize configuration
	public function init($data){
		if(!class_exists('SQLite3')){return $this->oExit('driver unavailable', 'SQLite3');}
		if(empty($data['name'])){return $this->oExit('database required', 'config error');}
		if(empty($data['host'])){return $this->oExit('server required', 'config error');}

		$this->database = $data['host'].strtolower($data['name']);

		if(!file_exists($this->database)){return $this->oExit('database unavailable', $this->database);}
		if(!is_writable($this->database)){return $this->oExit('database inaccessible', $this->database);}
	}




	public function error($stmt){
		if($stmt->lastErrorCode() !== 0){
			$o['code'] = $stmt->lastErrorCode();
			$o['message'] = $stmt->lastErrorMsg();
			return $o;
		}
		return false;
	}





	#CONNECT • Initiate connection
	public function connect(){
		$stmt = new SQLite3($this->database);
		var_dump($db->lastErrorCode());
	}


} #EndOfClass - oSQLite