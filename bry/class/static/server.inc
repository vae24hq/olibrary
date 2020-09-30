<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oServer ~ Summary of Class • DEPENDENCY»
 */
class oServer {
	//METHOD • Describe method
	public static function php($i='iPHPVer'){
		if($i == 'iPHPVer'){$o = phpversion();}
		if($task=='iApacheVer'){$o = apache_get_version();}

		if(!empty($o)){return $o;}
	}


	//REMOTE • Get user IP
	public static function RemoteIP(){
		if(!empty($_SERVER['HTTP_CLIENT_IP'])){$o = $_SERVER['HTTP_CLIENT_IP'];} #IP from share Internet
		elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){$o = $_SERVER['HTTP_X_FORWARDED_FOR'];} #IP pass from proxy
		else {$o = $_SERVER['REMOTE_ADDR'];} #IP from remote server
		return $o;
	}


} // EndOfClass - oServer