<?php
/* CYAR™ framework is an evolving library for rapid & efficient development of modem responsive static or dynamic website and applications.
 * Built and maintained at OIAVO™ using PHP, MySQL, HTML, CSS, JS & derived technology. Version 0.0.1 | CYAR™ Web framework © 2016
 * ========================================================================================================================================
 * PHP | utility::vital ~ essential functions
 */

//-------------- Prints message in choice format ---------------
function printMsg($msg, $format='export'){
	if($format == 'dump'){var_dump($msg);}
	elseif($format == 'export'){echo '<tt><pre>'.var_export($msg, TRUE).'</pre></tt>';}
	else {echo $msg;}
	return;
}


//-------------- Performs actual empty check ('0' is not empty) ~ Returns boolean ---------------
function isEmpty($input){
	if(!isset($input)){return TRUE;}
	else {
		if(is_array($input)){
			if(empty($input)){return TRUE;}
		} else {
			$input = trim($input);
			$length = strlen($input);
			if($length < 1){return TRUE;}
		}
	}
	return FALSE;
}



/* ===========================================================================
 *  Begin STRING functions, important to the framework
 * =========================================================================== */

//-------------- Trim edges (space|character|sting) from string ---------------
function trimEdge($string, $trim=''){
 	$string = trim($string);
 	if(!isEmpty($trim)){$string = trim($string, $trim);}
 	return $string;
}

//-------------- Remove space, anywhere found in a string ---------------
function removeSpace($string){
	if(!isEmpty($string)){$string = preg_replace('/\s+/', '', $string);}
 	return $string;
}


//-------------- Returns character in the 'nth' position of a string ---------------
function nthChar($string, $nth){#nth has to be numeric
	$length = strlen($string);
	if($nth <= $length){
		$nth = (int)$nth -1;
		return $string[$nth];
	}
	return FALSE;
}

//-------------- Find the position[s] of character[s] in string (CASE SenSItive) ---------------
function posChar($string, $search, $occurence='all'){
	$offset = 1; $pos = FALSE;
	if($occurence != 'all'){
		if($occurence == 'first'){$pos = strpos($string, $search);}
		if($occurence == 'last'){$pos = strrpos($string, $search);}
		if($pos !== false){$pos = $pos + $offset;}
	} 
	else {
		$pos_first = posChar($string, $search, 'first');
		$pos_last = posChar($string, $search, 'last');
		if($pos_first === $pos_last){$pos = $pos_first;}
		else {
			$pointer = $pos_first; $pos[] = $pointer;
			while ($pointer < $pos_last){
				$pos_next = strpos($string, $search, $pointer);
				$pointer = $pos_next + $offset;
				$pos[] .= $pointer;
			}
		}
	}
	return $pos;
}


//-------------- Check for needle in string - Returns boolean ---------------
function inString($string, $needle){
	if(strpos($string, $needle) !== false){return TRUE;}
	return FALSE;
}


//-------------- Substitute the space in a string with a character|string and vice-versa ---------------
function spaceSwap($string, $value, $inverse='nope'){
	if($inverse == 'sure'){return str_replace($value, ' ', $string);}
	return preg_replace('/\s+/', $value, $string);
}

//-------------- Substitute a character|string in a string with a character|string and vice-versa ---------------
function stringSwap($string, $search, $substitute , $occurence='all'){
	#check if $search is found and return result, else return full string
	$isfound = inString($string, $search);	
	if(!$isfound){return $string;}
	else {
		if($occurence == 'all'){return str_replace($search, $substitute, $string);}
		else {
			if($occurence == 'first'){$pos = strpos($string, $search);}
			if($occurence == 'last'){$pos = strrpos($string, $search);}			
			if($pos !== false){return substr_replace($string, $substitute, $pos, strlen($search));} 
			else {return $string;}
		}
	}
}


//-------------- Return value before character(s) {if found} in string or false ---------------
function stringBefore($string, $search, $strip='sure'){
	$pos = strpos($string, $search);
	if($pos && $pos != 0){$result = substr($string, 0, $pos);}
	if($strip != 'sure'){$result = $result.$search;}
 	if(isset($result)){return $result;}
 	return FALSE;
}

//-------------- Return value after character(s) {if found} in string or false ---------------
function stringAfter($string, $search, $strip='sure'){
	$result = strstr($string, $search);
	if($result){
		if($strip == 'sure'){
			$result = str_replace($search, '', $result);
		}	
	}
 	return $result;
}


//-------------- Return string in 'sentence case' format ---------------
function sentence($string){
 	$string = trim($string);
 	$string = ucfirst($string);
 	return $string;
}

//-------------- Return words in string as 'capitalized' format ---------------
function capitalize($string){
 	$string = trim($string);
 	$string = ucwords($string);
 	return $string;
}

//-------------- Return words as capitalized {if found in library} ---------------
function wordAsCap($string, $library='library'){
 	if($library != 'library' && !is_array($library)){
 		$msg = 'invalid arguments on '.__FUNCTION__.'()';
 		return printMsg($msg);
 	}
 	if($library == 'library'){
 		$library = array(
 			'css', 'html', 'html5', 'js', 'php',
 			'url',
 			'sms', 'faq', 'cms'
 			);
 	}
 	#change array to lower case for matching
 	$library = implode(',', $library);
 	$library = strtolower($library);
 	$library = explode(',', $library);
	
	#remove space from edges
	$string = trim($string);
	$clean = '';
	$words = preg_split('/\s+/', $string);
	foreach ($words as $word){
		$wordCheck = strtolower($word); #change to lower case for array check
		if(inString($wordCheck, '.')){$wordCheck = trimEdge($wordCheck, '.');} #takes care of words ending{.}
		if(in_array($wordCheck, $library)){
			$capWord = strtoupper($word);
			$word = stringSwap($word, $word, $capWord);
		}
		$clean .= $word.' ';
	}	
	return $clean;
}

//-------------- Clean & format a string ---------------
function cleanup($string){
	#remove space from edges
	$string = trim($string);
	
	#remove 'hyphen' if word not in library
	$hyphens = array(
		'e-bank', 'e-banking', 'e-log', 'e-login', 'e-reg', 'e-register', 'e-registration',
		'i-bank', 'i-banking', 'i-log', 'i-login', 'i-reg', 'i-register', 'i-registration'
	);
	$clean = '';
	$string = stringSwap($string, '_', ' '); #change 'underscore' to space
	$words = preg_split('/\s+/', $string);
	foreach ($words as $word){
		$wordCheck = strtolower($word); #change to lower case for array check
		if(inString($wordCheck, '.')){$wordCheck = trimEdge($wordCheck, '.');} #takes care of words ending{.}
		if(!in_array($wordCheck, $hyphens)){
			#run if hyphen exist in word 
			if(inString($word, '-')){
				#check if there's more than one characters before and after '-'
				$prefix = stringBefore($word, '-'); $suffix = stringAfter($word, '-');
				if(strlen($prefix) > 1 && strlen($suffix) > 1 ){
					$word = stringSwap($word, '-', ' '); #change 'hyphen' to space
				}
			}			
		}
		#for words found in array
		else {$word = mb_convert_case($word, MB_CASE_TITLE, "UTF-8");}
		$clean .= $word.' ';
	}
	
	$clean = wordAsCap($clean); #perform wordAsCap function
	return trim($clean);
}



/* ===========================================================================
 *  Begin FILE functions, important to the framework
 * =========================================================================== */

//-------------- Return route name as determined by the URL ---------------
function route($trim='nope'){
	$route = 'index';
	if(isset($_GET['page']) && !empty($_GET['page'])){$route = $_GET['page'];}
	if(inString($route, '/')){$route = stringSwap($route, '/', '_');} #change possible 'support/faq' to 'support_faq'
	
	#find and remove '_' from the end if $trim == 'trim'
	$last = posChar($route, '_', 'last'); 
	$length = strlen($route);
	if($length == $last && $trim == 'trim'){$route = stringSwap($route, '_', '', 'last');}
	
	return strtolower(trim($route));
}


//-------------- Check if file exists ---------------
function fileExist($link=''){
	#toDo ~ make sure its a file
	if(file_exists($link)){return TRUE;}
	else {return FALSE;}
}

//-------------- Return prepared file link from content and type ---------------
function linkFile($type='organizer', $content='', $separator='DS'){
	$path = '';
	if(isEmpty($content)){$content = route('trim');}
	$content = strtolower($content);
	$type = strtolower($type);
	
	if($type == 'code'){$content = 'code.'.$content;}
	if($type == 'layout'){$content = 'layout.'.$content;}
	if($type == 'outline'){$content = 'outline.'.$content;}
	if($type == 'slice'){$content = 'slice.'.$content;}

	if($type == 'api'){$path = DIR_API;}
	if($type == 'model'){$path = DIR_MODEL;}
	if($type == 'organizer'){$path = DIR_ORGANIZER;}
	if($type == 'piece' || $type=='code' || $type == 'layout' || $type == 'outline' || $type == 'slice'){$path = DIR_PIECE;}
	if($type == 'view'){$path = DIR_VIEW;}
	
	if($type == 'object'){$path = OBJ;}
	if($type == 'plugin'){$path = PLUG;}
	if($type == 'utility'){$path = UTIL;}

	return strtolower($path.constant(strtoupper($separator)).$content).'.php';
}

//-------------- Download file to document ---------------
function download($file='', $type='text/plain', $extension='txt'){
	#toDO ~ error check to make sure entries a valid
	if(!isEmpty($file) && fileExist($file)){
		header("Cache-Control: no-cache, must-revalidate"); # HTTP/1.1
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); # date in the past
		header("Content-Type: {$type}"); # type of file to be downloaded		
		header('Content-Disposition: attachment; filename="'.mt_rand().'.'.$extension.'"'); # the save as name with extension
		readfile($file);# the file source
		exit;
	}
}


//-------------- Include file to document ---------------
function includeFile($file='', $persist='sure', $check='strict'){
	#validate
 	if(isEmpty($file)){exit('{file include error}: file for inclusion is required');}
 	
 	#prepare
 	if(!is_file($file) && $check =='strict'){exit('The file "{'.$file.'} does not exist!');}
 	elseif($persist != 'nope'){include_once($file);}
 	else {include($file);}
 	return;
}


//-------------- Load file to document ---------------
// function loadFile($content='', $type='slice'){
// 	$task = getFile($content, $type);
// 	if($task){
// 		if(isFile($task)){include($task);}
// 		else {return notFound($task);}
// 	}
// 	return FALSE;
// }



//-------------- Handle URL redirect ---------------
function redirect($location='', $delay='none', $report = 'on'){
	if(!isEmpty($location)){
		$duration = $delay; if($delay=='none'){$duration = 0;}
		$msg = '<p class="redirect">You are now being redirected to <a href="'.$location.'"><strong>'.$location.'</strong></a></p>';		 
		if (!headers_sent($filename, $linenum)){
			if($duration != 0){
				header("Refresh:".$duration.";URL=".$location);
				return markup::notify($msg, 'notice', 'div');
			}
			#else{header('Location: '.$location); exit;}
		} #else {
		// 	$operation = '<meta http-equiv="refresh" content="'.$duration.'; url='.$location.'">';
		// 	echo $operation; echo "\n"; if($report=='on'){echo $content;}
		// 	if($duration == 0 && $report == 'on'){exit;}
		// }
	}
	else {
		return FALSE;
	}
}



/* ===========================================================================
 *  Begin DOMAIN & URL functions, important to the framework
 * =========================================================================== */

//-------------- Convert URL to domain ---------------
function url2domain($url=''){
 	if(empty($url)){return FALSE;} #perform validation
	$domain = trim($url);
	$domain = stringSwap($domain, 'https://', '', 'first');
	$domain = stringSwap($domain, 'http://', '', 'first');
	$domain = stringSwap($domain, 'www.', '', 'first');
	$domain = stringSwap($domain, '/', '', 'last');

	#remove sub-directory if available
	if(inString($domain, '/')){$domain = stringBefore($domain, '/', 'sure');}	
	return $domain;
}
?>