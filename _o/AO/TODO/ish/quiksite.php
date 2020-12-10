<?php
/* QuikSite™ ~ a micro framework for quick website development © 2016 [alpha]
 * Program -> quiksite.php -
 * ===================================================================================
 */

// separators
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('PS') ? null : define('PS', '/');




// return document information








/** Begin LINK functions **/


// make link
function doLink($input=''){
	#perform validation
	if(isEmpty($input)){return FALSE;}

	#prepare & return result
	$input = stringSwap($input, '_', '-');
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



// return baseurl
function getBaseURL(){
	#collect required data
	global $qs_baseurl;

	#prepare & return result
	if(!empty($qs_baseurl)){$task = $qs_baseurl;}
	else {$task = $_SERVER['HTTP_HOST'];}
	return strtolower($task);
}

// return domain name
function getDomain(){
	#prepare & return result
	if(!empty($qs_domain)){$task = $qs_domain;}
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



// return site url
function getSiteURL(){
	#collect required data
	global $qs_basepath;

	#prepare & return result
	$task = getDomainURL();
	if(!empty($qs_basepath)){$task .= PS.$qs_basepath;}
	return $task;
}




/** Begin CORE HELPER functions **/

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
	#$task = 'source'.constant(strtoupper($separator)).$task['type'].constant(strtoupper($separator)).$task['content'].'.php';
	$task = 'brux'.constant(strtoupper($separator)).$task['content'].'.php';
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
	global $qs_name;
	global $qs_slogan;

	#prepare & return result
	$task = '';
	if($page != 'index'){
		$task .= ucwords(cleanUp($page));
		$task .= ' | '.$qs_name;
	}
	else {
		$task .= $qs_name;
	}

	if($page == 'index' || $page == 'home'){$task .= ' - '.$qs_slogan;}

	return $task;
}

// return page heading
function showHeading(){
	#collect required data
	$page = getPage();
	global $qs_name;
	global $qs_slogan;

	#prepare & return result
	$task = '';
	if($page != 'index'){$task .= ucwords(cleanUp($page)).' :: ';}
	$task .= $qs_name;
	$task .= ' - '.$qs_slogan;
	return $task;
}

// return page breadcrumb
function showBreadcrumb(){
	#collect required data
	$page = getPage();
	global $qs_name;
	global $qs_brand;

	#prepare & return result
	$task = '<a href="'.getSiteURL().'" title="'.$qs_name.'" class="brand">'.$qs_brand.'</a>';
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
	global $qs_name;
	global $qs_slogan;
	global $qs_acronym;
	global $qs_brand;

	#prepare
	if(empty($from) || $from =='none'){$from = '';} #TO DO (make sure entry is valid date)
	if(empty($to) || $to =='now'){$to = date("Y");}

	$copy ='&copy;';
	$task['link'] ='';

	$task['link'] ='<a href="'.getSiteURL().'" class="brand"';
	$task['link'] .=' title="'.$qs_name;
	if(!empty($qs_slogan)){$task['link'] .=' - '.$qs_slogan;}
	$task['link'] .='">';


	$Brand ='';
	$device = Device::is();
	if($device=='phone'){
		$Brand .=$task['link'];
		if(!empty($qs_acronym)){$Brand .=$qs_acronym;}
	}
	elseif($device=='tablet'){$Brand .=$task['link'].$qs_brand;}
	else{$Brand .=$task['link'].$qs_name;}

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