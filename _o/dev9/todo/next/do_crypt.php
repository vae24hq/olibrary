<?php
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