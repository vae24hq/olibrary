<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oDatabase ~ database utility class • DEPENDENCY»
 */
class oDatabase {
	#class objects
	private $host;
	private $user;
	private $password;
	private $name;
	private $driver;
	private $persist;
	public $dbo;





	#CONSTRUCT • Connection
	public function __construct($config=''){
		if($this->init($config) === true){
			$this->connect();
			return true;
		}
		return false;
	}





	#oEXIT • Report error & exit program
	private function oExit($i='', $v=''){
		if(!empty($i)){
			return oExit::Run('oDatabase', $i, $v);
		}
		return false;
	}





	#INIT • Initialize configuration
	protected function init($i=''){
		if(!empty($i) && is_array($i)){
			#remove database name if set to none
			if(isset($i['name']) && $i['name'] == 'oNONE'){
				unset($i['name']);
			}

			foreach($i as $k => $v){
				$this->{$k} = $v;
			}
			return true;
		}
		return false;
	}





	#SET • Set [driver] for connection
	public function set($i='', $set='iDriver'){

		#Set driver for connection
		if($set == 'iDriver'){
			$drivers = ['iPDO', 'iMySQLi'];
			if(empty($i) && !empty($this->driver)){$driver = $this->driver;}
			if(empty($driver)){return $this->oExit('driver required', __FUNCTION__);}
			return $driver;
		}
	}





	#IS_CONFIG • Confirm required data for connection
	public function isConfig(){
		if(!isset($this->host)){return $this->oExit('~server');}
		if(!isset($this->user)){return $this->oExit('~user');}
		if(!isset($this->password)){return $this->oExit('~password');}
		#if(!isset($this->name)){return $this->oExit('~database');}
		#if(!isset($this->driver)){return $this->oExit('~driver');}
		return true;
	}





	#IS_CON • Confirm validity of connection
	public function isCon($i='', $driver=''){
		if(empty($i) || empty($driver)){
			return $this->oExit('argument(s) required', __FUNCTION__);
		}
		//TODO: verify [$i] is valid PDO connection resource
		#return $this->oExit('no connection found');

		return true;
	}





	#CONNECT • Initiate connection
	public function connect($i='', $driver=''){
		$driver = $this->set($driver, 'iDriver');

		#using [$connection] as connection resource
		if(!empty($i)){
			$this->isCon($i, $driver); #validate connection
			return $i;
		}

		#create connection using class instance
		$this->isConfig();

		if($driver == 'iPDO'){
			try {
				$dsn = 'mysql:dbname='.$this->name.';host='.$this->host.';charset=utf8';
				if($this->persist === true){
					$pdo = new PDO($dsn, $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::ATTR_PERSISTENT => true));
				}
				else {
					$pdo = new PDO($dsn, $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				}
			} catch (PDOException $e){
				$this->oExit('connection failed', $e->getMessage());
			}
			$this->dbo = $pdo;
			return true;
		} #end using iPDO


		if($driver == 'iMySQLi'){
		} #end using iMySQLi
	}





	#GET_CON • Get connection
	public function getCon($i=''){
		if(!empty($i)){$dbo = $i;}
		elseif(!empty($this->dbo)){$dbo = $this->dbo;}
		return $dbo;
	}





	#EXEC • execute SQL [INSERT, UPDATE & DELETE] & return false or number of rows affected (number or zero)
	public function exec($sql, $driver='', $con=''){
		$driver = $this->set($driver, 'iDriver');
		if($driver == 'iPDO'){
			$dbo = $this->getCon($con);
			$exec = $dbo->exec($sql);
			#exec failed
			if($exec === false){
				$error = $dbo->errorInfo();
				$o['error'] = 'execution failed';
				if(isset($error[2])){$o['reason'] = $error[2];}
				if(isset($error[1])){$o['code'] = $error[1];}
			}

			#exec success
			else {
				$o['success'] = 'query executed';
				$o['count'] = $exec;
			}
		} #end using iPDO


		if($driver == 'iMySQLi'){
		} #end using iMySQLi


		if(!empty($o)){return $o;}
		return false;
	}





	#USE • Use database
	public function use($i='', $driver=''){

	}





	#CREATE • Create [database|table]
	public function create($i='', $v=''){
		if(!empty($i)){
			if($v == 'iDatabase'){
				$sql = "CREATE DATABASE IF NOT EXISTS `{$i}` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci";
				$result = $this->exec($sql);
				return $result;
			}

			elseif($v == 'iTable'){
				if(!is_array($i)){$table = $i;}
				else {
					if(!empty($i['name'])){$table = $i['name'];}
					if(!empty($i['engine'])){$engine = $i['engine'];}
				}
				if(empty($engine)){$engine = 'INNODB';}

				$sql = "CREATE TABLE IF NOT EXISTS `{$table}`
				(`auid` bigint(20) NOT NULL AUTO_INCREMENT,
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
				KEY `updated` (`updated`))
				ENGINE={$engine} AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;";
				$result = $this->exec($sql);
				return $result;
			}
		}
		return false;
	}





	#DESTROY • Destroy [database|table]
	public function destroy($i='', $v=''){
		if(!empty($i)){
			if($v == 'iDatabase'){
				$sql = "DROP DATABASE IF EXISTS `{$i}`";
				$result = $this->exec($sql);
				return $result;
			}

			if($v == 'iTable'){
				$sql = "DROP DATABASE IF EXISTS `{$i}`";
				$result = $this->exec($sql);
				return $result;
			}
		}
		return false;
	}




	#CLEANUP • Clean Configuration
	public function cleanup(){
		if(isset($this->host)){unset($this->host);}
		if(isset($this->user)){unset($this->user);}
		if(isset($this->password)){unset($this->password);}
		if(isset($this->name)){unset($this->name);}
		if(isset($this->persist)){unset($this->persist);}
		if(isset($this->driver)){unset($this->driver);}
		return true;
	}






	#DISCONNECT • Close & disconnect connection
	public function disconnect(){
		if($this->driver == 'iPDO'){
			$this->dbo()->close();
		}
		$this->cleanup();
		return true;
	}






























		#EXEC • prepare & return report for (after) PDO execute
	public function execsss($execute, $stmt, $i=''){
		$o = array();

		if(isset($i['query'])){$o['query'] = $i['query'];}
		if(isset($i['input'])){$o['input'] = $i['input'];}

		#execution failed
		if($execute === false){
			$error = $stmt->errorInfo();
			$o['error'] = 'execution failed';
			if(isset($error[2])){$o['reason'] = $error[2];}
			if(isset($error[1])){$o['code'] = $error[1];}
		}

		if(!empty($o)){return $o;}
		return false;
	}




} // EndOfClass - oDatabase