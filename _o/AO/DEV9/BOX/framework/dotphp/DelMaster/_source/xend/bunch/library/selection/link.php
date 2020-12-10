<?php
/* iQYRE™ - a micro web application development framework by iCYZa™ © 2015
 * Program -> link.php
 */

function MakeLink($input='', $type='link', $rewrite='nope', $trigger='self'){
	#SANCTION
 	if(empty($input)){return IsError('U-LINK/01|01A', $trigger);}
 	if(empty($type)){return IsError('U-LINK/01|01B', $trigger);}
 	if(empty($rewrite)){return IsError('U-LINK/01|01C', $trigger);}	
	$types = array('api', 'app', 'link', 'page', 'launch', 'redirect');
	if(!in_array($type, $types)){return IsError('U-LINK/02|01A', $trigger);}
	$rewrites = array('yeah', 'nope');
	if(!in_array($rewrite, $rewrites)){return IsError('U-LINK/02|01B', $trigger);}

	#PREPARE
	$type = strtolower($type);
	$input = StringSwap('&','and',$input);
	$input = strtolower($input);

	#RESOLVE
	if($rewrite=='nope'){$task = '/?'.$type.'='.trim($input);} else {$task = '/'.$type.'/'.trim($input);}
 	
 	#RETURN
 	return $task;
}

function GrabLink($yeild='uri', $trigger='self'){
	#SANCTION
	if(empty($yeild)){return IsError('U-LINK/02|01A', $trigger);}
	$yeilds = array('uri', 'type', 'both');	
	if(!in_array($yeild, $yeilds)){return IsError('U-LINK/02|02A', $trigger);}

	#PREPARE ~check & set
	$type = 'default'; $uri = 'default';
	if(isset($_GET['api'])){$type = 'api'; if(!empty($_GET['api'])){$uri = $_GET['api'];}}
	elseif(isset($_GET['app'])){$type = 'app'; if(!empty($_GET['app'])){$uri = $_GET['app'];}}
	elseif(isset($_GET['link'])){$type = 'link'; if(!empty($_GET['link'])){$uri = $_GET['link'];}}
	elseif(isset($_GET['page'])){$type = 'page'; if(!empty($_GET['page'])){$uri = $_GET['page'];}}
	elseif(isset($_GET['launch'])){$type = 'launch'; if(!empty($_GET['launch'])){$uri = $_GET['launch'];}}
	elseif(isset($_GET['redirect'])){$type = 'redirect'; if(!empty($_GET['redirect'])){$uri = $_GET['redirect'];}}
	
	# ~clean up
	$uri = TrimEdge($uri);
	$uri = StringSwap('\\','',$uri);
	$uri = StringSwap('~','',$uri);
	$uri = urldecode($uri);
	if(empty($type)){$type = 'default';}
	if(empty($uri)){$uri = 'default';}

	#RESOLVE
	if($yeild=='uri'){$task = strtolower($uri);}
	if($yeild=='type'){$task = strtolower($type);}
	if($yeild=='both'){$task['uri'] = strtolower($uri); $task['type'] = strtolower($type);}
	
	#RETURN
	return $task;
}

function SelfLink($rewrite='nope', $domain='', $trigger='self'){
	#SANCTION
 	if(empty($rewrite)){return IsError('U-LINK/03|01A', $trigger);}

	#PREPARE
	$link = GrabLink('uri');

	#RESOLVE
	if($link!='default'){$task = MakeLink(GrabLink('uri'), GrabLink('type'), $rewrite);} else {$task .='/';}
 	if(!empty($domain)){$task = $domain.$task;} else {$task ='.'.$task;}

 	#RETURN
 	return $task;
}


function IsActiveLink($uri='default', $type='default', $trigger='self'){
	#SANCTION
	if(empty($uri)){return IsError('U-LINK/04|01A');}
	if(empty($type)){return IsError('U-LINK/04|01B');}

	#PREPARE
	$uri = StringSwap('&', 'and', $uri, 'all', 'U-LINK/04');
	$task = GrabLink('both', 'U-LINK/04');

	#RETURN
	if($uri==$task['uri'] && $type==$task['type']){return TRUE;}
	else {return FALSE;}
}

function MarkupURL($link='', $name='', $type='page', $style='navlink', $tag='', $domain='', $target='self', $rewrite='nope'){
	#SANCTION
	if(empty($link)){return IsError('U-LINK/05|01A', 'self');}
	if(empty($type)){return IsError('U-LINK/05|01B', 'self');}
	if(empty($rewrite)){return IsError('U-LINK/05|01C', 'self');}

	#PREPARE
	if($rewrite=='auto'){if(defined('URL_REWRITE') && URL_REWRITE){$rewrite = URL_REWRITE;}}

	# ~link	
	$link = strtolower($link);
	$prepLink ='';
	if(!empty($domain) && $domain!='auto'){$prepLink .= $domain;}
	elseif($domain=='auto'){
		$siteURL = iQYRE::SiteURL();
		if(!empty($siteURL)){$prepLink .= $siteURL;} else {$prepLink ='.';}
	} else {$prepLink ='.';}
	if($link!='index'){$prepLink .= MakeLink($link, $type, $rewrite);} else {$prepLink .='/';}

	# ~name
	if(empty($name)){$name = StringSwap('_', ' ', $link); $name = StringSwap('-', ' ', $name);}
	$prepName = StringInArrayToCap('library', $name); //make words if found in library, uppercase

	# ~tag
	if(empty($tag)){$tag = strtolower($name);}
	$prepTag = $tag;
	$prepTag = StringInArrayToCap('library', $prepTag); //make words if found in library, uppercase
	
	# ~style
	$prepStyle = '';
	$linkIsActive = IsActiveLink($link, $type);
	if(!empty($style) || $linkIsActive){
		$prepStyle .= ' class="';
		if(!empty($style)){$prepStyle .= $style;}
		if(!empty($style) && $linkIsActive){$prepStyle .= '-';}
		if($linkIsActive){$prepStyle .= 'active';}
		$prepStyle .= '"';
	}

	# ~target
	$prepTarget = '';
	if(!empty($target) && $target !='self'){$prepTarget = ' target= "'.$target.'"';}

	#RESOLVE
	$task ='<a href="'.$prepLink.'" title="'.$prepTag.'"'.$prepStyle.$prepTarget.'>'.$prepName.'</a>';

	#RETURN
	return $task;
}

function RefererURL(){
	#PREPARE & RETURN
	if(!empty($_SERVER['HTTP_REFERER'])){return $_SERVER['HTTP_REFERER'];}
	else {return FALSE;}
}
?>