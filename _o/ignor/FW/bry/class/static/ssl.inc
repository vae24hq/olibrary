<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oSSL ~ Handling SSL • DEPENDENCY» <redirect> + session
 */
class oSSL {
	//HTTPs • Returns boolean on HTTPs check
	public static function https(){
		$o = false; $https = 'inactive'; $port = 'default';
		if(!empty($_SERVER['HTTPS'])){$https = $_SERVER['HTTPS'];}
		if($https !== 'inactive'){$https == 'active';}
		if(!empty($_SERVER['SERVER_PORT'])){$port = $_SERVER['SERVER_PORT'];}
		if($https == 'active' || $port == 443){$o = true;}
		elseif(!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'){$o = true;}
		elseif(!empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on'){$o = true;}
		return $o;
	}


	//REDIRECT • redirect URL to use HTTPS
	public static function redirect($url='', $permant=false){
		$protocol = self::https() ? 'https' : 'http';
		if($protocol !== 'https'){
			$o = 'https://';
			if(!empty($url)){$o .= $url;}
			else {
				if(!empty($_SERVER['HTTP_HOST'])){$o .= $_SERVER['HTTP_HOST'];}
				if(!empty($_SERVER['REQUEST_URI'])){$o .= $_SERVER['REQUEST_URI'];}
			}
			if(filter_var($o, FILTER_VALIDATE_URL) !== false){
				$_SESSION['oSSL'] = 'imposed';
				if($permant === true){
					header('HTTP/1.1 301 Moved Permanently');
				}
				return oRedirect::oExit($o);
			}
		}
	}


	//IMPOSE • force URL to use HTTPS
	public static function impose($enforce=true, $url='', $permant=false){
		if($enforce === true){#always attempt redirect
			return self::redirect($url, $permant);
		}
		else {#ignore after first attempt to redirect
			if(session_status() !== PHP_SESSION_ACTIVE){
			#@TODO ~ change below To - trigger HALT error [requiring $session->start() call]
			#exit('ImposeSSL Requires Session Start');
			}
			if(empty($_SESSION['oSSL']) || $_SESSION['oSSL'] !== 'imposed'){
				return self::redirect($url, $permant);
			}
		}
		return false;
	}
} // EndOfClass - oSSL