<?php
class oRoute {
	private static $instance;


	//-------------- Prevent multiple instances ---------------
	private function __construct(){return;}

	//-------------- Prevent duplication ---------------
	private function __clone(){return;}

	//-------------- Returns a single instance ---------------
	public static function instantiate($config=''){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}

	//-------------- URI link ---------------
	public static function URILink($link='')
	{
		if(isset($_GET['link']) && empty($link)){$link = $_GET['link'];}
		if(empty($link) || $link == 'index.php'){$link = 'index';}
		#ToDo ~trim possible {.php} from link

		$link = strtolower($link);
		return $link;
	}


	//-------------- URI route ---------------
	public static function URIRoute($route='')
	{
		if(isset($_GET['route']) && empty($route)){$route = $_GET['route'];}
		if(empty($route) || $route == 'www'){$route = 'site';}
		else {
			#ToDo ~populate allowed routes list
			$routes = array('api', 'app');
			if(!in_array($route, $routes)){$route = 'site';}
		}

		$route = strtolower($route);
		return $route;
	}


	//-------------- Route URI (automatically) for the Application ---------------
	public static function routeApp($link='', $route=''){
		if(oEmpty($link)){$link = self::URILink();}
		if(oEmpty($route)){$route = self::URIRoute();}

		if($route=='site')
		{
			#load URI's view
			$file = oFile::prepare($link, 'viewzr');
			oInc($file);
		}
		else {
			#ToDo ~work on this further (api|app|etc), for now apply MVC
			$file = oFile::prepare($link, 'organizr');
			oInc($file);
		}
	}


	//-------------- Control routing of request ---------------
	public static function request($uri, $route, $handler, $request){
		#Get request information & compare for processing
		$activeLink = self::URILink();
		$activeRoute = self::URIRoute();

		if($uri==$activeLink && $route==$activeRoute){
			#ToDo ~check if $request is
			oFile::prepare($request, $handler);
		}

	}
}
?>