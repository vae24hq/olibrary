<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oExit ~ Exit with message • DEPENDENCY» <print>
 */
class oExit {
	#RUN • exit with message
	public static function run($obj, $msg, $extra=''){
		$o = strtoupper($obj).'::';
		if(!empty($msg)){$o .=' <strong>'.ucfirst($msg).'</strong>';}
		if(!empty($extra)){
			if(is_string($extra)){$o .= ' <small><em>('.$extra.')</em></small>';}
			else {
				$res['oBJECT'] = $obj;
				$res['oMESSAGE'] = $msg;
				$res['oEXTRA'] = $extra;
				oPrint::Neat($res);
				exit($res);
			}
		}
		exit($o);
	}





	#E404 • 404 exit with error message
	public static function e404 ($i='', $msg = '',  $obj=''){
		if(empty($obj)){$obj = 'Resource';}
		if(empty($msg)){$msg = 'Not Available';}
		return self::run($obj, $msg, $i);
	}





} #EndOfClass - oExit