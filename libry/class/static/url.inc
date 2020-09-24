<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oURL ~ URL utility • DEPENDENCY»
 */
class oURL {
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


	//METHOD • Returns URL referrer
	public static function ref(){
		if(!empty($_SERVER['HTTP_REFERER'])){return strtolower($_SERVER['HTTP_REFERER']);}
		return false;
	}

} // EndOfClass - oURL