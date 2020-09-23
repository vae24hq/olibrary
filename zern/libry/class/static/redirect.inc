<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oRedirect ~ Redirect Handling • DEPENDENCY»
 */
class oRedirect {
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


	//META • redirect URL using http-equiv
	public static function Meta($link, $time=0, $exit=false){
		$o = '<meta http-equiv="refresh" content="'.$time.'; url='.$link.'">';
		if($exit !== false){exit($o);}
		return $o;
	}


	//URL • redirect url using headers
	public static function URL($link, $time=0, $exit=false){
		if(!headers_sent($filename, $linenum)){
			echo $link;
			if(!empty($time)){
				header('Refresh:'.$time.';url='.$link);
			}
			else {
				header('Location: '.$link);
			}
			if($exit !== false){exit();}

		}
		else {
			#Use meta redirect (Headers already sent in $filename on line $linenum)
			return self::meta($link, $time, $exit);
		}
	}


	//URL • redirect & exit
	public static function ExitTo($link){
		return self::URL($link, 0, true);
	}


} // EndOfClass - oRedirect