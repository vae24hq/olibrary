<?php
class oInput {

	//-------------- Retain form input ---------------
	public static function retain($field='', $method='oPOST'){
		$value = '';
		if(!isEmpty($field)){
			if($method == 'oPOST'){if(isset($_POST[$field])){$value = $_POST[$field];}}
			if($method == 'oGET'){if(isset($_GET[$field])){$value = $_GET[$field];}}
			if($method == 'oREQUEST'){if(isset($_REQUEST[$field])){$value = $_REQUEST[$field];}}
		}
		return $value;
	}


	//-------------- Retain selection input ---------------
	public static function retainSelect($value='', $field='', $method='oPOST'){
		$input = self::retain($field);
		if(is_array($input) && in_array($value, $input)){return true;}
		return false;
	}

	//-------------- Check if input's value is retained ---------------
	public static function isRetained($value='', $field='', $method='oPOST'){
		$retained = self::retain($field, $method);
		if($value == $retained){return true;}
		return false;
	}

	//-------------- Retain input's group (array) of values ---------------
	function retainGroup($output='', $value='', $field='', $method='oPOST'){
		$retained = oself::retain($field, $method);
		if(is_array($retained) && in_array($value, $retained)){return $output;}
		else {return false;}
	}



	public static function removeBTN($data){
		if(isset($data['submitBTN'])){unset($data['submitBTN']);}
		return $data;
	}





	public static function data($method){
		if(is_array($method)){$input = $method;}
		elseif($method == 'oPOST' || $method == 'oGET' || $method == 'oREQUEST'){
			$input = self::method($method);
		}
		if(!empty($input)){return $input;}
		return false;
	}


	public static function cleanData($data, $as=''){
		$input = array();
		foreach ($data as $key => $value){
			$key = self::clean($key, $as);
			$input[$key] = self::clean($value, $as);
		}
		$input = self::removeBTN($input);
		return $input;
	}


	public static function filta($data, $filter){
		$input = array();
		$data = self::removeBTN($data);
		foreach ($data as $key => $value){
			if(in_array($key, $filter) && !isEmpty($value)){
				$key = self::clean($key);
				$input[$key] = self::clean($value);
			}
		}
		return $input;
	}


	public static function prep($data, $filter=''){
		$input = self::data($data);
		if(!empty($filter) && !empty($input)){
			$input = self::filta($input, $filter);
		}
		if(!empty($input)){return $input;}
		return false;
	}
}
?>