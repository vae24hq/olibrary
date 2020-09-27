<?php
class Form {
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


	//-------------- Retain form input ---------------
	public static function retainInput($field='', $method='post'){
		$value = '';
		if(!Helper::isEmpty($field)){
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

	public static function inputData($method){
		if(is_array($method)){$input = $method;}
		elseif($method == 'post' || $method == 'get' || $method == 'request'){
			$input = self::setMethod($method);
		}
		if(!empty($input)){return $input;}
		return false;
	}

	public static function cleanData($data){
		$input = array();
		foreach ($data as $key => $value){
			$input[$key] = self::cleanInput($value);
		}
		$input = self::removePostBTN($input);
		return $input;
	}
}
?>