<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oIP ~ IP Handling • DEPENDENCY»
 */
class oIP {
	//REMOTE • Get user IP
	public static function Remote(){
		if(!empty($_SERVER['HTTP_CLIENT_IP'])){$o = $_SERVER['HTTP_CLIENT_IP'];} #IP from share Internet
		elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){$o = $_SERVER['HTTP_X_FORWARDED_FOR'];} #IP pass from proxy
		else {$o = $_SERVER['REMOTE_ADDR'];} #IP from remote server
		return $o;
	}


} // EndOfClass - oIP