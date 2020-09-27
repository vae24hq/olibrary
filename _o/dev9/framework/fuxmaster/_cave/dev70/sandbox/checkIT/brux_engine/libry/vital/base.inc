<?php
/* BRUX™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by ODAO™ OSAWERE [@iamodao - www.osawere.com] using PHP, SQL, HTML, CSS, JS & derived technology.
 * © June 2018 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | class•Base ~ Collection of Basic methods
 */

class Base {
	private static $instance;

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

	//-------------- Returns base URL ---------------
	public static function url(){
		return strtolower($_SERVER['HTTP_HOST']);
	}

	//-------------- Returns base Domain ---------------
	public static function domain(){
		return strtolower(url2domain(self::url()));
	}

	//-------------- Returns remote directory ---------------
	public static function dir(){
		return strtolower(Text::swap($_SERVER['DOCUMENT_ROOT'], DS, '', 'o_last'));
	}

	//-------------- Returns referrer URL ---------------
	public static function referer(){
		if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){return $_SERVER['HTTP_REFERER'];}
		else {return FALSE;}
	}

	//-------------- Set, Prepare & Return language ---------------
	public static function lang($lang=''){
		#prepare language
		if(empty($lang)){
			if(empty($_GET['lang'])){
				if(!isset($_SESSION['lang']) || empty($_SESSION['lang'])){
					$lang = 'en';
				} else {$lang = $_SESSION['lang'];}
			} else {$lang = $_GET['lang'];}
		}

		#pass lang to session
		if(!empty($lang)){$_SESSION['lang'] = $lang;}
		return $lang;
	}

	//-------------- Validate input type ---------------
	public static function validate($type='IP', $input=''){
		if(empty($input)){return FALSE;}
		if(strtolower($input)==='unknown'){return FALSE;}

		#prepare task
		if($type == 'IP' && filter_var($input, FILTER_VALIDATE_IP)){return TRUE;}
		if($type == 'email' && filter_var($input, FILTER_VALIDATE_EMAIL)){return TRUE;}

		#return task
		return FALSE;
	}

	//-------------- Return IP address ---------------
	public static function getIP(){
		if(!empty($_SERVER['HTTP_CLIENT_IP']) && validate('IP', $_SERVER['HTTP_CLIENT_IP'])){
			return $_SERVER['HTTP_CLIENT_IP'];
		}

		if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			if(strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== FALSE){
				$IPs = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
				foreach($IPs as $IP){
					if(validate('IP', $IP)){return $IP;}
				}
			} else {
				if(validate('IP', $_SERVER['HTTP_X_FORWARDED_FOR'])){
					return $_SERVER['HTTP_X_FORWARDED_FOR'];
				}
			}
		}

		if(!empty($_SERVER['HTTP_X_FORWARDED']) && validate('IP', $_SERVER['HTTP_X_FORWARDED'])){
			return $_SERVER['HTTP_X_FORWARDED'];
		}
		if(!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && validate('IP', $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])){
			return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
		}
		if(!empty($_SERVER['HTTP_FORWARDED_FOR']) && validate('IP', $_SERVER['HTTP_FORWARDED_FOR'])){
			return $_SERVER['HTTP_FORWARDED_FOR'];
		}
		if(!empty($_SERVER['HTTP_FORWARDED']) && validate('IP', $_SERVER['HTTP_FORWARDED'])){
			return $_SERVER['HTTP_FORWARDED'];
		}

		#return task
		return $_SERVER['REMOTE_ADDR'];
	}

	//-------------- Returns organized random generated value ---------------
	public static function randomize($type ='random'){
		if($type == 'bind'){
			$alphaCAP = range('A', 'Z');
			shuffle($alphaCAP);
			return $alphaCAP[2].$alphaCAP[5].mt_rand(100,999).date('dmYHis').mt_rand(10,9999);
		}
		if($type == 'suid'){
			return mt_rand(100000000, 999999999);
		}
		if($type == 'puid'){
			$alpha = range('a', 'z'); $alphaCAP = range('A', 'Z'); $number = range(0, 9);
			$list = array_merge($alpha, $alphaCAP, $number);
			shuffle($list);
			$randNo = mt_rand(12,36);
			$value = '';
			for ($i=0; $i < $randNo; $i++){
				$value .= $list[$i];
			}
			return $value.mt_rand(10,999);
		}
		if($type == 'password'){
			$alpha = range('a', 'z'); $alphaCAP = range('A', 'Z'); $number = range('0', '9'); $symbol = range('#', '@');
			shuffle($alpha); shuffle($alphaCAP); shuffle($number); shuffle($symbol);
			return $alpha[2].$alphaCAP[4].$alphaCAP[7].$symbol[3].$alpha[9].date('d').$alpha[13].$alphaCAP[20].$number[5].$number[7].$symbol[1];
		}
		if($type == 'random'){return mt_rand();}
	}

	public static function doCrypt($input ='', $pattern = 'flexi'){
		if(!empty($input)){
			if($pattern == 'crypt'){
				$crypt = hash("md5", $input);
				$crypt = sha1($crypt);
				$crypt = md5($crypt);
			}
			elseif($pattern == 'strict'){$crypt = md5($input);}
			elseif($pattern == 'reverse'){$crypt = base64_decode($input);}
			else {$crypt = base64_encode($input);}
		}
		else {
			return FALSE;//die ('Could not perform CRYPT operation');
		}
		return $crypt;
	}

	//-------------- Returns document information ---------------
	public static function fileInfo($return='name', $file='o_self'){
		#prepare & return result
		if($file == 'o_self'){$file = $_SERVER['PHP_SELF'];}
		$info = pathinfo($file);

		if($return =='dir'){$result = $info['dirname'];}
		elseif($return =='file'){$result = $info['filename'];}
		elseif($return =='ext'){$result = $info['extension'];}
		elseif($return =='base'){$result = $info['filename'].'.'.$info['extension'];}
		elseif($return =='name'){$result = $file;}

		return $result;
	}




	//-------------- Returns file upload error messages from code ---------------
	function fileUploadError($code){
		$errors = array (
			0 => 'There is no error, the file uploaded with success',
			1 => 'The selected file size is too large',
			2 => 'The selected file exceeds the maximum allowed size',
			3 => 'The file was only partially uploaded',
			4 => 'No file was uploaded',
			6 => 'Missing a temporary folder',
			7 => 'Failed to write file to disk.',
			8 => 'A PHP extension stopped the file upload.');
		if($code == 1 || $code == 2){
			return 'The selected file for upload is too large';
		}
		return $errors[$code];
	}

	//-------------- Returns formatted value ---------------
	public static	function format($input='', $type='size'){
		if(empty($input)){return FALSE;}
		$result = $input;

		#format for sizes
		if($type == 'size'){
			if($input>=1073741824){$result = number_format($input / 1073741824 , 2) . 'GB';}
			elseif($input>=1048576){$result = number_format($input / 1048576 , 2) . 'MB';}
			elseif($input>=1024){$result = number_format($input / 1024 , 2) . 'KB';}
			elseif($input>1){$result = $input . ' bytes';}
			elseif($input==1){$result = $input . ' byte';}
			else {$result = '0';}
		}
		if($type == 'clean'){$result = clean($input);}
		if($type == 'number' && is_numeric($input)){return number_format($input, 2);}
		if($type == 'o_date' || $type == 'o_date2' || $type == 'o_datetimeMySQL' || $type == 'o_dateMySQL' || $type == 'o_timeMySQL'){
			$period = strtotime($input);
			if($type == 'o_date'){$result = date("d-M-Y", $period);}
			if($type == 'o_date2'){$result = date("d/m/Y", $period);}
			if($type == 'o_datetimeMySQL'){$result = date("Y-m-d H:i:s", $period);}
			if($type == 'o_dateMySQL'){$result = date("Y-m-d", $period);}
			if($type == 'o_timeMySQL'){$result = date("H:i:s", $period);}
		}
		return $result;
	}

	//-------------- Returns symbol for currency ---------------
	function currencyToSymbol($currency=''){
		$currency = strtolower($currency); $symbol = '';
		if($currency == 'dollar'){$symbol = '$';}
		if($currency == 'pound'){$symbol = '£';}
		if($currency == 'euro'){$symbol = '€';}
		if($currency == 'yen'){$symbol = '¥';}
		if($currency == 'rupee'){$symbol = '₹';}
		if($currency == 'naira'){$symbol = '₦';}
		return $symbol;
	}
}// END OF CLASS - Base
?>