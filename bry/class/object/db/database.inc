<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oDatabase ~ Database & SQL Utility • DEPENDENCY»
 */
class oDatabase {
	public $dbco; #database connection object (from driver extension)





	//CONSTRUCT • Database Connection
	public function __construct($config='',  $driver=''){
		$o = $this->check($config, $driver);
		$v = $o['driver'];
		unset($o['driver']);
		$this->connect($o, $v);
		return true;
	}





	//oEXIT • Report Error & Exit Program
	private function oExit($i='', $v=''){
		if(!empty($i)){return oExit::Run('oDatabase', $i, $v);}
		return false;
	}





	//DRIVER • Check, Validate & Set Driver
	public function driver($i=''){
		if(!empty($i)){
			if(is_array($i) && !empty($i['driver'])){$o = $i['driver'];}
			else {$o = $i;}
			$drivers = array('iPDO', 'iMySQLi', 'iMySQL');
			if(!in_array($o, $drivers)){
				return $this->oExit('driver unavailable', $o);
			}
			return $o;
		}
		return $this->oExit('driver required');
	}





	//CHECK • Check Configuration @TODO ~ Set $persist
	public function check($i='', $driver=''){
		$o = array();
		if(!empty($driver)){$o['driver'] = $this->driver($driver);}
		elseif(!empty($i) && is_array($i)){
			if(!empty($i['driver'])){$o['driver'] = $this->driver($i['driver']);}
			if(empty($o['driver']) || $o['driver'] === false){$o['driver'] = 'iPDO';}
			if(!isset($i['name'])){return $this->oExit('name required');} else {$o['name'] = $i['name'];}
			if(!isset($i['user'])){return $this->oExit('username required');} else {$o['user'] = $i['user'];}
			if(!isset($i['pw'])){return $this->oExit('password required');} else {$o['pw'] = $i['pw'];}
			if(empty($i['host'])){$o['host'] = 'localhost';} else {$o['host'] = $i['host'];}
			return $o;
		}
		else {
			return $this->oExit('configuration required');
		}
	}





	//CONNECT • Initiate Connection
	public function connect($config='',  $driver=''){
		if($driver == 'iPDO'){
			oFile::Inc(oBJCT.'db'.DS.'pdo.inc');
			$dbco = new oPDO($config);
		}
		elseif($driver == 'iMySQLi'){
			oFile::Inc(oBJCT.'db'.DS.'mysqli.inc');
			$dbco = new oSQLi($config);
		}

		if(!empty($dbco->dbo)){
			$this->dbco = $dbco;
			return true;
		}
		return false;
	}





	//DBO • Connection Object (from driver's $dbo)
	public function dbo(){
		if(!empty($this->dbco)){return $this->dbco->dbo;}
		return false;
	}





	//SQL • Perform SQL Query
	public function SQL($q='', $v='iFetchAll', $debug=false){
		return $this->dbco->SQL($q, $v, $debug);
	}





	//CREATEDB • Create Database
	public function createDB($name=''){
		return $this->dbco->createDB($name);
	}





	//ISDB • Check If Database Exists
	public function isDB($name=''){
		return $this->dbco->isDB($name);
	}





	//USEDB • Select Database For Use
	public function useDB($name=''){
		return $this->dbco->useDB($name);
	}





	//DELETEDB • Delete Database
	public function deleteDB($name=''){
		return $this->dbco->deleteDB($name);
	}





	//CREATETB • Create Table
	public function createTB($name='', $engine='INNODB'){
		return $this->dbco->createTB($name, $engine);
	}




	//FKEY • Foreign Key Check (on/off)
	public function checkFK($i=true){
		return $this->dbco->checkFK($i);
	}





	//ISTB • Check If Table Exists
	public function isTB($name=''){
		return $this->dbco->isTB($name);
	}





	//RESETAI • Reset Auto Increment ID
	public function resetAI($table='', $column='auid'){
		return $this->dbco->resetAI($table, $column);
	}



	//WIPETB • Clear/Truncate Table
	public function wipeTB($name='', $fkey=''){
		return $this->dbco->wipeTB($name, $fkey);
	}





	//DELETETB • Delete Table
	public function deleteTB($name='', $fkey=''){
		return $this->dbco->deleteTB($name, $fkey);
	}





	//RECORDIS • Check If Record Exists
	public function recordIs($table, $column='', $value='', $symbol='='){
		return $this->dbco->recordIs($table, $column, $value, $symbol);
	}





	//DISCONNECT • Terminate Connection
	public function disconnect(){
		return $this->dbco->disconnect();
	}


} // EndOfClass - oDatabase