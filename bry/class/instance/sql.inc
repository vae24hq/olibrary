<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oSQL ~ SQL Utility • DEPENDENCY»
 */
class oSQL {
	public $dbo;
	public $driver;

	//CONSTRUCT • Initiate DB Connection
	public function __construct($config='', $driver='iPDO'){
		$db = new oDatabase($config, $driver);
		$this->dbo = $db->connection();
		$this->driver = $driver;
		return;
	}


	//TRANSACTION
	public function transaction($flag=''){
		if($this->driver == 'iMySQLi'){
			$flags = array(MYSQLI_TRANS_START_READ_ONLY, MYSQLI_TRANS_START_READ_WRITE, MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
			if(!in_array($flag, $flags)){oExit::Run('oSQL', 'flag invalid for begin_transaction', $flag);}
			return $this->dbo->begin_transaction($flag);
		}
	}



	public function commit($type='auto', $i=false){
		if(!empty($type)){
			if($this->driver == 'iMySQLi'){
				if($type == 'auto'){return $this->dbo->autocommit($i);}
				return $this->dbo->commit();
			}
		}
	}



	public function rollback(){
		if($this->driver == 'iMySQLi'){
			return $mysqli->rollback();
		}
	}



	public function error($i=''){
		if(!empty($i)){
			if($this->driver == 'iMySQLi'){
				if($i == 'iCode'){return $this->dbo->errno;}
				elseif($i == 'iMsg'){return $this->dbo->error;}
			}
		}
		return false;
	}


	public function query($sql=''){
		if(!empty($sql)){
			if($this->driver == 'iMySQLi'){
				return $this->dbo->query($sql);
			}
		}
		return false;
	}



	public function queries($sql=''){
		if(!empty($sql)){
			if($this->driver == 'iMySQLi'){
				return $this->dbo->multi_query($sql);
			}
		}
		return false;
	}


} // EndOfClass - oSQL