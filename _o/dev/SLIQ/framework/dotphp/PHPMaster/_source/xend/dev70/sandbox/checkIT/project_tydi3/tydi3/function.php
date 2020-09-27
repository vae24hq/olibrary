<?php
//Perfoms empty check on a variable
function isEmpty($data){
	if(!isset($data)){return TRUE;}
	else {
		if(is_array($data)){
			if(empty($data)){return TRUE;}
		} else {
			$data = trim($data);
			$length = strlen($data);
			if($length<1){return TRUE;}
		}
	}

	return FALSE;
}

//Returns output message or result
function printMsg($data='', $process='export'){
	if($process=='export'){
		echo '<tt><pre>'.var_export($data,TRUE).'</pre></tt>';

		return;
	}
}


//Return document information
function doc_info($chore='name', $document='self'){
	#prepare task
	$chores = array('name', 'file', 'filename', 'ext');
	if(is_empty($chore) || is_empty($document) || (!in_array($chore, $chores))){
		$msg = 'One or more errors occured with the argument on '.__FUNCTION__.'()';
 		return print_msg($msg);
	}
	if($document == 'self'){$page = $_SERVER['PHP_SELF'];}
	$pathdetails = pathinfo($page);
	$ext = '.'.$pathdetails['extension'];
	$chore = basename($_SERVER['PHP_SELF'], $ext);
	if($chore=='filename'){$chore = $chore.$ext;}
	elseif($chore=='file'){$chore = $page;}
	elseif($chore=='name'){$chore = $chore;}
	elseif($chore=='ext'){$chore = $ext;}
	
	#return task
	return $chore;
}


//Return directory path
function path_to($dir='', $return='relative'){
	#set default
	$chore = '';
	if($dir == 'media'){$chore = PATH_MEDIA.PS;}
	if($dir == 'css'){$chore = PATH_CSS.PS;}
	if($dir == 'js'){$chore = PATH_JS.PS;}
	if($dir == 'icon'){$chore = PATH_ICON.PS;}
	if($dir == 'banner'){$chore = PATH_BANNER.PS;}

	if($return == 'relative'){
		if(defined('REWRITE_URL') && REWRITE_URL == 'yeah' && erko::return_value('page')!='index'){
			$chore = '../'.$chore;
		} else {
			$chore = './'.$chore;
		}
	} elseif($return == 'domain'){
		$chore = erko::site_url().'/'.$chore;
	} else {$chore = './'.$chore;}
	
	#return task
	return $chore;
}






?>