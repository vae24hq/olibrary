<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oUtil ~ Utility • DEPENDENCY»
 */
class oUtil {
	private static $Instance;


	//CONSTRUCT • Prevents multiple instantiation
	private function __construct(){return;}


	//CLONE • Prevent duplicate
	private function __clone(){return;}


	//INSTANTIATE • Return fresh instance
	public static function Instantiate(){
		if(is_null(self::$Instance)){
			self::$Instance = new self();
		}
		return self::$Instance;
	}


	//METHOD • Describe method

	/***** PHP [CHECK VARIOUS PHP RELATED INFO] *****/
	public static function php($task='iVer'){
		if($task == 'iVer'){$rez = phpversion();}

		if(!empty($rez)){return $rez;}
	}

	/***** APACHE [CHECK VARIOUS APACHE RELATED INFO] *****/
	public static function apache($task='iVer'){
		if($task=='iVer'){$rez = apache_get_version();}

		if(!empty($rez)){return $rez;}
	}

	/***** [CHECK IF ARRAY IS MULTI-DIMENTIONAL] *****/
	public static function isMultiArray($array){
		if(is_array($array)){
			$rez = array_filter($array, 'is_array');
			if(count($rez) > 0){return true;}
		}
		return false;
	}



	/***** [SET & RETURN LANG] *****/
	public static function lang($lang=''){
		if(empty($lang)){
			if(!empty($_GET['lang'])){$_SESSION['iLang'] = $_GET['lang'];}
			elseif(!empty($_POST['lang'])){$_SESSION['iLang'] = $_POST['lang'];}

			if(empty($_SESSION['iLang'])){$_SESSION['iLang'] = 'en';}
			$lang = $_SESSION['lang'];
		}
		else {
			$_SESSION['lang'] = $lang;
		}
		return $lang;
	}

	} // EndOfClass - oUtil