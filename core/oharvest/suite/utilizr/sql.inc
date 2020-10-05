<?php
class oSQL {
	public $dbo;

	function __construct($config=''){
		$db = new oDatabase($config);
		$this->dbo = $db->connect();
	}

	function SQL($query){
		$o['syntax'] = $query;

		$stmt = $this->dbo->prepare($query);
		$exec = $stmt->execute();

		if($exec === true){
			$o['executed'] = true;
			$o['record'] = $stmt->rowCount();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if($result != false && !empty($result)){
				$o['recordset'] = $result;
			}
			else {
				$o['recordset'] = false;
			}
		}
		else {
			$o['executed'] = false;
			$o['sql_error'] = $stmt->errorInfo()[2];
		}

		return $o;
	}



	function Report($type, $v){
		$report = array();
		if($type == 'error'){
			$report['status'] = 'failed';
			$report['reason'] = $v;
			return $report;
		}
		elseif($type == 'success'){
			$report['status'] = 'success';
			if(!empty($v['record'])){$report['record'] = $v['record'];}
			if(!empty($v['recordset'])){$report['recordset'] = $v['recordset'];}
			return $report;
		}
	}


	function Response($type, $o, $query='', $debug=false){
		if($debug === false){
			$response = $this->Report($type, $o);
		}
		else {
			$response = $this->Report($type, $o);
			if(!empty($query['syntax'])){$response['debug'] = $query['syntax'];}
		}
		return $response;
	}


	function Handler($syntax, $debug=false){
		$query = $this->SQL($syntax);
		$o = array();

		if(empty($query['executed']) || $query['executed'] === false){
			if(!empty($query['sql_error'])){$e = $query['sql_error'];}
			else {$e = 'Unknown ERROR - query execution failed';}
			return $this->Response('error', $e, $syntax, $debug);
		}
		else {
			if(!empty($query['record'])){$o['record'] = $query['record'];} else {$o['record'] = 'no_record';}
			if(!empty($query['recordset'])){$o['recordset'] = $query['recordset'];}
			return $this->Response('success', $o, $query, $debug);
		}
	}
}