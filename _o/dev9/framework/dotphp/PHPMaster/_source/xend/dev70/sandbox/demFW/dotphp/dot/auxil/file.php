<?php
//-------------- Return document information ---------------
function fileInfo($file='o_self', $return='details'){
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
function prepFile($name='', $path=''){
	if(empty($name)){exit('File: filename is required');}

	if($name == 'o_auto' || $path == 'o_auto'){
		$route = route();
		if($name == 'o_auto'){$name = $route['uri'];}
		if($path == 'o_auto'){$path = $route['type'];}
	}

	$file = '';
	if($path == 'go'){$file .= ORGANIZR.'go.php';}
	elseif($path == 'api'){$file .= API;}
	elseif($path == 'redirect'){$file .= ORGANIZR.'redirect.php';}
	elseif($path == 'download'){$file .= ORGANIZR.'download.php';}
	elseif($path == 'app'){$file .= VIEW;}
	elseif($path == 'organizr'){$file .= ORGANIZR;}
	elseif($path == 'utilizr'){$file .= UTILIZR;}
	elseif($path == 'modelizr'){$file .= MODELIZR;}
	elseif($path == 'link'){$file .= VIEW;}
	elseif($path == 'slice'){$file .= SLICE;}
	elseif(!empty($path)){$file .= $path;}

	#set file path to it's path
	if(($path != 'go' && $path != 'redirect' && $path != 'download') && !empty($name)){$file .= $name.'.php';}

	return $file;
}


//-------------- Adds file to document ---------------
function addFile($name='', $path='', $persist='nope', $check='strict'){
	if(empty($name)){exit('File Include: filename is required');}

	$file = prepFile($name, $path);
	#prevent self include loop (e.g index including index)

	$fileSelf = fileInfo('o_self', 'basename');
	if($file == $fileSelf){die('Cannot include file ['.$file.'] to itself ['.$fileSelf.']');}


	if(!empty($file)){
		if(!file_exists($file)){
			if($check=='strict'){
				exit('The file ['.$file.'] does not exist!');
			}
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
		echo 'E404: an E-LOAD error occurred';
	}
	return;
}
?>