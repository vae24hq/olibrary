<?php
/* BRUX™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by ODAO™ OSAWERE [@iamodao - www.osawere.com] using PHP, SQL, HTML, CSS, JS & derived technology.
 * © June 2018 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | library•CleanUp ~ manage cleanup & format functions
 */

//-------------- Clean up a URL & return domain ---------------
function url2domain($url){
	$domain = $url;
	$domain = Text::swap($domain, 'https://', '', 'o_first');
	$domain = Text::swap($domain, 'http://', '', 'o_first');

	#remove sub-directory if available
	if(Text::in($domain, '/')){
		$domain = Text::before($domain, '/', 'yeah');
	}

	#remove [known] sub-domain *ToDO [use library]
	$domain = Text::swap($domain, 'www.', '', 'o_first');
	$domain = Text::swap($domain, 'en.', '', 'o_first');
	$domain = Text::swap($domain, 'ng.', '', 'o_first');

	return $domain;
}

function clean($input){
	$search = array(
		'@<script[^>]*?>.*?</script>@si',   // Strip out javascript
		'@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
		'@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
		'@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
	);
	$output = preg_replace($search, '', $input);
	return $output;
}

//Returns cleaned up string
function cleanText($string){
	$string = trim($string);
	$string = Text::swap($string, ' and', ' &');
	$string = Text::swap($string, '_', ' ');
	return $string;
}

//Returns striped & cleaned string
function cleanStrip($string){
	$string = trim($string);
	$string = swapspace($string, '-', 'yeah');
	$string = swapspace($string, '_', 'yeah');
	$string = swapspace($string, '!', 'yeah');
	$string = swapspace($string, '|', 'yeah');
	return $string;
}

//Return words capitalized
function capitalizeWords($string='', $words='library'){
	if(Text::isempty($string) || Text::isempty($words) || ($words!='library' && !is_array($words))){
		$msg = 'One or more errors occurred with the argument on '.__FUNCTION__.'()';
		return print_msg($msg);
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
	
	#return task
	return $string;
}


//Return words as is, if found in library
function wordsAs($string='', $words='library'){
	$chore = '';
	if(Text::isempty($string) || Text::isempty($words) || ($words!='library' && !is_array($words))){
		$msg = 'One or more errors occurred with the argument on '.__FUNCTION__.'()';
		return print_msg($msg);
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
			$bit = Text::swap($bit, '-', ' ');
			$chore .= mb_convert_case($bit, MB_CASE_TITLE, "UTF-8");
		}
	}

	#return task
	return $chore;
}

function paragraph($string){
	$string = cleanText($string);
	$string = capitalizeWords($string);
	$string = ucfirst($string);
	return $string;
}

function paraword($string){
	$string = cleanText($string);
	$string = capitalizeWords($string);
	$string = ucwords($string);
	return $string;
}

function cleanCap($string){
	$string = cleanText($string);
	$string = cleanStrip($string);
	$string = capitalizeWords($string);
	$string = ucwords($string);
	return $string;
}
?>