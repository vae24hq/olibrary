<?php
/* erko™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by DeronEllse™ [@deronellse - www.deronellse.com/about] using PHP, MySQL, HTML, CSS, JS & derived technology.
 * © February 2016 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | link::core ~ link operations
 */

//Make link
function do_link($input='', $type='page'){
	$types = array('api', 'link', 'page', 'download', 'redirect'); $rewrite = 'no';
 	if(is_empty($input) || is_empty($type) || !in_array($type, $types)){return FALSE;}
	if(defined('REWRITE_URL') && REWRITE_URL){$rewrite = REWRITE_URL;}
	$type = strtolower($type);
	$input = strtolower($input);

	$chore = path_to();
	if($rewrite=='no'){$chore .= '?'.$type.'='.trim($input);}
	else {$chore .= $type.'/'.trim($input);}
 	
 	#return result
 	return $chore;
}

//Returns link information
function grab_link($yield='uri'){
	$yields = array('uri', 'type', 'both');
	if(is_empty($yield) || !in_array($yield, $yields)){return FALSE;}
	# ~check & set
	$type = 'default'; $uri = 'default';
	if(isset($_GET['api'])){$type = 'api'; if(!empty($_GET['api'])){$uri = $_GET['api'];}}
	elseif(isset($_GET['link'])){$type = 'link'; if(!empty($_GET['link'])){$uri = $_GET['link'];}}
	elseif(isset($_GET['page'])){$type = 'page'; if(!empty($_GET['page'])){$uri = $_GET['page'];}}
	elseif(isset($_GET['download'])){$type = 'download'; if(!empty($_GET['download'])){$uri = $_GET['download'];}}
	elseif(isset($_GET['redirect'])){$type = 'redirect'; if(!empty($_GET['redirect'])){$uri = $_GET['redirect'];}}
	# ~clean up
	$uri = trim_edge($uri);
	$uri = string_swap($uri, '\\', '');
	$uri = string_swap($uri, PS, '');
	$uri = string_swap($uri, '~', '');
	$uri = urldecode($uri);
	if(is_empty($type)){$type = 'default';}
	if(is_empty($uri)){$uri = 'default';}
	if($yield=='uri'){$chore = strtolower($uri);}
	if($yield=='type'){$chore = strtolower($type);}
	if($yield=='both'){
		$chore['uri'] = strtolower($uri);
		$chore['type'] = strtolower($type);
	}
	
 	# ~return result
	return $chore;
}


//Return current page link
function self_link(){
	$link = grab_link('uri');
	if($link!='default'){$chore = do_link($link, grab_link('type'));} 
	else {$chore =path_to();}
 	 	
 	# ~return result
 	return $chore;
}


//Check for active link
function is_link_active($uri='default', $type='default'){
	$uri = string_swap($uri, '&', 'and', 'all');
	$chore = grab_link('both');
	if(($uri=='index' || $uri=='default') && ($chore['uri']=='index' || $chore['uri']=='default')){return TRUE;}
	elseif($uri==$chore['uri'] && $type==$chore['type']){return TRUE;}
	return FALSE;
}


//Markup url
function markup_url($link='', $name='', $type='page', $style='link', $tag='', $target='self', $link_as='relative', $activate=''){
	if(is_empty($link) || is_empty($type)){return FALSE;}
	
	# ~link
	$link = strtolower($link);
	$prepLink = '';
	if($type=='url'){$prepLink .= $link;}
	elseif($link!='index'){$prepLink .= do_link($link, $type);}
	else {$prepLink .= path_to();}
	
	# ~name
	if(is_empty($name)){$name = string_swap($link, '_', ' ');}
	$prepName = capitalize_words($name, 'library'); //make words if found in library, uppercase
	
	# ~tag
	if(empty($tag)){$tag = strtolower($name);}
	$prepTag = $tag;
	$prepTag = capitalize_words($prepTag, 'library'); //make words if found in library, uppercase
	
	# ~style
	$prepStyle = '';
	$linkIsActive = is_link_active($link, $type);
	$stayActive = 'no';
	if(is_array($activate)){
		if(in_array(grab_link(), $activate)){$stayActive = 'yeah';}
	} else {
		if(grab_link()==$activate){$stayActive = 'yeah';}
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
	$chore ='<a href="'.$prepLink.'" title="'.$prepTag.'"'.$prepStyle.$prepTarget.'>'.$prepName.'</a>';
	return $chore;
}

//Markup link menu
function link_menu($link='', $name='', $tag='', $style='menu'){
	return markup_url($link, $name, 'link', $style, $tag);
}


//Markup primary menu
function page_menu($link='', $name='', $tag='', $style='menu'){
	return markup_url($link, $name, 'page', $style, $tag);
}


//Markup secondary menu
function page_secondary_menu($link='', $name='', $tag='', $style='secondary-menu'){
	return markup_url($link, $name, 'page', $style, $tag);
}


//Markup group menu
function page_menu_group($link='', $name='', $activate ='', $tag='', $style='menu'){
	return markup_url($link, $name, 'page', $style, $tag, 'self', 'relative', $activate);
}


//Markup paragraph link
function paragaph_link($link='', $name='', $tag='', $style='paralink'){
	return markup_url($link, $name, 'page', $style, $tag);
}


//Markup absolute url
function markup_absurl($link='', $name='', $style='link', $tag='', $target='_blank', $link_as='absolute'){
	return markup_url($link, $name, $type='url', $style, $tag='', $target, $link_as);
}


//Returns referer url
function referer_url(){
	#prepare & return
	if(!empty($_SERVER['HTTP_REFERER'])){return $_SERVER['HTTP_REFERER'];}
	else {return FALSE;}
}
?>