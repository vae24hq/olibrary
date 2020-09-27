<?php
class Helper {
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





/**
 * ===================================================================
 *  [BEGIN] DEVELOPER
 * ===================================================================
 */

	public static function initialize(){
		mb_internal_encoding("UTF-8");
		ini_set('session.cache_limiter','public');
		session_cache_limiter(false);
		Session::start();
		date_default_timezone_set('Africa/Lagos');
		return;
	}

	//-------------- Check if variable is actually empty ---------------
	public static function isEmpty($data=''){
		if(!isset($data)){return true;}
		else {
			if(is_array($data)){
					if(empty($data)){return true;}
			} else {
					$data = trim($data);
					$length = strlen($data);
					if($length<1){return true;}
			}
		}

		return false;
	}

	public static function isArrayMulti($data){
		$result = array_filter($data,'is_array');
		if(count($result)>0) return true;
		return false;
	}

	public static function prepResp($resp=''){
		$output['data'] = ''; $output['code'] = ''; $output['msg'] ='';
		if(!empty($resp['data'])){$output['data'] = $resp['data'];}
		if(!empty($resp['code'])){$output['code'] = $resp['code'];}
		if(!empty($resp['msg'])){$output['msg'] = $resp['msg'];}
		return $output;
	}


	public static function eHTTP($e='oGET', $uri='oGET'){
		if($e=='oGET'){
			if(!empty($_GET['e'])){$e = $_GET['e'];}
		}

		if($e=='oGET'){
			if(!empty($_GET['uri'])){$uri = $_GET['uri'];}
		}


		#Set DEFAULT if empty
		if(empty($uri) || $uri=='oGET'){
			$uri = $_SERVER['REQUEST_URI'];
		}
		if(empty($e) || $e=='oGET'){$e = '404';}

		if($e==404){
			$uri = trim($uri, '404/');
			$title = 'Not Found';
			$heading = 'Document Unavailable';
		}
		elseif($e==403){
			$uri = trim($uri, '403/');
			$title = 'Forbidden';
			$heading = 'Access Not Allowed';
		}

		#Prepare OUTPUT
		$ehttp['e'] = $e;
		$ehttp['uri'] = $uri;
		$ehttp['title'] = $title;
		$ehttp['heading'] = $heading;

		#RETURN
		return $ehttp;
	}

	//-------------- Debugging ---------------
	public static function dbug($data, $printAs='dump'){
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
			} else {
				var_dump($data);
			}
		}
		exit;
	}

	//-------------- Debugging Array ---------------
	public static function dbugA($array){
		echo '<br>';
		if(!is_array($array)){var_dump($array);}
		else {
			foreach ($array as $key => $value){
				if(is_array($value)){
					foreach ($value as $valueKey => $valueSub) {
						echo '<strong>'.$key."['".$valueKey."']".':</strong> '.$valueSub.'<br>';
					}
				}
				else {
				echo '<strong>'.$key.':</strong> '. $value.'<br>';
				}
			}
		}
	}

	//-------------- JSON output ---------------
	public static function jsonResp($data){
		if(!empty($data)){
			header('Content-Type: application/json');
			echo json_encode($data);
			exit;
		}
	}

	public static function IP(){
		if(isset($_SERVER["HTTP_CF_CONNECTING_IP"])){
			$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
			$_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
		}
		$client  = @$_SERVER['HTTP_CLIENT_IP'];
		$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
		$remote  = $_SERVER['REMOTE_ADDR'];

		if(filter_var($client, FILTER_VALIDATE_IP)){$ip = $client;}
		elseif(filter_var($forward, FILTER_VALIDATE_IP)){$ip = $forward;}
		else {$ip = $remote;}
		return $ip;
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

		if($return=='crypt3' || $return=='crypt5' || $return=='username' || $return=='puid' || $return=='ruid' || $return=='swift' || $return=='image'){
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

		if($return == 'accountno'){$randomiz = mt_rand(1000000000, 9999999999);}

		if($return == 'swift'){
			$randomiz = $alpha[0].$alpha[1].$alpha[2].$alpha[3].$alpha[4];
		}

		if($return == 'image'){
			$randomiz = $alpha[0].$alpha[1].$alpha[2];
			$randomiz .= mt_rand(1000, 9999).$alpha[3].$alpha[4].$alpha[5];
			$randomiz .= $alpha[9].mt_rand(1, 999).$alpha[6].$alpha[7].$alpha[8];
		}

		if(!empty($randomiz)){
			return $randomiz;
		}
		return mt_rand();
	}

	public static function doFormat($num=''){
		if(is_numeric($num)){
			return number_format($num, 2);
		}
		else {
			return $num;
		}
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

	public static function isCodeSucess($code, $compare='E200'){
		if(!empty($code)){$code = substr_replace($code , '', -2);}
		if(Text::in($compare, $code)){return true;}
		return false;
	}


	#ToDo
	public static function imgPass($path='icon', $passport='', $sex=''){
		$img = oCLOUD.$passport;
		if(!file_exists($img)){
			$img = oCLOUD.'noimg.jpg';
		} else {
			$img = $img;
		}
		return $img;
	}

	function dateAs($date='', $type=''){
		$result = $date;
		$date = strtotime($date);
		if($type == 'MySQL_DateTime'){$result = date("Y-m-d H:i:s", $date);}
		if($type == 'MySQL_Date'){$result = date("Y-m-d", $date);}
		if($type == 'MySQL_Time'){$result = date("H:i:s", $date);}
		if($type == 'oDate'){$result = date("d-M-Y", $date);}
		if($type == 'oDateAlt'){$result = date("d/m/Y", $date);}
		return $result;
	}

	function fileUploadErrorMsg($code){
		//errors
		$errors = array (
			// 0 => 'There is no error, the file uploaded with success',
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



	function isActivePage($page=''){
		$activePage = $_SERVER['PHP_SELF'];
		$activePage = basename($activePage);
		if($page == $activePage){return true;}
		return false;
	}

	function cssActive($page=''){
		$output = '';
		if(isActivePage($page)){$output .= ' class="active"';}
		return $output;
	}

} // END HELPER CLASS
?>