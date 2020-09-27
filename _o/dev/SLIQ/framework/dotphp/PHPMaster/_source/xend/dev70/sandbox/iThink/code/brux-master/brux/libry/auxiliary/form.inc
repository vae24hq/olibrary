<?php
/* BRUX™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by ODAO™ OSAWERE [@iamodao - www.osawere.com] using PHP, SQL, HTML, CSS, JS & derived technology.
 * © June 2018 | version 1.0
 * ===================================================================================================================
 * Dependency » vita [text.inc]
 * PHP | class•Form ~ form utilities
 */

class Form {
	private static $instance;
	private static $status;

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

	//-------------- Retain input's value ---------------
	public static function retain($field='', $method='o_post'){
		$value = '';
		if(Text::notempty($field)){
			if($method == 'o_post' && Text::notempty($_POST[$field])){$value = $_POST[$field];}
			if($method == 'o_get' && Text::notempty($_GET[$field])){$value = $_GET[$field];}
			if($method == 'o_request' && Text::notempty($_REQUEST[$field])){$value = $_REQUEST[$field];}
		}
		return $value;
	}

	//-------------- Check if input's value is retained ---------------
	public static function isRetained($value='', $field='', $method='o_post'){
		$retained = retainInput($field, $method);
		if($value == $retained){return true;}
		return false;
	}

	//-------------- Retain input's group (array) of values ---------------
	function retainGroup($output='', $value='', $field='', $method='o_post'){
		$retained = retainInput($field, $method);
		if(is_array($retained) && in_array($value, $retained)){return $output;}
		else {return false;}
	}

}//END OF CLASS - Form
?>
