<?php
	//require_once("func_print.php");
	
	function do_crypt($value = '', $pattern = 'flexi') { //do encryption
		if($value != '') {				
			if ($pattern == 'flexi') {
				$crypt_value = base64_encode($value);
			}				
			elseif ($pattern == 'reverse') {
				$crypt_value = base64_decode($value);
			}
			elseif($pattern == 'strict') {
				$crypt_value = md5($value);
			}				
			elseif ($pattern == 'crypt') {
				$value = hash("md5", "$value");
				$value = sha1($value);
				$crypt_value = md5($value);
				
			}	
		} 
		else {
			print_msg('Could not perform CRYPT operation');
			return;
		}
		return $crypt_value;		
	}

//echo do_crypt("doAccount", "crypt");
?>