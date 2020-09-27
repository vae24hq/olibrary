<?php
/* erko™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by DeronEllse™ [@deronellse - www.deronellse.com/about] using PHP, MySQL, HTML, CSS, JS & derived technology.
 * © February 2016 | version 1.0
 * ===================================================================================================================
 * Dependency » core:tool
 * PHP | string::core ~ string operations
 */
function in_string($string='', $needle=''){
	if(is_empty($string) || is_empty($needle)){return FALSE;}
	if(strpos($string, $needle) !== false){return TRUE;}
	return FALSE;
}

function space_to_char($string='', $character='', $inverse='nope'){
 	if(is_empty($string) || is_empty($character) || is_empty($inverse)){return FALSE;}
 	if($inverse=='yeah'){return str_replace($character, ' ', $string);}
 	return preg_replace('/\s+/', $character, $string);
}

function string_swap($subject='', $search='', $replace='', $occurence='all'){
 	$occurences = array('all', 'first', 'last');
 	if(is_empty($subject) || is_null($search) || is_null($replace) || is_empty($occurence) || !in_array($occurence, $occurences)){
 		$msg = 'One or more errors occured with the argument on '.__FUNCTION__.'()';
 		return printMsg($msg);
 	}

	$isfound = strstr($subject, $search); //check if $search is found, else return full string
	if(!$isfound){$chore = $subject;}
	else {
		if($occurence=='all'){$chore = str_replace($search, $replace, $subject);}
		else {
			if($occurence=='first'){$pos = strpos($subject, $search);}
			if($occurence=='last'){$pos = strrpos($subject, $search);}
			if($pos !== false){$chore = substr_replace($subject, $replace, $pos, strlen($search));}
			else {$chore = $subject;}
		}
	}
 	return $chore;
}

function trim_edge($string='', $character=''){
 	if(is_empty($string) || is_null($character)){
 		$msg = 'One or more errors occured with the argument on '.__FUNCTION__.'()';
 		return printMsg($msg);
 	}

 	$chore = trim($string);
	$chore = preg_replace('/\s+/', '', $chore);
 	if(!is_empty($character)){$chore = trim($chore, $character);}
 	return $chore;
}

function nth_char($string='', $nth=''){ #nth is position ie value has to be numberic
 	if(is_empty($string) || is_empty($nth)){
 		$msg = 'One or more errors occured with the argument on '.__FUNCTION__.'()';
 		return printMsg($msg);
 	}
	$length = strlen($string);
	if($nth<=$length){
		$nth = (int)$nth -1;
		return $string[$nth];
	}
	return FALSE;
}

function string_before($subject='', $needle='', $strip='yeah'){
 	if(is_null($needle) || is_empty($subject) || is_empty($strip)){
 		$msg = 'One or more errors occured with the argument on '.__FUNCTION__.'()';
 		return printMsg($msg);
 	}
	$pos = strpos($subject, $needle);
	$chore = '';
	if($pos && $pos!=0){$chore = substr($subject, 0, $pos);}
	if($strip !='yeah'){$chore = $chore.$needle;}
 	return $chore;
}

function string_after($subject='', $needle='', $strip='yeah'){
 	if(is_null($needle) || is_empty($subject) || is_empty($strip)){
 		$msg = 'One or more errors occured with the argument on '.__FUNCTION__.'()';
 		return printMsg($msg);
 	}
	$chore = strstr($subject, $needle);
	if($chore){
		if($strip =='yeah'){
			$chore = str_replace($needle, '', $chore);
		}
	}
 	return $chore;
}

function capitalize_words($string='', $words='library'){
 	if(is_empty($string) || is_empty($words) || ($words!='library' && !is_array($words))){
 		$msg = 'One or more errors occured with the argument on '.__FUNCTION__.'()';
 		return printMsg($msg);
 	}
 	if($words=='library'){
 		$words = array(
 			'sms', 'faq', 'cms',
 			'Sms', 'Faq', 'Cms'
 			);
 	}
	$stringBit = preg_split('/\s+/', $string);
	foreach ($stringBit as $bit){
		if(in_array($bit, $words)){
			$capBit = strtoupper($bit);
			$string = str_replace($bit, $capBit, $string);
		}
	}
	return $string;
}

function words_as($string='', $words='library'){
	$chore = '';
 	if(is_empty($string) || is_empty($words) || ($words!='library' && !is_array($words))){
 		$msg = 'One or more errors occured with the argument on '.__FUNCTION__.'()';
 		return printMsg($msg);
 	}
 	if($words=='library'){
 		$words = array(
 			'e-bank', 'e-banking', 'e-log', 'e-login', 'e-reg', 'e-register', 'e-registration',
 			'i-bank', 'i-banking', 'i-log', 'i-login', 'i-reg', 'i-register', 'i-registration'
 		);
 	}
	$stringBit = preg_split('/\s+/', $string);
	foreach ($stringBit as $bit){
		if(in_array($bit, $words)){
			$chore .= strtolower(substr($bit, 0, 2 )).ucfirst(substr($bit, 2 )).' ';
		}
		else {
			$bit = string_swap($bit, '-', ' ');
			$chore .= mb_convert_case($bit, MB_CASE_TITLE, "UTF-8");
		}
	}
	return $chore;
}

function clean_up($string=''){
	if(is_empty($string)){return FALSE;}
 	$string = trim($string);
	$string = string_swap($string, 'and', '&');
	$string = string_swap($string, '_', ' ');
	return $string;
}

function strip_clean($string=''){
 	if(is_empty($string)){return FALSE;}
	$string = trim($string);
	$string = space_to_char($string, '-', 'yeah');
	$string = space_to_char($string, '_', 'yeah');
	$string = space_to_char($string, '!', 'yeah');
	$string = space_to_char($string, '|', 'yeah');
 	return $string;
}

function paragraph($string){
	if(is_empty($string)){return FALSE;}
 	$string = clean_up($string);
 	$string = capitalize_words($string);
 	$string = ucfirst($string);
 	return $string;
}

function paraword($string){
	if(is_empty($string)){return FALSE;}
 	$string = clean_up($string);
 	$string = capitalize_words($string);
 	$string = ucwords($string);
 	return $string;
}

function clean_cap($string){
	if(is_empty($string)){return FALSE;}
 	$string = clean_up($string);
 	$string = strip_clean($string);
 	$string = capitalize_words($string);
 	$string = ucwords($string);
 	return $string;
}

function url2domain($url=''){
 	if(is_empty($url)){return FALSE;}
	$domain = $url;
	$domain = string_swap($domain, 'https://', '', 'first');
	$domain = string_swap($domain, 'http://', '', 'first');
	$domain = string_swap($domain, 'www.', '', 'first');
	$domain = string_swap($domain, '/', '', 'last');
	return $domain;
}
?>