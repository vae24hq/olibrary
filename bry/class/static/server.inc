<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oServer ~ Summary of Class • DEPENDENCY»
 */
class oServer {
	//IP VALIDATION • Get user IP
	public static function IsIP($i=''){
		if(!empty($i)){
			$o = ip2long($i);
			if($o !== false && $o !== -1){
				$o = sprintf('%u', $o);
				if ($o >= 0 && $o <= 50331647){return false;}
				if ($o >= 167772160 && $o <= 184549375){return false;}
				if ($o >= 2130706432 && $o <= 2147483647){return false;}
				if ($o >= 2851995648 && $o <= 2852061183){return false;}
				if ($o >= 2886729728 && $o <= 2887778303){return false;}
				if ($o >= 3221225984 && $o <= 3221226239){return false;}
				if ($o >= 3232235520 && $o <= 3232301055){return false;}
				if ($o >= 4294967040){return false;}
			}
			return true;
		}
		return false;
	}



	//REMOTE • Get user IP
	public static function RemoteIP(){
		if(!empty($_SERVER['HTTP_CLIENT_IP'])){$o = $_SERVER['HTTP_CLIENT_IP'];} #IP from share Internet
		elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){$o = $_SERVER['HTTP_X_FORWARDED_FOR'];} #IP pass from proxy
		else {$o = $_SERVER['REMOTE_ADDR'];} #IP from remote server
		return $o;
	}

	public static function RemoteIP2(){
		if(!empty($_SERVER['HTTP_CLIENT_IP']) && Self::IsIP($_SERVER['HTTP_CLIENT_IP'])){
			return $_SERVER['HTTP_CLIENT_IP'];
		}

		if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			if(strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== FALSE){
				$IPs = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
				foreach($IPs as $IP){
					if(Self::IsIP($IP)){return $IP;}
				}
			} else {
				if(Self::IsIP($_SERVER['HTTP_X_FORWARDED_FOR'])){
					return $_SERVER['HTTP_X_FORWARDED_FOR'];
				}
			}
		}

		if(!empty($_SERVER['HTTP_X_FORWARDED']) && Self::IsIP($_SERVER['HTTP_X_FORWARDED'])){
			return $_SERVER['HTTP_X_FORWARDED'];
		}
		if(!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && Self::IsIP($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])){
			return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
		}
		if(!empty($_SERVER['HTTP_FORWARDED_FOR']) && Self::IsIP($_SERVER['HTTP_FORWARDED_FOR'])){
			return $_SERVER['HTTP_FORWARDED_FOR'];
		}
		if(!empty($_SERVER['HTTP_FORWARDED']) && Self::IsIP($_SERVER['HTTP_FORWARDED'])){
			return $_SERVER['HTTP_FORWARDED'];
		}

		return $_SERVER['REMOTE_ADDR'];
	}



	//INFO •
	public static function Info($i='', $r='DomainIP'){
		if(!empty($i)){
			$i = strtolower($i);
			if($i == 'php_ver'){return phpversion();}
			elseif($i == 'apache_ver'){return apache_get_version();}
			elseif($i == 'ip'){return self::RemoteIP();}
			else {
				if(!empty($r)){
					if($r == 'DomainIPs'){return gethostbynamel($i);}
					elseif($r == 'DomainIP'){return gethostbyname($i);}
					elseif($r == 'IPDomain'){return gethostbyaddr($i);}
					elseif($r == 'IsIP'){return self::IsIP($i);}
				}
			}
		}
	}


} // EndOfClass - oServer