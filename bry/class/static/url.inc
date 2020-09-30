<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oURL ~ URL utility • DEPENDENCY»
 */
class oURL {
	//METHOD • Returns URL referrer
	public static function ref(){
		if(!empty($_SERVER['HTTP_REFERER'])){return strtolower($_SERVER['HTTP_REFERER']);}
		return false;
	}


	//TO DOMAIN • Convert url to domain
	public static function ToDomain($url=''){
		if(empty($url)){

#prepare & return result
			$task = $url;
			$task = stringSwap($task, 'https://', '', 'first');
			$task = stringSwap($task, 'http://', '', 'first');
			$task = stringSwap($task, 'www.', '', 'first');
			$task = stringSwap($task, '/', '', 'last');
			return $task;
		}
		return false;
	}

} // EndOfClass - oURL