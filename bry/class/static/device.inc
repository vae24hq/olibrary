<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oDevice ~ Detect User Device • DEPENDENCY» detect
 */
class oDevice {
	//ISVALID • Return TRUE/FALSE on device type
	public static function IsValid($type=''){
		if(!empty($type)){
			$types = array('iDesktop', 'iTablet', 'iPhone');
			if(!empty($type) && in_array($type, $types)){return true;}
		}
		return false;
	}


	//METHOD • Describe method
	public static function FuncName(){return;}


} // EndOfClass - oDevice