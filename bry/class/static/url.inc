<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oURL ~ URL utility • DEPENDENCY» string
 */
class oURL {
	//METHOD • Returns URL referrer
	public static function ref(){
		if(!empty($_SERVER['HTTP_REFERER'])){return strtolower($_SERVER['HTTP_REFERER']);}
		return false;
	}


	//TO DOMAIN • Convert URL to domain
	public static function ToDomain($url='', $lib=''){
		if(!empty($url)){
			if(empty($lib)){
				$lib = array('https://', 'http://', 'www.', 'api.', 'app.');
			}

			foreach($lib as $value) {
				echo $value;
			}

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