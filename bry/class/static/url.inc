<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oURL ~ URL utility • DEPENDENCY» string
 */
class oURL {
	//REF • Returns referrer
	public static function ref(){
		oServer::ref();
	}


	public static function name($link){
		if(!empty($link)){
			$o = $link;
			$o = parse_url($o, PHP_URL_PATH);
			$o = basename($o);
			$o = oString::to($o, '.php', '', 'iLast');
			$o = oString::to($o, '.inc', '', 'iLast');
			$o = oString::to($o, '.html', '', 'iLast');
			if(!oString::is_empty($o)){return strtolower(trim($o));}
		}
		return false;
	}


	//URI • Returns URI
	public static function uri(){
		oServer::uri();
	}


	//TO_DOMAIN • Get Domain from URL
	public static function domain($url='', $lib=''){
		if(!empty($url)){
			if(empty($lib)){
				$lib = array('https://', 'http://', 'www.', 'api.', 'app.', 'en.', 'uk.', 'us.', 'ng.');
			}
			foreach($lib as $value){
				$url = oString::to($url, $value, '', 'iFirst');
			}
			$url = oString::to($url, '/', '', 'iLast');
			return $url;
		}
		return false;
	}
} // EndOfClass - oURL