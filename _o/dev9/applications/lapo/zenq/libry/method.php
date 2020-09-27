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
				return trim($_POST[$var]);
			}
			elseif(isset($_POST[$var])){return '';}
		}
		return FALSE;
	}

	public static function isGet($var=''){
		//check if method is post
		if(empty($var)){
			if(!empty($_GET)){return TRUE;}
		}
		else {
			//check if post variable exist and return value otherwise return empty
			if(!empty($_GET[$var])){
				return trim($_GET[$var]);
			}
			elseif(isset($_GET[$var])){return '';}
		}
		return FALSE;
	}
}
?>