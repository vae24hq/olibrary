<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oSQLi ~ MySQLi Utility • DEPENDENCY»
 */
class oSQLi {
	protected $dbo;
	private $host;
	private $user;
	private $password;
	private $name;


	//CONSTRUCT •
	public function __construct($i=''){
		$this->config($i);
		$this->connect();
		$this->cleanup();
		return;
	}



	//oEXIT • Report Error & Terminate Program
	public function oExit($i='', $v=''){
		if(!empty($i)){
			oExit::Run('DB-MySQLi', $i, $v);
		}
		return false;
	}



	//ERROR • Return Database Error
	public function error($i='iCode'){return;}



	//CONFIG • Database Configuration
	public function config($i=''){
		if(!empty($i) && is_array($i)){
			foreach($i as $k => $v){$this->{$k} = $v;}
			return true;
		}
		return false;
	}



	//CLEANUP • Clean up Database Configuration
	public function cleanup(){
		unset($this->host);
		unset($this->user);
		unset($this->password);
		unset($this->name);
		return;
	}



	//CONNECT • Initiate Database Connection
	public function connect(){
		@$dbc = new mysqli($this->host, $this->user, $this->password, $this->name);
		if($dbc->connect_error){$this->oExit('connection failed - '.$dbc->connect_errno, $dbc->connect_error);}
		$this->dbo = $dbc;
		return;
	}



	//DBO • Return Database Object [Connection]
	public function dbo(){
		if(!empty($this->dbo)){return $this->dbo;}
		return false;
	}



	//DISCONNECT • @TODO ~ Close & Disconnect Database Connection
	public function disconnect(){
		$this->cleanup();
		$this->dbo->close();
		return;
	}

} // EndOfClass - oMySQLi