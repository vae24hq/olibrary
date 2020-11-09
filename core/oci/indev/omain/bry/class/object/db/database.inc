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





	//ISDBCOMETHOD • Check If Method Exist On $this->dbco
	private function DBCOMethodCheck($i=''){
		if(!empty($i)){
			if(method_exists($this->dbco, $i)){return true;}
			return $this->oExit('DBCO → method unavailable', $i);
		}
		return $this->oExit(__METHOD__.' requires argument $i');
		#@NOTE: ~ when calling use __FUNCTION__ instead of __METHOD__ to get exact name of function
	}





	//QUERY • Native Query Method
	public function query($sql='', $multi=''){
		$this->DBCOMethodCheck(__FUNCTION__);
		return $this->dbco->query($sql, $multi);
	}





	//EXEC • Native Exec Method
	public function exec($sql='', $multi=''){
		$this->DBCOMethodCheck(__FUNCTION__);
		return $this->dbco->exec($sql, $multi);
	}





	//IS • Check If [database|table] Exists
	public function is($i='', $v='iDB'){
		return $this->dbco->is($i, $v);
	}





	//CREATE • Create [database|table]
	public function create($i='', $v='iDB'){
		return $this->dbco->create($i, $v);
	}





	//USE • Select Database For Use
	public function use($i=''){
		return $this->dbco->use($i);
	}





	//DELETE • Delete [database|table]
	public function delete($i='', $v='iDB'){
		return $this->dbco->delete($i, $v);
	}





	//FKEY • Foreign Key Check (on/off)
	public function FK($i=true){
		return $this->dbco->FK($i);
	}




	//RESETAI • Reset Auto Increment ID
	public function reset($table='', $column='auid'){
		return $this->dbco->reset($table, $column);
	}





	//WIPETB • Clear/Truncate Table
	public function wipe($name='', $fkey=''){
		return $this->dbco->wipe($name, $fkey);
	}





	//RUNSQL • Perform SQL Query
	public function SQL($q='', $v='iFetch', $debug=false){
		return $this->dbco->SQL($q, $v, $debug);
	}





	//RUNSQLPREP • Perform SQL Prepared Query
	public function SQLPrep($q='', $v='iFetch', $debug=false){
		return $this->dbco->SQLPrep($q, $v, $debug);
	}




	//RECORD • Check If Record Exists and return TRUE/FALSE or Record
	public function record($table, $column='', $value='', $symbol='=', $return='iBool', $debug=false){
		return $this->dbco->record($table, $column, $value, $symbol, $return='iBool', $debug);
	}





	//DISCONNECT • Terminate Connection
	public function disconnect(){
		return $this->dbco->disconnect();
	}
} // EndOfClass - oDatabase