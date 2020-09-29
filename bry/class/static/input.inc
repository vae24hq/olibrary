<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oInput ~ Input Utility • DEPENDENCY» string
 */
class oInput {
	//METHOD • Returns data from post/get/request
	public static function Method($i='iPost', $v=''){
		if(!empty($i)){
			if($i == 'iRequest' && !empty($_REQUEST)){$o = $_REQUEST;}
			elseif($i == 'iGet' && !empty($_GET)){$o = $_GET;}
			elseif($i == 'iPost' && !empty($_POST)){$o = $_POST;}
			elseif($i == 'iSession' && !empty($_SESSION)){$o = $_SESSION;}
		}
		if(!empty($o)){
			if(oString::IsEmpty($v) === false && oString::IsEmpty($o[$v]) === false){
				$o = $o[$v];
			}
			return $o;
		}
		return false;
	}


} // EndOfClass - oInput