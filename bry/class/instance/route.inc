<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oRoute ~ Routing utility • DEPENDENCY»
 */
class oRoute {

	//SOURCE • handling project's source
	public static function Source($i='iGet'){
		if(!empty($i)){
			if($i == 'iGet'){
				if(!empty($_GET['oproject'])){$o = $_GET['oproject'];}
				else {$o = 'default';}
			}
			else {
				$o = $i;
			}
			if(!empty($o)){
				$o = strtolower($o);
				if($o == 'api' || $o == 'app'){$o = 'default';}
				return $o;
			}
		}
		return false;
	}



	//URI • handling URI
	public static function URI($i='iGet'){
		if($i == 'iGet'){
			if(!empty($_GET['olink'])){$o = $_GET['olink'];}
			else {$o = 'index';}
		}
		if(!empty($o)){return strtolower($o);}
		return false;
	}



	//API • handling API
	public static function API($i='iGet'){
		if(self::URI() == 'api'){
			if(!empty($_GET['oapi'])){$o = $_GET['oapi'];}
		}
		if(!empty($o)){return strtolower($o);}
		return false;
	}



	//APP • handling APP
	public static function APP($i='iGet'){
		if(self::API() === false && self::URI() == 'app'){
			if(!empty($_GET['oapp'])){$o = $_GET['oapp'];}
		}
		if(!empty($o)){return strtolower($o);}
		return false;
	}



	//KEY • handling request KEY
	public static function Key($i='iGet'){
		if($i == 'iGet'){
			if(!empty($_GET['okey'])){$o = $_GET['okey'];}
		}
		if(!empty($o)){return strtolower($o);}
		return false;
	}



	//INFO • return information
	public static function Info(){
		$o['source'] = self::Source('iGet');
		$o['uri'] = self::URI('iGet');
		$o['api'] = self::API('iGet');
		$o['app'] = self::APP('iGet');
		$o['key'] = self::Key('iGet');
		return $o;
	}



	//PATH • return path
	public static function Path($i='init'){
		$o = oCORE;
		if(self::Source() != 'default'){$o .= 'o'.self::Source().DS;}
		else {$o .= 'omain'.DS;}

		if($i == 'init'){$o .= oROUTZR.'init.inc';}
		if($i == 'config'){$o .= oCONFIG.'config.inc';}

		if(!empty($o)){return strtolower($o);}
		return false;
	}



} // EndOfClass - oRoute