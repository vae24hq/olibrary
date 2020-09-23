<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oSSL ~ Handling SSL • DEPENDENCY» <session|redirect>
 */
class oSSL {
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


	//HTTPs • Returns boolean on HTTPs check
	public static function HTTPs(){
		$o = false; $https = 'inactive'; $port = 'default';
		if(!empty($_SERVER['HTTPS'])){$https = $_SERVER['HTTPS'];}
		if($https !== 'inactive'){$https == 'active';}
		if(!empty($_SERVER['SERVER_PORT'])){$port = $_SERVER['SERVER_PORT'];}
		if($https == 'active' || $port == 443){$o = true;}
		elseif(!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'){$o = true;}
		elseif(!empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on'){$o = true;}
		return $o;
	}


	#IMPOSE SSL • IMPOSE SSL on URL ~  also starts session
	public static function ImposeSSL($url='', $move=false){
		oSession::Start();
		if(empty(oSession::Is('oSSL')) || oSession::Is('oSSL') !== 'imposed'){
			$protocol = self::HTTPs() ? 'https' : 'http';
			if($protocol !== 'https'){
				$o = 'https://';
				if(!empty($url)){$o .= $url;}
				else {
					if(!empty($_SERVER['HTTP_HOST'])){$o .= $_SERVER['HTTP_HOST'];}
					if(!empty($_SERVER['REQUEST_URI'])){$o .= $_SERVER['REQUEST_URI'];}
				}
				if(filter_var($o, FILTER_VALIDATE_URL) !== false){
					oSession::Is('oSSL','imposed');
					if($move === true){header('HTTP/1.1 301 Moved Permanently');}
					oRedirect::ExitTo($o);
				}
			}
		}
	}


} // EndOfClass - oSSL