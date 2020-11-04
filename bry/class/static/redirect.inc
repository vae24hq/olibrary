<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oRedirect ~ Redirect Handling • DEPENDENCY»
 */
class oRedirect {
	//META • redirect URL using http-equiv
	public static function meta($link, $time=0, $exit=false){
		$o = '<meta http-equiv="refresh" content="'.$time.'; url='.$link.'">';
		if($exit !== false){exit($o);}
		return $o;
	}





	//URL • redirect url using headers
	public static function to($link, $time=0, $exit=false){
		if(!headers_sent($filename, $linenum)){
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





	//EXIT • redirect & exit
	public static function quit($link){
		return self::to($link, 0, true);
	}
} // EndOfClass - oRedirect