<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
* Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
* ============================================================================================
* oBrowser ~ Browser Utility • DEPENDENCY»
*/
class oBrowser {

	//METHOD •
	public static function Is(){
		return strtolower($_SERVER['HTTP_USER_AGENT']);
	}


	public static function IE($operator=false, $ver=NULL){
		if(!preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $matches)
			|| preg_match('#Opera#', $_SERVER['HTTP_USER_AGENT'])){
			return false === $operator ? false : NULL;
		}

		if(false !== $operator
			&& in_array($operator, array('<', '>', '<=', '>=', '==', '!='))
			&& in_array((int)$ver, array(5,6,7,8,9,10))){
			return eval('return ('.$matches[1].$operator.$ver.');');
		}
		else {return (int)$matches[1];}
	}



	public static function IsIE($operator='', $ver=''){
		if(!empty($operator) && !empty($ver)){
			$o = ie($operator, $ver);
		} else {
			$o = self::IE();
		}

		if(!$o){return false;}

		return true;
	}


	public static function IsOpera($i='iMobi'){
		if($i == 'iMobi'){
			if(oString::In(self::Is(), 'opera mobi')){return true;}
		}
		elseif($i == 'iMini'){
			if(oString::In(self::Is(), 'opera mini')){return true;}
		}
		return false;
	}


	public static function Info(){
		if(self::IsIE()){$o = 'ie';}
		elseif(IsOpera('iMobi')){$o = 'operamobi';}
		elseif(IsOpera('iMini')){$o = 'operamini';}
		else {$o = self::Is();}
		return strtolower($o);
	}


} // EndOfClass - oBrowser