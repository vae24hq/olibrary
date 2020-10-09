<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oSQLi ~ MySQLi Utility • DEPENDENCY»
 */
class oSQLi {
	public $dbo;

	//CONSTRUCT • Initiate DB Connection
	public function __construct($config=''){
		$database = new oDatabase($config, 'iMySQLi');
		$this->dbo = $database->connection();
		return;
	}



	//ERROR • [mysqli error]
	public function error($i='iMsg'){
		if(!empty($i)){
			if($i == 'iCode'){return $this->dbo->errno;}
			elseif($i == 'iMsg'){return $this->dbo->error;}
		}
		return false;
	}



	//TRANSACTION •
	public function transaction($flag=''){
		$flags = array(MYSQLI_TRANS_START_READ_ONLY, MYSQLI_TRANS_START_READ_WRITE, MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
		if(!in_array($flag, $flags)){oExit::Run('oSQL', 'flag invalid for begin_transaction', $flag);}
		return $this->dbo->begin_transaction($flag);
	}



	//COMMIT • [auto commit & commit]
	public function commit($type='auto', $i=false){
		if(!empty($type)){
			if($type == 'auto'){return $this->dbo->autocommit($i);}
			return $this->dbo->commit();
		}
	}



	//ROLLBACK •
	public function rollback(){
		return $mysqli->rollback();
	}



	//QUERY •
	public function query($sql=''){
		if(!empty($sql)){
			return $this->dbo->query($sql);
		}
		return false;
	}



	//QUERY • [multi query]
	public function queries($sql=''){
		if(!empty($sql)){
			return $this->dbo->multi_query($sql);
		}
		return false;
	}


} // EndOfClass - oSQLi