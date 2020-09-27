<?php
class ofile {
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

	//-------------- Return document information ---------------
	public static function info($file='o_self', $return='details'){
		#prepare & return result
		if($file == 'o_self'){$file = $_SERVER['PHP_SELF'];}
		$info = pathinfo($file);

		$dirname = $info['dirname'];
		$filename = $info['filename'];
		$extension = '.'.$info['extension'];
		$basename = $filename.$extension;

		if($return == 'dirname'){$result = $dirname;}
		if($return == 'basename'){$result = $basename;}
		if($return == 'filename'){$result = $filename;}
		if($return == 'extension'){$result = $extension;}

		if(!empty($result)){return $result;}
		else {return $info;}
	}


	//-------------- Prepare file path for addFile() ---------------
	public static function prep($name='', $path=''){
		if(empty($name)){exit('File: filename is required');}
		if($name == 'o_auto'){$name = helper::link();}
		if($path == 'o_auto'){$path = helper::route();}

		$file = '';
		if($path == 'viewzr'){$file .= VIEWZR;}
		elseif($path == 'organizr'){$file .= ORGANIZR;}
		elseif($path == 'apizr'){$file .= APIZR;}
		elseif($path == 'modelizr'){$file .= MODELIZR;}
		#if($path == 'go'){$file .= ORGANIZR.'go.php';}
		#elseif($path == 'redirect'){$file .= ORGANIZR.'redirect.php';}
		#elseif($path == 'download'){$file .= ORGANIZR.'download.php';}
		#elseif($path == 'app'){$file .= VIEW;}
		#elseif($path == 'organizr'){$file .= ORGANIZR;}
		#elseif($path == 'utilizr'){$file .= UTILIZR;}
		#elseif($path == 'link'){$file .= VIEWZR;}
		#elseif($path == 'slice'){$file .= SLICEZR;}
		#elseif(!empty($path)){$file .= $path;}

		#set file path to it's path
		if(($path != 'go' && $path != 'redirect' && $path != 'download') && !empty($name)){$file .= $name.'.php';}

		return $file;
	}


	//-------------- Adds file to document ---------------
	public static function load($name='', $path='', $check='production', $persist='nope'){
		if(empty($name)){exit('File Include: filename is required');}

		$file = self::prep($name, $path);
		#prevent self include loop (e.g index including index)

		$fileSelf = self::info('o_self', 'basename');
		if($file == $fileSelf){die('Cannot include file ['.$file.'] to itself ['.$fileSelf.']');}


		if(!empty($file)){
			if(!file_exists($file)){
				if($check=='strict'){
					exit('The file ['.$file.'] does not exist!');
				}
				elseif($check=='production'){return 'FILE404';}
				else {
					echo ('Missing File: '.$name);
				}
			}
			else {#include file, because it exist
			if($persist != 'yeah'){include($file);}
				else {include_once($file);}
			}
		}
		else {
			return 'E404: an E-LOAD error occurred';
		}
		return;
	}
}
?>