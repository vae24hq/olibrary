<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oFile ~ File & Directory Utility • DEPENDENCY» <exit>
 */
class oFile {
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


	//Is • Returns TRUE/FALSE if file or directory is valid & exist
	public static function Is($path='', $type='iFILE'){
		if($type === 'iFILE'){
			if(is_dir($path)){return false;}
			elseif(is_file($path) === false){return false;}
			return true;
		}
		elseif($type === 'iDIR'){
			if(is_dir($path) === false){return false;}
			return true;
		}
	}


	//InCheck • Check file existence before include/require
	public static function InCheck($path){
		if(self::Is($path, 'iFILE') === false){
			return oExit::E404($path);
		}
		return true;
	}


	//In • RETURNS required -file when its valid & exist
	public static function Inc($path, $i='isRequired'){
		if($i == 'isRequired'){
			self::InCheck($path);
			require $path;
			return;
		}
		else {
			if(self::Is($path, 'iFILE') !== false){
				require $path;
				return;
			}
		}
	}


} // EndOfClass - oFile