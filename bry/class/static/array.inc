<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oArray ~ Summary of Class • DEPENDENCY»
 */
class oArray {
	//METHOD • Describe method
	public static function isMulti($array){
		if(is_array($array)){
			$rez = array_filter($array, 'is_array');
			if(count($rez) > 0){return true;}
		}
		return false;
	}


} // EndOfClass - oArray