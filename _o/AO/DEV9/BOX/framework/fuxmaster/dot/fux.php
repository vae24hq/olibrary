<?php
class FUX {
	Var $name;
	var $brand;
	var $domain;
	var $email;
	var $phone;
	var $url;

	var $db_name;
	var $db_user;
	var $db_password;
	var $db_host;
	var $db_driver;


	public function __construct($config=''){
		if(empty($config)){
			global $oConfig;
			$config = $oConfig;
		}
		if(empty($config) || !is_array($config)){die('AppConfig required');}

		#Set variables
		foreach ($config as $label => $value){
			if(is_array($value) && $label != 'uri_allowed'){#label is an array
				foreach ($value as $sub_label => $sub_value){
					$subLabel= $label.'_'.$sub_label;
					$this->$subLabel = $sub_value;
				}
			} #end - label is an array
			else {#label is not array
				$this->$label = $value;
			} #end - label is not array
		}
	}

	public function router($uri='oGET', $route='oGET'){
		if(empty($uri) || $uri=='oGET'){$uri = URL::uri();}
		if(empty($route) || $route=='oGET'){$route = URL::route();}
		if($route=='ipaddress' || $route=='site'){$route = 'app';}

		if($route == 'http'){include oBOND.'http.php';}
		if(!empty($this->uri_allowed) && array_key_exists($uri, $this->uri_allowed)){
			if(!empty($this->uri_allowed[$uri])){$organizer = oRGANIZ.strtolower($this->uri_allowed[$uri]).'.php';}
			elseif(!empty($this->uri_allowed['_oMain'])){$organizer = oRGANIZ.strtolower($this->uri_allowed['_oMain'].'.php');}
			else {$organizer = oRGANIZ.strtolower($uri).'.php';}
			if(file_exists($organizer)){include $organizer;}
			else {die('Organizer [<strong>'.$uri.']</strong> is unavailable');}
		}
		else {
			$http = oUTLINE.'http.php';
			if(file_exists($http)){
				include $http;
			}
			else {
				include oBOND.'http.php';
			}
		}
	}

	public static function title(){
		$uri = URL::uri();
		if($uri != 'index'){
			$title = trim($uri);
			$title = str_replace('-', ' ', $uri);
			return $title = ucwords($title);
		}
		return false;
	}
}
?>