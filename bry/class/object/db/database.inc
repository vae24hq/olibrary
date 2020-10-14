<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oDatabase ~ Database & SQL Utility • DEPENDENCY»
 */
class oDatabase {

	//CONSTRUCT • Database connection
	public function __construct($config='',  $driver=''){
		if(!empty($config)){
			$o = $this->check($config, $driver);
			$v = $o['driver'];
			unset($o['driver']);
			return $this->connect($o, $v);
		}
		return;
	}



	//CONNECT • Initiate Database Connection
	public function connect($config='',  $driver=''){
		if($driver == 'iPDO'){
			oFile::Inc(oBJCT.'db'.DS.'pdo.inc');
			$this->connect = new oPDO($config);
		}
		elseif($driver == 'iMySQLi'){
			oFile::Inc(oBJCT.'db'.DS.'mysqli.inc');
			$this->connect = new oSQLi($config);
		}
		return $this->connect;
	}



	//DBO • Return Database Object [Connection]
	public function dbo(){
		if(!empty($this->connect)){
			return $this->connect->dbo();
		}
		return false;
	}



	//CHECK • Check database configuration @TODO ~ set $persist
	public function check($i='', $driver=''){
		$o = array();
		if(!empty($driver)){$o['driver'] = $this->driver($driver);}
		elseif(!empty($i) && is_array($i)){
			if(!empty($i['driver'])){$o['driver'] = $this->driver($i['driver']);}
			if(empty($o['driver']) || $o['driver'] === false){$o['driver'] = 'iPDO';}
			if(!isset($i['name'])){oExit::Run('Database', 'name required');} else {$o['name'] = $i['name'];}
			if(!isset($i['user'])){oExit::Run('Database', 'user required');} else {$o['user'] = $i['user'];}
			if(!isset($i['password'])){oExit::Run('Database', 'password required');} else {$o['password'] = $i['password'];}
			if(empty($i['host'])){$o['host'] = 'localhost';} else {$o['host'] = $i['host'];}
			return $o;
		}
		else {
			oExit::Run('Database', 'configuration required');
		}
	}



	//DRIVER •
	public static function driver($i=''){
		if(!empty($i)){
			if(is_array($i) && !empty($i['driver'])){$driver = $i['driver'];} else {$driver = $i;}
			$drivers = array('iPDO', 'iMySQLi', 'iMySQL');
			if(!in_array($driver, $drivers)){oExit::Run('Database', 'driver unavailable', $driver);}
			return $driver;
		}
		oExit::Run('Database', 'driver required');
	}


} // EndOfClass - oDatabase