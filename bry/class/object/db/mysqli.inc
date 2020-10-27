<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oSQLi ~ MySQLi Utility • DEPENDENCY»
 */
class oSQLi {
	public $dbo; #connection object (mysqli)
	private $host;
	private $user;
	private $pw;
	private $name;
	private $persist;





	//CONSTRUCT • MySQLi Connection
	public function __construct($i=''){
		if(isset($i['name']) && $i['name'] == 'oNONE'){unset($i['name']);}
		if(isset($i['driver'])){unset($i['driver']);}
		$this->init($i);
		$this->connect();
		$this->cleanup();
		return;
	}





	//oEXIT • Report Error & Exit Program
	private function oExit($i='', $v=''){
		if(!empty($i)){return oExit::Run('oMySQLi', $i, $v);}
		return false;
	}





	//INIT • Initialize Configuration
	protected function init($i=''){
		if(!empty($i) && is_array($i)){
			foreach($i as $k => $v){$this->{$k} = $v;}
			return true;
		}
		return false;
	}





	//CLEANUP • Clean Configuration
	public function cleanup(){
		unset($this->host);
		unset($this->user);
		unset($this->pw);
		unset($this->name);
		unset($this->persist);
		return;
	}





	//CONNECT • Initiate Connection
	public function connect(){
		if($this->persist === true){@$mysqli = new mysqli('p:'.$this->host, $this->user, $this->pw, $this->name);}
		else {@$mysqli = new mysqli($this->host, $this->user, $this->pw, $this->name);}
		if($mysqli->connect_error){$this->oExit('connection failed - '.$mysqli->connect_errno, $mysqli->connect_error);}
		$this->dbo = $mysqli;
		return;
	}





	//DBO • Connection Object
	public function dbo(){
		if(!empty($this->dbo)){return $this->dbo;}
		return false;
	}





	//ERROR • Returns MySQLi Error
	public function error($i='iMessage'){
		if(!empty($i)){
			if($i == 'iCode'){return $this->dbo->errno;}
			elseif($i == 'iMessage'){return $this->dbo->error;}
		}
		return $this->oExit('['.__METHOD__.']','argument required - $i');
	}





	//SQL • Perform SQL Query
	public function SQL($q='', $v='iFetchAll'){
		$o = $this->dbo->query($q);
		$query['syntax'] = $q;

		if($o === false){
			$query['status'] = 'failed';
			$query['error'] = $this->error();
			$query['code'] = $this->error('iCode');
		}
		elseif($o === true){$query['status'] = 'complete';}
		else { //mysqli_result (result set)
			$query['status'] = 'success';

			if($v == 'iFetchBoth'){$record = $o->fetch_array(MYSQLI_BOTH);}
			if($v == 'iFetchNum'){$record = $o->fetch_array(MYSQLI_NUM);}
			if($v == 'iFetch'){$record = $o->fetch_array(MYSQLI_ASSOC);}

			if($v == 'iFetchRow'){$record = $o->fetch_row();}
			if($v == 'iFetchRows'){
				while($row = $o->fetch_row()){$record[] = $row;}
			}

			if($v == 'iFetchAllBoth'){$record = $o->fetch_all(MYSQLI_BOTH);}
			if($v == 'iFetchAllNum'){$record = $o->fetch_all(MYSQLI_NUM);}
			if($v == 'iFetchAll'){$record = $o->fetch_all(MYSQLI_ASSOC);}


		}
		//
			// if($v == 'iFetch'){$record = $o->fetch_array();}



		$resp['query'] = $query;
		$resp['result'] = $o;
		if(isset($record)){$resp['record'] = $record;}
		return $resp;
	}





	//CREATEDB • Create Database
	public function createDB($name=''){
		if(!empty($name)){
			$query = "CREATE DATABASE IF NOT EXISTS `{$name}` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci";
			return $this->SQL($query);
		}
		return false;
	}





	//ISDB • Check If Database Exist
	public function isDB($name=''){
		if(!empty($name)){
			#$query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '{$name}'";
			$query = "SHOW DATABASES LIKE '{$name}'";
			return $this->SQL($query);
		}
		return false;
	}




	//DELETEDB • Delete Database
	public function deleteDB($name=''){
		if(!empty($name)){
			$query = "DROP DATABASE IF EXISTS `{$name}`";
			return $this->SQL($query);
		}
		return false;
	}



























	//COMMIT • [auto commit & commit]
	public function commit($v='iAuto', $i=false){
		if(!empty($v)){
			if($v == 'iAuto'){return $this->dbo->autocommit($i);}
			return $this->dbo->commit();
		}
	}



	//TRANSACT • Returns $mysqli->begin_transaction()
	public function transact($flag=''){
		$flags = array(MYSQLI_TRANS_START_READ_ONLY, MYSQLI_TRANS_START_READ_WRITE, MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
		if(!in_array($flag, $flags)){$this->oExit('invalid flag for transact', $flag);}
		return $this->dbo->begin_transaction($flag);
	}



	//ROLLBACK • Returns $mysqli->rollback()
	public function rollback(){
		return $this->dbo->rollback();
	}



	//QUERY • Returns $mysqli->query()
	public function queryx($sql=''){
		if(!empty($sql)){
			return $this->dbo->query($sql);
		}
		return false;
	}



	//QUERIES • Returns $mysqli->muli_query()
	public function queries($sql=''){
		if(!empty($sql)){
			return $this->dbo->multi_query($sql);
		}
		return false;
	}


	//QUERIES • Run SQL query with [custom response]
	public function run($sql='', $return='iBool'){
		if(!empty($sql)){
			$query['syntax'] = $sql;
			$stmt = $this->dbo->prepare($sql);
			if($stmt === false){
				$query['executed'] = false;
				$query['message'] = $this->error($i='iMessage');
				$query['code'] = $this->error($i='iCode');
			}
			else {
				$exec = $stmt->execute();
				if($exec === true){
					$query['executed'] = true;
					if($return == 'iBool'){return true;}
					elseif($return == 'iAffected'){return $stmt->affected_rows;}
					elseif($return == 'iFetch' || $return == 'iFetchAll'){

						return $exec->fetch_all(MYSQLI_ASSOC);
					}
					else {


						// $o['record'] = $stmt->affected_rows;
						// $o['record'] = $stmt->num_rows;
				// $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				// if($result != false && !empty($result)){
				// 	$o['recordset'] = $result;
				// }
				// else {
				// 	$o['recordset'] = false;
				// }
					}
				}
				else {
					$query['executed'] = false;
					$query['message'] = $this->error($i='iMsg');
					$query['code'] = $this->error($i='iCode');
				}
			}

			if(!empty($query) && is_array($query)){$o['query'] = $query;}

			return $o;
		}
		return false;
	}



	//DISCONNECT • @TODO ~ Close & Disconnect Database Connection
	public function disconnect(){
		$this->cleanup();
		$this->dbo->close();
		return;
	}


} // EndOfClass - oMySQLi