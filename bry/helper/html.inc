<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oHTML ~ Summary of Class • DEPENDENCY»
 */
class oHTML {
	private static $Instance;

	//CONSTRUCT • Prevents multiple instantiation
	private function __construct(){return;}

	//CLONE • Prevent duplicate
	private function __clone(){return;}

	//INSTANTIATE • Return fresh instance
	public static function Instantiate(){
		if(is_null(self::$Instance)){
			self::$Instance = new self();
		}
		return self::$Instance;
	}

	//METHOD • Describe method
	public static function FuncName(){return;}

	public static function Charset(){
		if(device::is()=='desktop' && validate_ie('<', 9)){
			$o ='<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		} else {$o ='<meta charset="utf-8">';}
		echo $o."\n";
	}

	public static function xua_compatible(){
		$o ='';
		if(DEVELOPMENT_STAGE !='yeah'){$o ='<meta http-eqbaseuiv="X-UA-Compatible" content="IE=edge,chrome=1">'."\n";}
		echo $o;
	}

	public static function viewport(){
		$o ='';
		if(device::is() !='desktop'){
			$o ='<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=3">'."\n";
		}
		echo $o;
	}


} // EndOfClass - oHTML