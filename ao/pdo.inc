<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oPDO ~ database utility class • DEPENDENCY»
 */
class oPDO
{
	#EXEC • prepare & return report for (after) PDO execute
	public function execsss($execute, $stmt, $i='')
	{
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


	#IS • returns TRUE/FALSE on check [PDO connection]
	public function is($i='', $check='iconnection')
	{
	}

	public function use_conn($conn='')
	{
		if(empty($conn)){


		}
	}


	#DBO • returns PDO connection instance
	public function dbo()
	{
		if(!empty($this->dbo)){
			return $this->dbo;
		}
		return false;
	}









	#EXEC • execute SQL & return false or number of rows affected (number or zero)
	public function exec($sql, $conn='')
	{

	}







} // EndOfClass - oPDO
