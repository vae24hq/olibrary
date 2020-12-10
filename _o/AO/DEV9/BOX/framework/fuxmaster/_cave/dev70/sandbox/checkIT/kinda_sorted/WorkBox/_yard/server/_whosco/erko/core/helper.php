<?php
/* erko3™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by SlimEdge™ [@officialSEID - www.seid.com.ng] using PHP, HTML, CSS, JS & derived technology.
 * © July 2016 | version 1.0
 * ===================================================================================================================
 * Dependency » ....
 * PHP | helper::source ~ helper functions
 */

/**
 * ===========================================================================
 *  Begin CORE functions, independent but important to erko3 framework
 * ===========================================================================
 */

//Prints message in choice format
function printMsg($msg, $format='export'){
	if($format == 'dump'){var_dump($msg);}
	elseif($format == 'export'){echo '<tt><pre>'.var_export($msg, TRUE).'</pre></tt>';}
	else {echo $msg;}
	return;
}


//Performs actual empty check ('0' is not empty) - Returns boolean
function isEmpty($input){
	if(!isset($input)){return TRUE;}
	else {
		if(is_array($input)){
			if(empty($input)){return TRUE;}
		} else {
			$input = trim($input);
			$length = strlen($input);
			if($length < 1){return TRUE;}
		}
	}

	return FALSE;
}





/**
 * ===========================================================================
 *  Begin STRING functions, dependent and important to ekro3 framework
 * ===========================================================================
 */

//Trim edges (space|character|sting) from string
function trimEdge($string, $trim=''){
 	$string = trim($string);
 	if(!isEmpty($trim)){$string = trim($string, $trim);}
 	
 	return $string;
}


//Remove space, anywhere found in a string
function removeSpace($string){
	if(!isEmpty($string)){$string = preg_replace('/\s+/', '', $string);}

 	return $string;
}


//Returns character in the 'nth' position of a string
function nthChar($string, $nth){#nth has to be numeric
	$length = strlen($string);
	if($nth <= $length){
		$nth = (int)$nth -1;
		return $string[$nth];
	}
	
	return FALSE;
}


//Find the position[s] of character[s] in string (CASE SenSItive)
function posChar($string, $search, $occurence='all'){
	#prepare default
	$offset = 1; $pos = FALSE;
	
	#prepare task
	if($occurence != 'all'){
		if($occurence == 'first'){$pos = strpos($string, $search);}
		if($occurence == 'last'){$pos = strrpos($string, $search);}

		if($pos !== false){$pos = $pos + $offset;}
	} 
	else {
		$pos_first = posChar($string, $search, 'first');
		$pos_last = posChar($string, $search, 'last');

		if($pos_first === $pos_last){$pos = $pos_first;}
		else {
			$pointer = $pos_first; $pos[] = $pointer;
			while ($pointer < $pos_last){
				$pos_next = strpos($string, $search, $pointer);
				$pointer = $pos_next + $offset;
				$pos[] .= $pointer;
			}
		}
	}

	return $pos;
}


//Check for needle in string - Returns boolean
function inString($string, $needle){
	if(strpos($string, $needle) !== false){return TRUE;}
	return FALSE;
}


//Substitute the space in a string with a character|string and vice-versa
function spaceSwap($string, $value, $inverse='nope'){
 	if($inverse == 'sure'){
 		return str_replace($value, ' ', $string);
 	}
 	
 	return preg_replace('/\s+/', $value, $string);
}


//Substitute a character|string in a string with a character|string and vice-versa
function stringSwap($string, $search, $substitute , $occurence='all'){
	#check if $search is found and return result, else return full string
	$isfound = inString($string, $search);	
	if(!$isfound){return $string;}
	else {
		if($occurence == 'all'){return str_replace($search, $substitute, $string);}
		else {
			if($occurence == 'first'){$pos = strpos($string, $search);}
			if($occurence == 'last'){$pos = strrpos($string, $search);}
			
			if($pos !== false){
				return substr_replace($string, $substitute, $pos, strlen($search));
			} 
			else {return $string;}
		}
	}
}


//Return value before character(s) {if found} in string or false
function stringBefore($string, $search, $strip='sure'){
	$pos = strpos($string, $search);
	if($pos && $pos != 0){$result = substr($string, 0, $pos);}
	if($strip != 'sure'){$result = $result.$search;}

 	if(isset($result)){return $result;}
 	return FALSE;
}


//Return value after character(s) {if found} in string or false
function stringAfter($string, $search, $strip='sure'){
	$result = strstr($string, $search);
	if($result){
		if($strip == 'sure'){
			$result = str_replace($search, '', $result);
		}	
	}
 	
 	return $result;
}





/**
 * ===========================================================================
 *  Begin WORDS cleaning & formating functions - dependent and important
 * ===========================================================================
 */

//Return words as capitalized {if found in library}
function wordAsCap($string, $library='library'){
 	if($library != 'library' && !is_array($library)){
 		$msg = 'invalid arguments on '.__FUNCTION__.'()';
 		return printMsg($msg);
 	}

 	if($library == 'library'){
 		$library = array(
 			'css', 'html', 'html5', 'js', 'php',
 			'url',
 			'sms', 'faq', 'cms'
 			);
 	}
 	#change array to lower case for macthing
 	$library = implode(',', $library);
 	$library = strtolower($library);
 	$library = explode(',', $library);
	
	#remove space from edges
	$string = trim($string);
	$clean = '';
	$words = preg_split('/\s+/', $string);
	foreach ($words as $word){
		$wordCheck = strtolower($word); #change to lower case for array check
		if(inString($wordCheck, '.')){$wordCheck = trimEdge($wordCheck, '.');} #takes care of words ending{.}
		if(in_array($wordCheck, $library)){
			$capWord = strtoupper($word);
			$word = stringSwap($word, $word, $capWord);
		}
		$clean .= $word.' ';
	}
	
	return $clean;
}


//Return string in 'sentence case' format
function sentence($string){
 	$string = trim($string);
 	$string = ucfirst($string);
 	
 	return $string;
}

//Return words in string as 'capitalized' format
function capitalize($string){
 	$string = trim($string);
 	$string = ucwords($string);
 	
 	return $string;
}


//Clean & format a string
function cleanup($string){
	#remove space from edges
	$string = trim($string);
	
	#remove 'hyphen' if word not in library
	$hyphens = array(
		'e-bank', 'e-banking', 'e-log', 'e-login', 'e-reg', 'e-register', 'e-registration',
		'i-bank', 'i-banking', 'i-log', 'i-login', 'i-reg', 'i-register', 'i-registration'
	);
	$clean = '';
	$words = preg_split('/\s+/', $string);
	foreach ($words as $word){
		$wordCheck = strtolower($word); #change to lower case for array check
		if(inString($wordCheck, '.')){$wordCheck = trimEdge($wordCheck, '.');} #takes care of words ending{.}
		if(!in_array($wordCheck, $hyphens)){
			#change 'hyphen' to space
			$word = stringSwap($word, '-', ' ');
		}
		$clean .= $word.' ';
	}

	#change 'underscore' to hyphen
	$clean = stringSwap($clean, '_', ' ');

	#perform wordAsCap function
	$clean = wordAsCap($clean);

	return trim($clean);
}

//Return domain from a URL
function url2domain($url){
	$domain = trim($url);
	$domain = stringSwap($domain, 'https://', '', 'first');
	$domain = stringSwap($domain, 'http://', '', 'first');
	$domain = stringSwap($domain, 'www.', '', 'first');
	$domain = stringSwap($domain, '/', '', 'last');

	#remove sub-directory if avaliable
	if(inString($domain, '/')){
		$domain = stringBefore($domain, '/', 'sure');
	}
	
	return $domain;
}





/**
 * ===========================================================================
 *  Begin BROWSER functions - dependent and important to erko3 framework
 * ===========================================================================
 */

//Return browser agent string
function browserAgent(){
	return strtolower($_SERVER['HTTP_USER_AGENT']);
}


//Handles IE browser
function IE($operator=false, $version=NULL){
    if(!preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $matches)
     || preg_match('#Opera#', $_SERVER['HTTP_USER_AGENT'])){
    	return false === $operator ? false : NULL;
    }

    if(false !== $operator
        && in_array($operator, array('<', '>', '<=', '>=', '==', '!='))
        && in_array((int)$version, array(5,6,7,8,9,10))){
        return eval('return ('.$matches[1].$operator.$version.');');
    }
    else {return (int)$matches[1];}
}


//Validate IE browser and version
function isIE($operator='', $version=''){
	if(!isEmpty($operator) && !isEmpty($version)){
		$ie = IE($operator, $version);
	} else {$ie = IE();}

  if(!$ie){return FALSE;}

  return TRUE;
}


//Return IE version
function ieVer(){
	if(isIE()){return IE();}

	return FALSE;
}


//Validate opera mobile browser
function isOperamobi(){
	if(inString(browserAgent(), 'opera mobi')){return TRUE;}

	return FALSE;
}


//Validate opera mini browser
function isOperamini(){
	if(inString(browserAgent(), 'opera mini')){return TRUE;}

	return FALSE;
}


//Return browser information
function getBrowser($return='name'){
	
	if(isIE()){$info = 'ie';}
	elseif(isOperamobi()){$info = 'operamobi';}
	elseif(isOperamini()){$info = 'operamini';}
	else {$info = browserAgent();}

	return strtolower($info);
}





/**
 * ===========================================================================
 *  Begin ETC functions, dependent and important to erko3 framework
 * ===========================================================================
 */

//Return file information of existing file {file.ext | ./file.etx | dir/file.ext | ./dir/file.ext}
function fileInfo($request='name', $file='self'){
	#error check
	$data = array('name', 'file', 'extension', 'directory', 'all');
	if(isEmpty($request) || isEmpty($file) || (!in_array($request, $data))){
		$msg = 'Invalid Arguments on '.__FUNCTION__.'()';
 		return printMsg($msg);
	}

	#prepare file
	if($file == 'self'){
		$file = $_SERVER['PHP_SELF'];
		if(inString($file, '/')){$file = stringSwap($file, '/', '');}
	}
	
	#make sure file exist and return result
	if(is_file($file)){
		$fileInfo  = pathinfo($file);

		if($request == 'name'){return $fileInfo['filename'];}
		elseif($request == 'file'){return $fileInfo['basename'];}	
		elseif($request == 'extension'){return $fileInfo['extension'];}
		elseif($request == 'directory'){return $fileInfo['dirname'];}
		else {return $fileInfo;}
	}
	
	return FALSE;	
}


//Return size in readable format and actual size (Terabyte below)
function formatSize($size='', $sizing='general'){
	#validate
	if(isEmpty($size)){return FALSE;}

	#prepare task
	
	if($sizing == 'actual'){
		if($size >= 1099511627776){$format = number_format($size / 1099511627776 , 2) . ' TB';}
		elseif($size >= 1073741824){$format = number_format($size / 1073741824 , 2) . ' GB';}
		elseif($size >= 1048576){$format = number_format($size / 1048576 , 2) . ' MB';}
		elseif($size >= 1024){$format = number_format($size / 1024 , 2) . ' KB';}
		elseif($size > 1 && $size < 1024){$format = $size . ' Bytes';}
	}
	else {
		if($size >= 1000000000000){$format = number_format($size / 1000000000000 , 2) . ' TB';}
		elseif($size >= 1000000000){$format = number_format($size / 1000000000 , 2) . ' GB';}
		elseif($size >= 1000000){$format = number_format($size / 1000000 , 2) . ' MB';}
		elseif($size >= 1000){$format = number_format($size / 1000 , 2) . ' KB';}
		elseif($size > 1 && $size < 1000){$format = $size . ' Bytes';}		
	}

	if($size == 1){$format = $size . ' Byte';}
	elseif($size < 1){$format = '0';}

 	if(inString($format, '.00')){$format = stringSwap($format, '.00', '');}
 	return $format;
}


//Return encrypted or decrypted data
function doCrypt($data='', $pattern='flex'){
	if(!isEmpty($data)){
		if ($pattern == 'crypt'){
			$data = hash("md5", $data);
			$data = sha1($data);
			$data = md5($data);
		}
		elseif($pattern == 'strict'){$data = md5($data);}
		elseif ($pattern == 'reverse'){$data = base64_decode($data);}
		else {$data = base64_encode($data);}
	}
	else {return FALSE;}

	return $data;
}


//Adds file to document
function addFile($file='', $persist='sure', $check='strict'){
	#validate
 	if(isEmpty($file)){exit('{file include error}: file for inclusion is required');}
 	
 	#prepare
 	if(!is_file($file) && $check =='strict'){exit('The file "{'.$file.'} does not exist!');}
 	elseif($persist != 'nope'){include_once($file);}
 	else {include($file);}
}


//Return random value
function randomize($return =''){
	$prid = mt_rand(100000000, 999999999);
	if($return=='prid'){return $random = $prid;}
	$suid = str_shuffle(time()).mt_rand(10000, 99999);
	if($return=='suid'){return $random = $suid;}
	if($return=='time'){return $random = time();}

	$alphabets = array('A','a','B','b','C','c','D','d','E','e','F','f','G','g','H','h','I','i','J','j','K','k','L','l','M','m','N','n','O','o','P','p','Q','q','R','r','S','s','T','t','U','u','V','v','W','w','X','x','Y','y','Z','z');
	$randAlphabets = array_rand($alphabets, 51);
	$randAlphabet = ($alphabets[$randAlphabets[mt_rand(0,9)]]);

	$numbers = array(0,1,2,3,4,5,6,7,8,9);
	$randNumbers = array_rand($numbers, 10);
	$randNumber = ($numbers[$randNumbers[mt_rand(0,9)]]);

	if($return=='tuid'){
		$random = ($alphabets[$randAlphabets[mt_rand(0,9)]]);
		$random .= str_shuffle($suid);
		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
		$random .= mt_rand(1000, 9999);
		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
		return $random;
	}

	if($return=='bind'){
		$random = mt_rand(100, 999);
		$random .= time();
		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
		$random .= str_shuffle($suid);
		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
		$random .= str_shuffle($prid);
		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
		return $random;
	}
	if($return=='logid'){return str_shuffle(randomize('prid').randomize('bind').randomize('tuid'));}
	if(isEmpty($return)){return mt_rand();}
}


//Return IP validation
function isIP($ip=''){
	if(empty($ip)){return FALSE;}
	if(strtolower($ip) === 'unknown'){return FALSE;}

	#prepare task
	$prep = ip2long($ip);
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

	return TRUE;
}


function getIP(){
	if(!empty($_SERVER['HTTP_CLIENT_IP']) && isIP($_SERVER['HTTP_CLIENT_IP'])){
		return $_SERVER['HTTP_CLIENT_IP'];
	}

	if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		if(strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== FALSE){
			$IPs = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
			foreach($IPs as $IP){
				if(isIP($IP)){return $IP;}
			}
		} else {
			if(isIP($_SERVER['HTTP_X_FORWARDED_FOR'])){
				return $_SERVER['HTTP_X_FORWARDED_FOR'];
			}
		}
	}

	if(!empty($_SERVER['HTTP_X_FORWARDED']) && isIP($_SERVER['HTTP_X_FORWARDED'])){
		return $_SERVER['HTTP_X_FORWARDED'];
	}
	if(!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && isIP($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])){
		return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
	}
	if(!empty($_SERVER['HTTP_FORWARDED_FOR']) && isIP($_SERVER['HTTP_FORWARDED_FOR'])){
		return $_SERVER['HTTP_FORWARDED_FOR'];
	}
	if(!empty($_SERVER['HTTP_FORWARDED']) && isIP($_SERVER['HTTP_FORWARDED'])){
		return $_SERVER['HTTP_FORWARDED'];
	}

	return $_SERVER['REMOTE_ADDR'];
}




/**
 * ===========================================================================
 *  Begin TIME & DATE functions, dependent and important to erko3 framework
 * ===========================================================================
 */

//Set default timezone
function setTimezone($zone='domestic'){
 	if(isEmpty($zone)){return FALSE;}

	if($zone == 'domestic'){$zone = date_default_timezone_set('Africa/Lagos');}
	else {
		$iszone = in_array($zone, timezone_identifiers_list());
		if(!$iszone){
			$msg = ' invalid timezone {'.$zone.'} ';
			return printMsg($msg);
		}
		else {$zone = date_default_timezone_set($zone);}
	}
 	return $zone;
}


//Return microfloats
function microTimeFloat(){
	list($usec, $sec) = explode(" ", microtime());
	return ((float)$usec + (float)$sec);
}


//Make timestamp
function doTimestamp($timeString='now', $caller=''){
 	if(isEmpty($timeString)){return FALSE;}
 	if(!isEmpty($caller)){$caller = ' on '.$caller;}

	$stamp = strtotime($timeString);
	if(!$stamp){
		$msg = ' timestamp conversion failed {'.$timeString.'} '.$caller;
		return printMsg($msg);
	}
 	return $stamp;
}


//Make time
function doTime($format='time', $time='now'){
 	if(isEmpty($format) || isEmpty($time)){return FALSE;}
	if($time=='now'){$timeIs = time();}
	else {
		if(is_int($time) || is_numeric($time)){$timeIs = $time;}
		else {
			$timeIs = doTimestamp($time, __FUNCTION__);
			if(!$timeIs){
				if(is_numeric($time)){$timeIs = $time;}
				else {return printMsg(' invalid time ['.$time.']');}
			}
		}
	}
	if($format=='time'){$formatIs = 'h:i:s A';}
	elseif($format ='unix'){return $timeIs;}
	else {$formatIs = $format;}
	return date($formatIs, $timeIs);
}


//Make date
function doDate($format='date', $date='today'){
 	if(isEmpty($format) || isEmpty($date)){return FALSE;}
	if($date == 'today'){$dateIs = time();}
	else {
		if(is_int($date) || is_numeric($date)){$dateIs = $date;}
		else {
			$dateIs = doTimestamp($date, __FUNCTION__);
			if(!$dateIs){
				if(is_numeric($date)){$dateIs = $date;}
				else {return printMsg(' invalid date ['.$date.']');}
			}
		}
	}
	if($format == 'date'){$formatIs = 'l, F d, Y';}
	elseif($format == 'time'){$formatIs = 'h:i:s A';}
	elseif($format == 'dateAndtime'){$formatIs = 'l, F d, Y h:i:s A';}
	elseif($format == 'report'){$formatIs = 'd/m/Y h:i:s A';}
	elseif($format == 'dateD1'){$formatIs = 'd/m/Y';}
	elseif($format == 'dateD2'){$formatIs = 'd-m-Y';}
	elseif($format == 'dateD3'){$formatIs = 'F d, Y';}
	elseif($format == 'sqlDateTime'){$formatIs = 'Y-m-d h:i:s';}
	//for the following, RETURN
	elseif($format == 'letter'){return date('j').'<sup>'.date('S').'</sup> '.date('F, Y');}
	elseif($format == 'letter2'){return date('M j').'<sup>'.date('S').'</sup> '.date('Y');}
	elseif($format == 'letter3'){return date('F j').'<sup>'.date('S').'</sup> '.date('Y');}
	elseif($format == 'unix'){return $dateIs;}
	else {$formatIs = $format;}
	return date($formatIs, $dateIs);
}


//Returns age from date of birth {YYYY-MM-DD}
function getAge($birthDate=''){
 	if(isEmpty($birthDate)){return FALSE;}
	$time = time();
	$day = date("d", $time); $month = date("m", $time); $year = date("Y", $time);
	$birthDay = substr($birthDate, 8, 2); $birthMonth = substr($birthDate, 5, 2); $birthYear = substr($birthDate, 0, 4);
	if($month < $birthMonth){$subtract = 1;}
	elseif($month == $birthMonth){
		if($day < $birthDay){$subtract = 1;}
		else {$subtract = 0;}
	}
	else {$subtract = 0;}

	return $year-$birthYear-$subtract;
}


//Calculate time diffrence - TODO - upgrade and add features
function getTimeDifference($past='', $future=''){
	$past = new DateTime($past);
	$future = new DateTime($future);
	$interval = $past->diff($future);
	return $interval->format('%a total days');
}


//Calculates time spent {from the past - unixtime} untill now - Returns array
function timeSpent($pastUnixTime='', $futureUnixTime='now'){
 	if(isEmpty($pastUnixTime)){return FALSE;} #TODO - make sure its valid unix timestamp

	if(isEmpty($futureUnixTime) || $futureUnixTime == 'now'){$now = time();} else {$now = $futureUnixTime;}
	$nowDate = date("j", $now); $nowMonth = date("n", $now); $nowyear = date("Y", $now);
	$timeDate = date("j", $pastUnixTime); $timeMonth = date("n", $pastUnixTime); $timeYear = date("Y", $pastUnixTime);
	$spent = "  => "; $numVar = 0; $unit ="  => ";
	if($now >= $pastUnixTime){
		switch(TRUE){
			case($now-$pastUnixTime < 60):
				#RETURNS SECONDS
				$seconds = $now-$pastUnixTime; $spent = $seconds; $numVar = 773; $unit = 'second';
				break;

			case ($now-$pastUnixTime < 3600):
				#RETURNS MINUTES
				$minutes = round(($now-$pastUnixTime)/60); $spent = $minutes; $numVar = 774; $unit = 'minute';
				break;

			case ($now-$pastUnixTime < 86400):
				#RETURNS HOURS
				$hours = round(($now-$pastUnixTime)/3600); $spent = $hours; $numVar = 775; $unit = 'hour';
				break;

			case ($now-$pastUnixTime < 1209600):
				#RETURNS DAYS
				$days = round(($now-$pastUnixTime)/86400); $spent = $days; $numVar = 776; $unit = 'day';
				break;

			case (mktime(0, 0, 0, $nowMonth-1, $nowDate, $nowyear) < mktime(0, 0, 0, $timeMonth, $timeDate, $timeYear)):
				#RETURNS WEEKS
				$weeks = round(($now-$pastUnixTime)/604800); $spent = $weeks; $numVar = 777; $unit = 'week';
				break;

			case (mktime(0, 0, 0, $nowMonth, $nowDate, $nowyear-1) < mktime(0, 0, 0, $timeMonth, $timeDate, $timeYear)):
				#RETURNS MONTHS
				if($nowyear==$timeYear){$subtract = 0;} else {$subtract = 12;}
				$months = round($nowMonth-$timeMonth+$subtract); $spent = $months; $numVar = 778; $unit = 'month';
				break;

			default:
				#RETURNS YEARS
				if($nowMonth<$timeMonth){$subtract = 1;}
				elseif($nowMonth==$timeMonth){
					if($nowDate<$timeDate){$subtract = 1;}
					else {$subtract = 0;}
				}
				else {$subtract = 0;}
				$years = $nowyear-$timeYear-$subtract;
				$spent = $years;
				$numVar = 779;
				$unit = 'year';
				if($years == 0) {$spent = "  => "; $numVar = 0;}
				break;
		}

		return Array($numVar, $spent, $unit);
	}
	else {
		$msg = ' Please enter a past time';
		return printMsg($msg);
	}
}


//Return duration of time {from the past - unixtime} untill now
function getTimeSpent($pastUnixTime='', $futureUnixTime='now'){
 	if(!isEmpty($pastUnixTime)){
		$spent = timeSpent($pastUnixTime, $futureUnixTime);
		$count = $spent['1']; $unit = $spent['2'];
		if($count > 1){$unit = ($unit.'s');}
		return ($count.' '.$unit.' ago');
	}
	return FALSE;
}




/**
 * ===========================================================================
 *  Begin UTILITY functions, dependent and important to erko3 framework
 * ===========================================================================
 */

//Return defined path to a directory
function pathTo($dir='', $format='relative'){#[relative|absolute]
	#prepare
	$path = '';
	if($dir == 'asset'){$path = PATH_ASSET.PS;}	
	if($dir == 'icon'){$path = PATH_ASSET.PS;}
	if($dir == 'styles'){$path = PATH_ASSET.PS;}
	if($dir == 'javascript'){$path = PATH_ASSET.PS;}
	if($dir == 'slide'){$path = PATH_SLIDE.PS;}
	if($dir == 'upload'){$path = PATH_UPLOAD.PS;}

	if($format == 'absolute' && !isEmpty(erko3::site())){
		$path = erko3::site().'/'.$path;
	}
	elseif($format == 'relative'){
		if(REWRITE_URL == 'sure' && erko3::page() != 'index'){
			if(inString(erko3::page('url'), '_')){
				#check how many '_' you have in page name {'_' indicates '/' in url}
				$pos = posChar(erko3::page('url'), '_', 'all');
				$count = count($pos);
				$slash = '';
				if($count < 2){$slash .= '../';} #ie 1
				else {
					for($i = 1; $i <= $count; $i++) {
						$slash .= '../';
					}
				}
				$path = $slash.$path;
			}
			else {
				$path = './'.$path;
			}
		}
		if(!empty(erko3::$basepath)){$path = erko3::$basepath.$path;}
	}
	
	return $path;
}


/**
 * ---------------------------------------------------------------------------
 *  Begin LINK functions
 * ---------------------------------------------------------------------------
 */

// Returns referer url
function refererURL(){
	if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){return $_SERVER['HTTP_REFERER'];}
	
	return FALSE;
}


// Prepare link
function doLink($input='', $prefix='nope'){
	if(isEmpty($input)){return FALSE;}

	#prepare input
	$input = trim($input);	

	$link = '';
	
	#prepare prefix
	if(REWRITE_URL != 'sure'){$link .= '?page=';} #if rewrite is off
	else {#if rewrite is on
		if(inString($input, '_')){$input = stringSwap($input, '_', '/');} #covert posible 'user_login' to 'user/login'
	}

	$link = $link.trim(strtolower($input));
 	
 	return $link;
}


// Returns current page link
function getLink($link=''){
	$link = 'index';
	if(isset($_GET['page']) && !isEmpty($_GET['page'])){$link = $_GET['page'];}

	$link = trim($link);
	if(inString($link, '/')){$link = stringSwap($link, '/', '_');}
	#find the last occurence of '_' and check if there is content after it.
	$last = posChar($link, '_', 'last');
	$length = strlen($link);
	if($length == $last){$link = stringSwap($link, '_', '', 'last');}
	
	return strtolower($link);
}


// Check for if link is active
function isLinkActive($link='index'){
	if(isEmpty($link)){}#TODO -error check

	$link = stringSwap($link, '&', 'and', 'all');
	$getLink = getLink();
	if($link == $getLink){return TRUE;}
	
	return FALSE;
}


// Markup link
function markupLink($link='', $name='', $tag='', $style='link', $target='self', $group='', $format='relative', $prefix='nope'){
	#perform validation
	if(isEmpty($link)){return FALSE;}
	
	#prepare link {external|absolute|relative}
	$link = strtolower(trim($link));
	$prepare['link'] = '';	
	if($format != 'relative'){$prepare['link'] .= $link;}
	else {
		$prepare['link'] .= pathTo('', $format);
		if($link != 'index'){$prepare['link'] .= doLink($link, $prefix);}
	}
	
	#prepare name, if empty use link
	$prepare['name'] = '';	
	if(isEmpty($name)){$name = stringSwap($link, '_', ' ');}
	$prepare['name'] = wordAsCap($name);
	
	#prepare tag, if empty use prepared name
	$prepare['tag'] = '';
	if(isEmpty($tag)){$tag = $prepare['name'];} else {$tag = wordAsCap($tag);}
	$prepare['tag'] = ucfirst($tag);
	
	#prepare css class
	$prepare['style'] = '';
	$linkIsActive = isLinkActive($link);	
	$stayActive = 'nope';
	if(
		(is_array($group) && in_array(getLink(), $group))
		|| getLink() == $group
		){$stayActive = 'sure';
	}

	if(!isEmpty($style) || $linkIsActive || $stayActive == 'sure'){
		$prepare['style'] .= ' class="';
		if(!isEmpty($style)){$prepare['style'] .= $style;}
		if((!isEmpty($style) && $linkIsActive) || $stayActive == 'sure'){$prepare['style'] .= ' active';}
		$prepare['style'] .= '"';
	}

	#prepare target
	$prepare['target'] = '';
	if(!isEmpty($target) && $target !='self'){$prepare['target'] = ' target="'.$target.'"';}
	
	return '<a href="'.$prepare['link'].'" title="'.$prepare['tag'].'"'.$prepare['style'].$prepare['target'].'>'.$prepare['name'].'</a>';
}


// Make a link
function makeLink($link, $name='', $style='', $tag='', $target='self', $format='relative', $prefix='nope'){
	return markupLink($link, $name, $tag, $style, $target, '', $format, $prefix);
}


// Make a group link
function makeLinkGroup($group, $link, $name='', $style='', $tag='', $target='self', $format='relative', $prefix='nope'){
	return markupLink($link, $name, $tag, $style, $target, $group, $format, $prefix);
}


// Make an absolute link
function makeLinkAbsolute($link, $name='', $style='', $tag='', $target='self', $format='absolute', $prefix='nope'){
	return markupLink($link, $name, $tag, $style, $target, '', $format, $prefix);
}


// Make an external link
function makeLinkExternal($link, $name='', $style='', $tag='', $target='_blank', $format='external'){
	return markupLink($link, $name, $tag, $style, $target, '', $format);
}


// Make primary menu
function pageMenu($link='', $name='', $tag='', $prefix='nope', $format='relative', $style='menu'){
	return markupLink($link, $name, $tag, $style, 'self', '', $format, $prefix);
}


// Make group menu
function pageMenuGroup($group, $link='', $name='', $activate ='', $tag='', $style='menu'){
	return markupLink($link, $name, $tag, $style, 'self', $group, $format, $prefix);
}


// Markup secondary menu
function pageMenuSecondary($link='', $name='', $tag='', $prefix='nope', $format='relative', $style='secondary-menu'){
	return markupLink($link, $name, $tag, $style, 'self', '', $format, $prefix);
}


//Markup paragraph link
function paragraphLink($link='', $name='', $tag='', $style='paralink', $target='self', $format='relative', $prefix='nope'){
	return markupLink($link, $name, $tag, $style, $target, '', $format, $prefix);
}


//Returns valid link for switching rendition (desktop, tablet and phone)
function render($device='desktop'){
	if(isEmpty($device)){$device = 'desktop';}

	#prepare
	$link = getLink();
	if(!stringAfter($link, 'index')){$link = stringSwap($link, 'index', '');}
	
	$link = doLink($link);
	if(inString($link, '?')){$link .='&';} else {$link .='?';}
	$link .= 'v='.$device;

	return '<a href="'.$link.'" title="switch to '.$device.'" class="renderlink">'.$device.'</a>';
}





/**
 * ---------------------------------------------------------------------------
 *  Begin IMAGE functions
 * ---------------------------------------------------------------------------
 */

//Returns responsive and transparent image
function responsiveImg($image='', $path='asset'){
	if(isEmpty($image)){return FALSE;}

	$image = pathTo($path).$image;

	#prepare and return
	if(isIE('==', 6)){$image .= '-ie6';}
	$apend = Device::is();
	
	if(is_file($image.'-'.$apend.'.png')){return $image.'-'.$apend.'.png';}
	elseif(is_file($image.'-'.$apend.'.jpg')){return $image.'-'.$apend.'.jpg';}
	elseif(is_file($image.'-'.$apend.'.gif')){return $image.'-'.$apend.'.gif';}
	elseif(is_file($image.'.png')){return $image .='.png';}
	elseif(is_file($image.'.jpg')){return $image .='.jpg';}
	elseif(is_file($image.'.gif')){return $image .='.gif';}
	
	return $image .='.png';
}


// Prepares images tag for slide
function slideImg($name='1', $caption='', $alt=''){
	if(isEmpty($alt) && !isEmpty($name)){$alt = $name;}
	
	$apend = strtolower(Device::is());

	#prepare image file
	$path = PATH_SLIDE.PS;
	$image = '';
	if(is_dir($path)){
		$image = $path.$name.'-'.$apend.'.jpg';
		if(!is_file($image)){$image = $path.$name.'.jpg';}
	} else {
		$path = PATH_ASSET.PS;
		$image = $path.'slide-'.$name.'-'.$apend.'.jpg';
		if(!is_file($image)){$image = $path.'slide-'.$name.'.jpg';}
	}
	
	$slideImg = '<img class="slides" src="'.$image.'"';
	$slideImg .= ' alt="'.$alt.'">';
	if(!isEmpty($caption)){$slideImg .= '<p class="caption">'.$caption.'</p>';}
	
	return $slideImg;
}

function slideShow($data=''){
	$slide =''; $name =''; $caption =''; $alt =''; global $slideImgData;
	if(isEmpty($data) && !isEmpty($slideImgData)){$data = $slideImgData;}
	
	if(is_array($data)){
		foreach($data as $row){
			$slide .='	<li>';
			if(is_array($row)){
				if(!isEmpty($row['name'])){$name = $row['name'];}
				if(!isEmpty($row['caption'])){$caption = $row['caption'];}
				if(!isEmpty($row['alt'])){$alt = $row['alt'];}
				elseif(!isEmpty($row['caption'])){$alt = $row['caption'];}
				elseif(!isEmpty($row['name'])){$alt = $row['name'];}
			}
			$slide .= slideImg($name, $caption, $alt).'</li>'."\n";
		}
	}
	
	return $slide;
}




/**
 * ---------------------------------------------------------------------------
 *  Begin HTML related functions
 * ---------------------------------------------------------------------------
 */

//Displays HTML notification
function notify($msg='', $class='notice', $wrap='span'){
	if(!isEmpty($msg)){
		$notify = $msg;
		if(!isEmpty($wrap)){
 			$wrap = strtolower($wrap);
			$prep_wrap = '<'.$wrap;
			if(!isEmpty($class)){
 				$class = strtolower($class);
				$prep_class = ' class="'.$class.'"';

				$prep_wrap .= $prep_class;
			}
			$prep_wrap .= '>'.$msg.'</'.$wrap.'>';

			$notify = $prep_wrap;
		}

		echo $notify; return;
	}

	return FALSE;
}


//Returns unsupported browser notice
function staleBrowser($browser=''){
	$stale = '<div class="content">'."\n";
	$stale .= '<h3>Unsupported Browser!</h3>'."\n";
	$stale .= '<p>Opps, we are sorry for this awkwardness<br>'."\n";
	$stale .= 'You appear to be using a ';
	if($browser == 'ie'){$stale .= 'very stale version of Internet Explorer ';}
	else {$stale .= 'browser or a very stale version of a browser. ';}	
	$stale .= ' that we do not support.<br>'."\n";
	$stale .= 'Please upgrade to a more recent version or download other modern browsers.<br>'."\n";
	$stale .= "Don't know where to start? - ask ".makeLinkExternal('http://www.google.com', 'Google.com').'</p>'."\n";
	$stale .= '<p class="spaceTop">You may reach us at ';
	$stale .= '<a href="mailto:'.erko3::$webmaster.'" target="_blank" class="email">'.erko3::$webmaster.'</a></p>'."\n";
	$stale .= '</div>'."\n";
	
	echo $stale;
}


//Returns error 404 notice | TODO - upgrade
function notFound($data='', $return='display'){ #display | email | sms | log | all
	$notice = '<article id="article">'."\n";
	$notice .= '<h3 class="heading">'.capitalize(cleanup($data['name'])).' - Not Found!</h3>'."\n";
	$notice .= '<div class="article-container">'."\n";
	$notice .= '<div class="content">'."\n";
	$notice .= '<p>We are sorry for this awkwardness.<br>The  document you requested is currently unavailable.<br>';
	$notice .= 'Please return to '.makeLink('index', erko3::$name).'</p>'."\n";
	$notice .= '<p class="spaceTop">You may report this issue to us via ';
	$notice .= '<a href="mailto:'.erko3::$webmaster.'" target="_blank" class="paralink">'.erko3::$webmaster.'</a></p>'."\n";
	$notice .= '</div>'."\n";
	if(SET_MODE == 'development'){
		$notice .= '<pre><tt>';
		$notice .= '<b>Name:</b> '.$data['name']."\t";
		$notice .= '<b>Type:</b> '.$data['type']."\t";
		$notice .= '<b>File:<b> '.$data['file'];
		$notice .= '</tt></pre>'."\n";;
	}
	$notice .= '</div>'."\n";
	$notice .= '</article>'."\n";

	if($return == 'all' || $return == 'display'){echo $notice;}

	return;
}


//Handles redirect URL
function redirect($location='', $delay='none', $report = 'on'){
	if(!isEmpty($location)){
		$duration = $delay; if($delay == 'none'){$duration = 0;}
		if (!headers_sent($filename, $linenum)){
			if($duration != 0){header("Refresh:".$duration.";URL=".$location);}
			else{header('Location: '.$location); exit;}
		} else {
			$operation = '<meta http-equiv="refresh" content="'.$duration.'; url='.$location.'">';
			$content ='<p class="redirect">You are now being redirected. <br>Please wait or <a href="'.$location.'">click here</a>.</p>';
			echo $operation; echo "\n"; if($report == 'on'){echo $content;}
			if($duration == 0 && $report == 'on'){exit;}
		}
		return;
	}

	return FALSE;
}


// Loads current page's view
function view($view='current'){
	if($view == 'current' || isEmpty($view)){$view = erko3::page('name');}
	return erko3::content($view, 'page');
}


// Loads specific slice
function slice($slice='index', $type=''){
	if(isEmpty($slice)){$slice = 'index';}
	if(!isEmpty($type)){$slice = $type.'.'.$slice;}
	return erko3::content($slice, 'slice');
}


// Loads current controller
function organizer($organizer='current'){
	if($organizer == 'current' || isEmpty($organizer)){$organizer = erko3::page('name');}
	return slice($organizer, 'organizer');
}


// Loads current controller
function model($model='current'){
	if($model == 'current' || isEmpty($model)){$model = erko3::page('name');}
	return slice($model, 'model');
}


// Loads specific layout
function layout($layout='current'){
	if($layout == 'current' || isEmpty($layout)){$layout = erko3::page('name');}
	return slice($layout, 'layout');
}


// Loads specific code library
function code($code='current'){
	if($code == 'current' || isEmpty($code)){$code = erko3::page('name');}
	return slice($code, 'code');
}


// Loads specific plugin library
function plug($plug='current'){
	if($plug == 'current' || isEmpty($plug)){$plug = erko3::page('name');}
	return slice($plug, 'plug');
}


// Returns option to switch rendition
function renderNav(){
$render = '<div id="render">'."\n";
$render .= '<ul id="renderNav" class="navigation">'."\n";
#$render .= 'Switch'; if(Device::is() != 'phone'){$render .= ' to';} $render .= ': '."\n";

if(device::is() == 'phone' || device::is() == 'tablet'){
	$render .= '	<li>'.render('desktop').'</li>'."\n";
} else {
	$render .= '	<li>'.render('tablet').'</li>'."\n";
}

$render .= '	<li';if(isIE('<', 9)){$render .= ' class="last"';} $render .='>';
if(device::is() == 'phone'){$render .= render('tablet');}
elseif(device::is() == 'tablet'){$render .= render('phone');}
else {$render .= render('phone');}
$render .= '</li>'."\n".'</ul>'."\n".'</div>'."\n";

return $render;
}


// Returns H1
function heading($value=''){
	if(isEmpty($value)){
		#get configure heading
		$config = erko3::$config;
		$page = erko3::page('name');
		$heading = $config['heading'];
		
		$pageHeading = '';

		#if heading exist for page in global configuration
		if(!empty($heading) && array_key_exists($page, $heading)){
			$pageHeading .= $heading[$page];
		}
		else {
			#build heading for index page {making sure site name exist}				
			if($page == 'index'){
				if(!empty(erko3::$name)){$pageHeading .= erko3::$name;}
				if(!empty(erko3::$slogan)){$pageHeading .= ' - '.sentence(erko3::$slogan);}
			}
			else {
				$pageHeading .= capitalize(cleanup($page));
				if(!empty(erko3::$name)){$pageHeading .= ' | '.erko3::$name;}
			}			
		}
	}
	else {$pageHeading = $value;}
	
	return sentence($pageHeading);
}


// Returns date formated responsively
function responsiveDate(){
	$device = Device::is();
	if($device == 'phone'){$date = doDate('dateD1');}
	elseif($device == 'tablet'){$date = doDate('dateD3');}
	else {$date = doDate();}
	
	return $date;
}


// Returns breadcrumb
function breadcrumb($crumb=''){
	#build crumb
	if(isEmpty($crumb)){
		$brand = erko3::$name; $page = erko3::page(); $device = Device::is();

		if($page == 'index'){$crumb .= 'Welcome to ';}

		#add brand name to breadcrumb
		if($device == 'phone' && !isEmpty(erko3::$squat)){$brand = stringSwap(erko3::$squat, 'imited', 'td');}
		elseif($device == 'tablet' && !isEmpty(erko3::$name)){$brand = stringSwap(erko3::$name, 'imited', 'td');}
		elseif($page == 'index' && !isEmpty(erko3::$name)){$brand = erko3::$name;}
		elseif(!isEmpty(erko3::$brand)){$brand = erko3::$brand;}			

		$crumb .='<a href="'.pathTo().'" title="'.erko3::$squat.'" class="brand">'.$brand.'</a>';

		#add page name to breadcrumb
		if($page != 'index'){
			if(!isEmpty($crumb)){$crumb .= ' » ';}
			$page = cleanup($page);
			$page = wordAsCap($page);
			$page = capitalize($page);
			
			#TODO - check if page is sub-page and run breadcrum as such
			$crumb .= $page;
		}
	}
	
	return $crumb;
}


// Returns responsive greeting
function greeting($remark='nope'){
	#build greeting
	$hour = date("H");
	if($hour < 12){$greeting = 'Good Morning!';}
	elseif($hour < 17){$greeting = 'Good Afternoon!';}
	else {$greeting = 'Good Evening!';}

	if($remark == 'sure'){
		$hasRemark = FALSE;
		if($hour > 2 && $hour < 7){$hasRemark = "You're up early";}
		elseif($hour > 21 || $hour < 3){$hasRemark = "You're up late";}
		if($hasRemark){$greeting = $hasRemark.' - <em>'.$greeting.'</em>';}
	}

	return $greeting;
}


// Returns copyright branding
function copyright($from='', $reserved='nope', $to='now'){
	#prepare
	
	#TODO - make $from and $to is either empty or contains a valid date string		
	if($to == 'now'){$to = date("Y");}

	#prepare copyright text
	$copyright ='';
	if(Device::is() == 'desktop' && isEmpty($from)){$copyright .='Copyright';}
	$copyright .=' &copy;';
	
	#prepare link (open)
	$link = '<a href="'.pathTo().'" class="brand" title="'.erko3::$name.'">';

	#prepare brand
	$brand ='';
	if(!isEmpty($link)){$brand .= $link;}

	if(Device::is() == 'phone' && !isEmpty(erko3::$brand)){$brand .=erko3::$brand;}
	elseif(Device::is() == 'tablet'  && !isEmpty(erko3::$brand)){
		$brand .= stringSwap(erko3::$name, 'imited', 'td');
	}
	elseif(!isEmpty(erko3::$name)){$brand .= $link.erko3::$name;}

	#prepare link (close)
	if(!isEmpty($link)){$brand .='</a>';}
	
	#prepare result (add timeline)
	if(isEmpty($from)){$result = $copyright.' '.$to.' '.$brand;}
	else {$result = $brand.' '.$copyright.' '.$from.' - '.$to;}

	#add rights
	if($reserved == 'sure'){$result .= ' All rights reserved';}

	return $result;
}
?>