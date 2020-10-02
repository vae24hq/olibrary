<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oURL ~ URL utility • DEPENDENCY» string
 */
class oURL {
	//REF • Returns URL referrer
	public static function Ref(){
		if(!empty($_SERVER['HTTP_REFERER'])){return strtolower($_SERVER['HTTP_REFERER']);}
		return false;
	}


	//TO DOMAIN • Convert URL to domain
	public static function ToDomain($url='', $lib=''){
		if(!empty($url)){
			if(empty($lib)){
				$lib = array('https://', 'http://', 'www.', 'api.', 'app.', 'en.', 'uk.', 'us.', 'ng.');
			}

			foreach($lib as $value){
				$url = oString::To($url, $value, '', 'iFirst');
			}
			$url = oString::To($url, '/', '', 'iLast');
			return $url;
		}
		return false;
	}


} // EndOfClass - oURL