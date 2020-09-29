<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oCrypt ~ Encryption/Decryption • DEPENDENCY»
 */
class oCrypt {
	//BASE64 • Describe method
	public static function Base64($input='', $encode=true){
		if(!empty($input)){
			if($encode === true){
				$o = base64_encode($input);
			}
			else {
				$o = base64_decode($input);
			}
			return $o;
		}
		return false;
	}


} // EndOfClass - oCrypt