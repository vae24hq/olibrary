<?php
/* erko3™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by SlimEdge™ [@officialSEID - www.seid.com.ng] using PHP, HTML, CSS, JS & derived technology.
 * © July 2016 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | helper::source ~ helper functions
 */

/**
 * ===========================================================================
 *  Begin CORE functions, independent but important to erko3 framework
 * ===========================================================================
 */

//Prints message in choice format
function printMsg($msg, $format='export'){
	if($format == 'dump'){var_dump($msg);}
	elseif($format == 'export'){echo '<tt><pre>'.var_export($msg, TRUE).'</pre></tt>';}
	else {echo $msg;}
	return;
}


//Performs actual empty check ('0' is not empty) - Returns boolean
function isEmpty($input){
	if(!isset($input)){return TRUE;}
	else {
		if(is_array($input)){
			if(empty($input)){return TRUE;}
		} else {
			$input = trim($input);
			$length = strlen($input);
			if($length<1){return TRUE;}
		}
	}

	return FALSE;
}





/**
 * ===========================================================================
 *  Begin STRING functions, dependent and important to ekro3 framework
 * ===========================================================================
 */

//Trim edges (space|character|sting) from string
function trimEdge($string, $character=''){
 	$string = trim($string);
 	if(!isEmpty($character)){$string = trim($string, $character);}
 	
 	return $string;
}


//Remove space, anywhere found in a string
function removeSpace($string){
	if(!isEmpty($string)){$string = preg_replace('/\s+/', '', $string);}

 	return $string;
}


//Returns character in the 'nth' position of a string
function nthChar($string, $nth){#nth is position ie value has to be numeric
	$length = strlen($string);
	if($nth<=$length){
		$nth = (int)$nth -1;
		return $string[$nth];
	}
	
	return FALSE;
}


//Find the position[s] of character[s] in string (CASE SenSItive)
function posChar($string, $search, $occurence='all'){
	#prepare default
	$offset = 1; $pos = FALSE;
	
	#prepare task
	if($occurence != 'all'){
		if($occurence=='first'){$pos = strpos($string, $search);}
		if($occurence=='last'){$pos = strrpos($string, $search);}

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


//Check for needle in string - Returns boolean
function inString($string, $needle){
	if(strpos($string, $needle) !== false){return TRUE;}
	return FALSE;
}


//Substitute the space in a string with a character|string and vice-versa
function spaceSwap($string, $value, $inverse='nope'){
 	if($inverse=='sure'){
 		return str_replace($value, ' ', $string);
 	}
 	
 	return preg_replace('/\s+/', $value, $string);
}


//Substitute a character|string in a string with a character|string and vice-versa
function stringSwap($string, $search, $substitute , $occurence='all'){
	#check if $search is found and return result, else return full string
	$isfound = inString($string, $search);	
	if(!$isfound){return $string;}
	else {
		if($occurence=='all'){return str_replace($search, $substitute, $string);}
		else {
			if($occurence=='first'){$pos = strpos($string, $search);}
			if($occurence=='last'){$pos = strrpos($string, $search);}
			
			if($pos !== false){
				return substr_replace($string, $substitute, $pos, strlen($search));
			} 
			else {return $string;}
		}
	}
}


//Return value before character(s) {if found} in string or false
function stringBefore($string, $search, $strip='sure'){
	$pos = strpos($string, $search);
	if($pos && $pos != 0){$result = substr($string, 0, $pos);}
	if($strip != 'sure'){$result = $result.$search;}

 	if(isset($result)){return $result;}
 	return FALSE;
}


//Return value after character(s) {if found} in string or false
function stringAfter($string, $search, $strip='sure'){
	$result = strstr($string, $search);
	if($result){
		if($strip =='sure'){
			$result = str_replace($search, '', $result);
		}	
	}
 	
 	return $result;
}





/**
 * ===========================================================================
 *  Begin WORDS cleaning & formating functions - dependent and important
 * ===========================================================================
 */

//Return words as capitalized {if found in library}
function wordAsCap($string, $library='library'){
 	if($library != 'library' && !is_array($library)){
 		$msg = 'invalid arguments on '.__FUNCTION__.'()';
 		return printMsg($msg);
 	}

 	if($library == 'library'){
 		$library = array(
 			'css', 'html', 'js', 'php',
 			'url',
 			'sms', 'faq', 'cms'
 			);
 	}
 	#change array to lower case for macthing
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


//Return string in 'sentence case' format
function sentence($string){
 	$string = trim($string);
 	$string = ucfirst($string);
 	
 	return $string;
}

//Return words in string as 'capitalized' format
function capitalize($string){
 	$string = trim($string);
 	$string = ucwords($string);
 	
 	return $string;
}


//Clean & format a string
function cleanup($string){
	#remove space from edges
	$string = trim($string);
	
	#remove 'hyphen' if word not in library
	$hyphens = array(
		'e-bank', 'e-banking', 'e-log', 'e-login', 'e-reg', 'e-register', 'e-registration',
		'i-bank', 'i-banking', 'i-log', 'i-login', 'i-reg', 'i-register', 'i-registration'
	);
	$clean = '';
	$words = preg_split('/\s+/', $string);
	foreach ($words as $word){
		$wordCheck = strtolower($word); #change to lower case for array check
		if(inString($wordCheck, '.')){$wordCheck = trimEdge($wordCheck, '.');} #takes care of words ending{.}
		if(!in_array($wordCheck, $hyphens)){
			#change 'hyphen' to space
			$word = stringSwap($word, '-', ' ');
		}
		$clean .= $word.' ';
	}

	#change 'underscore' to hyphen
	$clean = stringSwap($clean, '_', ' ');

	#perform wordAsCap function
	$clean = wordAsCap($clean);

	return trim($clean);
}

//Return domain from a URL
function url2domain($url){
	$domain = trim($url);
	$domain = stringSwap($domain, 'https://', '', 'first');
	$domain = stringSwap($domain, 'http://', '', 'first');
	$domain = stringSwap($domain, 'www.', '', 'first');
	$domain = stringSwap($domain, '/', '', 'last');

	#remove sub-directory if avaliable
	if(inString($domain, '/')){
		$domain = stringBefore($domain, '/', 'sure');
	}
	
	return $domain;
}





/**
 * ===========================================================================
 *  Begin BROWSER functions - dependent and important to erko3 framework
 * ===========================================================================
 */

//Return browser agent string
function browserAgent(){
	return strtolower($_SERVER['HTTP_USER_AGENT']);
}


//Handles IE browser
function IE($operator=false, $version=NULL){
    if(!preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $matches)
     || preg_match('#Opera#', $_SERVER['HTTP_USER_AGENT'])){
    	return false === $operator ? false : NULL;
    }

    if(false !== $operator
        && in_array($operator, array('<', '>', '<=', '>=', '==', '!='))
        && in_array((int)$version, array(5,6,7,8,9,10))){
        return eval('return ('.$matches[1].$operator.$version.');');
    }
    else {return (int)$matches[1];}
}


//Validate IE browser and version
function isIE($operator='', $version=''){
	if(!isEmpty($operator) && !isEmpty($version)){
		$ie = IE($operator, $version);
	} else {$ie = IE();}

  if(!$ie){return FALSE;}

  return TRUE;
}


//Return IE version
function ieVer(){
	if(isIE()){return IE();}

	return FALSE;
}


//Validate opera mobile browser
function isOperamobi(){
	if(inString(browserAgent(), 'opera mobi')){return TRUE;}

	return FALSE;
}


//Validate opera mini browser
function isOperamini(){
	if(inString(browserAgent(), 'opera mini')){return TRUE;}

	return FALSE;
}


//Return browser information
function getBrowser($return='name'){
	
	if(isIE()){$info = 'ie';}
	elseif(isOperamobi()){$info = 'operamobi';}
	elseif(isOperamini()){$info = 'operamini';}
	else {$info = browserAgent();}

	return strtolower($info);
}





/**
 * ===========================================================================
 *  Begin UTILITY functions, dependent and important to erko3 framework
 * ===========================================================================
 */

//Return file information of existing file {file.ext | ./file.etx | dir/file.ext | ./dir/file.ext}
function fileInfo($request='name', $file='self'){
	#error check
	$data = array('name', 'file', 'extension', 'directory', 'all');
	if(isEmpty($request) || isEmpty($file) || (!in_array($request, $data))){
		$msg = 'Invalid Arguments on '.__FUNCTION__.'()';
 		return printMsg($msg);
	}

	#prepare file
	if($file == 'self'){
		$file = $_SERVER['PHP_SELF'];
		if(inString($file, '/')){$file = stringSwap($file, '/', '');}
	}
	
	#make sure file exist and return result
	if(is_file($file)){
		$fileInfo  = pathinfo($file);

		if($request == 'name'){return $fileInfo['filename'];}
		elseif($request == 'file'){return $fileInfo['basename'];}	
		elseif($request == 'extension'){return $fileInfo['extension'];}
		elseif($request == 'directory'){return $fileInfo['dirname'];}
		else {return $fileInfo;}
	}
	
	return FALSE;	
}


//Return size in readable format and actual size (Terabyte below)
function formatSize($size='', $sizing='general'){
	#validate
	if(isEmpty($size)){return FALSE;}

	#prepare task
	
	if($sizing == 'actual'){
		if($size >= 1099511627776){$format = number_format($size / 1099511627776 , 2) . ' TB';}
		elseif($size >= 1073741824){$format = number_format($size / 1073741824 , 2) . ' GB';}
		elseif($size >= 1048576){$format = number_format($size / 1048576 , 2) . ' MB';}
		elseif($size >= 1024){$format = number_format($size / 1024 , 2) . ' KB';}
		elseif($size > 1 && $size < 1024){$format = $size . ' Bytes';}
	}
	else {
		if($size >= 1000000000000){$format = number_format($size / 1000000000000 , 2) . ' TB';}
		elseif($size >= 1000000000){$format = number_format($size / 1000000000 , 2) . ' GB';}
		elseif($size >= 1000000){$format = number_format($size / 1000000 , 2) . ' MB';}
		elseif($size >= 1000){$format = number_format($size / 1000 , 2) . ' KB';}
		elseif($size > 1 && $size < 1000){$format = $size . ' Bytes';}		
	}

	if($size == 1){$format = $size . ' Byte';}
	elseif($size < 1){$format = '0';}

 	if(inString($format, '.00')){$format = stringSwap($format, '.00', '');}
 	return $format;
}


//Return encrypted or decrypted data
function doCrypt($data='', $pattern='flex'){
	if(!isEmpty($data)){
		if ($pattern == 'crypt'){
			$data = hash("md5", $data);
			$data = sha1($data);
			$data = md5($data);
		}
		elseif($pattern == 'strict'){$data = md5($data);}
		elseif ($pattern == 'reverse'){$data = base64_decode($data);}
		else {$data = base64_encode($data);}
	}
	else {return FALSE;}

	return $data;
}


//Adds file to document
function addFile($file='', $persist='sure', $check='strict'){
	#validate
 	if(isEmpty($file)){exit('{file include error}: file for inclusion is required');}
 	
 	#prepare
 	if(!is_file($file) && $check =='strict'){exit('The file "{'.$file.'} does not exist!');}
 	elseif($persist != 'no'){include_once($file);}
 	else {include($file);}
}


//Return defined path to a directory
function pathTo($dir='', $format='relative'){#[relative|absolute]
	#prepare
	$path = '';
	if($dir == 'asset'){$path = PATH_ASSET.PS;}	
	if($dir == 'icon'){$path = PATH_ASSET.PS;}
	if($dir == 'styles'){$path = PATH_ASSET.PS;}
	if($dir == 'javascript'){$path = PATH_ASSET.PS;}
	if($dir == 'slide'){$path = PATH_SLIDE.PS;}
	if($dir == 'upload'){$path = PATH_UPLOAD.PS;}

	if($format == 'absolute' && !isEmpty(erko3::site())){
		$path = erko3::site().'/'.$path;
	}
	elseif($format == 'relative'){
		if(REWRITE_URL == 'sure' && erko3::page() != 'index'){
			if(inString(erko3::page('nope'), '_')){
				#check how many '_' you have in page {'_' indicates '/' in url}
				$pos = posChar(erko3::page('nope'), '_', 'all');
				$count = count($pos);
				$slash = '';
				if($count < 2){$slash .= '../';} #ie 1
				else {
					for($i = 1; $i <= $count; $i++) {
						$slash .= '../';
					}
				}
				$path = $slash.$path;
			}
			else {
				$path = './'.$path;
			}
		}
	}
	
	return $path;
}


/**
 * ---------------------------------------------------------------------------
 *  Begin LINK functions
 * ---------------------------------------------------------------------------
 */

//Returns valid link for switching rendition (desktop, tablet and phone)
function render($device='desktop'){
	if(is_empty($device)){$device = 'desktop';}

	#prepare
	$link = self_link();
	if(in_string($link, '?')){$link .='&';} else {$link .='?';}
	$link .= 'v='.$device;

	$chore = '<a href="'.$link.'" title="switch to '.$device.'" class="renderlink">'.$device.'</a>';
	
	#return result
	return $chore;
}





/**
 * ---------------------------------------------------------------------------
 *  Begin HTML related functions
 * ---------------------------------------------------------------------------
 */

//Displays HTML notification
function notify($msg='', $class='notice', $wrap='span'){
	if(!isEmpty($msg)){
		$notify = $msg;
		if(!isEmpty($wrap)){
 			$wrap = strtolower($wrap);
			$prep_wrap = '<'.$wrap;
			if(!isEmpty($class)){
 				$class = strtolower($class);
				$prep_class = ' class="'.$class.'"';

				$prep_wrap .= $prep_class;
			}
			$prep_wrap .= '>'.$msg.'</'.$wrap.'>';

			$notify = $prep_wrap;
		}

		echo $notify; return;
	}

	return FALSE;
}


//Returns unsupported browser notice
function staleBrowser($browser=''){
	$stale = '<div class="content">'."\n";
	$stale .= '<h3>Unsupported Browser!</h3>'."\n";
	$stale .= '<p>Opps, we are sorry for this awkwardness<br>'."\n";
	$stale .= 'You appear to be using a ';
	if($browser == 'ie'){$stale .= 'very stale version of Internet Explorer ';}
	else {$stale .= 'browser or a very stale version of a browser. ';}	
	$stale .= ' that we currently do not support.<br>'."\n";
	$stale .= 'Please try to upgrade to a more recent version or download a better browser.<br>'."\n";
	$stale .= "Don't know where to start? - ask ".makeLinkAbsolute('http://www.google.com', 'Google.com').'</p>'."\n";
	$stale .= '<p class="spaceTop">You may reach us at ';
	$stale .= '<a href="mailto:'.erko3::$webmaster.'" target="_blank" class="email">'.erko3::$webmaster.'</a></p>'."\n";
	$stale .= '</div>'."\n";
	
	echo $prep;	return;
}

//Returns error 404 notice | TODO - upgrade
function notFound($data='', $return='display'){ #display | email | sms | log | all
	$chore = '<article id="article">'."\n";
	$chore .= '<h3 class="heading">'.ucwords($data).' - Not Found!</h3>'."\n";
	$chore .= '<div class="article-container">'."\n";
	$chore .= '<div class="content">'."\n";
	$chore .= '<p>We are sorry for this awkwardness as the requested document is not available.<br>
				Please return to '.makeLink('index', erko3::$name).'</p>'."\n";
	$chore .= '<p class="spaceTop">You may report this issue to us via ';
	$chore .= '<a href="mailto:'.erko3::$webmaster.'" target="_blank" class="paralink">'.erko3::$webmaster.'</a></p>'."\n";
	$chore .= '</div>'."\n";
	$chore .= '</div>'."\n";
	$chore .= '</article>'."\n";

	if($return == 'all' || $return == 'display'){echo $chore;}

	return;
}


//Handles redirect
function redirect($location='', $delay='none', $report = 'on'){
	if(!isEmpty($location)){
		$duration = $delay; if($delay == 'none'){$duration = 0;}
		if (!headers_sent($filename, $linenum)){
			if($duration != 0){header("Refresh:".$duration.";URL=".$location);}
			else{header('Location: '.$location); exit;}
		} else {
			$operation = '<meta http-equiv="refresh" content="'.$duration.'; url='.$location.'">';
			$content ='<p class="redirect">You are now being redirected. <br>Please wait or <a href="'.$location.'">click here</a>.</p>';
			echo $operation; echo "\n"; if($report == 'on'){echo $content;}
			if($duration == 0 && $report == 'on'){exit;}
		}
		return;
	}

	return FALSE;
}



?>