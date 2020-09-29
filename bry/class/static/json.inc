<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oJSON ~ JSON Utility • DEPENDENCY»
 */
class oJSON {
	//ERROR • JSON error interpreter
	public static function Error($e, $i=''){
		$o['oINPUT'] = $i; $o['oERROR'] = $e;
		if($e == 4){$o['oMSG'] = 'Syntax error';}
		elseif($e == 5){$o['oMSG'] = 'Malformed UTF-8 characters, possibly incorrectly encoded';}
		if(!empty($o)){return $o;}
	}


	#RUN • Perform json operations (encode, decode & print)
	public static function Run($input, $i='iENCODE'){
		if(!empty($input)){
			if($i == 'iENCODE'){$o = json_encode($input);}
			elseif($i == 'iDECODE'){$o = json_decode($input);}
			$e = json_last_error();
			if(!empty($e)){return self::Error($e, $input);}
			elseif($i == 'iENCODE' || $i == 'iDECODE'){return $o;}
			elseif($i == 'iPRINT'){
				header('Content-Type: application/json');
				echo json_encode($input, JSON_PRETTY_PRINT);
				exit;
			}
		}
		return;
	}


	#ENCODE • encode json input
	public static function Encode($input){
		return self::Run($input, $i='iENCODE');
	}


	#DECODE • decode json input
	public static function Decode($input){
		return self::Run($input, $i='iDECODE');
	}


	#DISPLAY • display/run json input
	public static function Display($input){
		return self::Run($input, $i='iPRINT');
	}


} // EndOfClass - oJSON