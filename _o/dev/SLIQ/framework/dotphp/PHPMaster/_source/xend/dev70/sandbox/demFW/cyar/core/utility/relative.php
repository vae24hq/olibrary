<?php
/* CYAR™ framework is an evolving library for rapid & efficient development of modem responsive static or dynamic website and applications.
 * Built and maintained at OIAVO™ using PHP, MySQL, HTML, CSS, JS & derived technology. Version 0.0.1 | CYAR™ Web framework © 2016
 * ========================================================================================================================================
 * PHP | utility::relative ~ relatively essential functions | Dependency » utility {vital} + class {cyar}
 */

//-------------- Returns defined path to a directory ---------------
function pathTo($dir='', $format='relative'){#[relative|absolute]
	$path = '';
	if($dir == 'asset'){$path = PATH_ASSET.PS;}	
	if($dir == 'favicon'){$path = PATH_FAVICON.PS;}
	if($dir == 'image'){$path = PATH_IMG.PS;}
	if($dir == 'styles'){$path = PATH_CSS.PS;}
	if($dir == 'javascript'){$path = PATH_JS.PS;}
	if($dir == 'slide'){$path = PATH_SLIDE.PS;}
	if($dir == 'upload'){$path = PATH_UPLOAD.PS;}
	if($format == 'absolute' && !isEmpty(cyar::baseurl())){
		$path = cyar::baseurl().'/'.$path;
	}
	elseif($format == 'relative'){
		if(REWRITE_URL == 'sure' && route('trim') != 'index'){
			if(isset($_GET['page']) && !empty($_GET['page'])){$url = $_GET['page'];}
			if(inString($url, '/')){ #make sure '/' exist in URL before you attempt to add '/' to path
				if(inString(route(), '_')){
					#check how many '_' you have in page name {'_' indicates '/' in url}
					$pos = posChar(route(), '_', 'all');
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
				else {$path = './'.$path;}
			} 
			elseif($dir == 'index'){$path = './';}	#when '/' doesn't exist in URL
		} elseif($dir == 'index'){$path = './';}
	}
	return $path;
}



/**
 * ===========================================================================
 *  Begin ETC functions, dependent and important to erko3 framework
 * ===========================================================================
 */

//Return file information of existing file {file.ext | ./file.etx | dir/file.ext | ./dir/file.ext}
// function fileInfo($request='name', $file='self'){
// 	#error check
// 	$data = array('name', 'file', 'extension', 'directory', 'all');
// 	if(isEmpty($request) || isEmpty($file) || (!in_array($request, $data))){
// 		$msg = 'Invalid Arguments on '.__FUNCTION__.'()';
//  		return printMsg($msg);
// 	}

// 	#prepare file
// 	if($file == 'self'){
// 		$file = $_SERVER['PHP_SELF'];
// 		if(inString($file, '/')){$file = stringSwap($file, '/', '');}
// 	}
	
// 	#make sure file exist and return result
// 	if(is_file($file)){
// 		$fileInfo  = pathinfo($file);

// 		if($request == 'name'){return $fileInfo['filename'];}
// 		elseif($request == 'file'){return $fileInfo['basename'];}	
// 		elseif($request == 'extension'){return $fileInfo['extension'];}
// 		elseif($request == 'directory'){return $fileInfo['dirname'];}
// 		else {return $fileInfo;}
// 	}
	
// 	return FALSE;	
// }


// //Return size in readable format and actual size (Terabyte below)
// function formatSize($size='', $sizing='general'){
// 	#validate
// 	if(isEmpty($size)){return FALSE;}

// 	#prepare task
	
// 	if($sizing == 'actual'){
// 		if($size >= 1099511627776){$format = number_format($size / 1099511627776 , 2) . ' TB';}
// 		elseif($size >= 1073741824){$format = number_format($size / 1073741824 , 2) . ' GB';}
// 		elseif($size >= 1048576){$format = number_format($size / 1048576 , 2) . ' MB';}
// 		elseif($size >= 1024){$format = number_format($size / 1024 , 2) . ' KB';}
// 		elseif($size > 1 && $size < 1024){$format = $size . ' Bytes';}
// 	}
// 	else {
// 		if($size >= 1000000000000){$format = number_format($size / 1000000000000 , 2) . ' TB';}
// 		elseif($size >= 1000000000){$format = number_format($size / 1000000000 , 2) . ' GB';}
// 		elseif($size >= 1000000){$format = number_format($size / 1000000 , 2) . ' MB';}
// 		elseif($size >= 1000){$format = number_format($size / 1000 , 2) . ' KB';}
// 		elseif($size > 1 && $size < 1000){$format = $size . ' Bytes';}		
// 	}

// 	if($size == 1){$format = $size . ' Byte';}
// 	elseif($size < 1){$format = '0';}

//  	if(inString($format, '.00')){$format = stringSwap($format, '.00', '');}
//  	return $format;
// }


// //Return encrypted or decrypted data
// function doCrypt($data='', $pattern='flex'){
// 	if(!isEmpty($data)){
// 		if ($pattern == 'crypt'){
// 			$data = hash("md5", $data);
// 			$data = sha1($data);
// 			$data = md5($data);
// 		}
// 		elseif($pattern == 'strict'){$data = md5($data);}
// 		elseif ($pattern == 'reverse'){$data = base64_decode($data);}
// 		else {$data = base64_encode($data);}
// 	}
// 	else {return FALSE;}

// 	return $data;
// }




// //Return random value
// function randomize($return =''){
// 	$prid = mt_rand(100000000, 999999999);
// 	if($return=='prid'){return $random = $prid;}
// 	$suid = str_shuffle(time()).mt_rand(10000, 99999);
// 	if($return=='suid'){return $random = $suid;}
// 	if($return=='time'){return $random = time();}

// 	$alphabets = array('A','a','B','b','C','c','D','d','E','e','F','f','G','g','H','h','I','i','J','j','K','k','L','l','M','m','N','n','O','o','P','p','Q','q','R','r','S','s','T','t','U','u','V','v','W','w','X','x','Y','y','Z','z');
// 	$randAlphabets = array_rand($alphabets, 51);
// 	$randAlphabet = ($alphabets[$randAlphabets[mt_rand(0,9)]]);

// 	$numbers = array(0,1,2,3,4,5,6,7,8,9);
// 	$randNumbers = array_rand($numbers, 10);
// 	$randNumber = ($numbers[$randNumbers[mt_rand(0,9)]]);

// 	if($return=='tuid'){
// 		$random = ($alphabets[$randAlphabets[mt_rand(0,9)]]);
// 		$random .= str_shuffle($suid);
// 		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
// 		$random .= mt_rand(1000, 9999);
// 		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
// 		return $random;
// 	}

// 	if($return=='bind'){
// 		$random = mt_rand(100, 999);
// 		$random .= time();
// 		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
// 		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
// 		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
// 		$random .= str_shuffle($suid);
// 		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
// 		$random .= str_shuffle($prid);
// 		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
// 		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
// 		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
// 		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
// 		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
// 		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
// 		return $random;
// 	}
// 	if($return=='logid'){return str_shuffle(randomize('prid').randomize('bind').randomize('tuid'));}
// 	if(isEmpty($return)){return mt_rand();}
// }


// //Return IP validation
// function isIP($ip=''){
// 	if(empty($ip)){return FALSE;}
// 	if(strtolower($ip) === 'unknown'){return FALSE;}

// 	#prepare task
// 	$prep = ip2long($ip);
// 	if($prep !== FALSE && $prep !== -1){
// 		$prep = sprintf('%u', $prep);
// 		if ($prep >= 0 && $prep <= 50331647){return FALSE;}
// 		if ($prep >= 167772160 && $prep <= 184549375){return FALSE;}
// 		if ($prep >= 2130706432 && $prep <= 2147483647){return FALSE;}
// 		if ($prep >= 2851995648 && $prep <= 2852061183){return FALSE;}
// 		if ($prep >= 2886729728 && $prep <= 2887778303){return FALSE;}
// 		if ($prep >= 3221225984 && $prep <= 3221226239){return FALSE;}
// 		if ($prep >= 3232235520 && $prep <= 3232301055){return FALSE;}
// 		if ($prep >= 4294967040){return FALSE;}
// 	}

// 	return TRUE;
// }


// function getIP(){
// 	if(!empty($_SERVER['HTTP_CLIENT_IP']) && isIP($_SERVER['HTTP_CLIENT_IP'])){
// 		return $_SERVER['HTTP_CLIENT_IP'];
// 	}

// 	if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
// 		if(strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== FALSE){
// 			$IPs = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
// 			foreach($IPs as $IP){
// 				if(isIP($IP)){return $IP;}
// 			}
// 		} else {
// 			if(isIP($_SERVER['HTTP_X_FORWARDED_FOR'])){
// 				return $_SERVER['HTTP_X_FORWARDED_FOR'];
// 			}
// 		}
// 	}

// 	if(!empty($_SERVER['HTTP_X_FORWARDED']) && isIP($_SERVER['HTTP_X_FORWARDED'])){
// 		return $_SERVER['HTTP_X_FORWARDED'];
// 	}
// 	if(!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && isIP($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])){
// 		return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
// 	}
// 	if(!empty($_SERVER['HTTP_FORWARDED_FOR']) && isIP($_SERVER['HTTP_FORWARDED_FOR'])){
// 		return $_SERVER['HTTP_FORWARDED_FOR'];
// 	}
// 	if(!empty($_SERVER['HTTP_FORWARDED']) && isIP($_SERVER['HTTP_FORWARDED'])){
// 		return $_SERVER['HTTP_FORWARDED'];
// 	}

// 	return $_SERVER['REMOTE_ADDR'];
// }




// /**
//  * ===========================================================================
//  *  Begin TIME & DATE functions, dependent and important to erko3 framework
//  * ===========================================================================
//  */

// //Set default timezone
// function setTimezone($zone='domestic'){
//  	if(isEmpty($zone)){return FALSE;}

// 	if($zone == 'domestic'){$zone = date_default_timezone_set('Africa/Lagos');}
// 	else {
// 		$iszone = in_array($zone, timezone_identifiers_list());
// 		if(!$iszone){
// 			$msg = ' invalid timezone {'.$zone.'} ';
// 			return printMsg($msg);
// 		}
// 		else {$zone = date_default_timezone_set($zone);}
// 	}
//  	return $zone;
// }


// //Return microfloats
// function microTimeFloat(){
// 	list($usec, $sec) = explode(" ", microtime());
// 	return ((float)$usec + (float)$sec);
// }


// //Make timestamp
// function doTimestamp($timeString='now', $caller=''){
//  	if(isEmpty($timeString)){return FALSE;}
//  	if(!isEmpty($caller)){$caller = ' on '.$caller;}

// 	$stamp = strtotime($timeString);
// 	if(!$stamp){
// 		$msg = ' timestamp conversion failed {'.$timeString.'} '.$caller;
// 		return printMsg($msg);
// 	}
//  	return $stamp;
// }


// //Make time
// function doTime($format='time', $time='now'){
//  	if(isEmpty($format) || isEmpty($time)){return FALSE;}
// 	if($time=='now'){$timeIs = time();}
// 	else {
// 		if(is_int($time) || is_numeric($time)){$timeIs = $time;}
// 		else {
// 			$timeIs = doTimestamp($time, __FUNCTION__);
// 			if(!$timeIs){
// 				if(is_numeric($time)){$timeIs = $time;}
// 				else {return printMsg(' invalid time ['.$time.']');}
// 			}
// 		}
// 	}
// 	if($format=='time'){$formatIs = 'h:i:s A';}
// 	elseif($format ='unix'){return $timeIs;}
// 	else {$formatIs = $format;}
// 	return date($formatIs, $timeIs);
// }


// //Make date
// function doDate($format='date', $date='today'){
//  	if(isEmpty($format) || isEmpty($date)){return FALSE;}
// 	if($date == 'today'){$dateIs = time();}
// 	else {
// 		if(is_int($date) || is_numeric($date)){$dateIs = $date;}
// 		else {
// 			$dateIs = doTimestamp($date, __FUNCTION__);
// 			if(!$dateIs){
// 				if(is_numeric($date)){$dateIs = $date;}
// 				else {return printMsg(' invalid date ['.$date.']');}
// 			}
// 		}
// 	}
// 	if($format == 'date'){$formatIs = 'l, F d, Y';}
// 	elseif($format == 'time'){$formatIs = 'h:i:s A';}
// 	elseif($format == 'dateAndtime'){$formatIs = 'l, F d, Y h:i:s A';}
// 	elseif($format == 'report'){$formatIs = 'd/m/Y h:i:s A';}
// 	elseif($format == 'dateD1'){$formatIs = 'd/m/Y';}
// 	elseif($format == 'dateD2'){$formatIs = 'd-m-Y';}
// 	elseif($format == 'dateD3'){$formatIs = 'F d, Y';}
// 	elseif($format == 'sqlDateTime'){$formatIs = 'Y-m-d h:i:s';}
// 	//for the following, RETURN
// 	elseif($format == 'letter'){return date('j').'<sup>'.date('S').'</sup> '.date('F, Y');}
// 	elseif($format == 'letter2'){return date('M j').'<sup>'.date('S').'</sup> '.date('Y');}
// 	elseif($format == 'letter3'){return date('F j').'<sup>'.date('S').'</sup> '.date('Y');}
// 	elseif($format == 'unix'){return $dateIs;}
// 	else {$formatIs = $format;}
// 	return date($formatIs, $dateIs);
// }


// //Returns age from date of birth {YYYY-MM-DD}
// function getAge($birthDate=''){
//  	if(isEmpty($birthDate)){return FALSE;}
// 	$time = time();
// 	$day = date("d", $time); $month = date("m", $time); $year = date("Y", $time);
// 	$birthDay = substr($birthDate, 8, 2); $birthMonth = substr($birthDate, 5, 2); $birthYear = substr($birthDate, 0, 4);
// 	if($month < $birthMonth){$subtract = 1;}
// 	elseif($month == $birthMonth){
// 		if($day < $birthDay){$subtract = 1;}
// 		else {$subtract = 0;}
// 	}
// 	else {$subtract = 0;}

// 	return $year-$birthYear-$subtract;
// }


// //Calculate time diffrence - TODO - upgrade and add features
// function getTimeDifference($past='', $future=''){
// 	$past = new DateTime($past);
// 	$future = new DateTime($future);
// 	$interval = $past->diff($future);
// 	return $interval->format('%a total days');
// }


// //Calculates time spent {from the past - unixtime} untill now - Returns array
// function timeSpent($pastUnixTime='', $futureUnixTime='now'){
//  	if(isEmpty($pastUnixTime)){return FALSE;} #TODO - make sure its valid unix timestamp

// 	if(isEmpty($futureUnixTime) || $futureUnixTime == 'now'){$now = time();} else {$now = $futureUnixTime;}
// 	$nowDate = date("j", $now); $nowMonth = date("n", $now); $nowyear = date("Y", $now);
// 	$timeDate = date("j", $pastUnixTime); $timeMonth = date("n", $pastUnixTime); $timeYear = date("Y", $pastUnixTime);
// 	$spent = "  => "; $numVar = 0; $unit ="  => ";
// 	if($now >= $pastUnixTime){
// 		switch(TRUE){
// 			case($now-$pastUnixTime < 60):
// 				#RETURNS SECONDS
// 				$seconds = $now-$pastUnixTime; $spent = $seconds; $numVar = 773; $unit = 'second';
// 				break;

// 			case ($now-$pastUnixTime < 3600):
// 				#RETURNS MINUTES
// 				$minutes = round(($now-$pastUnixTime)/60); $spent = $minutes; $numVar = 774; $unit = 'minute';
// 				break;

// 			case ($now-$pastUnixTime < 86400):
// 				#RETURNS HOURS
// 				$hours = round(($now-$pastUnixTime)/3600); $spent = $hours; $numVar = 775; $unit = 'hour';
// 				break;

// 			case ($now-$pastUnixTime < 1209600):
// 				#RETURNS DAYS
// 				$days = round(($now-$pastUnixTime)/86400); $spent = $days; $numVar = 776; $unit = 'day';
// 				break;

// 			case (mktime(0, 0, 0, $nowMonth-1, $nowDate, $nowyear) < mktime(0, 0, 0, $timeMonth, $timeDate, $timeYear)):
// 				#RETURNS WEEKS
// 				$weeks = round(($now-$pastUnixTime)/604800); $spent = $weeks; $numVar = 777; $unit = 'week';
// 				break;

// 			case (mktime(0, 0, 0, $nowMonth, $nowDate, $nowyear-1) < mktime(0, 0, 0, $timeMonth, $timeDate, $timeYear)):
// 				#RETURNS MONTHS
// 				if($nowyear==$timeYear){$subtract = 0;} else {$subtract = 12;}
// 				$months = round($nowMonth-$timeMonth+$subtract); $spent = $months; $numVar = 778; $unit = 'month';
// 				break;

// 			default:
// 				#RETURNS YEARS
// 				if($nowMonth<$timeMonth){$subtract = 1;}
// 				elseif($nowMonth==$timeMonth){
// 					if($nowDate<$timeDate){$subtract = 1;}
// 					else {$subtract = 0;}
// 				}
// 				else {$subtract = 0;}
// 				$years = $nowyear-$timeYear-$subtract;
// 				$spent = $years;
// 				$numVar = 779;
// 				$unit = 'year';
// 				if($years == 0) {$spent = "  => "; $numVar = 0;}
// 				break;
// 		}

// 		return Array($numVar, $spent, $unit);
// 	}
// 	else {
// 		$msg = ' Please enter a past time';
// 		return printMsg($msg);
// 	}
// }


// //Return duration of time {from the past - unixtime} untill now
// function getTimeSpent($pastUnixTime='', $futureUnixTime='now'){
//  	if(!isEmpty($pastUnixTime)){
// 		$spent = timeSpent($pastUnixTime, $futureUnixTime);
// 		$count = $spent['1']; $unit = $spent['2'];
// 		if($count > 1){$unit = ($unit.'s');}
// 		return ($count.' '.$unit.' ago');
// 	}
// 	return FALSE;
// }

// function fileInfo($task='name', $file='self'){
// 	if($file == 'self'){$file = $_SERVER['PHP_SELF'];}
// 	if(is_file($file)){
// 		$pathdetails = pathinfo($file);
// 		$ext = '.'.$pathdetails['extension'];
// 		$task = basename($file, $ext);
// 		if($task=='filename'){$task = $task.$ext;}
// 		elseif($task=='file'){$task = $file;}
// 		elseif($task=='name'){$task = $task;}
// 		elseif($task=='ext'){$task = $ext;}
// 		return $task;
// 	}
// 	return FALSE;
// }

// function formatSize($size='', $sizing='general'){
// 	if(isEmpty($size)){return FALSE;}
// 	if($sizing == 'actual'){
// 		if($size >= 1099511627776){$format = number_format($size / 1099511627776 , 2) . ' TB';}
// 		elseif($size >= 1073741824){$format = number_format($size / 1073741824 , 2) . ' GB';}
// 		elseif($size >= 1048576){$format = number_format($size / 1048576 , 2) . ' MB';}
// 		elseif($size >= 1024){$format = number_format($size / 1024 , 2) . ' KB';}
// 		elseif($size > 1 && $size < 1024){$format = $size . ' Bytes';}
// 	}
// 	else {
// 		if($size >= 1000000000000){$format = number_format($size / 1000000000000 , 2) . ' TB';}
// 		elseif($size >= 1000000000){$format = number_format($size / 1000000000 , 2) . ' GB';}
// 		elseif($size >= 1000000){$format = number_format($size / 1000000 , 2) . ' MB';}
// 		elseif($size >= 1000){$format = number_format($size / 1000 , 2) . ' KB';}
// 		elseif($size > 1 && $size < 1000){$format = $size . ' Bytes';}		
// 	}
// 	if($size == 1){$format = $size . ' Byte';}
// 	elseif($size < 1){$format = '0';}
//  	if(inString($format, '.00')){$format = stringSwap($format, '.00', '');}
//  	return $format;
// }

// function addFile($file='', $persist='sure', $check='strict'){
//  	if(isEmpty($file)){exit('{file include error}: file for inclusion is required');}
//  	if(!is_file($file) && $check =='strict'){exit('The file "{'.$file.'} does not exist!');}
//  	elseif($persist != 'nope'){include_once($file);}
//  	else {include($file);}
// }

// function isIP($ip=''){
// 	if(empty($ip)){return FALSE;}
// 	if(strtolower($ip) === 'unknown'){return FALSE;}
// 	$prep = ip2long($ip);
// 	if($prep !== FALSE && $prep !== -1){
// 		$prep = sprintf('%u', $prep);
// 		if ($prep >= 0 && $prep <= 50331647){return FALSE;}
// 		if ($prep >= 167772160 && $prep <= 184549375){return FALSE;}
// 		if ($prep >= 2130706432 && $prep <= 2147483647){return FALSE;}
// 		if ($prep >= 2851995648 && $prep <= 2852061183){return FALSE;}
// 		if ($prep >= 2886729728 && $prep <= 2887778303){return FALSE;}
// 		if ($prep >= 3221225984 && $prep <= 3221226239){return FALSE;}
// 		if ($prep >= 3232235520 && $prep <= 3232301055){return FALSE;}
// 		if ($prep >= 4294967040){return FALSE;}
// 	}

// 	return TRUE;
// }

// function getIP(){
// 	if(!empty($_SERVER['HTTP_CLIENT_IP']) && isIP($_SERVER['HTTP_CLIENT_IP'])){
// 		return $_SERVER['HTTP_CLIENT_IP'];
// 	}
// 	if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
// 		if(strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== FALSE){
// 			$IPs = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
// 			foreach($IPs as $IP){
// 				if(isIP($IP)){return $IP;}
// 			}
// 		} else {
// 			if(isIP($_SERVER['HTTP_X_FORWARDED_FOR'])){
// 				return $_SERVER['HTTP_X_FORWARDED_FOR'];
// 			}
// 		}
// 	}
// 	if(!empty($_SERVER['HTTP_X_FORWARDED']) && isIP($_SERVER['HTTP_X_FORWARDED'])){
// 		return $_SERVER['HTTP_X_FORWARDED'];
// 	}
// 	if(!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && isIP($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])){
// 		return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
// 	}
// 	if(!empty($_SERVER['HTTP_FORWARDED_FOR']) && isIP($_SERVER['HTTP_FORWARDED_FOR'])){
// 		return $_SERVER['HTTP_FORWARDED_FOR'];
// 	}
// 	if(!empty($_SERVER['HTTP_FORWARDED']) && isIP($_SERVER['HTTP_FORWARDED'])){
// 		return $_SERVER['HTTP_FORWARDED'];
// 	}
// 	return $_SERVER['REMOTE_ADDR'];
// }

// /** Begin DATE/TIME functions ---------------------------------- **/
// function setTimezone($zone='domestic'){
//  	if(isEmpty($zone)){return FALSE;}
// 	if($zone == 'domestic'){$zone = date_default_timezone_set('Africa/Lagos');}
// 	else {
// 		$iszone = in_array($zone, timezone_identifiers_list());
// 		if(!$iszone){
// 			$msg = ' invalid timezone {'.$zone.'} ';
// 			return printMsg($msg);
// 		}
// 		else {$zone = date_default_timezone_set($zone);}
// 	}
//  	return $zone;
// }

// function doTimestamp($timeString='now', $caller=''){
//  	if(isEmpty($timeString)){return FALSE;}
//  	if(!isEmpty($caller)){$caller = ' on '.$caller;}

// 	$stamp = strtotime($timeString);
// 	if(!$stamp){
// 		$msg = ' timestamp conversion failed {'.$timeString.'} '.$caller;
// 		return printMsg($msg);
// 	}
//  	return $stamp;
// }

// function doTime($format='time', $time='now'){
//  	if(isEmpty($format) || isEmpty($time)){return FALSE;}
// 	if($time=='now'){$timeIs = time();}
// 	else {
// 		if(is_int($time) || is_numeric($time)){$timeIs = $time;}
// 		else {
// 			$timeIs = doTimestamp($time, __FUNCTION__);
// 			if(!$timeIs){
// 				if(is_numeric($time)){$timeIs = $time;}
// 				else {return printMsg(' invalid time ['.$time.']');}
// 			}
// 		}
// 	}
// 	if($format=='time'){$formatIs = 'h:i:s A';}
// 	elseif($format ='unix'){return $timeIs;}
// 	else {$formatIs = $format;}
// 	return date($formatIs, $timeIs);
// }

// function doDate($format='date', $date='today'){
//  	if(isEmpty($format) || isEmpty($date)){return FALSE;}
// 	if($date == 'today'){$dateIs = time();}
// 	else {
// 		if(is_int($date) || is_numeric($date)){$dateIs = $date;}
// 		else {
// 			$dateIs = doTimestamp($date, __FUNCTION__);
// 			if(!$dateIs){
// 				if(is_numeric($date)){$dateIs = $date;}
// 				else {return printMsg(' invalid date ['.$date.']');}
// 			}
// 		}
// 	}
// 	if($format == 'date'){$formatIs = 'l, F d, Y';}
// 	elseif($format == 'time'){$formatIs = 'h:i:s A';}
// 	elseif($format == 'dateAndtime'){$formatIs = 'l, F d, Y h:i:s A';}
// 	elseif($format == 'report'){$formatIs = 'd/m/Y h:i:s A';}
// 	elseif($format == 'dateD1'){$formatIs = 'd/m/Y';}
// 	elseif($format == 'dateD2'){$formatIs = 'd-m-Y';}
// 	elseif($format == 'dateD3'){$formatIs = 'F d, Y';}
// 	elseif($format == 'sqlDateTime'){$formatIs = 'Y-m-d h:i:s';}
// 	elseif($format == 'letter'){return date('j').'<sup>'.date('S').'</sup> '.date('F, Y');}
// 	elseif($format == 'letter2'){return date('M j').'<sup>'.date('S').'</sup> '.date('Y');}
// 	elseif($format == 'letter3'){return date('F j').'<sup>'.date('S').'</sup> '.date('Y');}
// 	elseif($format == 'unix'){return $dateIs;}
// 	else {$formatIs = $format;}
// 	return date($formatIs, $dateIs);
// }

// function getAge($birthDate=''){#{YYYY-MM-DD}s
//  	if(isEmpty($birthDate)){return FALSE;}
// 	$time = time();
// 	$day = date("d", $time); $month = date("m", $time); $year = date("Y", $time);
// 	$birthDay = substr($birthDate, 8, 2); $birthMonth = substr($birthDate, 5, 2); $birthYear = substr($birthDate, 0, 4);
// 	if($month < $birthMonth){$subtract = 1;}
// 	elseif($month == $birthMonth){
// 		if($day < $birthDay){$subtract = 1;}
// 		else {$subtract = 0;}
// 	}
// 	else {$subtract = 0;}
// 	return $year-$birthYear-$subtract;
// }


// /** Begin LINK functions ---------------------------------- **/
// function refererURL(){
// 	if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){return $_SERVER['HTTP_REFERER'];}
// 	else {return FALSE;}
// }

// function doLink($input=''){
// 	if(isEmpty($input)){return FALSE;}
// 	$input = stringSwap($input, '_', '-');
// 	$task = '?link='.trim(strtolower($input));
//  	return $task;
// }

// function selfLink(){
// 	$task = 'index';
// 	if(isset($_GET['link']) && !empty($_GET['link'])){$task = $_GET['link'];}
// 	$task = trimEdge($task);
// 	$task = stringSwap($task, '\\', '');
// 	$task = stringSwap($task, PS, '');
// 	$task = stringSwap($task, '~', '');
// 	$task = urldecode($task);
// 	return $task;
// }

// function isLinkActive($uri='index'){
// 	$uri = stringSwap($uri, '&', 'and', 'all');
// 	$task = selfLink();
// 	if($uri == $task){return TRUE;}
// 	return FALSE;
// }
?>