<?php
/* Brax™ ~ a micro framework for quick website development © 2016 [alpha]
 * Program -> brax.php -
 * ===================================================================================
 */

// separators
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('PS') ? null : define('PS', '/');


function site($record=''){
	global $config;
	if(!empty($record) && isset($config[$record])){return $config[$record];}
	return false;
}

/** Begin UTILITY functions **/

// performs empty check on a variable
function isEmpty($data=''){
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
function isFile($content=''){
	if(file_exists($content)){return TRUE;}
	else {return FALSE;}
}

// notify 404 error
function notFound($document=''){
	if(!empty($document)){$task = '<p class="paragraph"><i>The requested document <b>"'.$document.'"</b> is unavaliable</i></p>'."\n";}
	else {return false;}
	echo $task;
}

// return document information
function docInfo($task='name', $document='self'){
	#prepare & return result
	if($document == 'self'){$page = $_SERVER['PHP_SELF'];}
	$path = pathinfo($page);
	$ext = '.'.$path['extension'];

	$result = basename($page, $ext);
	if($task == 'filename'){$result = $result.$ext;}
	elseif($task=='file'){$result = $page;}
	elseif($task=='name'){$result = $result;}
	elseif($task=='ext'){$result = $ext;}
	return $result;
}




/** Begin STRING functions **/

// check for needle in string
function inString($string='', $needle=''){
	if(isEmpty($string) || isEmpty($needle)){return FALSE;}
	if(strpos($string, $needle) !== false){return TRUE;}
	return FALSE;
}

// find and replace string
function stringSwap($subject='', $search='', $replace='', $occurence='all'){
	#check if $search is found, else return full string
	$isfound = strstr($subject, $search);
	if(!$isfound){$task = $subject;}
	else {
		if($occurence=='all'){$task = str_replace($search, $replace, $subject);}
		else {
			if($occurence=='first'){$pos = strpos($subject, $search);}
			if($occurence=='last'){$pos = strrpos($subject, $search);}
			if($pos !== false){$task = substr_replace($subject, $replace, $pos, strlen($search));}
			else {$task = $subject;}
		}
	}

 	#return task
	return $task;
}

// trim edges or character(s) from string
function trimEdge($string='', $character=''){
 	#perform validation
	if(isEmpty($string) || is_null($character)){return false;}

 	#prepare & return result
	$task = trim($string);
	$task = preg_replace('/\s+/', '', $task);
	if(!isEmpty($character)){$task = trim($task, $character);}
	return $task;
}

// return words capitalized
function capitalizeWords($string='', $words='library'){
	if(isEmpty($string) || isEmpty($words) || ($words!='library' && !is_array($words))){return false;}
	if($words=='library'){
		$words = array(
			'sms', 'faq', 'cms',
			'Sms', 'Faq', 'Cms'
		);
	}
	$stringBit = preg_split('/\s+/', $string);
	foreach ($stringBit as $bit){
		if(in_array($bit, $words)){
			$capBit = strtoupper($bit);
			$string = str_replace($bit, $capBit, $string);
		}
	}

	#return task
	return $string;
}

// returns cleaned up string
function cleanUp($string=''){
	if(isEmpty($string)){return FALSE;}
	$string = trim($string);
	$string = stringSwap($string, ' and', ' &');
	$string = stringSwap($string, '-', ' ');

	#return task
	return $string;
}

function rewriteRH($string=''){
	if(isEmpty($string)){return FALSE;}
	$string = trim($string);
	$string = stringSwap($string, ' bank', '_bank');
	$string = stringSwap($string, ' Bank', '_Bank');
	$string = stringSwap($string, ' banking', '_banking');
	$string = stringSwap($string, ' Banking', '_Banking');

	$string = stringSwap($string, 'bank ', 'bank_');
	$string = stringSwap($string, 'Bank ', 'Bank_');
	$string = stringSwap($string, 'banking ', 'banking_');
	$string = stringSwap($string, 'Banking ', 'Banking_');

	$string = stringSwap($string, '_bank_', ' bank_');
	$string = stringSwap($string, '_Bank_', ' Bank_');
	$string = stringSwap($string, '_banking_', ' banking_');
	$string = stringSwap($string, '_Banking_', ' Banking_');

	$string = stringSwap($string, ' boa', ' _BOA');
	$string = stringSwap($string, 'boa ', ' BOA_');
	$string = stringSwap($string, ' BOA', ' _BOA');
	$string = stringSwap($string, 'BOA ', ' BOA_');

	$string = stringSwap($string, 'Swift Code', 'Swift_Code');

	#return task
	return $string;
}


/** Begin LINK functions **/

// returns referrer URL
function refererURL(){
	#prepare & return
	if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){return $_SERVER['HTTP_REFERER'];}
	else {return FALSE;}
}

// make link
function doLink($input=''){
	#perform validation
	if(isEmpty($input)){return FALSE;}

	#prepare & return result
	$input = stringSwap($input, '_', '-');
	$task = '';
	if(defined('URL_REWRITE') && constant('URL_REWRITE') == 'yeah'){}
		$task = '?page='.trim(strtolower($input));
	return $task;
}

// returns link information
function grabLink(){
	#prepare & return result
	$task = 'index';
	if(isset($_GET['page']) && !empty($_GET['page'])){$task = $_GET['page'];}

	$task = trimEdge($task);
	$task = stringSwap($task, '\\', '');
	$task = stringSwap($task, PS, '');
	$task = stringSwap($task, '~', '');
	$task = urldecode($task);
	return $task;
}

// return current page link
function selfLink(){
	#prepare & return result
	return grabLink();
}

// check for active link
function isLinkActive($uri='index'){
	$uri = stringSwap($uri, '&', 'and', 'all');
	$task = grabLink();
	if($uri == $task){return TRUE;}
	return FALSE;
}

function isActivePage($page=''){
	$activePage = $_SERVER['PHP_SELF'];
	$activePage = basename($activePage);
	if($page == $activePage){return TRUE;}
	return FALSE;
}

function cssActive($page=''){
	$output = '';
	if(isActivePage($page)){$output .= ' class="active"';}
	return $output;
}


// markup url
function markupLink($link='', $name='', $tag='', $target='self', $style='link', $activate='', $link_as='relative'){
	#perform validation
	if(isEmpty($link)){return FALSE;}

	# ~link
	$link = strtolower($link);
	$prepLink = '';
	if($link_as =='absolute'){$prepLink .= $link;}
	elseif($link!='index'){
		$prepLink .= doLink($link);
	}
	else {$prepLink .= getSiteURL();}

	# ~name
	if(isEmpty($name)){$name = stringSwap($link, '_', ' ');}
	$prepName = capitalizeWords($name, 'library'); //make words if found in library, uppercase

	# ~tag
	if(empty($tag)){$tag = $prepName;}
	else {$tag = capitalizeWords($tag, 'library');}
	$prepTag = ucfirst($tag);

	# ~style
	$prepStyle = '';
	$linkIsActive = isLinkActive($link);
	$stayActive = 'no';

	if(is_array($activate)){
		if(in_array(grabLink(), $activate)){$stayActive = 'yeah';}
	} else {
		if(grabLink()==$activate){$stayActive = 'yeah';}
	}

	if(!empty($style) || $linkIsActive || $stayActive == 'yeah'){
		$prepStyle .= ' class="';
		if(!empty($style)){$prepStyle .= $style;}
		if(!empty($style) && $linkIsActive || $stayActive == 'yeah'){$prepStyle .= ' ';}
		if($linkIsActive || $stayActive == 'yeah'){$prepStyle .= 'active';}
		$prepStyle .= '"';
	}

	# ~target
	$prepTarget = '';
	if(!empty($target) && $target !='self'){$prepTarget = ' target="'.$target.'"';}
	$task ='<a href="'.$prepLink.'" title="'.$prepTag.'"'.$prepStyle.$prepTarget.'>'.$prepName.'</a>';
	return $task;
}



/** Begin FORM functions **/
function retainInput($field='', $method='post'){
	$value = '';
	if(!isEmpty($field)){
		if($method == 'post'){if(isset($_POST[$field])){$value = $_POST[$field];}}
		if($method == 'get'){if(isset($_GET[$field])){$value = $_GET[$field];}}
		if($method == 'request'){if(isset($_REQUEST[$field])){$value = $_REQUEST[$field];}}
	}
	return $value;
}

function retainSelect($value='', $field='', $method='post'){
	$input = retainInput($field);
	if(is_array($input) && in_array($value, $input)){return TRUE;}
	return FALSE;
}



/** Begin DIRECTORY functions **/

// return remote directory
function getRD(){
	#collect required data
	global $qs_basepath;

	#prepare & return result
	$task = stringSwap($_SERVER['DOCUMENT_ROOT'], DS, '', 'last');
	if(!empty($qs_basepath)){$task .= DS.$qs_basepath;}
	return strtolower($task);
}




/** Begin DOMAIN & URL functions **/

// convert url to domain
function url2domain($url=''){
	#perform validation
	if(empty($url)){return FALSE;}

	#prepare & return result
	$task = $url;
	$task = stringSwap($task, 'https://', '', 'first');
	$task = stringSwap($task, 'http://', '', 'first');
	$task = stringSwap($task, 'www.', '', 'first');
	$task = stringSwap($task, '/', '', 'last');
	return $task;
}

// return baseurl
function getBaseURL (){
	#collect required data
	$baseurl = site('baseurl');

	#prepare & return result
	if(!empty($baseurl)){$task = $baseurl;}
	else {$task = $_SERVER['HTTP_HOST'];}
	return strtolower($task);
}

// return domain name
function getDomain(){
	#prepare & return result
	$domain = site('domain');

	if(!empty($domain)){$task = $domain;}
	else {
		$task = url2domain(getBaseURL());
		return strtolower($task);
	}
}

// return domain name with protocol
function getDomainURL(){
	#collect required data
	$task = getDomain();

	#prepare & return result
	$protocol ='';
	if(inString(getBaseURL(), 'https')){$protocol .='https://';}
elseif(inString(getBaseURL(), 'http')){$protocol .='http://';}
else {
	if(isset($_SERVER['HTTPS'])){$protocol .='https://';} else {$protocol .='http://';}
}

if(inString(getBaseURL(), 'www.')){$protocol .='www.';}

	#return result
return strtolower($protocol.$task);
}

// return domain name with protocol
function getDomainBase($subdomain=''){
	#collect required data
	$domain = getDomain();

	#prepare
	if(!empty($subdomain)){$domainbase = stringSwap($domain, $subdomain.'.', '', 'first');}
	else {
		$domainbase = stringSwap($domain, 'en.', '', 'first');
		$domainbase = stringSwap($domainbase, 'us.', '', 'first');
		$domainbase = stringSwap($domainbase, 'uk.', '', 'first');
		$domainbase = stringSwap($domainbase, 'ib.', '', 'first');
	}

	#return result
	return strtolower($domainbase);
}

// return site url
function getSiteURL(){
	#collect required data
	$basepath = site('basepath');

	#prepare & return result
	$task = getDomainURL();
	if(!empty($basepath)){$task .= PS.$basepath;}
	return $task;
}




/** Begin CORE HELPER functions **/

// set page language
function lang(){
	if(!isset($_SESSION['lang']) || empty($_SESSION['lang'])){$_SESSION['lang'] = 'en';}
	if(!empty($_GET['lang'])){$_SESSION['lang'] = $_GET['lang'];}
	if(!empty($_SESSION['lang'])){$lang = $_SESSION['lang'];}
	else {$lang = 'en';}
	return $lang;
}

// get page name from url
function getPage(){
	if(isset($_GET['page']) && !empty($_GET['page'])){$task = $_GET['page'];}
	else {$task = 'index';}
	return strtolower($task);
}

// get content type filename and location
function getFile($content='', $type='page', $separator='DS'){
	#collect required data
	if(empty($content)){$task['content'] = getPage();}
	else {$task['content'] = strtolower($content);}

	if(!empty($type)){$task['type'] = strtolower($type);}
	else {$task['type'] = 'page';}

	#prepare & return result
	$task = 'brax'.constant(strtoupper($separator)).$task['type'].constant(strtoupper($separator)).$task['content'].'.php';
	return strtolower($task);
}

// load file content
function loadFile($content='', $type='slice'){
	$task = getFile($content, $type);
	if($task){
		if(isFile($task)){include($task);}
		else {return notFound($task);}
	}
	return FALSE;
}




/** Begin DEVELOPER's HELPER functions **/

// return page title
function showTitle(){
	#collect required data
	$page = getPage();

	#prepare & return result
	$task = '';
	if($page != 'index'){
		$task .= ucwords(cleanUp($page));
		$task .= ' - '.site('brand');
	}
	else {
		$task .= site('name');
	}

	if($page == 'index' || $page == 'home'){$task .= ' - '.site('slogan');}

	return $task;
}

// return page heading
function showHeading(){
	#collect required data
	$page = getPage();

	#prepare & return result
	$task = '';
	if($page != 'index'){$task .= ucwords(cleanUp($page)).' :: ';}
	$task .= site('short');
	$task .= ' - '.site('slogan');
	return $task;
}

// return page breadcrumb
function showBreadcrumb(){
	#collect required data
	$page = getPage();


	#prepare & return result
	$task = '<a href="'.getSiteURL().'" title="'.site('name').'" class="brand">'.site('brand').'</a>';
	if($page != 'index'){$task .= ' » <span class="location">'.ucwords(cleanUp($page)).'</span>';}
	return $task;
}

// return responsive date
function showDate(){
	#prepare & return result
	$device = Device::is();
	$task = 'l, F d, Y';
	if($device=='tablet'){$task = 'F d, Y';}
	if($device=='phone'){$task = 'd/m/Y';}
	return date($task);
}

// return greetings
function showGreeting($remark='nope'){
	#prepare
	$hour = date("H");
	if($hour<12){$task = 'Good Morning!';}
	elseif($hour<17){$task = 'Good Afternoon!';}
	else {$task = 'Good Evening!';}

	if($remark=='yeah'){
		$add_remark = '';
		if($hour>2 && $hour<7){$add_remark = "You're up early";}
		elseif($hour>21 || $hour<3){$add_remark = "You're up late";}
		if(!empty($add_remark)){$task = $add_remark.' - <em>'.$task.'</em>';}
	}

	#return result
	return $task;
}

// return copyright
function showCopyright($from='none', $reserved='nope', $to='now'){
	#collect required data

	#prepare
	if(empty($from) || $from =='none'){$from = '';} #TO DO (make sure entry is valid date)
	if(empty($to) || $to =='now'){$to = date("Y");}

	$copy ='&copy;';
	$task['link'] ='';

	$task['link'] ='<a href="'.getSiteURL().'" class="brand"';
	$task['link'] .=' title="'.site('name');
	$slogan = site('slogan');
	if(!empty($slogan)){$task['link'] .=' - '.site('slogan');}
	$task['link'] .='">';


	$Brand ='';
	$device = Device::is();
	if($device=='phone'){
		$Brand .=$task['link'];
		$acronym = site('acronym');
		if(!empty($acronym)){$Brand .= site('acronym');}
	}
	elseif($device=='tablet'){$Brand .=$task['link'].site('brand');}
	else{$Brand .=$task['link'].site('name');}

	$Brand .='</a>';

	if(empty($from)){$task = $copy.' <small>'.$to.'</small> '.$Brand;}
	else {$task = $copy.' '.$Brand.' <small>'.$from.' - '.$to.'</small>';}
	if(!empty($reserved) && $reserved !='nope'){$task .= '&nbsp; All rights reserved';}

	#return result
	return $task;
}

// markup a link
function makeLink($style, $link, $name='', $tag='', $target='self'){
	return markupLink($link, $name, $tag, $target, $style);
}

// markup group link
function makeLinkGroup($activate, $style, $link, $name='', $tag='', $target='self'){
	return markupLink($link, $name, $tag, $target, $style, $activate);
}

// markup absolute url
function makeLinkAbsolute($style, $link, $name='', $tag='',  $target='_blank', $link_as='absolute'){
	return markupLink($link, $name, $tag, $target, $style, $activate, $link_as);
}


?>