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











} // EndOfClass - oData