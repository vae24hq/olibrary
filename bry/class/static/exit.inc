<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oExit ~ Exit with message • DEPENDENCY» <print>
 */
class oExit {
	//RUN • exit with message
	public static function Run($obj, $msg, $extra=''){
		$o = strtoupper($obj).'::';
		if(!empty($msg)){$o .=' <strong>'.ucfirst($msg).'</strong>';}
		if(!empty($extra)){
			if(is_string($extra)){$o .= ' <small><em>('.$extra.')</em></small>';}
			else {
				$rez['oBJECT'] = $obj;
				$rez['oMESSAGE'] = $msg;
				$rez['oEXTRA'] = $extra;
				oPrint::Neat($rez);
				exit($rez);
			}
		}
		exit($o);
	}





	//NOT FOUND • 404 exit with error message
	public static function E404 ($i='', $msg = '',  $obj=''){
		if(empty($obj)){$obj = 'Resource';}
		if(empty($msg)){$msg = 'Not Available';}
		return self::Run($obj, $msg, $i);
	}
} // EndOfClass - oExit