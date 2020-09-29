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
			if($i == 'iRequest' && oString::IsEmpty($_REQUEST)  === false){$o = $_REQUEST;}
			elseif($i == 'iGet' && oString::IsEmpty($_GET)  === false){$o = $_GET;}
			elseif($i == 'iPost' && oString::IsEmpty($_POST)  === false){$o = $_POST;}
			elseif($i == 'iSession' && oString::IsEmpty($_SESSION)  === false){$o = $_SESSION;}
		}
		if(!empty($o)){
			// if(oString::IsEmpty($v) === false && isset($o[$v])){
			// 	$o = $o[$v];
			// }
			if(oString::IsEmpty($v) === false){
				if(isset($o[$v])){return $o[$v];}
				return false;
			}
			return $o;
		}
		return false;
	}


} // EndOfClass - oInput