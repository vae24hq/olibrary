<?php
class Utility {
	private static $instance;
	private static $session;

	//-------------- Prevent multiple instances ---------------
	private function __construct(){return;}

	//-------------- Prevent duplication ---------------
	private function __clone(){return;}

	//-------------- Returns a single instance ---------------
	public static function instantiate(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}





/**
 * ===================================================================
 *  [BEGIN] DEVELOPER-TOOL
 * ===================================================================
 */
	public static function initializ(){
		Utility::sessionStart();
		mb_internal_encoding("UTF-8");
		ini_set('session.cache_limiter','public');
		session_cache_limiter(false);
		return;
	}


	//-------------- Debugging ---------------
	public static function dbog($data, $printAs='print'){
		if($printAs == 'json'){self::jsonResp($data);}
		else {
			if(is_array($data)){
				if(count($data) !== count($data, COUNT_RECURSIVE)){print_r($data);}
				else {
					foreach ($data as $key => $value){
						echo '<strong>'.$key.':</strong> '. $value.'<br>';
					}
				}
			}
			elseif($printAs == 'print'){
				print_r($data);
			}else {
				var_dump($data);
			}
		}
		exit;
	}

	public static function codeIsSuccess($code, $compare='E200'){
		if(!empty($code)){$code = substr_replace($code , '', -2);}
		if(self::inText($compare, $code)){return true;}
		return false;
	}

	public static function removePostBTN($data){
		if(isset($data['submitBTN'])){unset($data['submitBTN']);}
		return $data;
	}

	public static function setMethod($method='post'){
		if(!empty($method)){
			if($method == 'request' && isset($_REQUEST)){$requestAs = $_REQUEST;}
			elseif($method == 'get' && isset($_GET)){$requestAs = $_GET;}
			elseif($method == 'post' && isset($_POST)){$requestAs = $_POST;}
		}
		return $requestAs;
	}

	public static function dataToRow($input){
		$task = '';
		if(isset($input['data'])){$task = $input['data'];}
		return $task;
	}

	public static function partOfText($input, $length, $ellipses = true, $strip_html = true) {
	//strip tags, if desired
	if ($strip_html) {$input = strip_tags($input);}

	//no need to trim, already shorter than trim length
	if (strlen($input) <= $length) {return $input;}

	//find last space within length
	$last_space = strrpos(substr($input, 0, $length), ' ');
	$trimmed_text = substr($input, 0, $last_space);

	//add ellipses (...)
	if ($ellipses) {$trimmed_text .= '...';}

	return $trimmed_text;
}
//===================================================================
/* [END] DEVELOPER-TOOL
*/





/**
 * ===================================================================
 *  [BEGIN] ENCRYPTION
 * ===================================================================
 */
	public static function password($password){
		return password_hash($password, PASSWORD_BCRYPT);
	}

	public static function passwordValid($password, $hash){
		if(password_verify($password, $hash)){return true;}
		return false;
	}

	public static function username($username, $action='encrypt'){
		if($action=='encrypt'){
			return base64_encode($username);
		}
		else {
			return base64_decode($username);
		}
	}

	public static function doCrypt($string, $crypt='encrypt'){
		if(empty($string)){return false;}
		if($crypt=='encrypt' || $crypt=='encrypt2'){
			$string = trim($string);
			$string = base64_encode($string);
			$alpha = array_merge(range('A', 'Z'), range(0,9), range('a', 'z'));
			shuffle($alpha);
			if($crypt=='encrypt2'){
				$string = self::randomiz('crypt5').$string.$alpha[7].$alpha[21].$alpha[10];
			} else {
				$string = $alpha[45].$alpha[35].$string;
			}
		}

		if($crypt=='decrypt' || $crypt=='decrypt2'){
			if($crypt=='decrypt2'){
				$string = mb_substr($string, 5);
				$string = mb_substr($string, 0, -3);
			} else {
				$string = mb_substr($string, 2);
			}
			$string = base64_decode($string);
		}
		return $string;
	}

	public static function doDecrypt($string, $type){
		if(!empty($string)){
				if($type=='username' || $type=='type'){
				return Utility::username($string, 'decrypt');
			}
		}
	}
//===================================================================
/* [END] ENCRYPTION
*/





/**
 * ===================================================================
 *  [BEGIN] API-TOOL
 * ===================================================================
 */
	//-------------- JSON output ---------------
	public static function jsonResp($data){
		if(!empty($data)){
			header('Content-Type: application/json');
			echo json_encode($data);
			exit;
		}
	}
//===================================================================
/* [END] API-TOOL
*/




/**
 * ===================================================================
 *  [BEGIN] SESSION
 * ===================================================================
 */
	//-------------- Start session ---------------
	public static function sessionStart(){
		if(!isset($_SESSION)){
			session_start();
			self::$session = 'active';
		}
	}


	//-------------- Return status (protected) ---------------
	protected static function sessionCheck(){
		return self::$session;
	}


	//-------------- Return status ---------------
	public static function session(){
		if(!empty(self::$session)){return self::$session;}
		return 'offline';
	}


	//-------------- Return 'TRUE' if session is active ---------------
	public static function sessionActive(){
		if(self::sessionCheck() == 'active'){return true;}
		return false;
	}


	//-------------- Stop session ---------------
	public static function sessionStop(){
		if(self::sessionActive()){
			self::$session = 'inactive';
			session_destroy();
		}
	}


	//-------------- Unset session or session's variable ---------------
	public static function sessionDelete($process='o_all'){
		if(isset($_SESSION)){
			if($process=='o_all'){session_unset();}
			elseif(isset($_SESSION[$process])){
				unset($_SESSION[$process]);
			}
		}
		return;
	}


	//-------------- Terminate session ---------------
	public static function sessionKill(){
		if(self::sessionActive()){
			$_SESSION = array();
			if(ini_get("session.use_cookies")){
				$params = session_get_cookie_params();
				setcookie(session_name(), '', time() - 42000,
					$params["path"], $params["domain"],
					$params["secure"], $params["httponly"]
				);
			}
			self::$session = 'inactive';
			session_unset();
			session_destroy();
		}
	}


	//-------------- Kill, the start session ---------------
	public static function sessionRestart(){
		self::sessionStart();
		self::sessionKill();
		self::sessionStart();
	}
//===================================================================
/* [END] SESSION
*/





//========== [BEGIN] URL METHOD ==========//

	//-------------- URL redirect ---------------
	public static function redirect($dest='', $delay=0){
		if(empty($dest)){return false;}

		if(headers_sent($filename, $linenum)){
			$task = '<meta http-equiv="refresh" content="'.$delay.'; url='.$dest.'">';
			echo $task;
		}
		elseif($delay == 0){
			header('Location: '.$dest);
			exit;
		}
		else {
			header("Refresh:".$delay.";URL=".$dest);
		}
	}

//========== [END] URL METHOD ==========//








	//-------------- Check if variable is actually empty ---------------
	public static function isEmpty($data=''){
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

	public static function isArrayMulti($data){
		$result = array_filter($data,'is_array');
		if(count($result)>0) return TRUE;
		return FALSE;
	}

	public static function response($resp=''){
		$output['data'] = ''; $output['code'] = ''; $output['msg'] ='';
		if(!empty($resp['data'])){$output['data'] = $resp['data'];}
		if(!empty($resp['code'])){$output['code'] = $resp['code'];}
		if(!empty($resp['msg'])){$output['msg'] = $resp['msg'];}
		return $output;
	}





//========== [BEGIN] FORM METHOD ==========//

	//-------------- Retain form input ---------------
	public static function retainInput($field='', $method='post'){
		$value = '';
		if(!self::isEmpty($field)){
			if($method == 'post'){if(isset($_POST[$field])){$value = $_POST[$field];}}
			if($method == 'get'){if(isset($_GET[$field])){$value = $_GET[$field];}}
			if($method == 'request'){if(isset($_REQUEST[$field])){$value = $_REQUEST[$field];}}
		}
		return $value;
	}

	//-------------- Retain selection input ---------------
	public static function retainSelect($value='', $field='', $method='post'){
		$input = self::retainInput($field);
		if(is_array($input) && in_array($value, $input)){return true;}
		return false;
	}

	public static function cleanInput($input, $cleanAs=''){
		if(empty($input)){return false;}
		$search = array(
			'@<script[^>]*?>.*?</script>@si',   // Strip out JS
			'@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
			'@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
			'@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
		);
		$input = preg_replace($search, '', $input);
		$input = strip_tags($input);
		$input = trim($input);
		return $input;
	}
//========== [END] FORM METHOD ==========//





//========== [BEGIN] STRING/TEXT METHOD ==========//

	//-------------- Find needle in string and return boolean ---------------
	public static function inText($string, $needle){
		if(strpos($string, $needle) !== false){return true;}
		return false;
	}

	public static function isTextSame($string, $string2){
		if($string === $string2){ return true;}
		return false;
	}

	public static function swapText($subject='', $search='', $replace='', $occurence='all'){
 	$occurences = array('all', 'first', 'last');
 	if(self::isEmpty($subject) || is_null($search) || is_null($replace) || self::isEmpty($occurence) || !in_array($occurence, $occurences)){
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

//========== [END] STRING/TEXT METHOD ==========//



	//-------------- Clean up a URL & return domain ---------------
	public static function url2domain($url){
		$domain = $url;
		$domain = self::swap($domain, 'https://', '', 'first');
		$domain = self::swap($domain, 'http://', '', 'first');

		#remove sub-directory if available
		if(self::in($domain, '/')){
			$domain = self::before($domain, '/', 'yeah');
		}

		#remove [known] sub-domain *ToDO [use library]
		$domain = self::swap($domain, 'www.', '', 'first');
		$domain = self::swap($domain, 'en.', '', 'first');
		$domain = self::swap($domain, 'ng.', '', 'first');

		return $domain;
	}





	public static function randomiz($return='crypt5'){
		if($return=='char2'){
			$char = '=@#$%&*?';
			$chars = str_split($char);
			shuffle($chars);
			$randomiz = $chars[1].$chars[3];
		}

		if($return == 'bind'){
			$randomiz = mt_rand().time();
		}

		if($return=='crypt3' || $return=='crypt5' || $return=='username' || $return=='puid' || $return=='ruid'){
			$alpha = array_merge(range('A', 'Z'), range(0,9), range('a', 'z'));
			shuffle($alpha);
			if($return == 'crypt3'){
				$randomiz = $alpha[7].$alpha[33].$alpha[51];
			}
			if($return == 'crypt5'){
				$randomiz = $alpha[5].$alpha[18].$alpha[32].$alpha[25].$alpha[44];
			}
			if($return=='username'){
				$randomiz = $alpha[3].$alpha[38].$alpha[15].$alpha[45].$alpha[53].time().$alpha[1].$alpha[18].$alpha[39].$alpha[7].$alpha[61];
			}
			if($return=='puid'){
				$randomiz = str_shuffle($alpha[17].$alpha[32].mt_rand().$alpha[13].$alpha[42].self::randomiz('bind'));
			}
			if($return == 'ruid'){
				$randomiz = mt_rand().$alpha[2].$alpha[30].$alpha[14].$alpha[45].$alpha[50].mt_rand().str_shuffle($alpha[10].$alpha[19].$alpha[49].$alpha[8].$alpha[61].time().$alpha[29].$alpha[17].$alpha[31]);
			}
		}

		if($return=='luid'){
			$randomiz = str_shuffle(self::randomiz('puid').self::randomiz('ruid'));
		}

		if(!empty($randomiz)){
			return $randomiz;
		}
		return mt_rand();
	}




	public static function currencyToSymbol($currency=''){
		$currency = strtolower($currency); $symbol = '';
		if($currency == 'dollar'){$symbol = '$';}
		if($currency == 'pound'){$symbol = '£';}
		if($currency == 'euro'){$symbol = '€';}
		if($currency == 'yen'){$symbol = '¥';}
		if($currency == 'rupee'){$symbol = '₹';}
		if($currency == 'naira'){$symbol = '₦';}
		return $symbol;
	}
}
?>