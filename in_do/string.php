<?php
/* erko™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by DeronEllse™ [@deronellse - www.deronellse.com/about] using PHP, MySQL, HTML, CSS, JS & derived technology.
 * © February 2016 | version 1.0
 * ===================================================================================================================
 * Dependency » core:tool
 * PHP | string::core ~ string operations
 */




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
	$string = string_swap($string, ' and', ' &');
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
			$chore .= mb_convert_case($bit.' ', MB_CASE_TITLE, "UTF-8");
		}
	}
	return $chore;
}

function clean_up($string=''){
	if(is_empty($string)){return FALSE;}
	$string = trim($string);
	$string = string_swap($string, 'and', '&');
	$string = capitalize_words($string);
	$string = string_swap($string, '_', ' ');
	$string = words_as($string);
	$string = capitalize_words($string);
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




// return words capitalized
function capitalizeWords($string='', $words='library'){
	if(isEmpty($string) || isEmpty($words) || ($words!='library' && !is_array($words))){return false;}
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

	#return task
	return $string;
}

// returns cleaned up string
function cleanUp($string=''){
	if(isEmpty($string)){return FALSE;}
	$string = trim($string);
	$string = stringSwap($string, ' and', ' &');
	$string = stringSwap($string, '-', ' ');

	#return task
	return $string;
}























function domainUtility($o, $to){
		#Returns page title from string
	if($to == 'oTITLE'){
		$o = oString::swap($o, '-', ' ');
		$o = oString::swap($o, '_', ' ');
		$o = ucwords($o);
	}


		#Returns method-clean name from string
	if($to == 'oMETHOD'){
		$o = oString::swap($o, '-', ' ');
		$o = oString::swap($o, '_', ' ');
		$o = ucwords($o);
		$o = lcfirst($o);
		$o = self::spaceTo($o, '');
	}

	return $o;
}
?>