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



	//URI •
	public static function URI($i='iGet'){
		if($i == 'iGet'){
			if(!empty($_GET['olink'])){$o = $_GET['olink'];}
			else {$o = 'index';}
		}
		if(!empty($o)){return strtolower(trim($o));}
		return false;
	}



	//API •
	public static function API($i='iGet'){
		if(self::URI() == 'api'){
			if(!empty($_GET['oapi'])){$o = $_GET['oapi'];}
		}
		if(!empty($o)){return strtolower($o);}
		return false;
	}



	//APP •
	public static function APP($i='iGet'){
		if(self::API() === false && self::URI() == 'app'){
			if(!empty($_GET['oapp'])){$o = $_GET['oapp'];}
		}
		if(!empty($o)){return strtolower($o);}
		return false;
	}



	//SITE •
	public static function Site($i='iGet'){
		if(!oRoute::API() && !oRoute::APP()){
			if($i == 'iGet'){$o = self::Source();}
		}
		if(!empty($o)){return strtolower($o);}
		return false;
	}



	//ROUTE • Get & Return Route
	public static function Route(){
		$api = self::API();
		if($api !== false && $api != ''){$o = $api;}
		else {
			$app = self::APP();
			if($app !== false && $app != ''){$o = $app;}
			else {
				$o = self::URI();
			}
		}
		return $o;
	}



	//KEY •
	public static function Key($i='iGet'){
		if($i == 'iGet'){
			if(!empty($_GET['okey'])){$o = $_GET['okey'];}
		}
		if(!empty($o)){return strtolower($o);}
		return false;
	}



	//STATE •
	public static function State(){
		$o = self::Route();
		if(!oString::IsEmpty($o) && $o != 'index'){
			$o = oString::After($o, '-', true, 'iFirst');
			if(!oString::IsEmpty($o)){return $o;}
		}
		return 'default';
	}



	//ACTION •
	public static function Action(){
		$o = self::Route();
		if(!oString::IsEmpty($o) && $o != 'index'){
			$o = oString::After($o, '/', true, 'iFirst');
			#Remove *state from $o
			$state = self::State();
			if(!oString::IsEmpty($state) && $state != 'default'){
				$o = oString::To($o, '-'.$state, '', 'iFirst');
			}
			if(!oString::IsEmpty($o)){return $o;}
		}
		return 'default';
	}



	//MODEL •
	public static function Model(){
		$o = self::Route();
		if(!oString::IsEmpty($o) && $o != 'index'){
			#Remove *state from $o
			$state = self::State();
			if(!oString::IsEmpty($state) && $state != 'default'){
				$o = oString::To($o, '-'.$state, '', 'iFirst');
			}
			#Remove *action from $o
			$action = self::Action();
			if(!oString::IsEmpty($action) && $action != 'default'){
				$o = oString::To($o, '/'.$action, '', 'iFirst');
			}
			if(!oString::IsEmpty($o)){return $o;}
		}
		return 'index';
	}



	//PAGE • [page or view for site ONLY ~ to be used where not api/app]
	public static function Page($i='iGet'){
		if(!empty($i)){
			if($i == 'iGet'){$o = self::Route();}
			$o = oString::To($o, '/', '-');
			if(!oString::IsEmpty($o)){return $o;}
		}
		return false;
	}




	//PATH • return path
	public static function Path($i='init', $flex=false){
		$o = oCORE.'o'.self::Source().DS;
		if($i == 'init'){$o .= oROUTZR.'init.inc';}
		if($i == 'config'){$o .= oCONFIG.'config.inc';}

		if(!empty($o)){
			$o = strtolower($o);
			#Default to main when file (resource) is unavailable
			if($flex == true){
				if(!oFile::Is($o)){$o = oString::To($o, 'o'.self::Source(), 'omain');}
			}
			return $o;
		}
		return false;
	}

} // EndOfClass - oRoute