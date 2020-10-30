<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oPDO ~ PDO Utility • DEPENDENCY»
 */
class oPDO {
	public $dbo; #connection object (mysqli)
	private $host;
	private $user;
	private $pw;
	private $name;
	private $persist;





	//CONSTRUCT • PDO Connection
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
		if(!empty($i)){return oExit::Run('oPDO', $i, $v);}
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





	//CONNECT • Initiate Database Connection
	public function connect(){
		try {
			$dsn = 'mysql:dbname='.$this->name.';host='.$this->host.';charset=utf8';
			if($this->persist === true){$pdo = new PDO($dsn, $this->user, $this->pw, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::ATTR_PERSISTENT => true));}
			else {$pdo = new PDO($dsn, $this->user, $this->pw, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));}
		} catch (PDOException $e){
			$this->oExit('connection failed', $e->getMessage());
		}
		$this->dbo = $pdo;
		return;
	}





	//DBO • Connection Object
	public function dbo(){
		if(!empty($this->dbo)){return $this->dbo;}
		return false;
	}





	//MULTISQL • Prepare Multi-SQL Statement
	private function multiSQL($sql=''){
		$this->dbo()->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);
		if(is_array($sql)){
			$multi_query = '';
			foreach($sql as $query){
				$multi_query .= $query.'; ';
			}
			$sql = $multi_query;
		}
		return $sql;
	}





	//EXEC • PDO::exec — Execute an SQL statement and return the number of affected rows
	public function exec($sql='', $multi=false){
		if(!empty($sql)){
			if($multi === true){
				$sql = $this->multiSQL($sql);
				return $this->dbo()->exec($sql);
			}
			return $this->dbo()->exec($sql);
		}
		return $this->oExit(__METHOD__.' requires query');
	}





	//QUERY • PDO::query — Executes an SQL statement, returning a result set as a PDOStatement object
	public function query($sql='', $multi=false){
		if(!empty($sql)){
			if($multi === true){
				$sql = $this->multiSQL($sql);
				$stmt = $this->dbo()->prepare($sql);
				$stmt->execute();
				return $stmt;
			}
			return $this->dbo()->query($sql);
		}
		return $this->oExit(__METHOD__.' requires query');
	}

















































	//ERROR • Returns PDO Error
	public function error($i='iMessage'){
		if(!empty($i)){
			if($i == 'iCode'){return $this->dbo()->errno;}
			elseif($i == 'iMessage'){return $this->dbo()->error;}
		}
		return $this->oExit('['.__METHOD__.']','argument required - $i');
	}











	//COMMIT • [auto commit & commit]
	public function commit($v='iAuto', $i=false){
		if(!empty($v)){
			if($v == 'iAuto'){return $this->dbo->autocommit($i);}
			return $this->dbo->commit();
		}
	}



	//TRANSACT • Returns $PDO->begin_transaction()
	public function transact($flag=''){
		$flags = array(PDO_TRANS_START_READ_ONLY, PDO_TRANS_START_READ_WRITE, PDO_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
		if(!in_array($flag, $flags)){$this->oExit('invalid flag for transact', $flag);}
		return $this->dbo->begin_transaction($flag);
	}



	//ROLLBACK • Returns $PDO->rollback()
	public function rollback(){
		return $this->dbo->rollback();
	}











	//DISCONNECT • @TODO ~ Close & Disconnect Connection
	public function disconnect(){
		$this->cleanup();
		$this->dbo()->close();
		$this->connected = 0;
		return;
	}





} // EndOfClass - oPDO