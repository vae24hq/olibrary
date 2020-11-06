<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
* Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
* ============================================================================================
* oSQL ~ SQL Query Builder • DEPENDENCY»
*/
class oSQL {

		//GUID • Auto populate queryset with puid|euid|suid
	public static function guid($queryset=''){
		$data = array();
		if(empty($queryset)){$queryset = array();}
		if(!array_key_exists('puid', $queryset)){$data['puid'] = oRandom::Create('iPuid');}
		if(!array_key_exists('euid', $queryset)){$data['euid'] = oRandom::Create('iEuid');}
		if(!array_key_exists('suid', $queryset)){$data['suid'] = oRandom::Create('iSuid');}
		return array_merge($data, $queryset);
	}




	//PREP • Remove empty fields for dataset
	public static function prep($data){
		$o = array();
		foreach($data as $label => $value){
			if(!oString::is_empty($value)){$o[$label] = $value;}
		}
		return $o;
	}




	//INSERT_QUERY • Build SQL Insert Query
	public static function insert($table, $data, $use='iParam'){
		$columns = ''; $values = '';

		#using named parameters
		if($use == 'iParam'){
			foreach($data as $column => $value){
				$columns .= "`{$column}`, ";
				$values .= ":{$column}, ";
			}
		}

		#using named values
		else {
			foreach($data as $column => $value){
				$columns .= "`{$column}`, ";
				$values .= "'{$value}', ";
			}
		}
		if(!empty($columns)){$columns = oString::to($columns, ', ', '', 'iLast');}
		if(!empty($values)){$values = oString::to($values, ', ', '', 'iLast');}
		$sql = "INSERT INTO `{$table}` ({$columns}) VALUES ({$values});";
		return $sql;
	}
} // EndOfClass - oSQL