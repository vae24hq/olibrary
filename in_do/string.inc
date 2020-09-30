<?php
class oString {




	//-------------- Return false OR value before first occurrence character|string if found ---------------
	public static function before($string, $search, $strip='oYEAH'){
		$pos = strpos($string, $search);
		if($pos && $pos != 0){$result = substr($string, 0, $pos);}
		if($strip != 'oYEAH'){$result = $result.$search;}
		if(isset($result)){return $result;}
		return false;
	}


	//-------------- Return false OR value after first character|string if found ---------------
	public static function after($string, $search, $strip='oYEAH'){
		$found = strstr($string, $search);
		if($found){
			$result = $found;
			if($strip == 'oYEAH'){
				$result = oString::swap($result, $search, '', 'oFIRST');
			}
		}
		if(!empty($result)){return $result;}
		return false;
	}


	public static function match($string='', $comparison='', $rule='oDEFAULT'){
		if($rule == 'oABSOLUTE' && $string === $comparison){return true;}
		elseif($rule != 'oABSOLUTE' && $string == $comparison){return true;}
		return false;
	}

	public static function to($o, $to){
		#Returns domain from URL
		if($to == 'oDOMAIN'){
			$o = oString::swap($o, 'https://', '', 'oFIRST');
			$o = oString::swap($o, 'http://', '', 'oFIRST');

			#Remove sub-directory if found
			if(self::in($o, '/')){
				$o = self::stringBefore($o, '/', 'oYEAH');
			}

			#Remove [known] sub-domain  TODO  ~ use library
			$subs = array('www','en', 'ng');
			$o_stripped = '';
			foreach ($subs as $sub){
				if(self::in($o, $sub)){
					$o = oString::swap($o, 'www.', '', 'oFIRST');
				}
			}
		}

		#Returns page title from string
		if($to == 'oTITLE'){
			$o = oString::swap($o, '-', ' ');
			$o = oString::swap($o, '_', ' ');
			$o = ucwords($o);
		}


		#Returns method-clean name from string
		if($to == 'oMETHOD'){
			$o = oString::swap($o, '-', ' ');
			$o = oString::swap($o, '_', ' ');
			$o = ucwords($o);
			$o = lcfirst($o);
			$o = self::spaceTo($o, '');
		}

		return $o;
	}
}
?>