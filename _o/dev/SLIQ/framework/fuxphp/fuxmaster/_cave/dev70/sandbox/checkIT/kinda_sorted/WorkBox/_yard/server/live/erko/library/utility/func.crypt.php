<?php
/* Cigna™ - a micro web content management system by QuickOne™
 * SiEMO™ Nigeria [www.siemo.com.ng]
 * Author(s) -> Crieg A. Siemo ~ www.iamsiemo.com // crieg@siemo.com.ng
 * © August 2014 | version 1.0 beta
 * PHP | func:crypt - encryption & reverse encryption
 * Dependency » 
 */
	
	function doCrypt($value = '', $pattern = 'flexi'){
		if(!empty($value)){	
			if ($pattern == 'crypt'){$crypt = hash("md5", $value); $crypt = sha1($crypt); $crypt = md5($crypt);}
			elseif($pattern == 'strict'){$crypt = md5($value);}
			elseif ($pattern == 'reverse'){$crypt = base64_decode($value);}
			else {$crypt = base64_encode($value);}
		}
		else { die ('Could not perform CRYPT operation');}
		return $crypt;
	}
?>