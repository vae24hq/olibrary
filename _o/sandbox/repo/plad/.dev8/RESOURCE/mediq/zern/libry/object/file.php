<?php
class oFile {
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
	public static function prepare($name='', $path=''){
		if(empty($name)){exit('File: filename is required');}

		$file = '';
		if($path == 'view'){$file .= oVIEWZR;}
		elseif($path == 'organiz'){$file .= oRGANIZ;}
		elseif($path == 'api'){$file .= oAPIZR;}
		elseif($path == 'model'){$file .= oMODEL;}
		elseif($path == 'bit'){$file .= oBIT;}
		elseif($path == 'slice'){$file .= oSLICE;}
		elseif($path == 'util'){$file .= oUTIL;}

		#if($path == 'go'){$file .= oRGANIZ.'go.php';}
		#elseif($path == 'redirect'){$file .= oRGANIZ.'redirect.php';}
		#elseif($path == 'download'){$file .= oRGANIZ.'download.php';}
		#elseif($path == 'app'){$file .= VIEW;}
		#elseif($path == 'oRGANIZ'){$file .= oRGANIZ;}
		#elseif($path == 'link'){$file .= VIEWZR;}
		#elseif($path == 'slice'){$file .= SLICEZR;}
		#elseif(!empty($path)){$file .= $path;}

		#ToDo ~call cleanup function on name

		return $file.$name.'.php';
	}

	//-------------- Adds file to document ---------------
	public static function load($name='', $path=''){

		$file = self::prepare($name, $path);
		#prevent self include loop (e.g index including index)

		$fileSelf = self::info('o_self', 'basename');
		if($file == $fileSelf){die('Cannot include file ['.$file.'] to itself ['.$fileSelf.']');}
		$prepFile = self::prepare($name, $path);
		inc($prepFile);
		return;
	}
}
?>