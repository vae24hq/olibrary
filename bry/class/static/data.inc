<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oData ~ Summary of Class • DEPENDENCY»
 */
class oData {

	public static function ToObject($i=''){
		if(!oString::IsEmpty($i)){
			if(is_array($i)){
				$o = new stdClass();
				foreach($i as $key => $value){$o->$key = $value;}
				return $o;
			}
		}
		return false;
	}





	public static function To($i='', $v='iObject'){
		if(!empty($i)){
			if($v == 'iObject'){return self::ToObject($i);}
		}
		return false;
	}





	//GUID • Auto populate queryset with puid|euid|suid
	public static function GUID($queryset=''){
		$data = array();
		if(empty($queryset)){$queryset = array();}
		if(!array_key_exists('puid', $queryset)){$data['puid'] = oRandom::Create('iPuid');}
		if(!array_key_exists('euid', $queryset)){$data['euid'] = oRandom::Create('iEuid');}
		if(!array_key_exists('suid', $queryset)){$data['suid'] = oRandom::Create('iSuid');}
		return array_merge($data, $queryset);
	}


} // EndOfClass - oData