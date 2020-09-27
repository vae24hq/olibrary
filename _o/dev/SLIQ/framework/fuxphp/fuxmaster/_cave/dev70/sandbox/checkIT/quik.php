<?php
/* ======================================================================================
 *  Quik™ | build quickly - a micro framework for website development © 2016 [Cregnito™]
 * ======================================================================================
 */

/** Define Separators **/
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('PS') ? null : define('PS', '/');


/** Begin GENERAL functions ---------------------------------- **/
function isEmpty($data=''){
	if(!isset($data)){return TRUE;}
	else {
		if(is_array($data)){
			if(empty($data)){return TRUE;}
		} else {
			$data = trim($data);
			$length = strlen($data);
			if($length<1){return TRUE;}
		}
	}
	return FALSE;
}


/** Begin STRING functions ---------------------------------- **/
function trimEdge($string, $trim=''){
 	$string = trim($string);
 	if(!isEmpty($trim)){$string = trim($string, $trim);}
 	return $string;
}

function removeSpace($string){
	if(!isEmpty($string)){$string = preg_replace('/\s+/', '', $string);}
 	return $string;
}

function nthChar($string, $nth){
	$length = strlen($string);
	if($nth <= $length){
		$nth = (int)$nth -1;
		return $string[$nth];
	}
	return FALSE;
}

function posChar($string, $search, $occurence='all'){
	$offset = 1; $pos = FALSE;
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

function inString($string, $needle){
	if(strpos($string, $needle) !== false){return TRUE;}
	return FALSE;
}

function spaceSwap($string, $value, $inverse='nope'){
 	if($inverse == 'sure'){
 		return str_replace($value, ' ', $string);
 	}
 	return preg_replace('/\s+/', $value, $string);
}

function stringSwap($string, $search, $substitute , $occurence='all'){
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

function stringBefore($string, $search, $strip='sure'){
	$pos = strpos($string, $search);
	if($pos && $pos != 0){$result = substr($string, 0, $pos);}
	if($strip != 'sure'){$result = $result.$search;}
 	if(isset($result)){return $result;}
 	return FALSE;
}

function stringAfter($string, $search, $strip='sure'){
	$result = strstr($string, $search);
	if($result){
		if($strip == 'sure'){
			$result = str_replace($search, '', $result);
		}	
	}
 	return $result;
}

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
 	$library = implode(',', $library);
 	$library = strtolower($library);
 	$library = explode(',', $library);
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

function sentence($string){
 	$string = trim($string);
 	$string = ucfirst($string);
 	return $string;
}

function capitalize($string){
 	$string = trim($string);
 	$string = ucwords($string);
 	return $string;
}

function cleanup($string){
	$string = trim($string);
	$hyphens = array(
		'e-bank', 'e-banking', 'e-log', 'e-login', 'e-reg', 'e-register', 'e-registration',
		'i-bank', 'i-banking', 'i-log', 'i-login', 'i-reg', 'i-register', 'i-registration'
	);
	$clean = '';
	$words = preg_split('/\s+/', $string);
	foreach ($words as $word){
		$wordCheck = strtolower($word);
		if(inString($wordCheck, '.')){$wordCheck = trimEdge($wordCheck, '.');}
		#if(!in_array($wordCheck, $hyphens)){$word = stringSwap($word, '-', ' ');}
		$clean .= $word.' ';
	}
	$clean = stringSwap($clean, '_', ' ');
	$clean = wordAsCap($clean);
	$clean = stringSwap($clean, ' and', ' &');
	return trim($clean);
}

function url2domain($url){
	$domain = trim($url);
	$domain = stringSwap($domain, 'https://', '', 'first');
	$domain = stringSwap($domain, 'http://', '', 'first');
	$domain = stringSwap($domain, 'www.', '', 'first');
	if(inString($domain, '/')){$domain = stringBefore($domain, '/', 'sure');}
	return $domain;
}


/** Begin BROWSER functions ---------------------------------- **/
function browserAgent(){
	return strtolower($_SERVER['HTTP_USER_AGENT']);
}

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

function isIE($operator='', $version=''){
	if(!isEmpty($operator) && !isEmpty($version)){
		$ie = IE($operator, $version);
	} else {$ie = IE();}
  if(!$ie){return FALSE;}
  return TRUE;
}

function ieVer(){
	if(isIE()){return IE();}
	return FALSE;
}

function isOperamobi(){
	if(inString(browserAgent(), 'opera mobi')){return TRUE;}
	return FALSE;
}

function isOperamini(){
	if(inString(browserAgent(), 'opera mini')){return TRUE;}
	return FALSE;
}

function getBrowser($return='name'){
	if(isIE()){$info = 'ie';}
	elseif(isOperamobi()){$info = 'operamobi';}
	elseif(isOperamini()){$info = 'operamini';}
	else {$info = browserAgent();}
	return strtolower($info);
}


/** Begin DOCUMENT functions ---------------------------------- **/
function notFound($document=''){
	if(!empty($document)){$task = '<p class="paragraph"><i>The requested document <b>"'.$document.'"</b> is unavaliable</i></p>'."\n";}
	else {return false;}
	echo $task;
}

function fileInfo($task='name', $file='self'){
	if($file == 'self'){$file = $_SERVER['PHP_SELF'];}
	if(is_file($file)){
		$pathdetails = pathinfo($file);
		$ext = '.'.$pathdetails['extension'];
		$task = basename($file, $ext);
		if($task=='filename'){$task = $task.$ext;}
		elseif($task=='file'){$task = $file;}
		elseif($task=='name'){$task = $task;}
		elseif($task=='ext'){$task = $ext;}
		return $task;
	}
	return FALSE;
}

function formatSize($size='', $sizing='general'){
	if(isEmpty($size)){return FALSE;}
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


/** Begin EXTRA functions ---------------------------------- **/
function addFile($file='', $persist='sure', $check='strict'){
 	if(isEmpty($file)){exit('{file include error}: file for inclusion is required');}
 	if(!is_file($file) && $check =='strict'){exit('The file "{'.$file.'} does not exist!');}
 	elseif($persist != 'nope'){include_once($file);}
 	else {include($file);}
}

function isIP($ip=''){
	if(empty($ip)){return FALSE;}
	if(strtolower($ip) === 'unknown'){return FALSE;}
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


/** Begin DATE/TIME functions ---------------------------------- **/
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
	elseif($format == 'letter'){return date('j').'<sup>'.date('S').'</sup> '.date('F, Y');}
	elseif($format == 'letter2'){return date('M j').'<sup>'.date('S').'</sup> '.date('Y');}
	elseif($format == 'letter3'){return date('F j').'<sup>'.date('S').'</sup> '.date('Y');}
	elseif($format == 'unix'){return $dateIs;}
	else {$formatIs = $format;}
	return date($formatIs, $dateIs);
}

function getAge($birthDate=''){#{YYYY-MM-DD}s
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


/** Begin LINK functions ---------------------------------- **/
function refererURL(){
	if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){return $_SERVER['HTTP_REFERER'];}
	else {return FALSE;}
}

function doLink($input=''){
	if(isEmpty($input)){return FALSE;}
	$input = stringSwap($input, '_', '-');
	$task = '?link='.trim(strtolower($input));
 	return $task;
}

function selfLink(){
	$task = 'index';
	if(isset($_GET['link']) && !empty($_GET['link'])){$task = $_GET['link'];}
	$task = trimEdge($task);
	$task = stringSwap($task, '\\', '');
	$task = stringSwap($task, PS, '');
	$task = stringSwap($task, '~', '');
	$task = urldecode($task);
	return $task;
}

function isLinkActive($uri='index'){
	$uri = stringSwap($uri, '&', 'and', 'all');
	$task = selfLink();
	if($uri == $task){return TRUE;}
	return FALSE;
}





/** begin SESSION ========================================= */
class Session {
	private static $instance;
	public static $status;

	private function __construct(){self::$status = 'offline';}

	public static function instantiate(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}

	public static function start(){
		if(self::$status != 'alive'){
			session_start();
			self::$status = 'alive';
		}
	}

	public static function online(){
		if(self::$status == 'alive'){return TRUE;}
		return FALSE;
	}

	public static function stop(){
		if(self::online()){
			self::$status = 'dead';
			session_destroy();
		}
	}

	public static function terminate(){
		if(self::online()){
			$_SESSION = array();
			if(ini_get("session.use_cookies")){
				$params = session_get_cookie_params();
			  setcookie(session_name(), '', time() - 42000,
			  	$params["path"], $params["domain"],
			  	$params["secure"], $params["httponly"]
			  );
			}
			self::$status = 'dead';
			session_unset();
			session_destroy();
		}
	}

	public static function reset(){
		self::terminate();
		self::start();
	}
}
/** end SESSION ========================================== */





/** begin DEVICE ========================================= */
#loadFile('plug-mobile-detect', 'slice');
class Device {
	private static $instance;

	public static function instantiate(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}

	public static function validate($device=''){
		$devices = array('desktop', 'tablet', 'phone');
		if(!empty($device) && in_array($device, $devices)){return TRUE;}
		return FALSE;
	}

	public static function identify(){
		$device = new Mobile_Detect;
		return ($device->isMobile() ? ($device->isTablet() ? 'tablet' : 'phone') : 'desktop');
	}

	public static function setAs($to='request'){
		Session::Start();
		if($to=='request'){
			if(isset($_REQUEST['v']) && !empty($_REQUEST['v'])){
				if(self::validate($_REQUEST['v'])){return $_SESSION['DeviceIsA'] = $_REQUEST['v'];}
				elseif(!empty($_SESSION['DeviceIsA'])){return $_SESSION['DeviceIsA'];}
				else { return $_SESSION['DeviceIsA'] = self::identify();}
			}
			elseif(!empty($_SESSION['DeviceIsA'])){return $_SESSION['DeviceIsA'];}
			else {return $_SESSION['DeviceIsA'] = self::identify();}
		}
		elseif(self::validate($to)){return $_SESSION['DeviceIsA'] = $to;}
		else {return FALSE;}
	}

	public static function is(){return self::setAs();}
}
/** end DEVICE ========================================== */





/** begin QUIK ========================================= */
class Quik {
	public static $name;
	public static $squat;
	public static $brand;
	public static $slogan;
	public static $acronym;
	public static $ui;
	public static $path;
	public static $tag;
	public static $email;
	public static $phone;
	public static $domain;
	public static $admin;
	public static $config;	
	private static $instance;

	private function __construct(){return;}

	public static function instantiate(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}

	public static function setting($data){
		#toDO - $data must be an array with valid entries
		$list = array('name','squat', 'brand', 'slogan', 'acronym', 'ui', 'path', 'tag', 'email', 'phone', 'domain', 'admin');
		self::$config = $data;
		foreach ($data as $label => $value){
			if(in_array($label, $list) && !empty($value)){self::$$label = $value;}
		}
		if(empty(self::$email)){self::$email = 'info';}
		if(empty(self::$admin)){self::$admin = 'admin';}
		if(!inString(self::$email, '@')){self::$email = self::$email.'@'.self::domain();}
		if(!inString(self::$admin, '@')){self::$admin = self::$admin.'@'.self::domain();}
	}

	public static function RD(){
		$task = stringSwap($_SERVER['DOCUMENT_ROOT'], DS, '', 'last');
		if(!empty(self::$path)){$task .= PS.self::$path;}
		return strtolower($task);

	}

	public static function URL(){
		if(!empty(self::$domain)){$task = self::$domain;}
		else {$task = $_SERVER['HTTP_HOST'];}
		if(!empty(self::$path)){$task .= PS.self::$path;}
		return strtolower($task);
	}

	public static function domain(){return strtolower(url2domain(self::URL()));}

	// Return domain URL
	public static function hostname($subdomain = ''){
		if(empty($subdomain) && inString(self::URL(), 'www.')){$subdomain = 'www.';}
		elseif(!empty($subdomain)){$subdomain = $subdomain.'.';}
		return strtolower($subdomain.self::domain());

	}

	public static function site($subdomain = ''){
		$protocol = 'http://';
		if(inString(self::URL(), 'https')){$protocol = 'https://';}
		elseif(inString(self::URL(), 'http')){$protocol = 'http://';}
		elseif (isset($_SERVER["HTTPS"]) && strtolower($_SERVER["HTTPS"] ) == "on"){$protocol = 'https://';}

		$task = $protocol.self::hostname($subdomain);
		if(!empty(self::$path)){$task .= PS.self::$path;}
		return strtolower($task);
	}


}
/** end QUIK ========================================== */



#$demo = new Quik;
#//Site Settings
$config = array(
	'name'       => "Whosco Ventures Limited",
	'squat'      => "Whosco Limited",
	'brand'      => "Whosco™",
	'slogan'     => "a commitment to excellence",
	'acronym'    => "Whosco",

	'path'     => 'cregnito/framework/quik',
	'tag'    => "",
	'mail'   => "",
	'phone'  => "",
	'domain' => "",
	
	'admin'  => ""
);
Quik::setting($config);
$result = Quik::site();
echo var_export($result, TRUE);
?>