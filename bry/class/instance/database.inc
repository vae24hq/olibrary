<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oDatabase ~ Database Handling • DEPENDENCY»
 */
class oDatabase {
	private $_connection;
	private $_driver;

	//CONSTRUCT • Database connection
	public function __construct($config='',  $driver=''){
		$i = $this->check($config, $driver);
		$connect = $this->_connect($i, $i['driver']);

		echo oPrint::Neat($connect);





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
	private function _connect($config, $driver){
		#Using PDO
		if($driver == 'iPDO'){
			try {
				$pdo = new PDO('mysql:dbname='.$config['name'].';host='.$config['host'], $config['user'], $config['password']);
			} catch (PDOException $e){
				oExit::Run('Database', 'connection failed', $e->getMessage());
			}
			return $pdo;
		}

		#Using MySQLi
		if($driver == 'iMySQLi'){
			@$mysqli = new mysqli($config['host'], $config['user'], $config['password'], $config['name']);
			if ($mysqli->connect_error){
				oExit::Run('Database', 'Connection Failed', '['.$mysqli->connect_errno.'] '.$mysqli->connect_error);
			}
			return $mysqli;
		}

	}



	//CONNECT • return database object ~ connection
	public function connect2(){
		if(!empty($this->_connection)){return $this->_connection;}
		return false;
	}


} // EndOfClass - oDatabase