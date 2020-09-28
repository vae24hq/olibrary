<?php
function is_msg($data='', $process='export'){
	if($process=='export'){
		echo '<tt><pre>'.var_export($data,TRUE).'</pre></tt>';

		return;
	}
}


function is_empty($data=''){
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


function found_file($file=''){
	if(file_exists($file)){return TRUE;}

	return FALSE;
}


function get_random(){
	$prid  = do_rand('prid');
	$suid  = do_rand('suid');
	$tuid  = do_rand('tuid');
	$bind  = do_rand('bind');
	$logid = do_rand('logid');
	$time  = do_rand('time');
	$chore  = '<pre>';
	$chore .= 'PRID: '."\t".strlen($prid)."\t".$prid.'<br>';
	$chore .= 'SUID: '."\t".strlen($suid)."\t".$suid.'<br>';
	$chore .= 'TUID: '."\t".strlen($tuid)."\t".$tuid.'<br>';
	$chore .= 'BIND: '."\t".strlen($bind)."\t".$bind.'<br>';
	$chore .= 'LogID: '."\t".strlen($logid)."\t".$logid.'<br>';
	$chore .= 'Time: '."\t".strlen($time)."\t".$time.'<br>';
	$chore .= '</pre>';
	echo $chore;
}

function format_size($size=''){
	if(is_empty($size)){return FALSE;}
	if($size>=1073741824){$chore = number_format($size / 1073741824 , 2) . 'GB';}
	elseif($size>=1048576){$chore = number_format($size / 1048576 , 2) . 'MB';}
	elseif($size>=1024){$chore = number_format($size / 1024 , 2) . 'KB';}
	elseif($size>1){$chore = $size . ' bytes';}
	elseif($size==1){$chore = $size . ' byte';}
	else {$chore = '0';}
 	return $chore;
}


function get_doc_info($yield='name', $document='self'){
	$yields = array('name', 'file', 'filename', 'ext');
	if(is_empty($yield) || is_empty($document) || (!in_array($yield, $yields))){
		$msg = 'One or more errors occured with the argument on '.__FUNCTION__.'()';
 		return printMsg($msg);
	}
	if($document == 'self'){$page = $_SERVER['PHP_SELF'];}
	$pathdetails = pathinfo($page);
	$ext = '.'.$pathdetails['extension'];
	$chore = basename($_SERVER['PHP_SELF'], $ext);
	if($yield=='filename'){$chore = $chore.$ext;}
	elseif($yield=='file'){$chore = $page;}
	elseif($yield=='name'){$chore = $chore;}
	elseif($yield=='ext'){$chore = $ext;}
	return $chore;
}


function add_file($fileLink='', $filePersist='no', $fileCheck='strict'){
 	if(empty($fileLink)){exit('Error | [IE101A]: file for inclusion is required');}
 	if(empty($fileCheck)){exit('Error | [IE201A]: input can only be [strict|passive]');}
 	#$fileLink = $fileLink.'.php'; add .php to filename
 	if(!file_exists($fileLink)){
 		if($fileCheck=='strict'){
 			exit('Error | [IE202A]: file "'.$fileLink.' does not exist!');
 		}
 	}
 	else { #include file, because it exist
 		if($filePersist!='no'){return include_once($fileLink);}
 		else { include($fileLink);}
 	}
 	return;
}
?>