<?php
//-------------- Check if variable is actually empty ---------------
function oEmpty($data=''){
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


//-------------- JSON output ---------------
function jsonResp($data){
	if(!empty($data)){
		header('Content-Type: application/json');
		echo json_encode($data);
		exit;
	}
}


//-------------- Debugging ---------------
function dbug($data, $printAs=''){
	if($printAs == 'json'){return jsonResp($data);}
	else {
		if(is_array($data)){
			if(count($data) !== count($data, COUNT_RECURSIVE)){print_r($data);}
			else {
				foreach ($data as $key => $value){
					echo '<strong>'.$key.':</strong> '. $value.'<br>';
				}
			}
		}
		else {
			var_dump($data);
		}
	}
	exit;
}

//-------------- Retain input ---------------
function retainInput($field='', $method='post'){
	$value = '';
	if(!oEmpty($field)){
		if($method == 'post'){if(isset($_POST[$field])){$value = $_POST[$field];}}
		if($method == 'get'){if(isset($_GET[$field])){$value = $_GET[$field];}}
		if($method == 'request'){if(isset($_REQUEST[$field])){$value = $_REQUEST[$field];}}
	}
	return $value;
}

//-------------- Retain selection input ---------------
function retainSelect($value='', $field='', $method='post'){
	$input = retainInput($field);
	if(is_array($input) && in_array($value, $input)){return true;}
	return false;
}











function numFormat($number=''){
	if(is_numeric($number)){return number_format($number, 2);}
	else {return $number;}
}

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

function imgPass($passport=''){
	$img ='../brux/upload/'.$passport;
	if(!file_exists($img)){$img = '../brux/noimg.jpg';}
	else {$img = $img;}
	return $img;
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









function STALErandomize($return=''){
	$alpha = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
	$alpha_s = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');

	if($return == 'trasno'){
		$random = array_rand($alpha, 3);
		$randomize = mt_rand(10000, 99999).$alpha[$random[0]].$alpha[$random[1]].$alpha[$random[2]].mt_rand(100, 999);
	}
	if($return == 'buid'){$randomize = mt_rand(10000000, 99999999);}
	if($return == 'accountno'){$randomize = mt_rand(1000000000, 9999999999);}
	if($return == 'swift'){
		$random = array_rand($alpha, 5);
		$randomize = $alpha[$random[0]].$alpha[$random[1]].$alpha[$random[2]].$alpha[$random[3]];
	}
	if($return == 'image'){
		$alphabet = array_merge($alpha, $alpha_s);
		$random = array_rand($alphabet, 10);
		$randomize = $alphabet[$random[0]].$alphabet[$random[1]].$alphabet[$random[2]];
		$randomize .= mt_rand(1000, 9999).$alphabet[$random[3]].$alphabet[$random[4]].$alphabet[$random[5]];
		$randomize .= $alphabet[$random[9]].mt_rand(1, 999).$alphabet[$random[6]].$alphabet[$random[7]].$alphabet[$random[8]];
	}
	return $randomize;
}
?>