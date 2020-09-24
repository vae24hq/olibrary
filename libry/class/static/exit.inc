<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oExit ~ Exit with message • DEPENDENCY» <print>
 */
class oExit {
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


	//RUN • exit with message
	public static function Run($obj, $msg, $extra=''){
		$o = strtoupper($obj).'::';
		if(!empty($msg)){$o .=' <strong>'.ucwords($msg).'</strong>';}
		if(!empty($extra)){
			if(is_string($extra)){$o .= ' <small><em>('.$extra.')</em></small>';}
			else {
				$rez['oBJECT'] = $obj;
				$rez['oMESSAGE'] = $msg;
				$rez['oEXTRA'] = $extra;
				oPrint::Neat($rez);
				exit;
			}
		}
		exit($o);
	}


	//NOT FOUND • 404 exit with error message
	public static function E404 ($path='', $msg = '',  $obj=''){
		if(empty($obj)){$obj = 'Resource';}
		if(empty($msg)){$msg = 'Not available';}
		return self::Run($obj, $msg, $path);
	}


} // EndOfClass - oExit