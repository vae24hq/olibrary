<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oArray ~ Array Utility • DEPENDENCY»
 */
class oArray {
	#IS • Returns TRUE/FALSE if input is array
	public static function is($i){
		return is_array($i);
	}





	#IS_MULTI • Returns TRUE/FALSE if input is multi-array
	public static function isMulti($i){
		if(is_array($i)){
			$o = array_filter($i, 'is_array');
			if(count($o) > 0){return true;}
		}
		return false;
	}





} #EndOfClass - oArray