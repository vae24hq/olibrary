<?php
class oDatabase extends mysqli {
	public function __construct(){
		global $oDBData;
		if(!empty($oDBData)){
			parent::__construct($oDBData['host'], $oDBData['user'], $oDBData['password'], $oDBData['database']);
			if ($this->connect_error){
				exit('connection failed [' . $this->connect_errno . '] '.$this->connect_error);
			}
		}
	}
}

$oDatabase = new oDatabase;

class oSQL {
	public static function escape($input){
		global $oDatabase;
		return $oDatabase->real_escape_string($input);
	}

	public static function run($sql){
		global $oDatabase;
		$rez['result'] = $oDatabase->query($sql);
		if(!empty($oDatabase->error)){
			$rez['errMsg'] = $oDatabase->error;
			$rez['errNo'] = $oDatabase->errno;
		}
		else {
			$rez['affectedRows'] = $oDatabase->affected_rows;
			if(is_object($rez['result'])){
				$rez['numRows'] = $rez['result']->num_rows;
			}
		}
		return $rez;
	}
}
?>