<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oDatabase ~ Database Handling • DEPENDENCY»
 */
class oDatabase {
	public $driver;
	public $connection;

	//CONSTRUCT • Database connection
	public function __construct($config='',  $driver='iPDO', $persist=false){
		$i = $this->check($config, $driver);
		return $this->_connect($i, $i['driver'], $persist);
	}



	//CHECK • Check database configuration
	private function check($config='', $driver=''){
		$o = array();
		if(!empty($config)){
			if(!isset($config['name'])){oExit::Run('Database', 'name required');}
			if(!isset($config['user'])){oExit::Run('Database', 'user required');}
			if(!isset($config['password'])){oExit::Run('Database', 'password required');}
			if(empty($config['host'])){$config['host'] = 'localhost';}
			$o = $config;
		}
		else {
			oExit::Run('Database', 'configuration required');
		}

		if(!empty($driver)){
			$drivers = array('iPDO', 'iMySQLi', 'iMySQL');
			if(!in_array($driver, $drivers)){oExit::Run('Database', 'driver not available', $driver);}
			$o['driver'] = $driver;
		}

		return $o;
	}




	//CONNECT • Run database connection
	private function _connect($config, $driver, $persist){
		#Using PDO
		if($driver == 'iPDO'){
			try {
				if($persist){$pdo = new PDO('mysql:dbname='.$config['name'].';host='.$config['host'], $config['user'], $config['password']);}
				else {$pdo = new PDO('mysql:dbname='.$config['name'].';host='.$config['host'], $config['user'], $config['password'], array(PDO::ATTR_PERSISTENT => true));}
			} catch (PDOException $e){
				oExit::Run('Database', 'connection failed', $e->getMessage());
			}
			$this->connection = $pdo;
		}

		#Using MySQLi
		if($driver == 'iMySQLi'){
			@$mysqli = new mysqli($config['host'], $config['user'], $config['password'], $config['name']);
			if ($mysqli->connect_error){
				oExit::Run('Database', 'connection failed', '['.$mysqli->connect_errno.'] '.$mysqli->connect_error);
			}
			$this->connection = $mysqli;
		}

		$this->driver = $driver;
	}



	//CONNECTION • return database object ~ connection
	public function connection(){
		if(!empty($this->connection)){return $this->connection;}
		return false;
	}


} // EndOfClass - oDatabase