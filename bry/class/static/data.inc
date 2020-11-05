<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oData ~ Summary of Class • DEPENDENCY»
 */
class oData {
	//oEXIT • Report Error & Exit Program
	private function oExit($i='', $v=''){
		if(!empty($i)){return oExit::run('oData', $i, $v);}
		return false;
	}





	public static function to_object($i=''){
		if(!oString::is_empty($i)){
			if(is_array($i)){
				$o = new stdClass();
				foreach($i as $key => $value){$o->$key = $value;}
				return $o;
			}
		}
		return false;
	}





	public static function to($i='', $v='iObject'){
		if(!empty($i)){
			if($v == 'iObject'){return self::to_object($i);}
		}
		return false;
	}





	//GUID • Auto populate queryset with puid|euid|suid
	public static function guid($queryset=''){
		$data = array();
		if(empty($queryset)){$queryset = array();}
		if(!array_key_exists('puid', $queryset)){$data['puid'] = oRandom::Create('iPuid');}
		if(!array_key_exists('euid', $queryset)){$data['euid'] = oRandom::Create('iEuid');}
		if(!array_key_exists('suid', $queryset)){$data['suid'] = oRandom::Create('iSuid');}
		return array_merge($data, $queryset);
	}




	//SIMPLIFY • Interpret or Convert Data to Meaning
	public static function simplify($i, $v=''){
		if(!ostring::is_empty($i) && !ostring::is_empty($v)){
			if(!is_array($i)){
			}
			else {
					#SEX/GENDER
				if($v == 'iGender' || $v == 'iSex'){
					if($i == 1){$o = 'male';}
					elseif($i == 'male'){$o = 1;}
					elseif($i == 2){$o = 'female';}
					elseif($i == 'female'){$o = 2;}
				}
			}
		}

		if(isset($o) && !ostring::is_empty($o)){return $o;}
		return self::oExit(__FUNCTION__,'requires all argument');
	}
} // EndOfClass - oData