<?php
/**===========================================================================
* Class: LINK
* Description: A utility class for handling links
* Objective: 
* Dependency: 
*/
class Link {
	private static $instance;

	//-------------- Prevent multiple instances ---------------
	private function __construct(){return;}

	//-------------- Prevent duplication ---------------
	private function __clone(){return;}

	//-------------- Returns a single instance ---------------
	public static function instantiate(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}



	//-------------- Prepare link ---------------
	public static function set($link, $rewrite='o_config'){
		if($rewrite == 'o_config'){$rewrite = Tiny::stack('rewriteURL');}
		if($link != 'index'){
			if($rewrite != 'yeah'){$link = '?page='.$link;}
			if(!empty($link)){$link = trim($link);}
			return strtolower($link);
		}
		return '';
	}

	//-------------- Get link information ---------------
	public static function get($link='o_self'){
		if($link == 'o_self'){$link = $_SERVER['PHP_SELF'];}
		if(!empty($_REQUEST['page'])){$link = $_REQUEST['page'];}
		else {$link = 'index';}
		$link = Character::trim($link);
		$link = Character::swap($link, '\\', '');
		$link = Character::swap($link, PS, '');
		$link = urldecode($link);
		return $link;
	}

	//-------------- Return link with path ---------------
	public static function make($link='o_self', $rewrite='o_config'){
		$path = Tiny::path('', 'o_link');
		if($link == 'o_self'){$link = self::get();}

		$link = self::set($link, $rewrite);
		return $path.$link;
	}

	//-------------- Check if link is active ---------------
	public static function isActive($uri='index'){
		$link = self::get('o_self');
		if($uri == $link){return true;}
		return false;
	}

}
/** END OF CLASS - Link 
===========================================================================**/
?>