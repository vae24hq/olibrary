<?php
class oMethod {

	public static function isPost($var=''){
		//check if method is post
		if(empty($var)){
			if(!empty($_POST)){return TRUE;}
		}
		else {
			//check if post variable exist and return value otherwise return empty
			if(!empty($_POST[$var])){
				$input = trim($_POST[$var]);
				$input = oSQL::escape($input);
				return $input;
			}
			elseif(isset($_POST[$var])){return '';}
		}
		return FALSE;
	}

	public static function isGet($var=''){
		//check if method is get
		if(empty($var)){
			if(!empty($_GET)){return TRUE;}
		}
		else {
			//check if get variable exist and return value otherwise return empty
			if(!empty($_GET[$var])){
				$input = trim($_GET[$var]);
				$input = oSQL::escape($input);
				return $input;
			}
			elseif(isset($_GET[$var])){return '';}
		}
		return FALSE;
	}
}
?>