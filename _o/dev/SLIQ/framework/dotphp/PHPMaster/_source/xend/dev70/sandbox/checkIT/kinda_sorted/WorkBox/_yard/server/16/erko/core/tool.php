<?php
/* erko™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by DeronEllse™ [@deronellse - www.deronellse.com/about] using PHP, MySQL, HTML, CSS, JS & derived technology.
 * © February 2016 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | tool::core ~ core tools
 */
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

// check if file exists
function found_file($file=''){
	if(file_exists($file)){return TRUE;}

	return FALSE;
}


// outputs message or result
function print_msg($data='', $process='export'){
	if($process=='export'){
		echo '<tt><pre>'.var_export($data,TRUE).'</pre></tt>';

		return;
	}
}


// generation notification
function notify($msg='', $class='notice', $wrap='p'){
 	if(is_null($msg) || empty($wrap)){return FALSE;}
 	$wrap = strtolower($wrap);
 	if(empty($class)){$css = '';}
 	else {$css = ' class="'.$class.'"';}

 	$chore = '<'.$wrap.$css.'>'.$msg.'</'.$wrap.'>';

 	echo $chore."\n";

 	return;
}


// get document information
function doc_info($yield='name', $document='self'){
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


// adds file to document
function add_file($location='', $persist='yeah', $check='strict'){
 	if(empty($location)){exit('Error | [IE101A]: file for inclusion is required');}
 	if(empty($check)){exit('Error | [IE201A]: input can only be [strict|passive]');}
 	#$location = $location.'.php'; #add .php to filename
 	if(!found_file($location)){
 		if($check=='strict'){
 			exit('The file "{'.$location.'} does not exist!');
 		}
 	}
 	else { #include file, because it exist
 		if($persist!='no'){include_once($location);}
 		else {include($location);}
 	}
 	return;
}

// handles redirect
function redirect($location='', $delay='none', $report = 'on'){
	if(!empty($location)){
		$duration = $delay; if($delay=='none'){$duration = 0;}
		if (!headers_sent($filename, $linenum)){
			if($duration !=0){header("Refresh:".$duration.";URL=".$location);}
			else{header('Location: '.$location); exit;}
		} else {
			$operation = '<meta http-equiv="refresh" content="'.$duration.'; url='.$location.'">';
			$content ='<p class="redirect">You are now being redirected. <br>Please wait or <a href="'.$location.'">click here</a>.</p>';
			echo $operation; echo "\n"; if($report=='on'){echo $content;}
			if($duration ==0 && $report == 'on'){exit;}
		}
	}
	else {
		return FALSE;
	}
}

// returns error 404
function not_found($data='', $notify_as='display'){ #display | email | sms | log | all
	// $prep = '<div class="erko-content">'."\n";
	// $prep .= '<h3>'.ucwords($data).' - Not Found!</h3>';
	// $prep .= '<p>We are sorry for this awkwardness as the requested document is not available.<br>'."\n";
	// $prep .= 'Please return to '.markup_url('index', erko::$name).'</p>'."\n";
	// $prep .= '<p class="spaceTop">You may report this issue to us via ';
	// $prep .= '<a href="mailto:'.erko::$mailadmin.'" target="_blank" class="email">'.erko::$mailadmin.'</a></p>'."\n";
	// $prep .= '</div>'."\n";
	$prep = '<article id="main-article">'."\n";
	$prep .= '<h3 class="heading">'.ucwords($data).' - Not Found!</h3>'."\n";
	$prep .= '<div class="article-container">'."\n";
	$prep .= '<div class="content">'."\n";
	$prep .= 'Please return to '.markup_url('index', erko::$name).'</p>'."\n";
	$prep .= '<p class="spaceTop">You may report this issue to us via ';
	$prep .= '<a href="mailto:'.erko::$mailadmin.'" target="_blank" class="link">'.erko::$mailadmin.'</a></p>'."\n";
	$prep .= '</div>'."\n";
	$prep .= '</div>'."\n";
	$prep .= '</article>'."\n";

	if($notify_as=='all' || $notify_as=='display'){echo $prep;}

	return;
}




// returns unsupported browser notice
function stale_browser($browser=''){
	$prep = '<div class="erko-content">'."\n";
	$prep .= '<h3>Unsupported Browser!</h3>'."\n";
	$prep .= '<p>Opps, we are sorry for this awkwardness<br>'."\n";
	$prep .= 'You appear to be using a ';
	if($browser=='ie'){$prep .= 'very stale version of Internet Explorer ';}
	else {$prep .= 'browser or a very stale version of a browser. ';}	
	$prep .= ' that we currently do not support.<br>'."\n";
	$prep .= 'Please try to upgrade to a more recent version or download a better browser.<br>'."\n";
	$prep .= "Don't know where to start? - ask ".markup_absurl('http://www.google.com', 'Google').'</p>'."\n";
	$prep .= '<p class="spaceTop">You may reach us at ';
	$prep .= '<a href="mailto:'.erko::$mailadmin.'" target="_blank" class="email">'.erko::$mailadmin.'</a></p>'."\n";
	$prep .= '</div>'."\n";
	echo $prep;
	return;
}

function path_to($dir='', $return='relative'){
	$path = '';
	if($dir == 'media'){$path = PATH_MEDIA.PS;}
	if($dir == 'css'){$path = PATH_CSS.PS;}
	if($dir == 'js'){$path = PATH_JS.PS;}
	if($dir == 'icon'){$path = PATH_ICON.PS;}
	if($dir == 'banner'){$path = PATH_BANNER.PS;}

	if($return == 'relative'){
		if(defined('REWRITE_URL') && REWRITE_URL == 'yeah' && erko::return_value('page')!='index'){$path = '../'.$path;} else {$path = './'.$path;}
	} elseif($return == 'domain'){
		$path = erko::site_url().'/'.$path;
	} else {$path = './'.$path;}
	return $path;
}

?>