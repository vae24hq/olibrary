<?php
class Data {
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

	public static function toRow($data){
		$row = '';
		if(isset($data['data'])){$row = $data['data'];}
		return $row;
	}

	public static function info($column, $data){
		if(isset($data[$column])){return $data[$column];}
		return false;
	}

	public static function doFilter($data, $dataset){
		$input = array();
		if(isset($data['submitBTN'])){unset($data['submitBTN']);}
		foreach ($data as $key => $value){
			if(in_array($key, $dataset) && !Helper::isEmpty($value)){$input[$key] = Form::cleanInput($value);}
		}
		return $input;
	}
}
?>