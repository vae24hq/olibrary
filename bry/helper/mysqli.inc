<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oSQLi ~ MySQLi Utility • DEPENDENCY»
 */
class oSQLi {
	public $dbo;

	//CONSTRUCT • Initiate DB Connection
	public function __construct($config=''){
		$database = new oDatabase($config, 'iMySQLi');
		$this->dbo = $database->connection();
		return;
	}



	//QUERY •
	public function query($sql=''){
		if(!empty($sql)){
			return $this->dbo->query($sql);
		}
		return false;
	}
















	//ERROR • [mysqli error]
	public function error($i='iMsg'){
		if(!empty($i)){
			if($i == 'iCode'){return $this->dbo->errno;}
			elseif($i == 'iMsg'){return $this->dbo->error;}
		}
		return false;
	}



	//TRANSACTION •
	public function transaction($flag=''){
		$flags = array(MYSQLI_TRANS_START_READ_ONLY, MYSQLI_TRANS_START_READ_WRITE, MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
		if(!in_array($flag, $flags)){oExit::Run('oSQLi', 'flag invalid for begin_transaction', $flag);}
		return $this->dbo->begin_transaction($flag);
	}



	//COMMIT • [auto commit & commit]
	public function commit($type='auto', $i=false){
		if(!empty($type)){
			if($type == 'auto'){return $this->dbo->autocommit($i);}
			return $this->dbo->commit();
		}
	}



	//ROLLBACK •
	public function rollback(){
		return $mysqli->rollback();
	}







	//QUERY • [multi query]
	public function queries($sql=''){
		if(!empty($sql)){
			return $this->dbo->multi_query($sql);
		}
		return false;
	}



	//RUN QUERY •
	public function run($sql='', $return='iBool'){
		if(!empty($sql)){
			$query['syntax'] = $sql;
			$stmt = $this->dbo->prepare($sql);
			if($stmt === false){
				$query['executed'] = false;
				$query['message'] = $this->error($i='iMsg');
				$query['code'] = $this->error($i='iCode');
			}
			else {
				$exec = $stmt->execute();
				if($exec === true){
					$query['executed'] = true;
					if($return == 'iBool'){return true;}
					elseif($return == 'iAffected'){return $stmt->affected_rows;}
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
					$query['message'] = error($i='iMsg');
					$query['code'] = error($i='iCode');
				}
			}

			if(!empty($query) && is_array($query)){$o['query'] = $query;}

			echo oPrint::Neat($o);
		}
		return false;
	}


} // EndOfClass - oSQLi