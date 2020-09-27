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

	//-------------- File Loader ~ only add files ---------------
	public static function add($file='', $treatAs='REQUIRED'){
		if(!empty($file) && !is_file($file)){$file = $file.'.php';}
		if(file_exists($file)){require $file;}
		elseif($treatAs == 'REQUIRED'){
			die('Missing Library: '.$file);
			// die('E404: '.basename($file)); #Production
		}
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
		if($path == 'viewzr'){$file .= oVIEWZR;}
		elseif($path == 'oRGANIZ'){$file .= oRGANIZ;}
		elseif($path == 'apizr'){$file .= oAPIZR;}
		elseif($path == 'modelizr'){$file .= oMODEL;}
		elseif($path == 'slicezr'){$file .= oSLICE;}
		elseif($path == 'utilizr'){$file .= oUTIL;}

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

	public static	function inc($file, $reportAs='strict', $incAs='req'){
		if(file_exists($file))
		{
			if($incAs=='req'){include $file;}
			elseif($incAs=='reqOne'){require_once $file;}
			elseif($incAs=='inc'){require $file;}
			elseif($incAs=='incOne'){include_once $file;}
		}
		else{
			#Todo ~ check machine/environment settings [to prepare message/log]
			$report = 'Failed to load ['.$file.']';
			if($reportAs=='strict'){die($report);}
		}
	}

	//-------------- Adds file to document ---------------
	public static function load($name='', $path=''){

		$file = self::prepare($name, $path);
		#prevent self include loop (e.g index including index)

		$fileSelf = self::info('o_self', 'basename');
		if($file == $fileSelf){die('Cannot include file ['.$file.'] to itself ['.$fileSelf.']');}
		$prepFile = self::prepare($name, $path);
		self::inc($prepFile);
		return;
	}
}
?>