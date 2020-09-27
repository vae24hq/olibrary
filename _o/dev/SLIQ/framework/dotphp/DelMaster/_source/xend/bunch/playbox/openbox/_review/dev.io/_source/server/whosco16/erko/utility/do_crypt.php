<?php
/* erko™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by DeronEllse™ [@deronellse - www.deronellse.com/about] using PHP, MySQL, HTML, CSS, JS & derived technology.
 * © February 2016 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | do_crypt::utility ~ data encryption & decryption
 */
function do_crypt($data ='', $pattern = 'flexi'){
	if(!empty($data)){
		if ($pattern == 'crypt'){
			$crypt = hash("md5", $data);
			$crypt = sha1($crypt);
			$crypt = md5($crypt);
		}
		elseif($pattern == 'strict'){$crypt = md5($data);}
		elseif ($pattern == 'reverse'){$crypt = base64_decode($data);}
		else {$crypt = base64_encode($data);}
	}
	else {
		//die ('Could not perform CRYPT operation');
		return FALSE;
	}
	return $crypt;
}
?>