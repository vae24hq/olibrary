<?php
/**ORAX™ Framework is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Creator: Osawere™ O. Anthony - @iamodao - www.osawere.com  © August 2020 | Apache License
 * ============================================================================================
 * oRouter ~ Handle Routing • DEPENDENCY»
 */
class oRouter {
	private static $instance;

	/***** [PREVENTS MULTIPLE INSTANCES] *****/
	private function __construct(){return;}

	/***** [PREVENTS DUPLICATES] *****/
	private function __clone(){return;}

	/***** [RETURNS SINGLE INSTANCE] *****/
	public static function instantiate(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}

	/***** RETURNS VALUE OF ROUTER *****/
	public static function get($method='oGET', $default=''){
		if(empty($default)){$default = 'osite';}
		if($method == 'oGET' && !empty($_GET['orouter'])){$o = $_GET['orouter'];}
		elseif($method == 'oPOST' && !empty($_POST['orouter'])){$o = $_POST['orouter'];}
		elseif(!empty($_REQUEST['orouter'])){$o = $_REQUEST['orouter'];}
		else {$o = $default;}
		if($o == 'www'){$o = $default;}
		return strtolower($o);
	}


	/***** RETURNS VALUE OF LINK *****/
	public static function link($default=''){
		if(empty($default)){$default = 'index';}
		if(!empty($_GET['olink'])){$o = $_GET['olink'];}
		else {$o = $default;}
		return strtolower($o);
	}

	/***** RETURNS VALUE OF DATA-URI [only available when link is data-uri *****/
		public static function uri(){
			if(self::link() == 'data-uri'){
				if(!empty($_GET['o'])){$o = $_GET['o'];}
				return strtolower($o);
			}
		}


		/***** RETURNS VALUE OF GO *****/
		public static function go($method='oGET', $default=''){
			if(empty($default)){$default = 'default';}
			if($method == 'oGET'){
				if(!empty($_GET['oaction'])){$o = $_GET['oaction'];}
				elseif(isset($_GET['oaction'])){$o = $default;}
			}
			elseif($method == 'oPOST'){
				if(!empty($_POST['oaction'])){$o = $_POST['oaction'];}
				elseif(isset($_POST['oaction'])){$o = $default;}
			}

			if(!empty($o)){return strtolower($o);}
			return false;
		}

	}
	?>