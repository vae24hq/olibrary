<?php
/* erko™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by DeronEllse™ [@deronellse - www.deronellse.com/about] using PHP, MySQL, HTML, CSS, JS & derived technology.
 * © February 2016 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | ip::utility ~ IP related operations
 */

//Return IP validation
function validate_ip($data=''){
	if(empty($data)){return FALSE;}
	if(strtolower($data)==='unknown'){return FALSE;}

	#prepare task
	$prep = ip2long($data);
	if($prep !== FALSE && $prep !== -1){
		$prep = sprintf('%u', $prep);
		if ($prep >= 0 && $prep <= 50331647){return FALSE;}
		if ($prep >= 167772160 && $prep <= 184549375){return FALSE;}
		if ($prep >= 2130706432 && $prep <= 2147483647){return FALSE;}
		if ($prep >= 2851995648 && $prep <= 2852061183){return FALSE;}
		if ($prep >= 2886729728 && $prep <= 2887778303){return FALSE;}
		if ($prep >= 3221225984 && $prep <= 3221226239){return FALSE;}
		if ($prep >= 3232235520 && $prep <= 3232301055){return FALSE;}
		if ($prep >= 4294967040){return FALSE;}
	}

	#return task
	return TRUE;
}


//Return IP address
function get_ip(){
	if(!empty($_SERVER['HTTP_CLIENT_IP']) && validate_ip($_SERVER['HTTP_CLIENT_IP'])){
		return $_SERVER['HTTP_CLIENT_IP'];
	}

	if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		if(strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== FALSE){
			$IPs = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
			foreach($IPs as $IP){
				if(validate_ip($IP)){return $IP;}
			}
		} else {
			if(validate_ip($_SERVER['HTTP_X_FORWARDED_FOR'])){
				return $_SERVER['HTTP_X_FORWARDED_FOR'];
			}
		}
	}

	if(!empty($_SERVER['HTTP_X_FORWARDED']) && validate_ip($_SERVER['HTTP_X_FORWARDED'])){
		return $_SERVER['HTTP_X_FORWARDED'];
	}
	if(!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])){
		return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
	}
	if(!empty($_SERVER['HTTP_FORWARDED_FOR']) && validate_ip($_SERVER['HTTP_FORWARDED_FOR'])){
		return $_SERVER['HTTP_FORWARDED_FOR'];
	}
	if(!empty($_SERVER['HTTP_FORWARDED']) && validate_ip($_SERVER['HTTP_FORWARDED'])){
		return $_SERVER['HTTP_FORWARDED'];
	}

	#return task
	return $_SERVER['REMOTE_ADDR'];
}
?>