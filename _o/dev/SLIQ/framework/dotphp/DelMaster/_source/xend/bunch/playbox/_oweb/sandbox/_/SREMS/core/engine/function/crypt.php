<?php
/* PYPE™ - web development framework [HTML/CSS/PHP/SQL/JS/MORE]
 * PHP | function::doCrypt
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