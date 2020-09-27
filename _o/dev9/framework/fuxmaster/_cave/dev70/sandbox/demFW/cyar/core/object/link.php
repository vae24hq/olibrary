<?php
/* CYAR™ framework is an evolving library for rapid & efficient development of modem responsive static or dynamic website and applications.
 * Built and maintained at OIAVO™ using PHP, MySQL, HTML, CSS, JS & derived technology. Version 0.0.1 | CYAR™ Web framework © 2016
 * ========================================================================================================================================
 * PHP | objective::link ~ link functions | Dependency » ~
 */

class link {
	private static $instance;

	//-------------- Prevent multiple instances ---------------
	private function __construct(){return;}

	//-------------- Returns a single instance ---------------
	public static function instantiate(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}


	//-------------- Prepare link ---------------
	protected static function prepare($value=''){
		if(isEmpty($value)){return FALSE;}
		$value = trim($value); $link = '';
		if(REWRITE_URL != 'sure'){$link .= '?page=';} #when rewrite is off
		elseif(inString($value, '_')){#when rewrite is on, covert possible 'user_login' to 'user/login'
			$value = stringSwap($value, '_', '/');
		}
		$link = $link.trim(strtolower($value));
		return $link;
	}

	//-------------- Returns referrer URL ---------------
	public static function referrer(){
		if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){return $_SERVER['HTTP_REFERER'];}		
		return FALSE;
	}

	//-------------- Returns link information ---------------
	public static function getInfo($route=''){
		if(isEmpty($route)){ #get & use current link			
			if(isset($_GET['page']) && !isEmpty($_GET['page'])){$route = $_GET['page'];}
			else {$route = 'index';}
		}
		$route = trim($route);
		if(inString($route, '/')){$route = stringSwap($route, '/', '_');}
		
		#find the last occurrence of '_' and check if there is content after it.
		$last = posChar($route, '_', 'last');
		$length = strlen($route);
		if($length == $last){$route = stringSwap($route, '_', '', 'last');}

		return strtolower($route);
	}

	//-------------- Check for currently active link ---------------
	public static function isActive($route='index'){
		if(isEmpty($route)){} #TODO -error check

		#toDo ~ $route = stringSwap($route, '&', 'and', 'all');
		$activeLink = self::getInfo();
		if($route == $activeLink){return TRUE;}
		return FALSE;
	}


	//-------------- Mark-up a link ---------------
	public static function markup($route='', $name='', $tag='', $style='', $target='self', $group='', $format='relative'){
		#perform validation
		if(isEmpty($route)){return FALSE;}
		
		$route = strtolower(trim($route));
		
		#prepare link {external|absolute|relative}
		$build['link'] = '';	
		if($format != 'relative'){$build['link'] .= $route;}
		else {
			$build['link'] .= pathTo('', $format);
			if($route != 'index'){$build['link'] .= self::prepare($route);}
		}

		#prepare name (if empty use route)
		$build['name'] = '';	
		if(isEmpty($name)){
			$name = cleanup($route);
			$name = stringSwap($name, '/', ' ');
		}		
		$build['name'] = trim(wordAsCap($name));

		#prepare tag (if empty use prepared name)
		$build['tag'] = '';
		if(isEmpty($tag)){$tag = $build['name'];}
		else {
			$tag = cleanup($tag);
			$tag = stringSwap($tag, '/', ' ');
			$tag = wordAsCap($tag);
		}
		$build['tag'] = ucfirst($tag);

		#prepare css class
		$build['style'] = ''; $isActive = self::isActive($route); $activate = 'nope';
		if((is_array($group) && in_array(self::getInfo(), $group)) || self::getInfo() == $group){$activate = 'sure';}
		if(!isEmpty($style) || $isActive || $activate == 'sure'){
			$build['style'] .= ' class="';
			if(!isEmpty($style)){$build['style'] .= $style;}
			if(!isEmpty($style) && ($isActive || $activate == 'sure')){$build['style'] .= ' active';}
			elseif($isActive || $activate == 'sure'){$build['style'] .= 'active';}
			$build['style'] .= '"';
		}

		#prepare target
		$build['target'] = '';
		if(!isEmpty($target) && $target !='self'){$build['target'] = ' target="'.$target.'"';}

		return '<a href="'.$build['link'].'" title="'.trim($build['tag']).'"'.$build['style'].$build['target'].'>'.$build['name'].'</a>';
	}

	//-------------- Make a link ---------------
	public static function make($route, $name='', $style='', $tag='', $target='self', $format='relative'){
		return self::markup($route, $name, $tag, $style, $target, '', $format);
	}

	//-------------- Make a group link ---------------
	public static function group($group, $route, $name='', $style='', $tag='', $target='self', $format='relative'){
		return self::markup($route, $name, $tag, $style, $target, $group, $format);
	}

	//-------------- Make an absolute link ---------------
	public static function absolute($route, $name='', $style='', $tag='', $target='self', $format='absolute'){
		return self::markup($route, $name, $tag, $style, $target, '', $format);
	}

	//-------------- Make an external link ---------------
	public static function external($route, $name='', $style='', $tag='', $target='_blank', $format='external'){
		return self::markup($route, $name, $tag, $style, $target, '', $format);
	}

	//-------------- Make navigation link ---------------
	public static function nav($route, $name='', $tag='', $format='relative', $style='nav-link'){
		return self::markup($route, $name, $tag, $style, 'self', '', $format);
	}

	//-------------- Make group navigation link ---------------
	public static function navGroup($group, $route, $name='', $activate ='', $tag='', $style='nav-link'){
		return self::markup($route, $name, $tag, $style, 'self', $group, $format);
	}

	//-------------- Make paragraph link ---------------
	public static function paragraph($route, $name='', $tag='', $style='paragraph', $target='self', $format='relative'){
		return self::markup($route, $name, $tag, $style, $target, '', $format);
	}



	//Returns valid link for switching rendition (desktop, tablet and phone)
	public static function render($device='desktop'){
		if(isEmpty($device)){$device = 'desktop';}

		#prepare
		$route = self::getInfo();
		if(!stringAfter($route, 'index')){$route = stringSwap($route, 'index', '');}

		$route = self::prepare($route);
		$query = $_SERVER['QUERY_STRING'];
		#remove possible rendition from query string
		if(inString($query, '&v=')){$query = stringSwap($query, '&v='.$_GET['v'], '');}
		if(inString($query, 'v=')){$query = stringSwap($query, 'v='.$_GET['v'], '');}
		if(inString($query, '&')){
			#get string after first occurrence of '&'; and add it to link
			$string_after = stringAfter($query, '&', 'nope');
			if(REWRITE_URL == 'sure'){$string_after = stringSwap($string_after, '&', '?', 'first');} #change first occurrence of '&' to '?' if rewrite is on
			$route .= $string_after;
		}
		if(inString($route, '?')){$route .='&';} else {$route .='?';}
		
		$route .= 'v='.$device;
		$route = pathTo().$route;

		return '<a href="'.$route.'" title="'.$device.'" class="render">'.ucfirst($device).'</a>';
	}

} //************ End of class ~ Link ************//
?>