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
		$this->connected = 1;
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
		if($mysqli->connect_error){
			$this->oExit('connection failed - '.$mysqli->connect_errno, $mysqli->connect_error);
		}

		$mysqli->set_charset("utf8"); #change charset to UTF-8
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
			if($i == 'iCode'){return $this->dbo()->errno;}
			elseif($i == 'iMessage'){return $this->dbo()->error;}
		}
		return $this->oExit('['.__METHOD__.']','argument required - $i');
	}





	//QUERY • Run SQL query using $mysqli->query()
	public function query($q=''){
		if(!empty($q)){
			return $this->dbo()->query($q);
		}
		return false;
	}




	//QUERIES • Run SQL query using $mysqli->muli_query()
	public function queries($q=''){
		if(!empty($q)){
			return $this->dbo->multi_query($q);
		}
		return false;
	}

	// //SQL • Perform SQL Query & Prepare Result
	// public function SQL($q='', $v='iFetchAll', $debug=false){
	// 	if(empty($this->connected)){return $this->oExit('disconnected');}

	// 	// $statement = self::$connection->prepare($query);
	// 	// if($statement->execute()){
	// 	// 	if($boolean === 'yeah'){return true;}
	// 	// 	return $statement;
	// 	// }
	// 	// else {
	// 	// 	return self::report($statement);
	// 	// }
	// 	// $o = $this->dbo()->query($q);
	// 	$o = $this->dbo()->prepare($q);
	// 	// if($o !== false){
	// 	// 	$exec = $o->execute();
	// 	// }
	// 	// echo oPrint::Neat($o);
	// 	return $this->handler($o, $q, $v, $debug);
	// }





	//RUNSQL • Perform Query & Return Custom Result (mysqli_result object)
	public function runSQL($q='', $v='iFetch', $debug=false){
		if(empty($this->connected)){return $this->oExit('disconnected');}
		$o = $this->query($q);
		$query['syntax'] = $q;
		if($o === false){
			$status = 'failed';
			$query['error'] = $this->error();
			$query['code'] = $this->error('iCode');
		}
		else {
			if($o === true){$status = 'complete';}
			else {
				$status = 'success';

				if($v == 'iFetchArrayBoth'){$record = $o->fetch_array(MYSQLI_BOTH);}
				elseif($v == 'iFetchArrayNum'){$record = $o->fetch_array(MYSQLI_NUM);}
				elseif($v == 'iFetchArray'){$record = $o->fetch_array(MYSQLI_ASSOC);}
				elseif($v == 'iFetchRow'){$record = $o->fetch_row();}
				elseif($v == 'iFetchRows'){while($row = $o->fetch_row()){$record[] = $row;}}
				elseif($v == 'iFetchBoth'){$record = $o->fetch_all(MYSQLI_BOTH);}
				elseif($v == 'iFetchNum'){$record = $o->fetch_all(MYSQLI_NUM);}
				elseif($v == 'iFetch'){$record = $o->fetch_all(MYSQLI_ASSOC);}

				#Use for SELECT
				if($v == 'iNumRows' && isset($o->num_rows)){
					$resp['count'] = $o->num_rows;
				}

				#Only for INSERT, UPDATE & DELETE
				if($v == 'iAffectedRows' && isset($this->dbo()->affected_rows)){
					$resp['count'] = $this->dbo()->affected_rows;
				}

				if(isset($record)){$resp['record'] = $record;}
				if($v == 'iCount' && isset($resp['count'])){return $resp['count'];}
			}
		}

		#Boolean - #@NOTE: you can't request boolean (on success) and debug as well
		if($status != 'failed' && $v == 'iBool'){return true;}
		elseif($status == 'failed' || $debug === true){$resp['query'] = $query;}

		$resp['status'] = $status;
		$resp['result'] = $o;

		if(!empty($resp)){return $resp;}
		#@NOTE: This line should never be reached in the program [It indicates an error in code logic]
		#@TODO: log report & return information to indicate error - oExit('an unknown critical error occurred')
		return false;
	}





	//RUNSQLPREP • Perform Prepared Query & Return Custom Result (statement object) #@TODO ~ NOT DONE YET
	public function runSQLPrep($q='', $v='iFetch', $debug=false){
		if(empty($this->connected)){return $this->oExit('disconnected');}

		$query['syntax'] = $q;
		$stmt = $this->dbo()->prepare($q);
		if($stmt !== false && $stmt->execute()){
			if($stmt === true){$status = 'complete';}
			else {
				$status = 'success';
				// if($v == 'r'){}
				// 	elseif($v == 'iFetchRow'){$record = $stmt->fetch;}
				// elseif($v == 'iFetchRows'){while($row = $o->fetch()){$record[] = $row;}}


				#Only for SELECT
				if($v == 'iNumRows'){
					$stmt->store_result();
					$resp['count'] = $stmt->num_rows;
				}

				#Only for INSERT, UPDATE & DELETE
				if($v == 'iAffectedRows'){
					$resp['count'] = $stmt->affected_rows;
				}

				if(isset($record)){$resp['record'] = $record;}
			}
		}
		else {
			$status = 'failed';
			$query['error'] = $this->error();
			$query['code'] = $this->error('iCode');
		}

		#Boolean - #@NOTE: you can't request boolean (on success) and debug as well
		if($status != 'failed' && $v == 'iBool'){return true;}
		elseif($status == 'failed' || $debug === true){$resp['query'] = $query;}

		$resp['status'] = $status;
		$resp['result'] = $stmt;

		if(!empty($resp)){return $resp;}
		#@NOTE: This line should never be reached in the program [It indicates an error in code logic]
		#@TODO: log report & return information to indicate error - oExit('an unknown critical error occurred')
		return false;
	}




	//CREATEDB • Create Database
	public function createDB($name=''){
		if(!empty($name)){
			$q = "CREATE DATABASE IF NOT EXISTS `{$name}` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci";
			return $this->SQL($q, 'iBool');
		}
		return false;
	}





	//ISDB • Check If Database Exist
	public function isDB($name=''){
		if(!empty($name)){
			$q = "SELECT SCHEMA_NAME AS `database` FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '{$name}'"; #$q = "SHOW DATABASES LIKE '{$name}'";
			$o = $this->SQL($q, 'iCount');
			if($o > 0){return true;}
		}
		return false;
	}





	//USEDB • Select Database For Use
	public function useDB($name=''){
		if(!empty($name)){
			if($this->isDB($name)){
				return $this->dbo()->select_db($name);
			}
		}
		return false;
	}





	//DELETEDB • Delete Database
	public function deleteDB($name=''){
		if(!empty($name)){
			$q = "DROP DATABASE IF EXISTS `{$name}`";
			return $this->SQL($q, 'iBool');
		}
		return false;
	}





	//CREATETB • Create Table
	public function createTB($name='', $engine='INNODB'){
		if(!empty($name) && !empty($engine)){
			$q = "CREATE TABLE IF NOT EXISTS `{$name}` (";
			$q .=
			"`auid` bigint(20) NOT NULL AUTO_INCREMENT,
			`euid` char(40) NOT NULL,
			`suid` char(70) NOT NULL,
			`puid` char(20) NOT NULL,
			`logid` char(90) DEFAULT 'oNONE',
			`author` varchar(80) DEFAULT 'oSYS',
			`entry` varchar(10) DEFAULT NULL,
			`status` varchar(10) DEFAULT NULL,
			`created` datetime DEFAULT CURRENT_TIMESTAMP,
			`updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
			`title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
			`amount` decimal(13,2) DEFAULT NULL,
			PRIMARY KEY (`auid`),
			UNIQUE KEY `euid` (`euid`),
			UNIQUE KEY `suid` (`suid`),
			KEY `puid` (`puid`),
			KEY `logid` (`logid`),
			KEY `author` (`author`),
			KEY `entry` (`entry`),
			KEY `status` (`status`),
			KEY `created` (`created`),
			KEY `updated` (`updated`)";
			$q .= ") ENGINE={$engine} AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;";
			return $this->SQL($q, 'iBool');
		}
		return false;
	}




	//FKEY • Foreign Key Check (on/off)
	public function checkFK($i=true){
		$q = "SET FOREIGN_KEY_CHECKS = ";
		if($i === true){$q .= 1;}
		else {$q .= 0;}
		return $this->SQL($q, 'iBool');
	}





	//ISTB • Check If Table Exist
	public function isTB($name=''){
		if(!empty($name)){
			$q = "SHOW TABLES LIKE '{$name}'";
			$o = $this->SQL($q, 'iCount');
			if($o > 0){return true;}
		}
		return false;
	}





	//RESETAI • Reset Auto Increment ID
	public function resetAI($table='', $column='auid'){
		if(!empty($table) && !empty($column)){
			$q = '';
			$q .= "SET FOREIGN_KEY_CHECKS = 0;";
			$q .="SET @NewID = 0;";
			$q .="UPDATE `{$table}` SET `{$column}`=(@NewID := @NewID +1) ORDER BY `{$column}`;";
			$q .="ALTER TABLE `{$table}` AUTO_INCREMENT = 1;";
			$q .= "SET FOREIGN_KEY_CHECKS = 1;";
			return $this->dbo->multi_query($q);
		}
		return false;
	}





	//WIPETB • Clear/Truncate Table
	public function wipeTB($name='', $fkey=''){
		if(!empty($name)){
			if($this->isTB($name)){
				if(empty($fkey)){
					$q = "TRUNCATE `{$name}`";
					return $this->SQL($q, 'iBool');
				}
				elseif($fkey == 'iSkipFK') {
					$q = "SET FOREIGN_KEY_CHECKS = 0;";
					$q .= "TRUNCATE `{$name}`";
					$q .= "SET FOREIGN_KEY_CHECKS = 1;";
					return $this->dbo->multi_query($q);
				}
			}
		}
		return false;
	}





	//DELETETB • Delete Table
	public function deleteTB($name='', $fkey=''){
		if(!empty($name)){
			if(empty($fkey)){
				$q = "DROP TABLE IF EXISTS `{$name}`";
				return $this->SQL($q, 'iBool');
			}
			elseif($fkey == 'iSkipFK') {
				$q = "SET FOREIGN_KEY_CHECKS = 0;";
				$q .= "DROP TABLE IF EXISTS `{$name}`";
				$q .= "SET FOREIGN_KEY_CHECKS = 1;";
				return $this->dbo->multi_query($q);
			}
		}
		return false;
	}





	//RECORDIS • Check If Record Exists
	public function recordIs($table='', $column='', $value='', $symbol='='){
		#@TODO ~ validate input
		$q = "SELECT `{$column}` FROM `{$table}` WHERE `{$column}` {$symbol} '{$value}'";
		$o = $this->SQL($q, 'iCount');
		if($o > 0){return true;}
		return false;
	}





	//COMMIT • [auto commit & commit]
	public function commit($v='iAuto', $i=false){
		if(!empty($v)){
			if($v == 'iAuto'){
				return $this->dbo()->autocommit($i);
			}
			return $this->dbo()->commit();
		}
	}





	//TRANSACT • Returns $mysqli->begin_transaction()
	public function transact($flag=''){
		$flags = array(MYSQLI_TRANS_START_READ_ONLY, MYSQLI_TRANS_START_READ_WRITE, MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
		if(!in_array($flag, $flags)){$this->oExit('invalid flag for transact', $flag);}
		return $this->dbo()->begin_transaction($flag);
	}





	//ROLLBACK • Returns $mysqli->rollback()
	public function rollback(){
		return $this->dbo()->rollback();
	}





	//DISCONNECT • @TODO ~ Close & Disconnect Connection
	public function disconnect(){
		$this->cleanup();
		$this->dbo()->close();
		$this->connected = 0;
		return;
	}





} // EndOfClass - oMySQLi