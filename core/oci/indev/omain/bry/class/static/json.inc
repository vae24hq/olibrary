<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oJSON ~ JSON Utility • DEPENDENCY»
 */
class oJSON {
	//ERROR • JSON error interpreter
	public static function error($e, $i=''){
		$o['oINPUT'] = $i; $o['oERROR'] = $e;
		if($e == 4){$o['oMSG'] = 'Syntax error';}
		elseif($e == 5){$o['oMSG'] = 'Malformed UTF-8 characters, possibly incorrectly encoded';}
		if(!empty($o)){return $o;}
	}





	//RUN • Perform json operations (encode, decode & print)
	public static function run($input, $i='iEncode'){
		if(!empty($input)){
			if($i == 'iEncode'){$o = json_encode($input);}
			elseif($i == 'iDecode'){$o = json_decode($input);}
			$e = json_last_error();
			if(!empty($e)){return self::error($e, $input);}
			elseif($i == 'iEncode' || $i == 'iDecode'){return $o;}
			elseif($i == 'iPrint'){
				header('Content-Type: application/json');
				echo json_encode($input, JSON_PRETTY_PRINT);
				exit;
			}
		}
		return;
	}





	//ENCODE • encode json input
	public static function encode($input){
		return self::run($input, $i='iEncode');
	}





	//DECODE • decode json input
	public static function decode($input){
		return self::run($input, $i='iDecode');
	}





	//DISPLAY • display/run json input
	public static function display($input){
		return self::run($input, $i='iPrint');
	}
} // EndOfClass - oJSON