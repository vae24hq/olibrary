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
			if($this->persist === true){$pdo = new PDO('mysql:dbname='.$this->name.';host='.$this->host, $this->user, $this->pw, array(PDO::ATTR_PERSISTENT => true));}
			else {$pdo = new PDO('mysql:dbname='.$this->name.';host='.$this->host, $this->user, $this->pw);}
		} catch (PDOException $e){
			$this->oExit('connection failed', $e->getMessage());
		}
		$this->dbo = $pdo;
		return;
	}
















	//ERROR • Return FALSE or PDO Error
	public function error($i='iMessage'){
		if(!empty($i)){
			if($i == 'iCode'){return $this->dbo->errno;}
			elseif($i == 'iMessage'){return $this->dbo->error;}
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



	//QUERY • Returns $PDO->query()
	public function query($sql=''){
		if(!empty($sql)){
			return $this->dbo->query($sql);
		}
		return false;
	}



	//QUERIES • Returns $PDO->muli_query()
	public function queries($sql=''){
		if(!empty($sql)){
			return $this->dbo->multi_query($sql);
		}
		return false;
	}



	//DISCONNECT • @TODO ~ Close & Disconnect Database Connection
	public function disconnect(){
		$this->cleanup();
		$this->dbo->close();
		return;
	}


} // EndOfClass - oPDO