<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oNotify ~ Notification Utility • DEPENDENCY»
 */
class oNotify {
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


	//EMAIL • send email via PHP Mail [returns true/false]
	public static	function Email($data, $type = 'iHTML'){
		if($type == 'iDEFAULT'){
			if(mail($data['to'], $data['subject'], $data['message']) === true){
				return true;
			}
		} elseif($type == 'iHTML'){
			$headers[] = 'MIME-Version: 1.0';
			$headers[] = 'Content-type: text/html; charset=iso-8859-1';
			$headers[] = 'From: '.$data['firm'].'<alert@'.$data['domain'].'>';
			if(mail($data['to'], $data['subject'], $data['message'], implode("\r\n", $headers), '-fwebmaster@'.$data['domain']) === true){
				return true;
			}
		}
		return false;
	}


} // EndOfClass - oNotify