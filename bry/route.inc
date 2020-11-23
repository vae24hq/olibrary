<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oRoute ~ Routing utility • DEPENDENCY»
 */
class oRoute {
	#SOURCE • handling project's source
	public static function project($i='iGet'){
		if(!empty($i)){
			if($i == 'iGet'){
				if(!empty($_GET['oproject'])){$o = $_GET['oproject'];}
				else {$o = 'main';}
			}
			else {
				$o = $i;
			}
			if(!empty($o)){
				$o = strtolower($o);
				if($o == 'api' || $o == 'app' || $o == 'www' || $o == 'default'){$o = 'main';}
				return $o;
			}
		}
		return false;
	}





	#URI •
	public static function uri($i='iGet'){
		if($i == 'iGet'){
			if(!empty($_GET['olink'])){$o = $_GET['olink'];}
			else {$o = 'index';}
		}
		if(!empty($o)){return strtolower(trim($o));}
		return false;
	}





	#API •
	public static function api($i='iGet'){
		if(self::URI() == 'api'){
			if(!empty($_GET['oapi'])){$o = $_GET['oapi'];}
		}
		if(!empty($o)){return strtolower($o);}
		return false;
	}





	#APP •
	public static function app($i='iGet'){
		if(self::api() === false && self::URI() == 'app'){
			if(!empty($_GET['oapp'])){$o = $_GET['oapp'];}
		}
		if(!empty($o)){return strtolower($o);}
		return false;
	}





	#SITE •
	public static function site($i='iGet'){
		if(!oRoute::api() && !oRoute::app()){
			if($i == 'iGet'){$o = self::project();}
		}
		if(!empty($o)){return strtolower($o);}
		return false;
	}





	#ROUTE • Get & Return Route
	public static function route(){
		$api = self::api();
		if($api !== false && $api != ''){$o = $api;}
		else {
			$app = self::app();
			if($app !== false && $app != ''){$o = $app;}
			else {
				$o = self::URI();
			}
		}
		return $o;
	}





	#KEY •
	public static function key($i='iGet'){
		if($i == 'iGet'){
			if(!empty($_GET['okey'])){$o = $_GET['okey'];}
		}
		if(!empty($o)){return strtolower($o);}
		return false;
	}





	#STATE •
	public static function state(){
		$o = self::route();
		if(!oString::is_empty($o) && $o != 'index'){
			$o = oString::After($o, '-', true, 'iFirst');
			if(!oString::is_empty($o)){return $o;}
		}
		return 'default';
	}





	#ACTION •
	public static function action(){
		$o = self::route();
		if(!oString::is_empty($o) && $o != 'index'){
			$o = oString::After($o, '/', true, 'iFirst');
			#Remove *state from $o
			$state = self::state();
			if(!oString::is_empty($state) && $state != 'default'){
				$o = oString::to($o, '-'.$state, '', 'iFirst');
			}
			if(!oString::is_empty($o)){return $o;}
		}
		return 'default';
	}





	#MODEL •
	public static function model(){
		$o = self::route();
		if(!oString::is_empty($o) && $o != 'index'){
			#Remove *state from $o
			$state = self::state();
			if(!oString::is_empty($state) && $state != 'default'){
				$o = oString::to($o, '-'.$state, '', 'iFirst');
			}
			#Remove *action from $o
			$action = self::action();
			if(!oString::is_empty($action) && $action != 'default'){
				$o = oString::to($o, '/'.$action, '', 'iFirst');
			}
			if(!oString::is_empty($o)){return $o;}
		}
		return 'index';
	}





	#PAGE • [page or view for site ONLY ~ to be used where not api/app]
	public static function page($i='iGet'){
		if(!empty($i)){
			if($i == 'iGet'){$o = self::route();}
			$o = oString::to($o, '/', '-');
			if(!oString::is_empty($o)){return $o;}
		}
		return false;
	}





	#PATH • return path
	public static function path($i='init', $flex=false){
		$o = AO['CORE'].'o'.self::project().AO['DS'];
		if($i == 'config' || $i == 'init'){$o .= AO['INIT'];}
		if($i == 'config'){$o .= 'config.inc';}
		if($i == 'init'){$o .= 'initzr.inc';}
		// if($i == 'routzr'){$o .= AO['ROUTZR'];}
		// if($i == 'utilizr'){$o .= oUTILIZR;}
		// if($i == 'modelizr'){$o .= oMODELIZR;}
		// if($i == 'themezr'){$o .= oTHEMEZR;}
		// if($i == 'viewzr'){$o .= oVIEWZR;}
		// if($i == 'bitzr'){$o .= oBITZR;}
		// if($i == 'slicezr'){$o .= oSLICEZR;}
		// if($i == 'organizr'){$o .= oRGANIZR;}
		if(!empty($o)){
			$o = strtolower($o);
			#Default to main when file (resource) is unavailable
			if($flex === true && !oFile::is($o)){
				$o = oString::to($o, 'o'.self::project(), 'omain');
			}
			return $o;
		}
		return false;
	}





} #EndOfClass - oRoute