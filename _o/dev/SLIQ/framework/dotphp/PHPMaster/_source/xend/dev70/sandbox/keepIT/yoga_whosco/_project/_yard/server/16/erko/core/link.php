<?php
/* erko™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by DeronEllse™ [@deronellse - www.deronellse.com/about] using PHP, MySQL, HTML, CSS, JS & derived technology.
 * © February 2016 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | link::core ~ link operations
 */
function do_link($input='', $type='page'){
	$types = array('api', 'link', 'page', 'download', 'redirect'); $rewrite = 'no';
 	if(is_empty($input) || is_empty($type) || !in_array($type, $types)){return FALSE;}
	if(defined('REWRITE_URL') && REWRITE_URL){$rewrite = REWRITE_URL;}
	$type = strtolower($type);
	$input = string_swap($input, '&', 'and');
	$input = strtolower($input);

	if($rewrite=='no'){$chore = './?'.$type.'='.trim($input);}
	else {$chore = '/'.$type.'/'.trim($input);}
 	return $chore;
}

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
	return $chore;
}

function self_link($domain=''){
	if(defined('REWRITE_URL') && REWRITE_URL){$rewrite = REWRITE_URL;} else {$rewrite = 'no';}
	$chore = ''; $link = grab_link('uri');
	if($link!='default'){$chore = do_link(grab_link('uri'), grab_link('type'), $rewrite);} else {$chore .='/';}
 	if(!is_empty($domain)){$chore = $domain.$chore;} else {$chore ='.'.$chore;}
 	return $chore;
}

function is_link_active($uri='default', $type='default'){
	$uri = string_swap($uri, '&', 'and', 'all');
	$chore = grab_link('both');
	if(($uri=='index' || $uri=='default') && ($chore['uri']=='index' || $chore['uri']=='default')){return TRUE;}
	elseif($uri==$chore['uri'] && $type==$chore['type']){return TRUE;}
	return FALSE;
}

function markup_url($link='', $name='', $type='page', $style='link', $tag='', $target='self', $link_as='relative', $activate=''){
	if(is_empty($link) || is_empty($type)){return FALSE;}
	
	# ~link
	$link = strtolower($link);
	$prepLink = '';
	if($type=='url'){$prepLink .= $link;}
	else {
		$siteURL = '';
		if($link!='index'){$prepLink .= do_link($link, $type);} 
		else {
			if(defined('REWRITE_URL') && REWRITE_URL != 'yeah'){$prepLink .= './';}
		}
		if($link_as=='auto' || defined('REWRITE_URL') && REWRITE_URL == 'yeah'){$siteURL = erko::site_url();}		
		if(!is_empty($siteURL)){$prepLink = $siteURL.$prepLink;}		
	}
	
	# ~name
	if(is_empty($name)){$name = string_swap($link, '_', ' ');}
	$prepName = capitalize_words($name, 'library'); //make words if found in library, uppercase
	#$prepName = words_as($prepName, 'library');
	
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

function page_menu($link='', $name='', $tag='', $style='menu'){
	return markup_url($link, $name, 'page', $style, $tag);
}
function page_secondary_menu($link='', $name='', $tag='', $style='secondary-menu'){
	return markup_url($link, $name, 'page', $style, $tag);
}

function page_menu_group($link='', $name='', $activate ='', $tag='', $style='menu'){
	return markup_url($link, $name, 'page', $style, $tag, 'self', 'relative', $activate);
}

function paragaph_link($link='', $name='', $tag='', $style='paralink'){
	return markup_url($link, $name, 'page', $style, $tag);
}

function markup_absurl($link='', $name='', $style='link', $tag='', $target='_blank', $link_as='absolute'){
	return markup_url($link, $name, $type='url', $style, $tag='', $target, $link_as);
}

function referer_url(){
	#PREPARE & RETURN
	if(!empty($_SERVER['HTTP_REFERER'])){return $_SERVER['HTTP_REFERER'];}
	else {return FALSE;}
}
?>